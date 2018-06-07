<?php
//NULL COALESCING OPERATOR ----:> $csrf_token = $_SESSION['csrf_token'] ?? false; /*se o valor da sessao existir e nao estiver em branco recebe valor se nao retorna false*/
$csrf_token = (isset($_SESSION['csrf_token']))? $_SESSION['csrf_token'] : false;/*se o valor da sessao existir  recebe valor se nao retorna false*/
$csrf_token = ($csrf_token != null)? $_SESSION['csrf_token'] : false;/*se o valor da sessao  nao estiver em branco recebe valor se nao retorna false*/

if($csrf_token and $csrf_token !== filter_input(INPUT_POST,'_csrf_token')){/*se nao tiver um valor ou ele for diferente*/
	die("<p align=center>CSRF Validation fail <br> <a href='index.php'>voltar</a></p>");
}/*compara valor e tipo da variavel session do token com o que o usuario enviou*/
?>