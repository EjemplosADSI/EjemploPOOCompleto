<?php

require_once (__DIR__.'/../clases/usuarios_class.php');

if(!empty($_GET['action'])){
	usuarios_controller::main($_GET['action']);
}

class usuarios_controller{
	
	static function main($action){
		if ($action == "crear"){
			usuarios_controller::crear();
		}else if ($action == "editar"){
			usuarios_controller::editar();
		}else if ($action == "buscarID"){
			usuarios_controller::buscarID(1);
		}
	}
	
	static public function crear (){
		try {
			$arrayUser = array();
			$arrayUser['tipo_identificacion'] = $_POST['tipo_identificacion'];
			$arrayUser['identificacion'] = $_POST['identificacion'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
			$arrayUser['telefono'] = $_POST['telefono'];
			$arrayUser['direccion'] = $_POST['direccion'];
			$arrayUser['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
			$arrayUser['saldo'] = $_POST['saldo'];
			$arrayUser['user_login'] = $_POST['user_login'];
			$arrayUser['pass_login'] = $_POST['pass_login'];
			$arrayUser['estado'] = $_POST['estado'];
			$usuario = new usuarios ($arrayUser);
			$usuario->insertar();
			header("Location: ../insertar.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../insertar.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			$arrayUser = array();
			$arrayUser['tipo_identificacion'] = $_POST['tipo_identificacion'];
			$arrayUser['identificacion'] = $_POST['identificacion'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
			$arrayUser['telefono'] = $_POST['telefono'];
			$arrayUser['direccion'] = $_POST['direccion'];
			$arrayUser['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
			$arrayUser['saldo'] = $_POST['saldo'];
			$arrayUser['user_login'] = $_POST['user_login'];
			$arrayUser['pass_login'] = $_POST['pass_login'];
			$arrayUser['estado'] = $_POST['estado'];
			$arrayUser['id'] = $_POST['Id'];
			var_dump($arrayUser);
			$usuario = new usuarios ($arrayUser);
			$usuario->editar();
			header("Location: ../editar.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../editar.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return usuarios::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
	public function buscarAll (){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public function buscar ($campo, $parametro){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
}
?>