<?php
/**
 * Clase que contienes funciones generales y comunes a varios modulos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       Utilidades.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class Utilidades 
{
	/**
	 * Constructor de la clase Utilidades
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Crear un array con las Provincias Españolas
	 */
	public function obtenerSelectProvincias()
	{	
		$provincias = array(
		'0' => '',		
		'A Coruña' =>'A Coruña',
		'Alava' =>'Álava',
		'Albacete' =>'Albacete',
		'Alicante' =>'Alicante',
		'Almería' =>'Almería',
		'Asturias' =>'Asturias',
		'Ávila' =>'Ávila',
		'Badajoz' =>'Badajoz',
		'Barcelona' =>'Barcelona',
		'Burgos' =>'Burgos',
		'Cáceres' =>'Cáceres',
		'Cadiz' =>'C&aacute;diz',
		'Cantabria' =>'Cantabria',
		'Castellón' =>'Castellón',
		'Ceuta' =>'Ceuta',
		'Ciudad Real' =>'Ciudad Real',
		'Córdoba' =>'Córdoba',
		'Cuenca' =>'Cuenca',
		'Girona' =>'Girona',
		'Las Palmas' =>'Las Palmas',
		'Granada' =>'Granada',
		'Guadalajara' =>'Guadalajara',
		'Guipúzcoa' =>'Guipúzcoa',
		'Huelva' =>'Huelva',
		'Huesca' =>'Huesca',
		'Islas Baleares' =>'Islas Baleares',
		'Jaén' =>'Jaén',
		'La Rioja' =>'La Rioja',
		'León' =>'León',
		'Lleida' =>'Lleida',
		'Lugo' =>'Lugo',
		'Madrid' =>'Madrid',
		'Málaga' =>'Málaga',
		'Melilla' =>'Melilla',
		'Murcia' =>'Murcia',
		'Navarra' =>'Navarra',
		'Ourense' =>'Ourense',
		'Palencia' =>'Palencia',
		'Pontevedra' =>'Pontevedra',
		'Salamanca' =>'Salamanca',
		'Segovia' =>'Segovia',
		'Sevilla' =>'Sevilla',
		'Soria' =>'Soria',
		'Tarragona' =>'Tarragona',
		'Santa Cruz de Tenerife' =>'Santa Cruz de Tenerife',
		'Teruel' =>'Teruel',
		'Toledo' =>'Toledo',
		'Valencia' =>'Valencia',
		'Valladolid' =>'Valladolid',
		'Vizcaya' =>'Vizcaya',
		'Zamora' =>'Zamora',
		'Zaragoza' =>'Zaragoza'
		);
		
		return $provincias;
	}
	
	/**
	 * Tab activa
	 * 
	 * @param String $nombre_activa tab activa
	 * @param String $nombre_tab nombre de la tab
	 * 
	 * @return String $tab
	 */
	 public function tabActiva($nombre_activa,$nombre_tab)
	 {
	 	if (strcmp($nombre_activa,$nombre_tab) == 0)
	 	{
	 		$tab = "selected";
	 	}
	 	else
	 	{
	 		$tab = "";
	 	}
	 	return $tab;
	 }
	 
	 /**
	 * MostrarTabActiva
	 * 
	 * @param String $nombre_activa tab activa
	 * @param String $nombre_tab nombre de la tab
	 * 
	 * @return String $tab±a
	 */
	 public function mostrarTabActiva($nombre_activa,$nombre_tab)
	 {
	 	if (strcmp($nombre_activa,$nombre_tab) == 0)
	 	{
	 		$tab = "tabContentActive";
	 	}
	 	else
	 	{
	 		$tab = "";
	 	}
	 	return $tab;
	 }
	 
	/**
	 * Ordenar columas de una tabla recogiendo un objeto
	 * 
	 * @param Object $objeto
	 * @param String $columna 
	 * 
	 * @return Object $objeto_ordenado
	 */
	public function ordenarObjetoXColumna($objeto,$columna)
	{
		switch ($columna) 
		{
			// Tabla Artículos
			case 'nombre_articulo_asc':
				$objeto->addAscendingOrderByColumn(ArticulosPeer::NOMBRE);
			break;
			case 'nombre_articulo_desc':
				$objeto->addDescendingOrderByColumn(ArticulosPeer::NOMBRE);
			break;
			case 'id_familia_articulo_asc':				
				$objeto->addAscendingOrderByColumn(ArticulosPeer::ID_FAMILIA);
			break;
			case 'id_familia_articulo_desc':
				$objeto->addDescendingOrderByColumn(ArticulosPeer::ID_FAMILIA);
			break;			
			case 'datos_producto_articulo_asc':
				$objeto->addAscendingOrderByColumn(ArticulosPeer::DATOS_PRODUCTO);
			break;
			case 'datos_producto_articulo_desc':
				$objeto->addDescendingOrderByColumn(ArticulosPeer::DATOS_PRODUCTO);
			break;			
			case 'descripcion_articulo_asc':
				$objeto->addAscendingOrderByColumn(ArticulosPeer::DESCRIPCION);
			break;
			case 'descripcion_articulo_desc':
				$objeto->addDescendingOrderByColumn(ArticulosPeer::DESCRIPCION);
			break;		
			case 'stock_articulo_asc':
				$objeto->addAscendingOrderByColumn(ArticulosPeer::STOCK);
			break;
			case 'stock_articulo_desc':
				$objeto->addDescendingOrderByColumn(ArticulosPeer::STOCK);
			break;
			
			// Tabla Familias
			case 'nombre_familia_asc':
				$objeto->addAscendingOrderByColumn(FamiliasPeer::NOMBRE);
			break;
			case 'nombre_familia_desc':
				$objeto->addDescendingOrderByColumn(FamiliasPeer::NOMBRE);
			break;
			
			// Tabla Ubicaciones
			case 'nombre_ubicacion_asc':
				$objeto->addAscendingOrderByColumn(UbicacionesPeer::NOMBRE);
			break;
			case 'nombre_ubicacion_desc':
				$objeto->addDescendingOrderByColumn(UbicacionesPeer::NOMBRE);
			break;
			case 'estado_ubicacion_asc':
				$objeto->addAscendingOrderByColumn(UbicacionesPeer::ID_ESTADO_UBICACION);
			break;
			case 'estado_ubicacion_desc':
				$objeto->addDescendingOrderByColumn(UbicacionesPeer::ID_ESTADO_UBICACION);
			break;
			
			// Tabla Proveedores
			case 'nombre_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::NOMBRE);
			break;
			case 'nombre_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::NOMBRE);
			break;
			case 'cif_nif_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::CIF_NIF);
			break;
			case 'cif_nif_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::CIF_NIF);
			break;
			case 'direccion_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::DIRECCION);
			break;
			case 'direccion_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::DIRECCION);
			break;
			case 'poblacion_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::POBLACION);
			break;
			case 'poblacion_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::POBLACION);
			break;
			case 'provincia_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::PROVINCIA);
			break;
			case 'provincia_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::PROVINCIA);
			break;
			case 'cp_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::CP);
			break;
			case 'cp_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::CP);
			break;
			case 'pais_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::PAIS);
			break;
			case 'pais_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::PAIS);
			break;
			case 'telefono_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::TELEFONO);
			break;
			case 'telefono_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::TELEFONO);
			break;
			case 'telefono2_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::TELEFONO2);
			break;
			case 'telefono2_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::TELEFONO2);
			break;
			case 'movil_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::MOVIL);
			break;
			case 'movil_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::MOVIL);
			break;
			case 'fax_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::FAX);
			break;
			case 'fax_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::FAX);
			break;
			case 'email_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::EMAIL);
			break;
			case 'email_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::EMAIL);
			break;
			case 'web_proveedor_asc':
				$objeto->addAscendingOrderByColumn(ProveedoresPeer::WEB);
			break;
			case 'web_proveedor_desc':
				$objeto->addDescendingOrderByColumn(ProveedoresPeer::WEB);
			break;			
			
			// Tabla Pedidos			
			case 'num_pedido_pedido_asc':
				$objeto->addAscendingOrderByColumn(PedidosPeer::NUM_PEDIDO);
			break;
			case 'num_pedido_pedido_desc':
				$objeto->addDescendingOrderByColumn(PedidosPeer::NUM_PEDIDO);
			break;
			case 'id_proveedor_pedido_asc':
				$objeto->addAscendingOrderByColumn(PedidosPeer::ID_PROVEEDOR);
			break;
			case 'id_proveedor_pedido_desc':
				$objeto->addDescendingOrderByColumn(PedidosPeer::ID_PROVEEDOR);
			break;
			case 'id_estado_pedido_pedidos_asc':
				$objeto->addAscendingOrderByColumn(PedidosPeer::ID_ESTADO_PEDIDO);
			break;
			case 'id_estado_pedido_pedidos_desc':
				$objeto->addDescendingOrderByColumn(PedidosPeer::ID_ESTADO_PEDIDO);
			break;			
			case 'fecha_pedido_pedidos_asc':
				$objeto->addAscendingOrderByColumn(PedidosPeer::CREATED_AT);
			break;
			case 'fecha_pedido_pedidos_desc':
				$objeto->addDescendingOrderByColumn(PedidosPeer::CREATED_AT);
			break;					
			
			// Tabla Entradas			
			case 'num_entrada_entrada_asc':
				$objeto->addAscendingOrderByColumn(EntradasPeer::NUM_ENTRADA);
			break;
			case 'num_entrada_entrada_desc':
				$objeto->addDescendingOrderByColumn(EntradasPeer::NUM_ENTRADA);
			break;
			case 'id_estado_entrada_entradas_asc':
				$objeto->addAscendingOrderByColumn(EntradasPeer::ID_ESTADO_ENTRADA);
			break;
			case 'id_estado_entrada_entradas_desc':
				$objeto->addDescendingOrderByColumn(EntradasPeer::ID_ESTADO_ENTRADA);
			break;			
			case 'fecha_entrada_entradas_asc':
				$objeto->addAscendingOrderByColumn(EntradasPeer::CREATED_AT);
			break;
			case 'fecha_entrada_entradas_desc':
				$objeto->addDescendingOrderByColumn(EntradasPeer::CREATED_AT);
			break;			
			
			// Tabla Clientes
			case 'nombre_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::NOMBRE);
			break;
			case 'nombre_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::NOMBRE);
			break;
			case 'cif_nif_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::CIF_NIF);
			break;
			case 'cif_nif_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::CIF_NIF);
			break;
			case 'direccion_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::DIRECCION);
			break;
			case 'direccion_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::DIRECCION);
			break;
			case 'poblacion_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::POBLACION);
			break;
			case 'poblacion_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::POBLACION);
			break;
			case 'provincia_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::PROVINCIA);
			break;
			case 'provincia_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::PROVINCIA);
			break;
			case 'cp_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::CP);
			break;
			case 'cp_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::CP);
			break;
			case 'pais_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::PAIS);
			break;
			case 'pais_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::PAIS);
			break;
			case 'telefono_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::TELEFONO);
			break;
			case 'telefono_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::TELEFONO);
			break;
			case 'telefono2_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::TELEFONO2);
			break;
			case 'telefono2_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::TELEFONO2);
			break;
			case 'movil_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::MOVIL);
			break;
			case 'movil_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::MOVIL);
			break;
			case 'fax_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::FAX);
			break;
			case 'fax_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::FAX);
			break;
			case 'email_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::EMAIL);
			break;
			case 'email_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::EMAIL);
			break;
			case 'web_cliente_asc':
				$objeto->addAscendingOrderByColumn(ClientesPeer::WEB);
			break;
			case 'web_cliente_desc':
				$objeto->addDescendingOrderByColumn(ClientesPeer::WEB);
			break;		
			
			// Tabla Ventas			
			case 'num_venta_venta_asc':
				$objeto->addAscendingOrderByColumn(VentasPeer::NUM_VENTA);
			break;
			case 'num_venta_venta_desc':
				$objeto->addDescendingOrderByColumn(VentasPeer::NUM_VENTA);
			break;
			case 'id_cliente_venta_asc':
				$objeto->addAscendingOrderByColumn(VentasPeer::ID_CLIENTE);
			break;
			case 'id_cliente_venta_desc':
				$objeto->addDescendingOrderByColumn(VentasPeer::ID_CLIENTE);
			break;
			case 'id_estado_venta_ventas_asc':
				$objeto->addAscendingOrderByColumn(VentasPeer::ID_ESTADO_VENTA);
			break;
			case 'id_estado_venta_ventas_desc':
				$objeto->addDescendingOrderByColumn(VentasPeer::ID_ESTADO_VENTA);
			break;			
			case 'fecha_venta_ventas_asc':
				$objeto->addAscendingOrderByColumn(VentasPeer::CREATED_AT);
			break;
			case 'fecha_venta_ventas_desc':
				$objeto->addDescendingOrderByColumn(VentasPeer::CREATED_AT);
			break;					
			
			// Tabla Salidas			
			case 'num_salida_salida_asc':
				$objeto->addAscendingOrderByColumn(SalidasPeer::NUM_SALIDA);
			break;
			case 'num_salida_salida_desc':
				$objeto->addDescendingOrderByColumn(SalidasPeer::NUM_SALIDA);
			break;
			case 'id_estado_salida_salidas_asc':
				$objeto->addAscendingOrderByColumn(SalidasPeer::ID_ESTADO_SALIDA);
			break;
			case 'id_estado_salida_salidas_desc':
				$objeto->addDescendingOrderByColumn(SalidasPeer::ID_ESTADO_SALIDA);
			break;			
			case 'fecha_salida_salidas_asc':
				$objeto->addAscendingOrderByColumn(SalidasPeer::CREATED_AT);
			break;
			case 'fecha_salida_salidas_desc':
				$objeto->addDescendingOrderByColumn(SalidasPeer::CREATED_AT);
			break;
			
			// Tabla Contactos
			case 'nombre_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::NOMBRE);
			break;
			case 'nombre_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::NOMBRE);
			break;
			case 'apellidos_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::APELLIDOS);
			break;
			case 'apellidos_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::APELLIDOS);
			break;
			case 'id_contactado_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::ID_CONTACTADO);
			break;
			case 'id_contactado_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::ID_CONTACTADO);
			break;
			case 'telefono_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::TELEFONO);
			break;
			case 'telefono_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::TELEFONO);
			break;
			case 'movil_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::MOVIL);
			break;
			case 'movil_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::MOVIL);
			break;
			case 'fax_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::FAX);
			break;
			case 'fax_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::FAX);
			break;
			case 'email_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::EMAIL);
			break;
			case 'email_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::EMAIL);
			break;
			case 'puesto_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::PUESTO);
			break;
			case 'puesto_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::PUESTO);
			break;
			case 'id_jefe_contacto_asc':
				$objeto->addAscendingOrderByColumn(ContactosPeer::ID_JEFE);
			break;
			case 'id_jefe_contacto_desc':
				$objeto->addDescendingOrderByColumn(ContactosPeer::ID_JEFE);
			break;
			
			// Tabla Transporte Conductores
			case 'id_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA);
			break;
			case 'id_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA);
			break;
			case 'nombre_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::NOMBRE);
			break;
			case 'nombre_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::NOMBRE);
			break;
			case 'apellidos_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::APELLIDOS);
			break;
			case 'apellidos_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::APELLIDOS);
			break;
			case 'telefono_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::TELEFONO);
			break;
			case 'telefono_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::TELEFONO);
			break;
			case 'telefono_trabajo_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::TELEFONO_TRABAJO);
			break;
			case 'telefono_trabajo_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::TELEFONO_TRABAJO);
			break;
			case 'telefono_otro_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::TELEFONO_OTRO);
			break;
			case 'telefono_otro_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::TELEFONO_OTRO);
			break;
			case 'movil_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::MOVIL);
			break;
			case 'movil_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::MOVIL);
			break;
			case 'observaciones_transporte_conductor_asc':
				$objeto->addAscendingOrderByColumn(TransporteConductoresPeer::OBSERVACIONES);
			break;
			case 'observaciones_transporte_conductor_desc':
				$objeto->addDescendingOrderByColumn(TransporteConductoresPeer::OBSERVACIONES);
			break;
			
			// Tabla Transporte Empresas
			case 'nombre_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::NOMBRE);
			break;
			case 'nombre_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::NOMBRE);
			break;
			case 'cif_nif_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::CIF_NIF);
			break;
			case 'cif_nif_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::CIF_NIF);
			break;
			case 'direccion_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::DIRECCION);
			break;
			case 'direccion_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::DIRECCION);
			break;
			case 'poblacion_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::POBLACION);
			break;
			case 'poblacion_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::POBLACION);
			break;
			case 'provincia_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::PROVINCIA);
			break;
			case 'provincia_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::PROVINCIA);
			break;
			case 'cp_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::CP);
			break;
			case 'cp_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::CP);
			break;
			case 'pais_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::PAIS);
			break;
			case 'pais_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::PAIS);
			break;
			case 'telefono_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::TELEFONO);
			break;
			case 'telefono_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::TELEFONO);
			break;
			case 'telefono2_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::TELEFONO2);
			break;
			case 'telefono2_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::TELEFONO2);
			break;
			case 'movil_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::MOVIL);
			break;
			case 'movil_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::MOVIL);
			break;
			case 'fax_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::FAX);
			break;
			case 'fax_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::FAX);
			break;
			case 'email_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::EMAIL);
			break;
			case 'email_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::EMAIL);
			break;
			case 'web_transporte_empresa_asc':
				$objeto->addAscendingOrderByColumn(TransporteEmpresasPeer::WEB);
			break;
			case 'web_transporte_empresa_desc':
				$objeto->addDescendingOrderByColumn(TransporteEmpresasPeer::WEB);
			break;
						
			// Tabla Informes Pedido			
			case 'num_albaran_pedido_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO);
			break;
			case 'num_albaran_pedido_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO);
			break;
			case 'fecha_informe_pedido_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesPedidoPeer::CREATED_AT);
			break;
			case 'fecha_informe_pedido_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesPedidoPeer::CREATED_AT);
			break;
			
			// Tabla Informes Entrada			
			case 'num_albaran_entrada_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA);
			break;
			case 'num_albaran_entrada_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA);
			break;
			case 'fecha_informe_entrada_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesEntradaPeer::CREATED_AT);
			break;
			case 'fecha_informe_entrada_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesEntradaPeer::CREATED_AT);
			break;
			
			// Tabla Informes Venta			
			case 'num_albaran_venta_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesVentaPeer::NUM_ALBARAN_VENTA);
			break;
			case 'num_albaran_venta_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesVentaPeer::NUM_ALBARAN_VENTA);
			break;
			case 'fecha_informe_venta_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesVentaPeer::CREATED_AT);
			break;
			case 'fecha_informe_venta_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesVentaPeer::CREATED_AT);
			break;
			
			// Tabla Informes Salida			
			case 'num_albaran_salida_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA);
			break;
			case 'num_albaran_salida_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA);
			break;
			case 'fecha_informe_salida_informes_asc':
				$objeto->addAscendingOrderByColumn(AlbaranesSalidaPeer::CREATED_AT);
			break;
			case 'fecha_informe_salida_informes_desc':
				$objeto->addDescendingOrderByColumn(AlbaranesSalidaPeer::CREATED_AT);
			break;
			
			default:
				break;
		}
		
		return $objeto;
	}
	

	/**
	 * Obtener tabla de capacidad segun el estado de la ubicación
	 * 
	 *  @param integer $estado_ubicacion 0 a 100
	 *  
	 *  @return string $tabla_capacidad  Tabla que muestra la capacidad de la
	 */
	public function obtenerTablaCapacidadXEstadoUbicacion($estado_ubicacion)
	{
		switch ($estado_ubicacion) {
			case 0:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:white;'>40%</td></tr>
		        <tr><td style='align:center; background-color:white;'>30%</td></tr>
		        <tr><td style='align:center; background-color:white;'>20%</td></tr>
		        <tr><td style='align:center; background-color:white;'>10%</td></tr>
		        <tr><td style='align:center; background-color:white;'>5%</td></tr>
		        <tr><td style='align:center; background-color:white;'>0%</td></tr>
		        </table>";
			;
			break;
			case 5:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:white;'>40%</td></tr>
		        <tr><td style='align:center; background-color:white;'>30%</td></tr>
		        <tr><td style='align:center; background-color:white;'>20%</td></tr>
		        <tr><td style='align:center; background-color:white;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 10:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:white;'>40%</td></tr>
		        <tr><td style='align:center; background-color:white;'>30%</td></tr>
		        <tr><td style='align:center; background-color:white;'>20%</td></tr>
		        <tr><td style='align:center; background-color:green;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 20:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:white;'>40%</td></tr>
		        <tr><td style='align:center; background-color:white;'>30%</td></tr>
		        <tr><td style='align:center; background-color:green;'>20%</td></tr>
		        <tr><td style='align:center; background-color:green;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 30:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:white;'>40%</td></tr>
		        <tr><td style='align:center; background-color:green;'>30%</td></tr>
		        <tr><td style='align:center; background-color:green;'>20%</td></tr>
		        <tr><td style='align:center; background-color:green;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 40:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:white;'>50%</td></tr>
		        <tr><td style='align:center; background-color:green;'>40%</td></tr>
		        <tr><td style='align:center; background-color:green;'>30%</td></tr>
		        <tr><td style='align:center; background-color:green;'>20%</td></tr>
		        <tr><td style='align:center; background-color:green;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 50:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:white;'>60%</td></tr>
		        <tr><td style='align:center; background-color:green;'>50%</td></tr>
		        <tr><td style='align:center; background-color:green;'>40%</td></tr>
		        <tr><td style='align:center; background-color:green;'>30%</td></tr>
		        <tr><td style='align:center; background-color:green;'>20%</td></tr>
		        <tr><td style='align:center; background-color:green;'>10%</td></tr>
		        <tr><td style='align:center; background-color:green;'>5%</td></tr>
		        <tr><td style='align:center; background-color:green;'>0%</td></tr>
		        </table>";
			;
			break;
			case 60:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:white;'>70%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>60%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>50%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>40%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>30%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>20%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>10%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>5%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>0%</td></tr>
		        </table>";
			;
			break;
			case 70:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:white;'>80%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>70%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>60%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>50%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>40%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>30%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>20%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>10%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>5%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>0%</td></tr>
		        </table>";
			;
			break;
			case 80:
				$tabla = "<table style='width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:white;'>90%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>80%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>70%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>60%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>50%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>40%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>30%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>20%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>10%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>5%</td></tr>
		        <tr><td style='align:center; background-color:yellow;'>0%</td></tr>
		        </table>";
			;
			break;
			case 90:
				$tabla = "<table style='align:center; width:180px; color:black;'>
				<tr><td style='align:center; background-color:white;'>100%</td></tr>
		        <tr><td style='align:center; background-color:red;'>90%</td></tr>
		        <tr><td style='align:center; background-color:red;'>80%</td></tr>
		        <tr><td style='align:center; background-color:red;'>70%</td></tr>
		        <tr><td style='align:center; background-color:red;'>60%</td></tr>
		        <tr><td style='align:center; background-color:red;'>50%</td></tr>
		        <tr><td style='align:center; background-color:red;'>40%</td></tr>
		        <tr><td style='align:center; background-color:red;'>30%</td></tr>
		        <tr><td style='align:center; background-color:red;'>20%</td></tr>
		        <tr><td style='align:center; background-color:red;'>10%</td></tr>
		        <tr><td style='align:center; background-color:red;'>5%</td></tr>
		        <tr><td style='align:center; background-color:red;'>0%</td></tr>
		        </table>";
			;
			break;
			case 100:
				$tabla = "<table style='align:center; width:180px; color:black;'>
				<tr><td style='align:center; background-color:red;'>100%</td></tr>
		        <tr><td style='align:center; background-color:red;'>90%</td></tr>
		        <tr><td style='align:center; background-color:red;'>80%</td></tr>
		        <tr><td style='align:center; background-color:red;'>70%</td></tr>
		        <tr><td style='align:center; background-color:red;'>60%</td></tr>
		        <tr><td style='align:center; background-color:red;'>50%</td></tr>
		        <tr><td style='align:center; background-color:red;'>40%</td></tr>
		        <tr><td style='align:center; background-color:red;'>30%</td></tr>
		        <tr><td style='align:center; background-color:red;'>20%</td></tr>
		        <tr><td style='align:center; background-color:red;'>10%</td></tr>
		        <tr><td style='align:center; background-color:red;'>5%</td></tr>
		        <tr><td style='align:center; background-color:red;'>0%</td></tr>
		        </table>";
			;
			break;
		}
				
		return $tabla;
	}
	
	/**
	 *  Validar el CIF, NIF o NIE
	 * 
	 *  @param string $cif CIF o NIF o NIE a comprobar
	 *  
	 *  @return boolean TRUE si es correcto, FALSE en caso contrario
	 */
	public static function valida_nif_cif_nie($cif)
	{
		$cif = strtoupper($cif);
		for ($i = 0; $i < 9; $i ++)
		{
			$num[$i] = substr($cif, $i, 1);
		}
		// si no tiene un formato valido devuelve error
		if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
		{
			return false;
		}
		// comprobacion de NIFs estandar
		if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
		{
			if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// algoritmo para comprobacion de codigos tipo CIF
		$suma = $num[2] + $num[4] + $num[6];
		for ($i = 1; $i < 8; $i += 2)
		{
			$suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
		}
		$n = 10 - substr($suma, strlen($suma) - 1, 1);
		// comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
		if (preg_match('/^[KLM]{1}/', $cif))
		{
			if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// comprobacion de CIFs
		if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
		{
			if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// comprobacion de NIEs
		// T
		if (preg_match('/^[T]{1}/', $cif))
		{
			if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// XYZ
		if (preg_match('/^[XYZ]{1}/', $cif))
		{
			if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// si todavia no se ha verificado devuelve error
		return false;
	}
	
	/**
	 *  Comprobar NIF o CIF
	 * 
	 *  @param string $cif CIF o NIF o NIE a comprobar
	 *  
	 *  @return boolean TRUE si es correcto, FALSE en caso contrario
	 */
	public static function comprobar_nif_cif_nie($cif)
	{
		$cif = strtoupper($cif);
		for ($i = 0; $i < 9; $i ++)
		{
			$num[$i] = substr($cif, $i, 1);
		}
		// si no tiene un formato valido devuelve error
		if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif))
		{
			return 0;
		}
		// comprobacion de NIFs estandar
		if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif))
		{
			if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1))
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
		// algoritmo para comprobacion de codigos tipo CIF
		$suma = $num[2] + $num[4] + $num[6];
		for ($i = 1; $i < 8; $i += 2)
		{
			$suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
		}
		$n = 10 - substr($suma, strlen($suma) - 1, 1);
		// comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
		if (preg_match('/^[KLM]{1}/', $cif))
		{
			if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1))
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
		// comprobacion de CIFs
		if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
		{
			if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1))
			{
				return 2;
			}
			else
			{
				return -2;
			}
		}
		// comprobacion de NIEs
		// T
		if (preg_match('/^[T]{1}/', $cif))
		{
			if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
		// XYZ
		if (preg_match('/^[XYZ]{1}/', $cif))
		{
			if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
		// si todavia no se ha verificado devuelve error
		return 0;
	}
	
	/**
	 * Obtener letra del NIF segun los digitos
	 * 
	 *  @param string $nif  NIF cuya letra debemos obtener
	 *  
	 *  @return string $letra Letra que corresponde al NIF
	 */
	public function obtenerLetraNIF($nif)
	{
		$nif = substr($nif, 0, 8);
		return substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($nif,"XYZ","012")%23,1);
	}
		
	/**
	 * Obtener el dígito de control del CIF
	 * 
	 *  @param string $cif CIF a comprobar
	 *  
	 *  @return string digito de control correcto
	 */
	public function obtenerDigitoControlCIF($cif)
	{
		$cif = strtoupper($cif);
		for ($i = 0; $i < 9; $i ++)
		{
			$num[$i] = substr($cif, $i, 1);
		}
		// algoritmo para comprobacion de codigos tipo CIF
		$suma = $num[2] + $num[4] + $num[6];
		for ($i = 1; $i < 8; $i += 2)
		{
			$suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
		}
		$n = 10 - substr($suma, strlen($suma) - 1, 1);
		// comprobacion de CIFs
		if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif))
		{
			if ($num[8] != chr(64 + $n) || $num[8] != substr($n, strlen($n) - 1, 1))
			{
				return substr($n, strlen($n) - 1, 1);
			}
		}
	}
	
	/**
	 *  Comprobar NIF o CIF
	 * 
	 *  @param string $cif CIF o NIF o NIE a comprobar
	 *  
	 *  @return 1  Era un NIF, y es correcto
	 *  @return 2  Era un CIF, y es correcto
	 *  @return -1 Era un NIF, y es incorrecto
	 *  @return -2 Era un CIF, y es incorrecto
	 *  @return 0  No se puede determinar si es NIF o CIF, y es incorrecto
	 */
	public function f_nifcif_verifica($as_dato)
	{
		$li_ret = 0;

		// Elimina caracteres no válidos
		$as_dato = ereg_replace("[^[:alnum:]]", "", $as_dato);
		
		// Averigua si es NIF o CIF (Si lleva la letra al principio, es CIF)
		$lb_esCIF=(!is_numeric(substr($as_dato, 0, 1)));
		$lb_esNIF=(!is_numeric(substr($as_dato, strlen($as_dato)-1, 1)));
		
		if ($lb_esCIF || $lb_esNIF)
		{
			// Separa los números y las letras
			$ls_numero = ereg_replace("[[:alpha:]]", "", $as_dato);
			$ls_letra = ereg_replace("[^[:alpha:]]", "", $as_dato);
			
			//echo "as_dato=$as_dato; ls_numero=$ls_numero; ls_letra=$ls_letra; lb_esNIF=".f_bool($lb_esNIF)."; lb_esCIF=".f_bool($lb_esCIF).'<br>';
			if ($lb_esNIF)
			{
				// Verifica que sea NIF
				(f_LetraNIF($ls_numero) == $ls_letra)?$li_ret=1:$li_ret=-1;
			};
			
			if ($lb_esCIF)
			{
				// Verifica que sea CIF
				f_ValidarCIF($ls_numero)?$li_ret=2:$li_ret=-2;
			};
		}
		return $li_ret;
	}

	/**
	 * Obtener letra del NIF segun los digitos
	 * 
	 *  @param string $nif  NIF sin letra
	 *  
	 *  @return string $letra Letra que corresponde al NIF
	 */
	public function f_LetraNIF ($dni) 
	{
		$valor= (int) ($dni / 23);
		$valor *= 23;
		$valor= $dni - $valor;
		$letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
		$letraNif= substr ($letras, $valor, 1);
		
		return $letraNif;
	}

	/**
	 * Obtener validar el numero CIF
	 * 
	 *  @param string $nif  CIF sin letra
	 *  
	 *  @return string $letra Letra que corresponde al NIF
	 */
	public function f_ValidarCIF($ccNumber)
	{
		$lb_ret=false;
		if (strlen($ccNumber) == 8)
		{
			$lb_ret=true;
			$numOfDigits = 0 - strlen($ccNumber);
			$i = -1;
			
			while ($i>=$numOfDigits)
			{
				if (($i % 2) == 0)
				{
					$double = 2*(substr($ccNumber, $i, 1));
					$total += substr($double,0,1);
					if (strlen($double > 1))
					{
						$total += substr($double,1,1);
					}
				}
				else
				{
					$total += substr($ccNumber, $i, 1);
				}
				$i--;
			}
			
			if (($total % 10) != 0)
			{
				$lb_ret=false;
			}
		}
		
		return $lb_ret;
	}
	
	/**
	 * Reemplaza todos los acentos por sus equivalentes sin ellos
	 *
	 * @param $string
	 *  string la cadena a sanear
	 *
	 * @return $string
	 *  string saneada
	 */
	function sanear_string($string)
	{
		$string = trim($string);
	 
	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C',),
	        $string
	    );
	 
	    //Esta parte se encarga de eliminar cualquier caracter extraño
	    $string = str_replace(
	        array("\\", "¨", "º", "-", "~",
	             "#", "@", "|", "!", "\"",
	             "·", "$", "%", "&", "/",
	             "(", ")", "?", "'", "¡",
	             "¿", "[", "^", "`", "]",
	             "+", "}", "{", "¨", "´",
	             ">", "<", ";", ",", ":",
	             ".", "_"),
	        '',
	        $string
	    );
	    
	    return $string;
	}
	
}

?>