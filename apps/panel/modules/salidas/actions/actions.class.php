<?php

/**
 * salidas actions.
 *
 * @package    SGUM
 * @subpackage salidas
 * @name       salidasActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class salidasActions extends sfActions
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
		
		// Obtenemos un select con todos los Estados de los Salidas
		$this->ar_estado_salidas = $this->acc_admin->obtenerSelectEstadoSalidas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Creamos la busqueda de las Salidas
		$salidas = new Criteria();
		$crit0 = $salidas->getNewCriterion(VentasPeer::ID_ESTADO_VENTA,4);
		$crit1 = $salidas->getNewCriterion(VentasPeer::ID_ESTADO_VENTA,5);
		$crit0->addOr($crit1);
		$salidas->add($crit0);
		$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		
		$id_estado_salida = $this->getRequestParameter('id_estado_salida');
		$id_estado_salida = $this->acc_url->parsearRecepcion($id_estado_salida);
		$this->id_estado_salida = $id_estado_salida;
		if ($this->id_estado_salida != 0)
		{
			$salidas->add(SalidasPeer::ID_ESTADO_SALIDA,$this->id_estado_salida);
		}
		
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$salidas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
			$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		}
		
		$num_salida = $this->getRequestParameter('num_salida');
		$num_salida = $this->acc_url->parsearRecepcion($num_salida);
		$this->num_salida = $num_salida;
		
		$fecha_salida = $this->getRequestParameter('fecha_salida');
		$fecha_salida = $this->acc_url->parsearRecepcion($fecha_salida);
		$this->fecha_salida = $fecha_salida;
		
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
			$crit0 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$salidas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Salidas', 15);
		$pager->setCriteria($salidas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar las salidas pendientes
	 *
	*/
	public function executeSalidasPendientes()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Salidas
		$this->ar_estado_salidas = $this->acc_admin->obtenerSelectEstadoSalidas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Creamos la busqueda de las Salidas
		$salidas = new Criteria();
		$salidas->add(VentasPeer::ID_ESTADO_VENTA,4);
		$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		$salidas->add(SalidasPeer::ID_ESTADO_SALIDA,1);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$salidas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
			$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		}

		$id_estado_salida = $this->getRequestParameter('id_estado_salida');
		$id_estado_salida = $this->acc_url->parsearRecepcion($id_estado_salida);
		$this->id_estado_salida = $id_estado_salida;
		
		$num_salida = $this->getRequestParameter('num_salida');
		$num_salida = $this->acc_url->parsearRecepcion($num_salida);
		$this->num_salida = $num_salida;
		
		$fecha_salida = $this->getRequestParameter('fecha_salida');
		$fecha_salida = $this->acc_url->parsearRecepcion($fecha_salida);
		$this->fecha_salida = $fecha_salida;
		
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
			$crit0 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$salidas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Salidas', 15);
		$pager->setCriteria($salidas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar las salidas procesadas
	 *
	*/
	public function executeSalidasProcesadas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Salidas
		$this->ar_estado_salidas = $this->acc_admin->obtenerSelectEstadoSalidas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Creamos la busqueda de las Salidas
		$salidas = new Criteria();
		$salidas->add(VentasPeer::ID_ESTADO_VENTA,5);
		$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		$salidas->add(SalidasPeer::ID_ESTADO_SALIDA,2);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$salidas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
			$salidas->addJoin(VentasPeer::ID_VENTA,SalidasPeer::ID_VENTA);
		}

		$id_estado_salida = $this->getRequestParameter('id_estado_salida');
		$id_estado_salida = $this->acc_url->parsearRecepcion($id_estado_salida);
		$this->id_estado_salida = $id_estado_salida;
		
		$num_salida = $this->getRequestParameter('num_salida');
		$num_salida = $this->acc_url->parsearRecepcion($num_salida);
		$this->num_salida = $num_salida;
		
		$fecha_salida = $this->getRequestParameter('fecha_salida');
		$fecha_salida = $this->acc_url->parsearRecepcion($fecha_salida);
		$this->fecha_salida = $fecha_salida;
		
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
			$crit0 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$salidas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$salidas->add(SalidasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$salidas = $this->acc_utilidades->ordenarObjetoXColumna($salidas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Salidas', 15);
		$pager->setCriteria($salidas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	
	/**
	 * Ejecuta la accion de procesar las salidas, guardar su ubicaion y lote
	 */
	public function executeProcesarSalida()
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
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_ubicaciones = $this->acc_ubicaciones->obtenerSelectUbicaciones();	
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->id_md5_venta = $this->getRequestParameter('id_md5_venta');
		$this->id_md5_salida = $this->getRequestParameter('id_md5_salida');	
		
		if($this->id_md5_venta)
		{
			$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($this->id_md5_venta);
			
			// Obtenemos el objeto Venta
			$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
			
			// Obtenemos el objeto Salida
			$id_salida = $this->acc_salidas->obtenerIdSalidaXIdVenta($this->id_venta);
			$this->obj_salida = $this->acc_salidas->obtenerObjSalida($id_salida);
		}
		elseif($this->id_md5_salida)
		{
			$id_salida = $this->acc_salidas->obtenerIdSalidaXIdMd5($this->id_md5_salida);
			
			// Obtenemos el objeto Salida
			$this->obj_salida = $this->acc_salidas->obtenerObjSalida($id_salida);
			
			// Obtenemos el objeto Venta
			$this->id_venta = $this->obj_salida->getIdVenta();
			$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
		}
								
		// Obtenemos el id del cliente
		$this->id_cliente = $this->obj_venta->getIdCliente();
				
		// Obtenemos el objeto Cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($this->id_cliente);

		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_salida->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el listado de las lineas de salida según el id de salida
		$this->ar_lineas_salida = $this->acc_salidas->obtenerLineasSalidaXIdSalida($id_salida);
				
		$this->ar_lineas_salida_cargadas = $this->getRequestParameter('id_linea_salida_cargada');
		
		if($this->ar_lineas_salida_cargadas)
		{
			// Contador de Lineas de Salida
			$this->contador_lineas_salida = count($this->ar_lineas_salida);
			
			// Contador de lineas de Salida Cargadas
			$this->contador_lineas_salida_cargadas = count($this->ar_lineas_salida_cargadas);
			
			if($this->contador_lineas_salida == $this->contador_lineas_salida_cargadas)
			{			
				foreach($this->ar_lineas_salida as $linea_salida)
				{
					$id_articulo = $linea_salida->getIdArticulo();
					$id_linea_salida = $linea_salida->getIdArticuloXSalida();				
					$lote = $linea_salida->getLote();;
					$id_ubicacion = $linea_salida->getIdUbicacion();
					
					// Actualizamos las lineas de salida con el lote y la ubicacion
					// $this->acc_salidas->actualizarLineaSalida($id_linea_salida, $id_ubicacion, $lote);
	
					// Actualizamos la tabla Articulos_X_Lote, quitando los articulos
					//$this->acc_salidas->guardarArticulosXLote($id_articulo, $id_ubicacion, $lote);
					
					// Borramos los articulos de la tabla Articulos_X_Lote
					$this->acc_salidas->borrarArticulosXLote($id_articulo, $id_ubicacion, $lote);
				}
			
				// Actualizamos el stock de los articulos
				$ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta);
				
				foreach($ar_lineas_venta as $linea_venta)
				{
					$this->acc_articulos->quitarStock($linea_venta->getIdArticulo(),$linea_venta->getCantidad());
				}
			
				// Actualizamos el estado de la ubicacion
				$this->acc_ubicaciones->actualizarCapacidadUbicaciones();
			
				// Generamos el informe de salida
				$salida_procesada = $this->acc_salidas->generarInformeSalida($id_salida);
			
				if ($salida_procesada)
				{
					// Actualizamos el estado de la salida a Procesada
					$actualizar_estado = $this->acc_salidas->actualizarEstadoSalida($id_salida,2);
									
					// Actualizamos el estado de la venta a Completa
					$actualizar_estado_venta = $this->acc_ventas->actualizarEstadoVenta($this->id_venta,5);
									
					if($actualizar_estado && $actualizar_estado_venta)
					{
						$this->msg = "La salida de mercancías se ha procesado correctamente.";	
					}
					else
					{
						$this->msg = "No se ha podido cambiar el estado de la salida, consulte con el administrador.";
					}				
				}
				else
				{
					$this->msg = "No se ha podido procesar correctamente la salida de mercancías.";
				}
			}
			else
			{
				$this->msg = "La venta no ha cargado completamente, se mantendrá en Ventas Completas hasta cargar todas las mercancías.";
			}
		}
	}
	

	/**
	 * Ejecuta la accion de ver la ficha completa con los datos del venta, conductor y salida
	 */
	public function executeVerSalida()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();	
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();	
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();		
				
		// Obtenemos el id de  la salida
		$id_md5_salida = $this->getRequestParameter('id_md5_salida');	
		$id_salida = $this->acc_salidas->obtenerIdSalidaXIdMd5($id_md5_salida);

		$this->obj_salida = $this->acc_salidas->obtenerObjSalida($id_salida);
								
		// Obtenemos el listado de las lineas de salida según el id de salida
		$this->ar_lineas_salida = $this->acc_salidas->obtenerLineasSalidaXIdSalida($id_salida);
		
		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_salida->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el informe en pdf de la salida
		$obj_informe_salida = $this->acc_informes->obtenerObjInformeSalida($id_salida);
		
		if($obj_informe_salida)
		{
			$this->mostrar_informe_salida = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
			$ruta_informe_salida = $ruta_mostrar_informe."/salidas/".$obj_informe_salida->getRutaAlbaran();
			
			$this->ruta_informe_salida = $ruta_informe_salida.".pdf";
		}	
		else
		{
			$this->mostrar_informe_salida = false;
		}
		
		// Obtenemos el objeto Venta
		$this->id_venta = $this->obj_salida->getIdVenta();
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
								
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta);
		
		// Obtenemos el id del cliente
		$id_cliente = $this->obj_venta->getIdCliente();
		
		// Obtenemos el objeto cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($id_cliente);
		
		// Obtenemos el informe en pdf del venta
		$obj_informe_venta = $this->acc_informes->obtenerObjInformeVenta($this->id_venta);
		
		if($obj_informe_venta)
		{
			$this->mostrar_informe_venta = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
					
			$ruta_informe_venta = $ruta_mostrar_informe."/ventas/".$obj_informe_venta->getRutaAlbaran();
			
			$this->ruta_informe_venta = $ruta_informe_venta.".pdf";
		}
		else
		{
			$this->mostrar_informe_venta = false;
		}
		
		// Obtenemos el objeto salida
		$id_salida = $this->acc_salidas->obtenerIdSalidaXIdVenta($this->id_venta);			
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de salida
	 */
	public function executeDescargarInformeSalida()
	{		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id de la salida
		$id_md5_salida = $this->getRequestParameter('id_md5_salida');	
		$this->id_salida = $this->acc_salidas->obtenerIdSalidaXIdMd5($id_md5_salida);
				
		// Obtenemos el objeto Salida
		$this->obj_salida = $this->acc_salidas->obtenerObjSalida($this->id_salida);
		
		// Obtenemos el informe en pdf de la salida
		$obj_informe_salida = $this->acc_informes->obtenerObjInformeSalida($this->id_salida);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_salidas');
		
		$this->ruta_informe_salida = $ruta_mostrar_informe.$obj_informe_salida->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_salida);   
		if (!$descargado)
		{
			if ($id_md5_salida != '')
			{
				$this->redirect('/salidas/verSalida?id_md5_salida='.$id_md5_salida);
			}
			else
			{
				$this->redirect('/salidas/index');
			}
		}	
   }
}
