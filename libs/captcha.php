<?php

//NULL COALESCING OPERATOR ----:> $csrf_token = $_SESSION['csrf_token'] ?? false; /*se o valor da sessao existir e nao estiver em branco recebe valor se nao retorna false*/
$captcha = (isset($_SESSION['captcha']))? $_SESSION['captcha'] : false;/*se o valor da sessao existir  recebe valor se nao retorna false*/
$captcha = ($captcha != null)? $_SESSION['captcha'] : false;/*se o valor da sessao  nao estiver em branco recebe valor se nao retorna false*/

if($captcha and $captcha !== filter_input(INPUT_POST,'_captcha')){/*se nao tiver um valor ou ele for diferente*/
	die("<p align=center>Captcha Validation fail <br> <a href='index.php'>voltar</a></p>");
}/*compara valor e tipo da variavel session do token com o que o usuario enviou*/
?>
