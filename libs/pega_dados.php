<?php

$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email');
$senha = filter_input(INPUT_POST,'senha');

/**********************************************seta algumas coisas*************************************/
$email = filter_var($email,FILTER_SANITIZE_EMAIL);/*elimina todos os caracteres invalidos*/
$erro = false;

/**********************************************valida por php+regex*************************************/
$telefone = filter_input(INPUT_POST,'telefone');
//var_dump($telefone);
if(preg_match('/^(\([0-9]{2}\)[9][0-9]{4}[-][0-9]{4})$/',$telefone,$matches)){

	$telefone = $matches[0];
}else{
	$erro = true;
	$msg = 'TELEFONE INVALIDO';
}

/**********************************************Faz algumas validações por php *************************************/
if(empty($nome)){
	$erro = true;
	$msg  = "Por favor digite seu nome corretamente";
}

if(strstr($email,' ')==true){
	$erro = true;
	$msg = "O email não pode conter espaços em branco.";
}if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){/*ex: email com 2 @ é invalido*/
	$erro = true;
	$msg = "O email digitado é invalido.";
}

if(strstr($senha,' ')==true){
	$erro = true;
	$msg = "A senha não pode conter espaços em branco.";
}
if(strlen($senha)<8){
	$erro = true;
	$msg = "A senha deve possuir pelo menos 8 caracteres";
}

/**********************************************se ocorreu erro, exibe a mensagem de erro*************************************/
if($erro)
{
    echo "<html><body>";
    echo "<p align=center>$msg</p>";
    echo "<p align=center><a href='javascript:history.back()'>Voltar</a></p>";
    echo "</body></html>";
}
else
{
/**********************************************tratar os dados aqui (ex: gravar no banco de dados)*************************************/
    echo "<html><body>";
    echo "<p align=center>Seu cadastro foi realizado com sucesso!</p>";
    echo "</body></html>";
}
?>