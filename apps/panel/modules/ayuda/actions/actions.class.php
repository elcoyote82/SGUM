<?php

/**
 * ayuda actions.
 *
 * @package    SGUM
 * @subpackage ayuda
 * @name       ayudaActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class ayudaActions extends sfActions
{
	/**
	* Executes index action
	*
	*/
	public function executeIndex()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
	}
	
	/**
	 * Descarga el manual de usuario
	 */
	public function executeDescargarManualUsuario()
	{
		$this->manual_usuario = sfConfig::get('app_manual_usuario');
	
		//Descargamos el archivo del servidor
		header ("Content-Type: text");
		header ("Content-Disposition: attachment; filename=ManualUsuario_SGUM");
		header('Cache-Control: private, max-age=0, must-revalidate');
		header('Pragma: public');
		@readfile($this->manual_usuario);
		
		die();
	}
	
	/**
	 * Menú principal de ayuda del Módulo Administración
	 */
	public function executeAdministracion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Usuarios de la ayuda del Módulo Administración
	 */
	public function executeVerUsuarios()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Usuarios de la ayuda del Módulo Administración
	 */
	public function executeBuscadorUsuarios()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Usuario de la ayuda del Módulo Administración
	 */
	public function executeCrearUsuario()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Usuario de la ayuda del Módulo Administración
	 */
	public function executeEditarUsuario()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Cambiar Password de la ayuda del Módulo Administración
	 */
	public function executeCambiarPassword()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Cambiar Grupo de la ayuda del Módulo Administración
	 */
	public function executeCambiarGrupo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Usuario de la ayuda del Módulo Administración
	 */
	public function executeBorrarUsuario()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Grupos de la ayuda del Módulo Administración
	 */
	public function executeVerGrupos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Grupos de la ayuda del Módulo Administración
	 */
	public function executeBuscadorGrupos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Grupo de la ayuda del Módulo Administración
	 */
	public function executeCrearGrupo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Grupo de la ayuda del Módulo Administración
	 */
	public function executeEditarGrupo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Grupo de la ayuda del Módulo Administración
	 */
	public function executeBorrarGrupo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Permisos de la ayuda del Módulo Administración
	 */
	public function executeVerPermisos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Permisos de la ayuda del Módulo Administración
	 */
	public function executeBuscadorPermisos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Permiso de la ayuda del Módulo Administración
	 */
	public function executeCrearPermiso()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Permiso de la ayuda del Módulo Administración
	 */
	public function executeEditarPermiso()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Permiso de la ayuda del Módulo Administración
	 */
	public function executeBorrarPermiso()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Estados de la ayuda del Módulo Administración
	 */
	public function executeVerEstados()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Estado de la ayuda del Módulo Administración
	 */
	public function executeCrearEstado()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Estado de la ayuda del Módulo Administración
	 */
	public function executeEditarEstado()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Estado de la ayuda del Módulo Administración
	 */
	public function executeBorrarEstado()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Configurar Tiempo Tarea Programada Módulo Administración
	 */
	public function executeConfigurarTiempoTareaProgramada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Configurar Numeración de los Informes del Módulo Administración
	 */
	public function executeConfigurarNumeracion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
		
	/**
	 * Menú principal de ayuda del Módulo Artículos
	 */
	public function executeArticulos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Artículos de la ayuda del Módulo Artículos
	 */
	public function executeVerArticulos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Artículos de la ayuda del Módulo Artículos
	 */
	public function executeBuscadorArticulos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Artículo de la ayuda del Módulo Artículos
	 */
	public function executeCrearArticulo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Artículo de la ayuda del Módulo Artículos
	 */
	public function executeEditarArticulo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Artículo de la ayuda del Módulo Artículos
	 */
	public function executeBorrarArticulo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Artículo de la ayuda del Módulo Artículos
	 */
	public function executeFichaArticulo()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Artículo, Pestaña Inventario, de la ayuda del Módulo Artículos
	 */
	public function executeFichaArticulo_Inventario()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Artículo, Pestaña Ubicación, de la ayuda del Módulo Artículos
	 */
	public function executeFichaArticulo_Ubicacion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Artículo, Pestaña Proveedores, de la ayuda del Módulo Artículos
	 */
	public function executeFichaArticulo_Proveedores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Familias de la ayuda del Módulo Familias
	 */
	public function executeVerFamilias()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Familias de la ayuda del Módulo Familias
	 */
	public function executeBuscadorFamilias()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Familia de la ayuda del Módulo Familias
	 */
	public function executeCrearFamilia()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Familia de la ayuda del Módulo Familias
	 */
	public function executeEditarFamilia()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Familia de la ayuda del Módulo Familias
	 */
	public function executeBorrarFamilia()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Familia de la ayuda del Módulo Familias
	 */
	public function executeFichaFamilia()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Ubicaciones de la ayuda del Módulo Ubicaciones
	 */
	public function executeVerUbicaciones()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Ubicaciones de la ayuda del Módulo Ubicaciones
	 */
	public function executeBuscadorUbicaciones()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Ubicación de la ayuda del Módulo Ubicaciones
	 */
	public function executeCrearUbicacion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Ubicación de la ayuda del Módulo Ubicaciones
	 */
	public function executeEditarUbicacion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Ubicación de la ayuda del Módulo Ubicaciones
	 */
	public function executeBorrarUbicacion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Ubicación de la ayuda del Módulo Ubicaciones
	 */
	public function executeFichaUbicacion()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Proveedores
	 */
	public function executeProveedores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Proveedores de la ayuda del Módulo Proveedores
	 */
	public function executeVerProveedores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Proveedores de la ayuda del Módulo Proveedores
	 */
	public function executeBuscadorProveedores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Proveedor de la ayuda del Módulo Proveedores
	 */
	public function executeCrearProveedor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Proveedor de la ayuda del Módulo Proveedores
	 */
	public function executeEditarProveedor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Proveedor de la ayuda del Módulo Proveedores
	 */
	public function executeBorrarProveedor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Proveedor de la ayuda del Módulo Proveedores
	 */
	public function executeFichaProveedor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Proveedor, Pestaña Artículos, de la ayuda del Módulo Proveedores
	 */
	public function executeFichaProveedor_Articulos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Proveedor, Pestaña Últimos Pedidos, de la ayuda del Módulo Proveedores
	 */
	public function executeFichaProveedor_UltimosPedidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Proveedor, Pestaña Contactos, de la ayuda del Módulo Proveedores
	 */
	public function executeFichaProveedor_Contactos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Pedidos
	 */
	public function executePedidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Pedidos de la ayuda del Módulo Pedidos
	 */
	public function executeVerPedidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Administrar Pedidos de la ayuda del Módulo Pedidos
	 */
	public function executeAdministrarPedidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Pedidos Pendientes de la ayuda del Módulo Pedidos
	 */
	public function executePedidosPendientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Pedidos En Proceso de la ayuda del Módulo Pedidos
	 */
	public function executePedidosEnProceso()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Pedidos Recibidos de la ayuda del Módulo Pedidos
	 */
	public function executePedidosRecibidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Pedidos Procesados de la ayuda del Módulo Pedidos
	 */
	public function executePedidosProcesados()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Pedidos Completos de la ayuda del Módulo Pedidos
	 */
	public function executePedidosCompletos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Pedidos de la ayuda del Módulo Pedidos
	 */
	public function executeBuscadorPedidos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Agregar Pedido de la ayuda del Módulo Pedidos
	 */
	public function executeAgregarPedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido, Pestaña Informe Pedido, de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedido_InformePedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido Completo de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedidoCompleto()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido Completo, Pestaña Informe Pedido, de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedidoCompleto_InformePedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido Completo, Pestaña Datos Entrada, de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedidoCompleto_DatosEntrada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Pedido Completo, Pestaña Informe Entrada, de la ayuda del Módulo Pedidos
	 */
	public function executeFichaPedidoCompleto_InformeEntrada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Entradas
	 */
	public function executeEntradas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Entradas de la ayuda del Módulo Entradas
	 */
	public function executeVerEntradas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Administrar Entradas de la ayuda del Módulo Entradas
	 */
	public function executeAdministrarEntradas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Entradas Pendientes de la ayuda del Módulo Entradas
	 */
	public function executeEntradasPendientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Entradas Procesadas de la ayuda del Módulo Entradas
	 */
	public function executeEntradasProcesadas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Entradas de la ayuda del Módulo Entradas
	 */
	public function executeBuscadorEntradas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Procesar Entrada de la ayuda del Módulo Entradas
	 */
	public function executeProcesarEntrada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Entrada de la ayuda del Módulo Entradas
	 */
	public function executeFichaEntrada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Entrada, Pestaña Informe Entrada, de la ayuda del Módulo Entradas
	 */
	public function executeFichaEntrada_InformeEntrada()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Entrada, Pestaña Datos Pedido, de la ayuda del Módulo Entradas
	 */
	public function executeFichaEntrada_DatosPedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Entrada, Pestaña Informe Pedido, de la ayuda del Módulo Entradas
	 */
	public function executeFichaEntrada_InformePedido()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Clientes
	 */
	public function executeClientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Clientes de la ayuda del Módulo Clientes
	 */
	public function executeVerClientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Clientes de la ayuda del Módulo Clientes
	 */
	public function executeBuscadorClientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Cliente de la ayuda del Módulo Clientes
	 */
	public function executeCrearCliente()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Cliente de la ayuda del Módulo Clientes
	 */
	public function executeEditarCliente()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Cliente de la ayuda del Módulo Clientes
	 */
	public function executeBorrarCliente()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Cliente de la ayuda del Módulo Clientes
	 */
	public function executeFichaCliente()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Cliente, Pestaña Artículos, de la ayuda del Módulo Clientes
	 */
	public function executeFichaCliente_Articulos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Cliente, Pestaña Últimas Ventas, de la ayuda del Módulo Clientes
	 */
	public function executeFichaCliente_UltimasVentas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Cliente, Pestaña Contactos, de la ayuda del Módulo Clientes
	 */
	public function executeFichaCliente_Contactos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Ventas
	 */
	public function executeVentas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Ventas de la ayuda del Módulo Ventas
	 */
	public function executeVerVentas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Administrar Ventas de la ayuda del Módulo Ventas
	 */
	public function executeAdministrarVentas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ventas Pendientes de la ayuda del Módulo Ventas
	 */
	public function executeVentasPendientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ventas En Proceso de la ayuda del Módulo Ventas
	 */
	public function executeVentasEnProceso()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ventas Enviadas de la ayuda del Módulo Ventas
	 */
	public function executeVentasEnviadas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ventas Procesadas de la ayuda del Módulo Ventas
	 */
	public function executeVentasProcesadas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ventas Completas de la ayuda del Módulo Ventas
	 */
	public function executeVentasCompletas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Ventas de la ayuda del Módulo Ventas
	 */
	public function executeBuscadorVentas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Agregar Venta de la ayuda del Módulo Ventas
	 */
	public function executeAgregarVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta de la ayuda del Módulo Ventass
	 */
	public function executeFichaVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta, Pestaña Informe Venta, de la ayuda del Módulo Ventas
	 */
	public function executeFichaVenta_InformeVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta Completa de la ayuda del Módulo Ventas
	 */
	public function executeFichaVentaCompleta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta Completa, Pestaña Informe Venta, de la ayuda del Módulo Ventas
	 */
	public function executeFichaVentaCompleta_InformeVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta Completa, Pestaña Datos Salida, de la ayuda del Módulo Ventas
	 */
	public function executeFichaVentaCompleta_DatosSalida()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Venta Completa, Pestaña Informe Salida, de la ayuda del Módulo Ventas
	 */
	public function executeFichaVentaCompleta_InformeSalida()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Salidas
	 */
	public function executeSalidas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Salidas de la ayuda del Módulo Salidas
	 */
	public function executeVerSalidas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Administrar Salidas de la ayuda del Módulo Salidas
	 */
	public function executeAdministrarSalidas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Salidas Pendientes de la ayuda del Módulo Salidas
	 */
	public function executeSalidasPendientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Salidas Procesadas de la ayuda del Módulo Salidas
	 */
	public function executeSalidasProcesadas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Salidas de la ayuda del Módulo Salidas
	 */
	public function executeBuscadorSalidas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Procesar Salida de la ayuda del Módulo Salidas
	 */
	public function executeProcesarSalida()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Salida de la ayuda del Módulo Salidas
	 */
	public function executeFichaSalida()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Salida, Pestaña Informe Salida, de la ayuda del Módulo Salidas
	 */
	public function executeFichaSalida_InformeSalida()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Salida, Pestaña Datos Venta, de la ayuda del Módulo Salidas
	 */
	public function executeFichaSalida_DatosVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Salida, Pestaña Informe Venta, de la ayuda del Módulo Salidas
	 */
	public function executeFichaSalida_InformeVenta()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Transporte
	 */
	public function executeTransporte()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver TransporteConductores de la ayuda del Módulo Transporte
	 */
	public function executeVerTransporteConductores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador TransporteConductores de la ayuda del Módulo Transporte
	 */
	public function executeBuscadorTransporteConductores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear TransporteConductor de la ayuda del Módulo Transporte
	 */
	public function executeCrearTransporteConductor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar TransporteConductor de la ayuda del Módulo Transporte
	 */
	public function executeEditarTransporteConductor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar TransporteConductor de la ayuda del Módulo Transporte
	 */
	public function executeBorrarTransporteConductor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha TransporteConductor de la ayuda del Módulo Transporte
	 */
	public function executeFichaTransporteConductor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha TransporteConductor_Empresa de la ayuda del Módulo Transporte
	 */
	public function executeFichaTransporteConductor_Empresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver TransporteEmpresas de la ayuda del Módulo Transporte
	 */
	public function executeVerTransporteEmpresas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador TransporteEmpresas de la ayuda del Módulo Transporte
	 */
	public function executeBuscadorTransporteEmpresas()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear TransporteEmpresa de la ayuda del Módulo Transporte
	 */
	public function executeCrearTransporteEmpresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar TransporteEmpresa de la ayuda del Módulo Transporte
	 */
	public function executeEditarTransporteEmpresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar TransporteEmpresa de la ayuda del Módulo Transporte
	 */
	public function executeBorrarTransporteEmpresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha TransporteEmpresa de la ayuda del Módulo Transporte
	 */
	public function executeFichaTransporteEmpresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha TransporteEmpresa_Conductores de la ayuda del Módulo Transporte
	 */
	public function executeFichaTransporteEmpresa_Conductores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Contactos
	 */
	public function executeContactos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Contactos de la ayuda del Módulo Contactos
	 */
	public function executeVerContactos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Contactos de la ayuda del Módulo Contactos
	 */
	public function executeBuscadorContactos()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Crear Contacto de la ayuda del Módulo Contactos
	 */
	public function executeCrearContacto()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Editar Contacto de la ayuda del Módulo Contactos
	 */
	public function executeEditarContacto()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Borrar Contacto de la ayuda del Módulo Contactos
	 */
	public function executeBorrarContacto()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Contacto de la ayuda del Módulo Contactos
	 */
	public function executeFichaContacto()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Contacto, Pestaña Proveedores, de la ayuda del Módulo Contactos
	 */
	public function executeFichaContacto_Proveedores()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ficha Contacto, Pestaña Clientes, de la ayuda del Módulo Contactos
	 */
	public function executeFichaContacto_Clientes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Menú principal de ayuda del Módulo Informes
	 */
	public function executeInformes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Ver Informes de la ayuda del Módulo Informes
	 */
	public function executeVerInformes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Buscador Informes de la ayuda del Módulo Informes
	 */
	public function executeBuscadorInformes()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Visualizar Informe de la ayuda del Módulo Informes
	 */
	public function executeVisualizarInforme()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
	
	/**
	 * Seccion Descarga Informe la ayuda del Módulo Informes
	 */
	public function executeDescargarInforme()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();			
	}
}
