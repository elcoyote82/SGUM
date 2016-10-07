<?php
/**
 * Clase para generar el menu superior de la aplicación
 *
 * @package    SGUM
 * @subpackage lib
 * @name       GenerarMenus.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class GenerarMenus 
{
	
	/**
	 * Constructor de la Clase GenerarMenus 
	 */
	public function __construct()
	{				
	}	
	
	/**
	 * Genera los botones para el index principal de la aplicacón
	 * Comprueba si tiene permisos entrar en el modulo
	 * 
	 * @return array $menu_botones Array con llave el nombre del modulo y valor la ruta al modulo
	 */
	public function generarMenuBotones()
	{
		// Obtenemos el id del usuario
		if(!isset($_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']))
		{
			$id_usuario = '';
		}
		else
		{
			$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		}
		
		// Array con el menu de botones que dependen de los permisos del usuario y del grupo	
		$menu_botones = array();
		
		if($id_usuario != '')
		{
			// Obtenemos un uevo objeto Administracion
			$acc_admin = new Administracion();
			
			// Obtenemos el Id de Permiso del usuario
			$id_permiso = $acc_admin->obtenerIdPermisoXIdUsuario($id_usuario);
						
			if($id_permiso == 1)
			{				
				$menu_botones["default"]          = "default/index";
				$menu_botones["Administracion"]   = "administracion/index";
				$menu_botones["Articulos"]        = "articulos/index";
				$menu_botones["Proveedores"]      = "proveedores/index";
				$menu_botones["Pedidos"]          = "pedidos/index";
				$menu_botones["Entradas"]         = "entradas/index";
				$menu_botones["Clientes"]         = "clientes/index";
				$menu_botones["Ventas"]           = "ventas/index";
				$menu_botones["Salidas"]          = "salidas/index";
				$menu_botones["Transporte"] 	  = "transporte/index";	
				$menu_botones["Contactos"] 	      = "contactos/index";
				$menu_botones["Informes"] 	      = "informes/informesPedidos";
				$menu_botones["Ayuda"] 	     	  = "ayuda/index";							
			}
			elseif($id_permiso == 2)
			{				
				$menu_botones["default"]          = "default/index";
				$menu_botones["Articulos"]        = "articulos/index";
				$menu_botones["Proveedores"]      = "proveedores/index";
				$menu_botones["Pedidos"]          = "pedidos/index";
				$menu_botones["Clientes"]         = "clientes/index";
				$menu_botones["Ventas"]           = "ventas/index";
				$menu_botones["Transporte"] 	  = "transporte/index";
				$menu_botones["Contactos"] 	      = "contactos/index";
				$menu_botones["Informes"] 	      = "informes/informesPedidos";
				$menu_botones["Ayuda"] 	     	  = "ayuda/index";	
			}
			else
			{				
				$menu_botones["default"]          = "default/index";
				$menu_botones["Articulos"]        = "articulos/index";
				$menu_botones["Pedidos"]          = "pedidos/index";
				$menu_botones["Entradas"]         = "entradas/index";
				$menu_botones["Ventas"]           = "ventas/index";
				$menu_botones["Salidas"]          = "salidas/index";
				$menu_botones["Transporte"] 	  = "transporte/index";
				$menu_botones["Informes"] 	      = "informes/informesPedidos";
				$menu_botones["Ayuda"] 	     	  = "ayuda/index";	
			}	
		}
		else
		{
				$menu_botones["default"]          = "default/index";
				$menu_botones["Ayuda"] 	     	  = "ayuda/index";	
		}
					
		return $menu_botones;	
	}
}
?>