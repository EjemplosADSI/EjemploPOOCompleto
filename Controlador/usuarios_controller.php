<?php
require_once('../clases/usuarios_class.php');

if(!empty($_GET['action'])){
	$action = $_GET['action'];
	if ($action == "crear"){
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
			header("Location: ../dashboard.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../dashboard.php?respuesta=error");
		}
	}else if ($action == "buscar"){
		try {
			$result = usuarios::buscarForId(1);
			var_dump($result);
		}catch (Exception $e){
			
		}
	}
}
?>