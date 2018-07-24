<?php 

//ARQUIVO CSV FORMATA ex:excel, uso de vírgula = separador coluna, quebra de linha = novo registro;
require_once("config.php");

$sql = new Sql();

$usuarios= $sql -> select("SELECT * FROM tb_usuario ORDER BY  deslogin");

$headers = array();

foreach ($usuarios[0] as $key => $value) {
	array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv","w+");


//implode primeiro é o que será usado para separar um do outro no caso ","
fwrite($file, implode(",", $headers)."\r\n");

//dados (ESTILO MATRIZ)

foreach ($usuarios as $row) {
	$data=array(); //linhas

	foreach ($row as $key => $value) {//colunas
		array_push($data, $value);
	}//end foreach de coluna
	fwrite($file, implode(",", $data)."\r\n");
}//End foreach de lina


fclose($file)



 ?>