<?php
/**
 *  Clase para manejar acciones en las url
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesUrl.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesUrl
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Parseo de parametros para el envio en las url
	 * 
	 * @param String $parametro Variable a enviar por el url
	 * 
	 * @return String $param_parseada Variable parseada a enviar por el url
	 */
	public function parsearEnvio($parametro)
	{
		if($parametro == "")
		{
			return "&&";
		}
		else
		{
			return $parametro;
		}		
	}
	
	/**
	 * Parseo de parametros al recibirlas de las url
	 * 
	 * @param String $parametro Variable recibida por el url
	 * 
	 * @return String $param_parseada Variable parseada recibida por el url
	 */
	public function parsearRecepcion($parametro)
	{
		if($parametro == "&&")
		{
			return "";
		}
		else
		{
			return $parametro;
		}
	}
}
?>