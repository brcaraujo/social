<?php
include('../configs/conexao.php');

session_start();

$dados = file_get_contents('php://input');
$dadosDecode = json_decode($dados, true);
// var_dump($dadosDecode);
// exit;


// settando paginação
$pagina = 0;
$limit = 30;
if(isset($dadosDecode['pagina'])){
    $pagina = $dadosDecode['pagina'];  
    $offSet = $pagina * $limit;
    // echo($pagina);
    // exit;
}



if(empty($dadosDecode['dadosInput'])){
    $sql = "SELECT * FROM `produtos` WHERE `mercado` = :mercado
    ORDER BY `Id_produto` DESC
    LIMIT $limit
    OFFSET $offSet
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mercado',$_SESSION['id_mercado']);
    $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)){
            $qtdRegistros = count($result);
            $resposta = array('sucesso', $qtdRegistros, $result);
            echo(json_encode($resposta, true));
        }else{
            $qtdRegistros = count($result);
            $resposta = array('erro', $qtdRegistros, $result);
            echo(json_encode($resposta, true));
        }    
}else{
    $sql = "SELECT *
    FROM `produtos` WHERE (`mercado` = :mercado) AND (`codigodebarra` = :codigodebarra OR `nome` LIKE :nome OR `setor` LIKE :setor) 
    ORDER BY `Id_produto` DESC
    LIMIT $limit
    OFFSET $offSet
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':codigodebarra', $dadosDecode['dadosInput']);
    $stmt->bindValue(':nome', '%'.$dadosDecode['dadosInput'].'%');
    $stmt->bindValue(':setor', '%'.$dadosDecode['dadosInput'].'%');
    $stmt->bindValue(':mercado', $_SESSION['id_mercado']);

    $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        // exit;
        if(!empty($result)){
            $qtdRegistros = count($result);
            $resposta = array('sucesso', $qtdRegistros, $result);
            echo(json_encode($resposta, true));
        }else{
            $qtdRegistros = count($result);
            $resposta = array('erro', $qtdRegistros, $result);
            echo(json_encode($resposta, true));
        }      
}
