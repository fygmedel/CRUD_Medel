<?php 
	class Conexion{
		public function conectar(){
			$conexion= new PDO("mysql:host=localhost;dbname=pdof","root","");
			return $conexion;
		}
	}
 ?>