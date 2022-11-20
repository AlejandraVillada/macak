<?php
	abstract class ModeloConexionDB {
		private static $db_host ="localhost:3306";
		private static $db_user = "root";
		private static $db_pass = "";
		protected $db_name = "macak";
		protected $query;
		protected $rows = array();
		private $conexion;
		
		
		abstract protected function consultar();
		abstract protected function nuevo();
		abstract protected function editar();
		
		
		
		# Conectar a la base de datos
		private function abrir_conexion() {
			$this->conexion = 
			new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
		}

		# Desconectar la base de datos
		private function cerrar_conexion() {
			$this->conexion->close();
		}
		
		#  INSERT, DELETE, UPDATE
		protected function ejecutar_query_simple() {			
			try {
				$this->abrir_conexion();
		        $this->conexion->query($this->query) ;
				// or die(mysqli_errno($this->conexion)." : " 
				// .mysqli_error($this->conexion)."  | Query=".$this->query);
				$resultado = $this->conexion->affected_rows;
				// var_dump($this->conexion);
				$this->cerrar_conexion();
				return $resultado;
		    } catch(Exception $e) {
		        echo "Error! : " . $e->getMessage();
		        return false;
		    }
			
		}
		
		# Traer resultados de una consulta en un Array con utf8
		protected function obtener_resultados_query() {
			try {
				$this->abrir_conexion();
				$result = $this->conexion->query($this->query) 
					or die(mysqli_errno($this->conexion)." : " 
					.mysqli_error($this->conexion)." | Query=".$this->query);

				while ($fila = $result->fetch_assoc()){
					// $this->rows[] = array_map('utf8_encode',$fila);
					$this->rows[] = $fila;
				}
				$result->close();
				$this->cerrar_conexion();
				//array_pop($this->rows);
			} catch(Exception $e) {
		        echo "Error! : " . $e->getMessage();
		        return false;
		    }
		}
	}
?>