<?php 
	require_once "Conexion.php";

	class Crud extends Conexion{

		public function mostrarDatos(){
			$sql="SELECT * FROM t_crud";
			$query=Conexion::conectar()->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			$query->close();
		}

		public function insertarDatos($datos){
			$sql= "INSERT into t_crud (nombre, sueldo, edad, fRegistro)values (:nombre,:sueldo,:edad,:fRegistro)";
			$query=Conexion::conectar()->prepare($sql);
			$query->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
			$query->bindParam(":sueldo",$datos["sueldo"], PDO::PARAM_STR);
			$query->bindParam(":edad",$datos["edad"], PDO::PARAM_INT);
			$query->bindParam(":fRegistro",$datos["fecha"], PDO::PARAM_STR);

			return $query->execute();
			$query->close();
		}

		public function obtenerDatos($id){
			$sql="SELECT id,nombre,sueldo,edad,fRegistro FROM t_crud where id=:id";
			$query=Conexion::conectar()->prepare($sql);
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetch();
			$query->close();
		}
		
		public function actualizarDatos($datos){
			$sql="UPDATE t_crud set nombre=:nombre,
						sueldo=:sueldo,
						edad=:edad,
						fRegistro=:fRegistro
				where id=:id";
			$query=Conexion::conectar()->prepare($sql);
			$query->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
			$query->bindParam(":sueldo",$datos["sueldo"], PDO::PARAM_STR);
			$query->bindParam(":edad",$datos["edad"], PDO::PARAM_INT);
			$query->bindParam(":fRegistro",$datos["fecha"], PDO::PARAM_STR);
			$query->bindParam(":id",$datos["id"], PDO::PARAM_INT);

			return $query->execute();

			$query->close();
		}

		public function eliminarDatos($id){
			$sql="DELETE from t_crud where id=:id";
			$query=Conexion::conectar()->prepare($sql);
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			return $query->execute();
			$query->close();
		}

	}


 ?>