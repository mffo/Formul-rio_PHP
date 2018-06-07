<?php
/*
requeste: tipo de dado que ta enviando
response: tipo de dado que ta devolvendo*/
session_start();
header('Content-Type: image/jpeg'); /*usa o content type no response:  responde com imagem e jpeg que o php vai gerar*/
$image = imagecreate(200,100);/*precisa da biblioteca GD habilitada---- 100 de altura e 200 de largura*/
$palavra = ''; /*cria uma palabra vazia*/
$caracteres = array_merge(range('a','z'),range('0','9'),range('A','Z'));/*gera arrays com caracteres  minusculos e maiusculos e vai somar os arrays para formar palavra*/
shuffle($caracteres);/*vai embaralhar os caracteres misturando a ordem*/
$palavra = implode($caracteres);/*transforma o array com todos os caractes em uma string so com tamanho dos elementos dos arrays somados*/
$palavra = substr($palavra,0,5);/*uma parte das string nesse caso os 4 primeiros caracteres 0=posicao de onde comeca, 5=quantidade de caracteres*/

$_SESSION['captcha'] = $palavra;/*armazena a variavel palavra numa sessao*/

imagecolorallocate($image,76,74,74);/*gera a cor fundo*/
$cor = imagecolorallocate($image,255,255,255);/*gera a cor utilizada*/
imagettftext($image,18,rand(10,30),rand(40,60),rand(60,80),$cor,__DIR__.'/fonts/font.ttf',$palavra);/*pega a palavra e joga dentro da imagem  imagettftext(imagem,font,angulo,posiX,posiY,cor,arquivo-da-fonte,texto)*/

imagejpeg($image);/*cria a imagem jpeg*/
imagedestroy($image);/*destroi a imagem depois de impressa para nao ocupar memoria*/
?>
