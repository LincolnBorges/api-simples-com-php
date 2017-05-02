<?php

// ----- Validar se o token está correto ---- //
if($_POST['token']!="TN8vAD9ySdCcr4MS6hvyfnSsXYKLkwNY5WvYA4WB"){
 $retorno['status'] = 1;
 $retorno['status_mensagem'] = "token invalido";
 echo json_encode($retorno);
 die();
}

// ----- Validar se o id_produto foi preenchido ---- //
if($_POST['id_produto']==""){
 $retorno['status'] = 2;
 $retorno['status_mensagem'] = "falta informação do ID do produto";
 echo json_encode($retorno);
 die();
}

// ----- Inclui o arquivo de conexão no banco de dados ---- //
include('config.php');

// ----- Seleciona o produto ---- //
$stmt = $conn->prepare("select nome from produto where id = ?");
$stmt->bind_param("i", $_POST['id_produto']);
$stmt->execute();
$res = $stmt->get_result();

// ----- Se caso não encontrar nenhum produto ---- //
if($res->num_rows==0){
 $retorno['status'] = 3;
 $retorno['status_mensagem'] = "Nenhum produto foi encontrado";
}else{
 $retorno['status'] = 4;
 $retorno['status_mensagem'] = "Produto encontrado";
}

$row = $res->fetch_array(MYSQLI_ASSOC);

// ----- Como será apenas um retorno de produto, já podemos atribuir ele no parâmetro "produto" ---- //
$retorno['produto'] = $row;

// ----- Disponibilizando a informação para poder ser consumida ---- //
echo json_encode($retorno);
?>