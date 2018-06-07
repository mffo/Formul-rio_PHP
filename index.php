<?php
session_start();
$_SESSION['csrf_token'] = sha1(rand(1,20000));
?>


<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Validação de formulário</title>
	</head>
	<script language="javascript">
	function valida_form (nomeform)
	{
		if (nomeform.nome.value=="" )
		{
			alert ("Por favor digite o nome.");
			return false;
		}
		if (nomeform.email.value.indexOf('@',0)==-1)
		{
			alert ("Email inválido");
			return false;
		}
		if (nomeform.senha.value.indexOf(' ', 0) != -1 || nomeform.senha.value=="")
		{
			alert ("A senha não pode conter espaços em branco.");
			return false;
		}
		if (nomeform.confirmacao.value.indexOf(' ', 0) != -1|| nomeform.confirmacao.value=="")
		{
			alert ("A senha de confirmacao não pode conter espaços em branco.");
			return false;
		}

		if (nomeform.senha.value != nomeform.confirmacao.value)
		{
			alert ("Senhas não conferem. Você digitou duas senhas diferentes.");
			return false;
		}
	return true;
	}
	</script>
	<body>
		<artycle>
			<form action="send.php" method="POST" onSubmit=" return valida_form(this)">
			<input type="hidden" name="_csrf_token" value="<?=$_SESSION['csrf_token']; ?>">
			<h2>Preencha o formulario para se cadastrar no site</h2>
				<div class="campo">
					<label for = "nome"><h3>Nome:</h3></label>
					<input type = "text" name="nome" placeholder="Digite seu nome">
				</div>
				<div class="campo">
					<label for = "email"><h3>Email:</h3>:</label>
					<input type = "text" name="email" placeholder="Digite seu E-mail">
				</div>
				<div class="campo">
					<label for = "telefone"><h3>Telefone:</h3></label>
					<input type = "text" name="telefone" placeholder="(DDD)9xxxx-xxxx">
				</div>
				<div class="campo">
					<label for = "senha"><h3>Senha:</h3></label>
					<input type = "password" name="senha" placeholder="Digite sua senha">
				</div>
				<div class="campo">
					<label for = "confirmacao"><h3>Confirme sua senha:</h3>:</label>
					<input type = "password" name="confirmacao" placeholder="Confirme sua senha";>
				</div>	
				<div class="campo">
				<label for = "_captcha"><h3>Digite o valor do captcha:</h3>:</label>
					<img src="cria_imagem_captcha.php">
					<input name = "_captcha" type = "text"  placeholder="digite as letras acima";>
				</div>
				<div class="campo">
					<input type = "submit" name="enviar" value="Enviar";>
					<input type = "reset" name="reset" value="Limpar campos";>
				</div>
			</form>
		</artycle>
	</body>
</html>