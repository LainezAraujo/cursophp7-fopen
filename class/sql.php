<?php 

class Sql extends PDO{
	private $conn;

	//TIPO DE BANCO DE DADOS, LOCAL, NOME, USUARIO, SENHA
	public function __construct(){
		$this-> conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");
		}

	private function setParams($statment,$parameters = array()){
		foreach ($parameters as $key => $value) {
			//para cada parâmetro a chave recebe o valor
			$this-> setParam($statment,$key,$value);
			

		}
	}

	public function setParam($statment,$key,$value){
		
		$statment-> bindParam($key,$value);
	
	}	


	public function query($rawQuery,$params = array())	{
		$stmt= $this->conn->prepare($rawQuery);
		
		$this->setParams($stmt,$params);

		$stmt -> execute();
		
		return $stmt;
		
		}

	public function select($rawQuery,$params = array()):array{
		$stmt = $this -> query($rawQuery,$params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}	


}
 ?>