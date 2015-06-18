<?php
	include('class.upload.php');

	class generic_functions {
		/* Funcion para subir un archivo */
		public static function newUploadFile($archivoSubir,$rutaGuardarArchivo='UploadedFiles') {
			//Crea Una Nueva Instancia de la clase de subir archivos.
	        $archivo = new Upload($archivoSubir, 'es_ES');
	        // Verificamos si se puede subir el archivo
			if ($archivo->uploaded){
				//Le damos un nuevo nombre al archivo para que no se duplique.
				$nuevoNombre = date('HMs')."_".$archivo->file_src_name_body;
				$archivo->file_new_name_body = $nuevoNombre;
				//Subimos el archivo a la ruta dada ($rutaGuardarArchivo).
				$archivo->Process($rutaGuardarArchivo);
				//Verificamos si subio
				if($archivo->processed){
					echo "Archivo Subido";
					//Obtenemos la extension del archivo Subido
					$extension = $archivo->file_src_name_ext;
					return $nuevoNombre .".".$extension;
				}
				$archivos->Clean();
			}else{
				echo "Error al subir el archivo...".$archivo->error;
				return NULL;
			}
	    }
	}
?>