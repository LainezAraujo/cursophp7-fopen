<?php 

//resourse=manipulador (caminho do arquivo, como irá controlar:só ler, modificar..)
//w+ só escreve e apaga toda vez que dá F5
$file = fopen("log.txt", "a+");

//escrever dentro do arquivo 
//"\r\n"= espaço pula linha
//\t = tabulação
fwrite($file, date("Y-m-d H:i:s")."\r\n");

//fechar manipulador
fclose($file);


//testar
echo "Arquivo criado com sucesso!";
 ?>