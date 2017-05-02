<?php

// ----- Validar se o token está correto ---- //
if($_POST['token']!="TN8vAD9ySdCcr4MS6hvyfnSsXYKLkwNY5WvYA4WB"){
 $retorno['status'] = 1;
 $retorno['status_mensagem'] = "token invalido";
 echo json_encode($retorno);
 die();
}

// ----- Inclui o arquivo de conexão no banco de dados ---- //
include('config.php');

// ----- Seleciona o produto ---- //
$stmt = $conn->prepare("select nome from produto");
$stmt->execute();
$res = $stmt->get_result();

// ----- Se caso não encontrar nenhum produto ---- //
if($res->num_rows==0){
 $retorno['status'] = 3;
 $retorno['status_mensagem'] = "Nenhum produto foi encontrado";
}else{
 $retorno['status'] = 4;
 $retorno['status_mensagem'] = "Produtos encontrados";
}

// ----- Podem ser vários retornos, então vamos organizar ele em um loop no array "produto" ---- //
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
 $retorno['produto'][] = $row;
}

// ----- Disponibilizando a informação para poder ser consumida ---- //
echo json_encode($retorno);
?>