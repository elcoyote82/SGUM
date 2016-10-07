<?php

/**
 * informes actions.
 *
 * @package    SGUM
 * @subpackage informes
 * @name       informesActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class informesActions extends sfActions
{
	/**
	 * Ejecuta la accion index
	 *
	*/
	public function executeIndex()
	{
		$this->forward('informes', 'executeInformesPedidos');
	}
	
	/**
	 * Ejecuta la accion de listar todos los informes de los pedidos
	 *
	*/
	public function executeInformesPedidos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Creamos la busqueda de las Salidas
		$informes = new Criteria();
				
		$num_albaran = $this->getRequestParameter('num_albaran');
		$num_albaran = $this->acc_url->parsearRecepcion($num_albaran);
		$this->num_albaran = $num_albaran;
		if ($this->num_albaran != '')
		{
			$informes->add(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO,'%'.$this->num_albaran.'%',Criteria::LIKE);
		}
		
		$fecha_informe = $this->getRequestParameter('fecha_informe');
		$fecha_informe = $this->acc_url->parsearRecepcion($fecha_informe);
		$this->fecha_informe = $fecha_informe;
		
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
			$crit0 = $c->getNewCriterion(AlbaranesPedidoPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(AlbaranesPedidoPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$informes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$informes->add(AlbaranesPedidoPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$informes->add(AlbaranesPedidoPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('AlbaranesPedido', 15);
		$pager->setCriteria($informes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar el informe pedido
	 */
	public function executeVerInformePedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
				
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Pedido	
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedidoXIdMd5Albaran($id_md5_albaran);
		$this->id_pedido = $this->obj_pedido->getIdPedido();
		
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
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de pedido
	 */
	public function executeDescargarInformePedido()
	{		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Pedido	
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedidoXIdMd5Albaran($id_md5_albaran);
		$this->id_pedido = $this->obj_pedido->getIdPedido();
						
		// Obtenemos el informe en pdf del pedido
		$obj_informe_pedido = $this->acc_informes->obtenerObjInformePedido($this->id_pedido);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_pedidos');
		
		$this->ruta_informe_pedido = $ruta_mostrar_informe.$obj_informe_pedido->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_pedido);   
		if (!$descargado)
		{
			if ($id_md5_albaran != '')
			{
				$this->redirect('/informes/informesPedido?id_md5_albaran='.$id_md5_albaran);
			}
			else
			{
				$this->redirect('/informes/informesPedido');
			}
		}	
	}	

	/**
	 * Ejecuta la accion de listar todos los informes de las entradas
	 *
	*/
	public function executeInformesEntradas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Creamos la busqueda de las Salidas
		$informes = new Criteria();
				
		$num_albaran = $this->getRequestParameter('num_albaran');
		$num_albaran = $this->acc_url->parsearRecepcion($num_albaran);
		$this->num_albaran = $num_albaran;
		if ($this->num_albaran != '')
		{
			$informes->add(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA,'%'.$this->num_albaran.'%',Criteria::LIKE);
		}
		
		$fecha_informe = $this->getRequestParameter('fecha_informe');
		$fecha_informe = $this->acc_url->parsearRecepcion($fecha_informe);
		$this->fecha_informe = $fecha_informe;
		
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
			$crit0 = $c->getNewCriterion(AlbaranesEntradaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(AlbaranesEntradaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$informes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$informes->add(AlbaranesEntradaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$informes->add(AlbaranesEntradaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('AlbaranesEntrada', 15);
		$pager->setCriteria($informes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar el informe entrada
	 */
	public function executeVerInformeEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
				
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Entrada	
		$this->obj_entrada = $this->acc_entradas->obtenerObjEntradaXIdMd5Albaran($id_md5_albaran);
		$this->id_entrada = $this->obj_entrada->getIdEntrada();
		
		// Obtenemos el informe en pdf de la entrada
		$obj_informe_entrada = $this->acc_informes->obtenerObjInformeEntrada($this->id_entrada);
		
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
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Entrada	
		$this->obj_entrada = $this->acc_entradas->obtenerObjEntradaXIdMd5Albaran($id_md5_albaran);
		$this->id_entrada = $this->obj_entrada->getIdEntrada();
						
		// Obtenemos el informe en pdf del entrada
		$obj_informe_entrada = $this->acc_informes->obtenerObjInformeEntrada($this->id_entrada);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_entradas');
		
		$this->ruta_informe_entrada = $ruta_mostrar_informe.$obj_informe_entrada->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_entrada);   
		if (!$descargado)
		{
			if ($id_md5_albaran != '')
			{
				$this->redirect('/informes/informesEntrada?id_md5_albaran='.$id_md5_albaran);
			}
			else
			{
				$this->redirect('/informes/informesEntrada');
			}
		}	
	}

	/**
	 * Ejecuta la accion de listar todos los informes de las ventas
	 *
	*/
	public function executeInformesVentas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Creamos la busqueda de las Ventas
		$informes = new Criteria();
				
		$num_albaran = $this->getRequestParameter('num_albaran');
		$num_albaran = $this->acc_url->parsearRecepcion($num_albaran);
		$this->num_albaran = $num_albaran;
		if ($this->num_albaran != '')
		{
			$informes->add(AlbaranesVentaPeer::NUM_ALBARAN_VENTA,'%'.$this->num_albaran.'%',Criteria::LIKE);
		}
		
		$fecha_informe = $this->getRequestParameter('fecha_informe');
		$fecha_informe = $this->acc_url->parsearRecepcion($fecha_informe);
		$this->fecha_informe = $fecha_informe;
		
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
			$crit0 = $c->getNewCriterion(AlbaranesVentaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(AlbaranesVentaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$informes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$informes->add(AlbaranesVentaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$informes->add(AlbaranesVentaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('AlbaranesVenta', 15);
		$pager->setCriteria($informes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de mostrar el informe venta
	 */
	public function executeVerInformeVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
				
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Venta	
		$this->obj_venta = $this->acc_ventas->obtenerObjVentaXIdMd5Albaran($id_md5_albaran);
		$this->id_venta = $this->obj_venta->getIdVenta();
		
		// Obtenemos el informe en pdf de la venta
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
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de venta
	 */
	public function executeDescargarInformeVenta()
	{		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Venta	
		$this->obj_venta = $this->acc_ventas->obtenerObjVentaXIdMd5Albaran($id_md5_albaran);
		$this->id_venta = $this->obj_venta->getIdVenta();
						
		// Obtenemos el informe en pdf del venta
		$obj_informe_venta = $this->acc_informes->obtenerObjInformeVenta($this->id_venta);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_ventas');
		
		$this->ruta_informe_venta = $ruta_mostrar_informe.$obj_informe_venta->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_venta);   
		if (!$descargado)
		{
			if ($id_md5_albaran != '')
			{
				$this->redirect('/informes/informesVenta?id_md5_albaran='.$id_md5_albaran);
			}
			else
			{
				$this->redirect('/informes/informesVenta');
			}
		}	
	}
	

	/**
	 * Ejecuta la accion de listar todos los informes de las salidas
	 *
	*/
	public function executeInformesSalidas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Creamos la busqueda de las Salidas
		$informes = new Criteria();
				
		$num_albaran = $this->getRequestParameter('num_albaran');
		$num_albaran = $this->acc_url->parsearRecepcion($num_albaran);
		$this->num_albaran = $num_albaran;
		if ($this->num_albaran != '')
		{
			$informes->add(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA,'%'.$this->num_albaran.'%',Criteria::LIKE);
		}
		
		$fecha_informe = $this->getRequestParameter('fecha_informe');
		$fecha_informe = $this->acc_url->parsearRecepcion($fecha_informe);
		$this->fecha_informe = $fecha_informe;
		
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
			$crit0 = $c->getNewCriterion(AlbaranesSalidaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(AlbaranesSalidaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$informes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$informes->add(AlbaranesSalidaPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$informes->add(AlbaranesSalidaPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$informes = $this->acc_utilidades->ordenarObjetoXColumna($informes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('AlbaranesSalida', 15);
		$pager->setCriteria($informes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}

	/**
	 * Ejecuta la accion de mostrar el informe salida
	 */
	public function executeVerInformeSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
				
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Salida	
		$this->obj_salida = $this->acc_salidas->obtenerObjSalidaXIdMd5Albaran($id_md5_albaran);
		$this->id_salida = $this->obj_salida->getIdSalida();
		
		// Obtenemos el informe en pdf de la salida
		$obj_informe_salida = $this->acc_informes->obtenerObjInformeSalida($this->id_salida);
		
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
		
   		// Obtenemos el id md5 del albaran
		$id_md5_albaran = $this->getRequestParameter('id_md5_albaran');

		// Obtenemos el objeto Salida	
		$this->obj_salida = $this->acc_salidas->obtenerObjSalidaXIdMd5Albaran($id_md5_albaran);
		$this->id_salida = $this->obj_salida->getIdSalida();
						
		// Obtenemos el informe en pdf del salida
		$obj_informe_salida = $this->acc_informes->obtenerObjInformeSalida($this->id_salida);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_salidas');
		
		$this->ruta_informe_salida = $ruta_mostrar_informe.$obj_informe_salida->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_salida);   
		if (!$descargado)
		{
			if ($id_md5_albaran != '')
			{
				$this->redirect('/informes/informesSalida?id_md5_albaran='.$id_md5_albaran);
			}
			else
			{
				$this->redirect('/informes/informesSalida');
			}
		}	
	}
}
