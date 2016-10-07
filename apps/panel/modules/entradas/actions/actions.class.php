<?php

/**
 * entradas actions.
 *
 * @package    SGUM
 * @subpackage entradas
 * @name       entradasActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class entradasActions extends sfActions
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
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Entradas
		$this->ar_estado_entradas = $this->acc_admin->obtenerSelectEstadoEntradas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Creamos la busqueda de las Entradas
		$entradas = new Criteria();
		$crit0 = $entradas->getNewCriterion(PedidosPeer::ID_ESTADO_PEDIDO,4);
		$crit1 = $entradas->getNewCriterion(PedidosPeer::ID_ESTADO_PEDIDO,5);
		$crit0->addOr($crit1);
		$entradas->add($crit0);
		$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		
		$id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
		$id_estado_entrada = $this->acc_url->parsearRecepcion($id_estado_entrada);
		$this->id_estado_entrada = $id_estado_entrada;
		if ($this->id_estado_entrada != 0)
		{
			$entradas->add(EntradasPeer::ID_ESTADO_ENTRADA,$this->id_estado_entrada);
		}
		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$entradas->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
			$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		}
					
		$num_entrada = $this->getRequestParameter('num_entrada');
		$num_entrada = $this->acc_url->parsearRecepcion($num_entrada);
		$this->num_entrada = $num_entrada;
		
		$fecha_entrada = $this->getRequestParameter('fecha_entrada');
		$fecha_entrada = $this->acc_url->parsearRecepcion($fecha_entrada);
		$this->fecha_entrada = $fecha_entrada;
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$entradas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 
		
		$type = $this->getRequestParameter('type');
		$type = $this->acc_url->parsearRecepcion($type);
		$this->type = $type;
		$sort = $this->getRequestParameter('sort');
		$sort = $this->acc_url->parsearRecepcion($sort);
		$this->sort = $sort;
		
		switch($this->type) 
		{
			case 'asc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Entradas', 15);
		$pager->setCriteria($entradas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar las entradas pendientes
	 *
	*/
	public function executeEntradasPendientes()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Entradas
		$this->ar_estado_entradas = $this->acc_admin->obtenerSelectEstadoEntradas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Creamos la busqueda de las Entradas
		$entradas = new Criteria();
		$entradas->add(PedidosPeer::ID_ESTADO_PEDIDO,4);
		$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		$entradas->add(EntradasPeer::ID_ESTADO_ENTRADA,1);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$entradas->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
			$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		}
		
		$id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
		$id_estado_entrada = $this->acc_url->parsearRecepcion($id_estado_entrada);
		$this->id_estado_entrada = $id_estado_entrada;		
		
		$num_entrada = $this->getRequestParameter('num_entrada');
		$num_entrada = $this->acc_url->parsearRecepcion($num_entrada);
		$this->num_entrada = $num_entrada;
		
		$fecha_entrada = $this->getRequestParameter('fecha_entrada');
		$fecha_entrada = $this->acc_url->parsearRecepcion($fecha_entrada);
		$this->fecha_entrada = $fecha_entrada;
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$entradas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 
		
		$type = $this->getRequestParameter('type');
		$type = $this->acc_url->parsearRecepcion($type);
		$this->type = $type;
		$sort = $this->getRequestParameter('sort');
		$sort = $this->acc_url->parsearRecepcion($sort);
		$this->sort = $sort;
		
		switch($this->type) 
		{
			case 'asc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Entradas', 15);
		$pager->setCriteria($entradas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar las entradas procesadas
	 *
	*/
	public function executeEntradasProcesadas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Entradas
		$this->ar_estado_entradas = $this->acc_admin->obtenerSelectEstadoEntradas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Creamos la busqueda de las Entradas
		$entradas = new Criteria();
		$entradas->add(PedidosPeer::ID_ESTADO_PEDIDO,5);
		$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		$entradas->add(EntradasPeer::ID_ESTADO_ENTRADA,2);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$entradas->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
			$entradas->addJoin(PedidosPeer::ID_PEDIDO,EntradasPeer::ID_PEDIDO);
		}
		
		$id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
		$id_estado_entrada = $this->acc_url->parsearRecepcion($id_estado_entrada);
		$this->id_estado_entrada = $id_estado_entrada;
					
		$num_entrada = $this->getRequestParameter('num_entrada');
		$num_entrada = $this->acc_url->parsearRecepcion($num_entrada);
		$this->num_entrada = $num_entrada;
		
		$fecha_entrada = $this->getRequestParameter('fecha_entrada');
		$fecha_entrada = $this->acc_url->parsearRecepcion($fecha_entrada);
		$this->fecha_entrada = $fecha_entrada;
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$entradas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$entradas->add(EntradasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 
		
		$type = $this->getRequestParameter('type');
		$type = $this->acc_url->parsearRecepcion($type);
		$this->type = $type;
		$sort = $this->getRequestParameter('sort');
		$sort = $this->acc_url->parsearRecepcion($sort);
		$this->sort = $sort;
		
		switch($this->type) 
		{
			case 'asc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$entradas = $this->acc_utilidades->ordenarObjetoXColumna($entradas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Entradas', 15);
		$pager->setCriteria($entradas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	
	/**
	 * Ejecuta la accion de procesar las entradas, guardar su ubicaion y lote
	 */
	public function executeProcesarEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_ubicaciones = $this->acc_ubicaciones->obtenerSelectUbicaciones();	
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->id_md5_pedido = $this->getRequestParameter('id_md5_pedido');
		$this->id_md5_entrada = $this->getRequestParameter('id_md5_entrada');	
		
		if($this->id_md5_pedido)
		{
			$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($this->id_md5_pedido);
			
			// Obtenemos el objeto Pedido
			$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
			
			// Obtenemos el objeto Entrada
			$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdPedido($this->id_pedido);
			$this->obj_entrada = $this->acc_entradas->obtenerObjEntrada($id_entrada);
		}
		elseif($this->id_md5_entrada)
		{
			$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdMd5($this->id_md5_entrada);
			
			// Obtenemos el objeto Entrada
			$this->obj_entrada = $this->acc_entradas->obtenerObjEntrada($id_entrada);
			
			// Obtenemos el objeto Pedido
			$this->id_pedido = $this->obj_entrada->getIdPedido();
			$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
		}
								
		// Obtenemos el id del proveedor
		$this->id_proveedor = $this->obj_pedido->getIdProveedor();
				
		// Obtenemos el objeto Proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($this->id_proveedor);

		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_entrada->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el listado de las lineas de entrada según el id de entrada
		$this->ar_lineas_entrada = $this->acc_entradas->obtenerLineasEntradaXIdEntrada($id_entrada);
		
		$this->ar_lotes = $this->getRequestParameter('lote[]');
		$contador1 = count($this->ar_lotes);
		
		$this->ar_lotes2 = array_unique($this->ar_lotes);
		$contador2 = count($this->ar_lotes2);
		
		$this->ar_id_ubicacion = $this->getRequestParameter('id_ubicacion[]');
		$this->procesar = $this->getRequestParameter('procesar');

		// Comprobamos si faltan campos por cubrir	
		$error = false;	
		
		if(isset($this->ar_lotes))
		{
			$this->error_lotes = in_array('',$this->ar_lotes);			
		}
		else
		{
			$this->error_lotes = false;
		}
		
		if($contador1 != $contador2)
		{
			$this->error_lotes2 = true;
		}
		else
		{				
			$this->error_lotes2 = false;
		}
		
		if(isset($this->ar_id_ubicacion))
		{
			$this->error_ubicaciones = in_array(0,$this->ar_id_ubicacion);			
		}
		else
		{
			$this->error_ubicaciones = false;
		}
		
	
		if($this->error_lotes)
		{
			$this->msg_error_lotes = "&darr; Debe rellenar el campo 'Lote' de todos los artículos. &darr;";
			$error = true;
		}
		else
		{
			$this->msg_error_lotes = '';
		}
		
		if($this->error_lotes2)
		{
			$this->msg_error_lotes2 = "&darr; El campo 'Lote' debe ser un valor único para cada artículo. &darr;";
			$error = true;
		}
		else
		{
			$this->msg_error_lotes2 = '';
		}
		
		if($this->error_ubicaciones)
		{
			$this->msg_error_ubicaciones = "&darr; Debe rellenar el campo 'Ubicación' de todos los artículos. &darr;";
			$error = true;
		}
		else
		{
			$this->msg_error_ubicaciones = '';
		}
		
		if($this->procesar && !$error)
		{
			foreach($this->ar_lineas_entrada as $linea_entrada)
			{
				$id_articulo = $linea_entrada->getIdArticulo();
				$id_linea_entrada = $linea_entrada->getIdArticuloXEntrada();				
				$lote = $this->ar_lotes[$id_linea_entrada];
				$id_ubicacion = $this->ar_id_ubicacion[$id_linea_entrada];
				
				// Actualizamos las lineas de entrada con el lote y la ubicacion
				$this->acc_entradas->actualizarLineaEntrada($id_linea_entrada, $id_ubicacion, $lote);

				// Actualizamos la tabla Articulos_X_Lote
				$this->acc_entradas->guardarArticulosXLote($id_articulo, $id_ubicacion, $lote);
			}
			
			// Actualizamos el stock de los articulos
			$ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido);
			foreach($ar_lineas_pedido as $linea_pedido)
			{
				$this->acc_articulos->agregarStock($linea_pedido->getIdArticulo(),$linea_pedido->getCantidad());
			}
			
			// Actualizamos el estado de la ubicacion
			$this->acc_ubicaciones->actualizarCapacidadUbicaciones();
			
			// Generamos el informe de entrada
			$entrada_procesada = $this->acc_entradas->generarInformeEntrada($id_entrada);
			
			if ($entrada_procesada)
			{
				// Actualizamos el estado de la entrada a Procesada
				$actualizar_estado = $this->acc_entradas->actualizarEstadoEntrada($id_entrada,2);
								
				// Actualizamos el estado del pedido a Completo
				$actualizar_estado_pedido = $this->acc_pedidos->actualizarEstadoPedido($this->id_pedido,5);
								
				if($actualizar_estado && $actualizar_estado_pedido)
				{
					$this->msg = "La entrada de mercancías se ha procesado correctamente.";	
				}
				else
				{
					$this->msg = "No se ha podido cambiar el estado de la entrada, consulte con el administrador.";
				}				
			}
			else
			{
				$this->msg = "No se ha podido procesar correctamente la entrada de mercancías.";
			}
			
			
			
		}
	}
	

	/**
	 * Ejecuta la accion de ver la ficha completa con los datos del pedido, conductor y entrada
	 */
	public function executeVerEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();	
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();	
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();		
				
		// Obtenemos el id de  la entrada
		$id_md5_entrada = $this->getRequestParameter('id_md5_entrada');	
		$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdMd5($id_md5_entrada);

		$this->obj_entrada = $this->acc_entradas->obtenerObjEntrada($id_entrada);
								
		// Obtenemos el listado de las lineas de entrada según el id de entrada
		$this->ar_lineas_entrada = $this->acc_entradas->obtenerLineasEntradaXIdEntrada($id_entrada);
		
		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_entrada->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el informe en pdf de la entrada
		$obj_informe_entrada = $this->acc_informes->obtenerObjInformeEntrada($id_entrada);
		
		if($obj_informe_entrada)
		{
			$this->mostrar_informe_entrada = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
			$ruta_informe_entrada = $ruta_mostrar_informe."/entradas/".$obj_informe_entrada->getRutaAlbaran();
			
			$this->ruta_informe_entrada = $ruta_informe_entrada.".pdf";
		}	
		else
		{
			$this->mostrar_informe_entrada = false;
		}
		
		// Obtenemos el objeto Pedido
		$this->id_pedido = $this->obj_entrada->getIdPedido();
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
								
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido);
		
		// Obtenemos el id del proveedor
		$id_proveedor = $this->obj_pedido->getIdProveedor();
		
		// Obtenemos el objeto proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($id_proveedor);
		
		// Obtenemos el informe en pdf del pedido
		$obj_informe_pedido = $this->acc_informes->obtenerObjInformePedido($this->id_pedido);
		
		if($obj_informe_pedido)
		{
			$this->mostrar_informe_pedido = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
					
			$ruta_informe_pedido = $ruta_mostrar_informe."/pedidos/".$obj_informe_pedido->getRutaAlbaran();
			
			$this->ruta_informe_pedido = $ruta_informe_pedido.".pdf";
		}
		else
		{
			$this->mostrar_informe_pedido = false;
		}
		
		// Obtenemos el objeto entrada
		$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdPedido($this->id_pedido);			
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de entrada
	 */
	public function executeDescargarInformeEntrada()
	{		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id de la entrada
		$id_md5_entrada = $this->getRequestParameter('id_md5_entrada');	
		$this->id_entrada = $this->acc_entradas->obtenerIdEntradaXIdMd5($id_md5_entrada);
				
		// Obtenemos el objeto Entrada
		$this->obj_entrada = $this->acc_entradas->obtenerObjEntrada($this->id_entrada);
		
		// Obtenemos el informe en pdf de la entrada
		$obj_informe_entrada = $this->acc_informes->obtenerObjInformeEntrada($this->id_entrada);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_entradas');
		
		$this->ruta_informe_entrada = $ruta_mostrar_informe.$obj_informe_entrada->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_entrada);   
		if (!$descargado)
		{
			if ($id_md5_entrada != '')
			{
				$this->redirect('/entradas/verEntrada?id_md5_entrada='.$id_md5_entrada);
			}
			else
			{
				$this->redirect('/entradas/index');
			}
		}	
   }
}
