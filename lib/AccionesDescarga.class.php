<?php

/**
 * Clase para gestionar todo lo relacionado con las descargas
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesDescarga.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesDescarga 
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Obtener la extension de un archivo
	 * 
	 * @param  string $nombre_archivo Nombre del archivo
	 * 
	 * @return string $ext Extension del archivo sin punto
	 */
	public function obtenerExtensionArchivo($nombre_archivo)
	{
		// Limpiamos el nombre del archivo de espacios
		$nombre_archivo = str_replace(" ","_",$nombre_archivo);
				
		// Obtenemos el archivo separado por puntos, por si tiene más de uno							
		$temp_archivo = explode('.',$nombre_archivo);
				
		// Obtenemos la extension
		$ext = $temp_archivo[count($temp_archivo) - 1];
		
		return $ext;
	}
	
	/**
	 * Obtener Content-Type pasandole la extensión de un archivo
	 * 
	 * @param String $ext Extensión del archivo
	 * 
	 * return String $cont-tipo Content-type
	 */
	public function obtenerContentType($ext)
	{
		switch ($ext)
		{	
			case "docx":
				$cont_tipo = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
				break;
			case "doc":
				$cont_tipo = "application/msword";
				break;
			case "xlsx":
				$cont_tipo = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
				break;
			case "xls":
				$cont_tipo = "application/vnd.ms-excel";
				break;
			case "pdf":
				$cont_tipo = "application/pdf";
				//$cont_tipo = "application/octet-stream";
				break;
			case "txt":
				$cont_tipo = "text/cvs";
				break;
			case "css":
				$cont_tipo = "text/css";
				break;
			case "htm":
				$cont_tipo = "text/html";
				break;
			//cont_tiposiones imagen
			case "bmp":
				$cont_tipo = "image/bmp";
				break;
			case "gif":
				$cont_tipo = "image/gif";
				break;
			case "png":
				$cont_tipo = "image/x-png";
				break;
			case "jpg":
				$cont_tipo = "image/pjpeg";
				break;
			case "jpeg":
				$cont_tipo = "image/jpeg";
				break;
			//cont_tiposiones video
			case "avi":
				$cont_tipo = "video/avi";
				break;
			//cont_tiposiones audio
			case "mp3":
				$cont_tipo = "audio/mpeg";
				break;
			case "wma":
				$cont_tipo = "audio/x-ms-wma";
				break;
			case "wav":
				$cont_tipo = "audio/wav";
				break;
			case "DSS":
				$cont_tipo = "application/octet-stream";
				break;
			//cont_tiposiones compresores
			case "zip":
				$cont_tipo = "application/x-zip-compressed";
				break;
			case "rar":
				$cont_tipo = "application/octet-stream";
				break;		
			case "tar":
				$cont_tipo = "application/x-tar";
				break;
			case "gz":
				$cont_tipo = "application/x-gzip";
				break;
			//cont_tiposion ejecutables
			case "exe":
				$cont_tipo = "application/x-sdlc";
				break;
			case "rtf":
				$cont_tipo = "application/rtf";
				break;
			default:
				$cont_tipo = "";
				break;
		}
		return $cont_tipo;
	 }
	 
	 /**
	 *  Descargar Fichero del Servidor
	 * 
	 * @param String $archivo_local Ruta absoluta del archivo
	 * 
	 * @return boolean TRUE
	 */
	 public function descargarArchivoServidor($archivo_local)
	 {	 		 	
	 	// Obtenemos la extension del archivo para luego descargarlo al servidor
		$partes_ruta = pathinfo($archivo_local);		
		$ext = $partes_ruta['extension'];
		$cont_tipo = $this->obtenerContentType($ext);		
		$partes_ruta = str_replace(" ","_",$partes_ruta);
		//Descargamos el archivo del servidor
		header ("Content-Type: $cont_tipo");
 		header ("Content-Disposition: attachment; filename=Informe");
 		//header ("Content-Disposition: attachment; filename=".$partes_ruta['basename']);
    	header('Cache-Control: private, max-age=0, must-revalidate');
    	header('Pragma: public');
    	ini_set('zlib.output_compression','0');
    	@readfile($archivo_local);
	 			
    	return true;
	 }
}
?>