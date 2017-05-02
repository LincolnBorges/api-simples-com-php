<?php

// ----- URL da API ---- //
$url = 'http://www.seusite.com.br/api/lista-produtos.php';

// ----- Variaveis que serão enviadas via POST ---- //
$curl_post_data = array(
        'token' => 'TN8vAD9ySdCcr4MS6hvyfnSsXYKLkwNY5WvYA4WB'
);

// ----- Enviando informações para o webservice ---- //
$curl = curl_init($url);
$curl_post_data = http_build_query($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
$retorno = json_decode($curl_response, true);

// ----- Agora vamos consumir ---- //
$status = $retorno['status']; //pegando o retorno do status
$status_mensagem = $retorno['status_mensagem']; //pegando a mensagem do status

$produto = $retorno['produto']; //pegando o nome do produto

echo "<br>Retorno da API Busca Produto<br><br>";
echo "Status: $status<br>";
echo "Status Mensagem: $status_mensagem<br>";

// ----- Como agora são varios produtos retornando, precisamos percorrer o resultado ---- //
foreach ($produto as $value) {
	echo "Produto: ".$value['nome']."<br>";
}

?>