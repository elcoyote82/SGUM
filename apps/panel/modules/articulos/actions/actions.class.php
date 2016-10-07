<?php

/**
 * articulos actions.
 *
 * @package    SGUM
 * @subpackage articulos
 * @name       articulosActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class articulosActions extends sfActions
{
	/**
	 * Listamos el inventario de todos los articulos
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
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase Ubicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
		
		// Creamos la busqueda a BD
		$articulos = new Criteria();
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$articulos->add(ArticulosPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}
		
		$descripcion = $this->getRequestParameter('descripcion');
		$descripcion = $this->acc_url->parsearRecepcion($descripcion);
		$this->descripcion = $descripcion;
		if ($this->descripcion != '')
		{
			$articulos->add(ArticulosPeer::DESCRIPCION,'%'.$this->descripcion.'%',Criteria::LIKE);
		}
		
		$id_familia = $this->getRequestParameter('id_familia');
		$id_familia = $this->acc_url->parsearRecepcion($id_familia);
		$this->id_familia = $id_familia;
		if ($this->id_familia != 0)
		{
			$articulos->add(ArticulosPeer::ID_FAMILIA,$this->id_familia);
		}
		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$articulos->add(ArticulosXProveedorPeer::ID_PROVEEDOR,$this->id_proveedor);
			$articulos->addJoin(ArticulosXProveedorPeer::ID_ARTICULO,ArticulosPeer::ID_ARTICULO);
		}
		
		$nombre_ubicacion = $this->getRequestParameter('nombre_ubicacion');
		
		$nombre_ubicacion = $this->acc_url->parsearRecepcion($nombre_ubicacion);
		$this->nombre_ubicacion = $nombre_ubicacion;
		if ($this->nombre_ubicacion != '')
		{						
			$articulos->add(UbicacionesPeer::NOMBRE,$this->nombre_ubicacion);
			$articulos->addJoin(ArticulosXLotePeer::ID_UBICACION,UbicacionesPeer::ID_UBICACION);
			$articulos->addJoin(ArticulosXLotePeer::ID_ARTICULO,ArticulosPeer::ID_ARTICULO);
		}			
		
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
			$crit0 = $c->getNewCriterion(ArticulosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ArticulosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$articulos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$articulos->add(ArticulosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$articulos->add(ArticulosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$articulos = $this->acc_utilidades->ordenarObjetoXColumna($articulos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$articulos = $this->acc_utilidades->ordenarObjetoXColumna($articulos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
	
		// Llamamos al paginador		
		$pager = new sfPropelPager('Articulos', 15);
		$pager->setCriteria($articulos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de agregar un Artículo a la Base de Datos
	 * 
	 */
	public function executeAgregarArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->id_familia = $this->getRequestParameter('id_familia');
		$this->datos_producto = $this->getRequestParameter('datos_producto');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->aviso_minimo = $this->getRequestParameter('aviso_minimo');
		$this->stock_minimo = $this->getRequestParameter('stock_minimo');
		$error = false;
		if($this->stock_minimo === '')
		{
			$this->error_stock_minimo = "&darr;Debes asignar un stock minimo para el artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_stock_minimo = '';		
		}
		
		$this->id_proveedor = $this->getRequestParameter('id_proveedor');	
		if($this->id_proveedor[0] == '0')
		{
			$this->error_id_proveedor = "&darr;Debes asignar al menos un proveedor al artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_id_proveedor = '';		
		}
		
		if ($this->nombre != ''  && !$error)
		{								
			$this->imagen = '';
			$image_error = false;
			$existe_imagen = false;
			
			//Si se selecciona la imagen a guardar
			if ($this->getRequest()->hasFiles())
			{
				foreach ($this->getRequest()->getFileNames() as $archivoSubido)
				{				
					$nombreArchivo1    = $this->getRequest()->getFileName($archivoSubido);
					$tamanoArchivo     = $this->getRequest()->getFileSize($archivoSubido);
					$tipoArchivo       = $this->getRequest()->getFileType($archivoSubido);
					$archivoErroneo    = $this->getRequest()->hasFileError($archivoSubido);

					// Limpiamos el nombre del archivo de espacios
					$nombreArchivo = str_replace(" ","_",$nombreArchivo1);
					
					// Obtenemos el archivo separado por puntos							
					$temp_archivo = explode('.',$nombreArchivo);
					
					// Obtenemos la extension
					$extension = $temp_archivo[count($temp_archivo) - 1];
										
					if($this->getRequest()->getFileSize($archivoSubido) == 0)
					{
						$image_error = false;
					}
					elseif ((strtolower($extension) != "jpg")&&(strtolower($extension) != "jpeg")&&(strtolower($extension) != "gif")&&(strtolower($extension) != "png"))
					{
						$image_error = true;
						$this->msg = "No se pueden subir archivos que no sean imágenes (formatos soportados: jpg, jpeg, gif o tif).";				
					}
					// no se pueden subir imágenes superiores a 1MB
					elseif($tamanoArchivo > 1048576)
					{
						$image_error = true;
						$this->msg = "No se pueden subir imágenes de más de 1MB.";
					}
					else
					{
						$image_error = false;
						$existe_imagen = true;
					}
				}
			}
			
			// Si no falla la subida de la imagen, guardamos el producto
			if (!$image_error)
			{
				// Guardamos el Artículo							
				$id_articulo = $this->acc_articulos->guardarArticulo($this->id_familia,$this->nombre,$this->datos_producto,$this->descripcion,$this->aviso_minimo,$this->stock_minimo);				
						
				if ($id_articulo)
				{	
					// Guardamos los proveedores para el articulo
					$contador_articulo_proveedor = 0;
					$contador_proveedores = count($this->id_proveedor);
					$ar_proveedores = $this->id_proveedor;
					foreach($ar_proveedores as $id_proveedor)
					{
						$articulo_proveedor = $this->acc_articulos->guardarArticuloXProveedor($id_articulo,$id_proveedor);
						if($articulo_proveedor)
						{
							$contador_articulo_proveedor = $contador_articulo_proveedor + 1;
						}						
					}
					
					if($contador_proveedores == $contador_articulo_proveedor)
					{
						if ($existe_imagen)
						{
							$nombre_limpiado = $this->acc_utilidades->sanear_string($this->nombre);
							$nombreArchivo = $nombre_limpiado."_".date('Y_m_d_H_i_s').".".$extension;
							
							// Si se creo el producto subimos la imágen
							$directorioSubidas = sfConfig::get('app_imagen_articulos');
							
							$ruta = $directorioSubidas.'/'.$id_articulo."_".$nombreArchivo;
							
							$this->getRequest()->moveFile($archivoSubido, $ruta);
							
							$fp = fopen($ruta, "r");
							$contenido = fread($fp, $tamanoArchivo);
							fclose($fp);
							
							$nombreArchivo =  $id_articulo."_".$nombreArchivo;
							
							// Actualizamos el objeto del producto para agregar la ruta de la imagen
							$id_articulo = $this->acc_articulos->actualizarArticulo($id_articulo,$this->id_familia,$this->nombre,$this->datos_producto,$this->descripcion,$this->aviso_minimo,$this->stock_minimo,$nombreArchivo);
							
							if ($id_articulo !== false)
							{
								$this->msg = "El artículo se ha guardado correctamente.";	
							}
							else
							{
								$this->msg = "El artículo no se ha guardado correctamente. Error al subir la imagen";
								// Borramos la imagen del servidor si existe
								unlink($ruta);
							}
						}
						else
						{
							$this->msg = "El artículo se ha guardado correctamente.";		
						}						
					}
					else
					{
						$this->msg = "El artículo no se ha guardado correctamente. Error al guardar el proveedor.";			
					}	
				}
				else
				{
					$this->msg = "El artículo no se ha guardado correctamente.";			
				}
			}
		}
	}
	    
	/**
	 * Validacíon de agregar artículo
	 */
	public function handleErrorAgregarArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->id_familia = $this->getRequestParameter('id_familia');
		$this->datos_producto = $this->getRequestParameter('datos_producto');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->aviso_minimo = $this->getRequestParameter('aviso_minimo');
		$this->stock_minimo = $this->getRequestParameter('stock_minimo');
		if($this->stock_minimo === '')
		{
			$this->error_stock_minimo = "&darr;Debes asignar un stock minimo para el artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_stock_minimo = '';		
		}
		
		$this->id_proveedor = $this->getRequestParameter('id_proveedor');	
		if($this->id_proveedor[0] == '0')
		{
			$this->error_id_proveedor = "&darr;Debes asignar al menos un proveedor al artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_id_proveedor = '';		
		}
		
		return sfView::SUCCESS;
	}

	/**
	 * Ejecuta la accion de editar un Artículo a la Base de Datos
	 * 
	 */
	public function executeEditarArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos el id md5 del Artículo  	
		$this->id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		
		// Obtenemos el objeto articulo a partir del Id Md5
		$this->obj_articulo = $this->acc_articulos->obtenerObjArticuloXIdMd5($this->id_md5_articulo);
		
		// Obtenemos el Id de contactos a partir del objeto contacto
		$id_articulo = $this->obj_articulo->getIdArticulo();
		
		// Obtenemos el array de los proveedores que disponen de este articulo
		$this->ar_proveedores_articulo = $this->acc_articulos->obtenerArticulosXProveedor($id_articulo);
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->id_familia = $this->getRequestParameter('id_familia');
		$this->datos_producto = $this->getRequestParameter('datos_producto');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->aviso_minimo = $this->getRequestParameter('aviso_minimo');
		$this->stock_minimo = $this->getRequestParameter('stock_minimo');
		$error = false;
		if($this->stock_minimo === '')
		{
			$this->error_stock_minimo = "&darr;Debes asignar un stock minimo para el artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_stock_minimo = '';		
		}
		
		$this->id_proveedor = $this->getRequestParameter('id_proveedor');	
		if($this->id_proveedor[0] == '0')
		{
			$this->error_id_proveedor = "&darr;Debes asignar al menos un proveedor al artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_id_proveedor = '';		
		}
				
		if ($this->nombre != '' && !$error)
		{								
			$this->imagen = $this->obj_articulo->getImagen();
			$image_error = false;
			$existe_imagen = false;
			
			//Si se selecciona la imagen a guardar
			if ($this->getRequest()->hasFiles())
			{
				foreach ($this->getRequest()->getFileNames() as $archivoSubido)
				{				
					$nombreArchivo1    = $this->getRequest()->getFileName($archivoSubido);
					$tamanoArchivo     = $this->getRequest()->getFileSize($archivoSubido);
					$tipoArchivo       = $this->getRequest()->getFileType($archivoSubido);
					$archivoErroneo    = $this->getRequest()->hasFileError($archivoSubido);

					// Limpiamos el nombre del archivo de espacios
					$nombreArchivo = str_replace(" ","_",$nombreArchivo1);
					
					// Obtenemos el archivo separado por puntos							
					$temp_archivo = explode('.',$nombreArchivo);
					
					// Obtenemos la extension
					$extension = $temp_archivo[count($temp_archivo) - 1];
										
					if($this->getRequest()->getFileSize($archivoSubido) == 0)
					{
						$image_error = false;
					}
					elseif ((strtolower($extension) != "jpg")&&(strtolower($extension) != "jpeg")&&(strtolower($extension) != "gif")&&(strtolower($extension) != "png"))
					{
						$image_error = true;
						$this->msg = "No se pueden subir archivos que no sean imágenes (formatos soportados: jpg, jpeg, gif o tif).";				
					}
					// no se pueden subir imágenes superiores a 1MB
					elseif($tamanoArchivo > 1048576)
					{
						$image_error = true;
						$this->msg = "No se pueden subir imágenes de más de 1MB.";
					}
					else
					{
						$image_error = false;
						$existe_imagen = true;
					}
				}
			}
			
			// Si no falla la subida de la imagen, actualizamos el producto
			if (!$image_error)
			{
				// Actualizamos el Artículo							
				$articulo_act = $this->acc_articulos->actualizarArticulo($id_articulo,$this->id_familia,$this->nombre,$this->datos_producto,$this->descripcion,$this->aviso_minimo,$this->stock_minimo,$this->imagen);				
						
				if ($articulo_act !== false)
				{	
					// Actualizamos los proveedores para el articulo
					$contador_articulo_proveedor_agregado = 0;
					
					// Comprobamos que proveedores se agregan
					$proveedores_agregados = array_diff($this->id_proveedor,$this->ar_proveedores_articulo);
					
					$contador_proveedores_agregados = count($proveedores_agregados);

					if(!empty($proveedores_agregados))
					{
						foreach($proveedores_agregados as $id_proveedor_agregado)
						{
							$articulo_proveedor_agregado = $this->acc_articulos->guardarArticuloXProveedor($id_articulo,$id_proveedor_agregado);
							if($articulo_proveedor_agregado)
							{
								$contador_articulo_proveedor_agregado = $contador_articulo_proveedor_agregado + 1;
							}						
						}
					}					
					
					// Comprobamos que proveedores se eliminan
					$contador_articulo_proveedor_eliminado = 0;
					
					// Comprobamos que proveedores son diferentes
					$proveedores_eliminados = array_diff($this->ar_proveedores_articulo,$this->id_proveedor);
					
					$contador_proveedores_eliminados = count($proveedores_eliminados);

					if(!empty($proveedores_eliminados))
					{
						foreach($proveedores_eliminados as $id_proveedor_eliminado)
						{						
							$articulo_proveedor_eliminado = $this->acc_articulos->borrarArticuloXProveedor($id_articulo,$id_proveedor_eliminado);
							
							if($articulo_proveedor_eliminado)
							{
								$contador_articulo_proveedor_eliminado = $contador_articulo_proveedor_eliminado + 1;
							}						
						}
					}
					
					if($contador_articulo_proveedor_eliminado == $contador_proveedores_eliminados)
					{
						$test1 = true;
					}
					else
					{
						$test1 = false;	
					}
					if($contador_articulo_proveedor_agregado == $contador_proveedores_agregados)
					{
						$test2 = true;
					}
					else
					{
						$test2 = false;	
					}
					
					if($test1 && $test2)
					{
						if ($existe_imagen)
						{							
							$nombre_limpiado = $this->acc_utilidades->sanear_string($this->nombre);
							$nombreArchivo = $nombre_limpiado."_".date('Y_m_d_H_i_s').".".$extension;
							
							// Si se creo el producto subimos la imágen
							$directorioSubidas = sfConfig::get('app_imagen_articulos');
													
							$ruta = $directorioSubidas.'/'.$id_articulo."_".$nombreArchivo;
							
							$this->getRequest()->moveFile($archivoSubido, $ruta);
							
							$fp = fopen($ruta, "r");
							$contenido = fread($fp, $tamanoArchivo);
							fclose($fp);
							
							$nombreArchivo = $id_articulo."_".$nombreArchivo;
																			
							// Borramos la imagen anterior si existe
							$imagen_anterior = $this->imagen;
							$ruta_anterior = $directorioSubidas.'/'.$this->imagen;
							if($imagen_anterior != $nombreArchivo)
							{								
								unlink($ruta_anterior);
							}
							
							// Actualizamos el objeto del producto para agregar la ruta de la imagen
							$id_articulo = $this->acc_articulos->actualizarArticulo($id_articulo,$this->id_familia,$this->nombre,$this->datos_producto,$this->descripcion,$this->aviso_minimo,$this->stock_minimo,$nombreArchivo);
							
							if ($id_articulo !== false)
							{
								$this->msg = "El artículo se ha actualizado correctamente.";	
							}
							else
							{
								$this->msg = "El artículo no se ha actualizado correctamente. Error al actualizar la imagen";
								// Borramos la imagen del servidor si existe
								unlink($ruta);
							}
						}
						else
						{
							$this->msg = "El artículo se ha actualizado correctamente.";		
						}						
					}
					else
					{
						$this->msg = "El artículo no se ha actualizado correctamente. Error al actualizar el proveedor.";			
					}	
				}
				else
				{
					$this->msg = "El artículo no se ha actualizado correctamente.";			
				}
			}
		}
	}
	    
	/**
	 * Validacíon de editar artículo
	 */
	public function handleErrorEditarArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos el id md5 del Artículo  	
		$this->id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		
		// Obtenemos el objeto articulo a partir del Id Md5
		$this->obj_articulo = $this->acc_articulos->obtenerObjArticuloXIdMd5($this->id_md5_articulo);
		
		// Obtenemos el Id de contactos a partir del objeto contacto
		$id_articulo = $this->obj_articulo->getIdArticulo();
		
		// Obtenemos el array de los proveedores que disponen de este articulo
		$this->ar_proveedores_articulo = $this->acc_articulos->obtenerArticulosXProveedor($id_articulo);
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->id_familia = $this->getRequestParameter('id_familia');
		$this->datos_producto = $this->getRequestParameter('datos_producto');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->aviso_minimo = $this->getRequestParameter('aviso_minimo');
		$this->stock_minimo = $this->getRequestParameter('stock_minimo');
		if($this->stock_minimo === '')
		{
			$this->error_stock_minimo = "&darr;Debes asignar un stock minimo para el artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_stock_minimo = '';		
		}
		
		$this->id_proveedor = $this->getRequestParameter('id_proveedor');	
		if($this->id_proveedor[0] == '0')
		{
			$this->error_id_proveedor = "&darr;Debes asignar al menos un proveedor al artículo.&darr;";
			$error = true;
		}
		else
		{
			$this->error_id_proveedor = '';		
		}
		
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de ver la ficha del Artículo
	 * 
	 */
	public function executeVerArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase Ubicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos el id md5 del Artículo  	
		$this->id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		
		// Obtenemos el objeto articulo a partir del Id Md5
		$this->obj_articulo = $this->acc_articulos->obtenerObjArticuloXIdMd5($this->id_md5_articulo);
	}
	
	/**
	* Ejecuta la acción de Autocompletar el nombre de los Articulos en la busqueda
	*/
	public function executeBuscarArticulo() 
	{	
		$this->nombre = $this->getRequestParameter('nombre'); 
		
		//Objeto para los articulos
		$articulos = new Criteria();
	  	
		$this->articulos = ArticulosPeer::doSelect($articulos);	   
	}
	
	
	/**
	* Ejecuta la acción de Autocompletar la ubicacion de un articulo
	*/
	public function executeBuscarUbicacionArticulo() 
	{	
		$this->nombre_ubicacion = $this->getRequestParameter('nombre_ubicacion'); 
				
		// Objeto para los ubicaciones
		$ubicaciones = new Criteria();
	  	
		$this->ubicaciones = UbicacionesPeer::doSelect($ubicaciones);	   
	}
	
	/**
	 * Ejecuta la accion de borrar artículos
	 */
	public function executeBorrarArticulo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Recogemos el id md5 del articulo	
		$this->id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
			
		$id_articulo = $this->acc_articulos->obtenerIdArticuloXIdMd5($this->id_md5_articulo);
		
		// Comprobamos que lo hemos borrado	
		$obj_articulo = $this->acc_articulos->obtenerObjArticulo($id_articulo);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_articulos->comprobarArticulo($id_articulo);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El artículo ya ha sido usado, no puede ser borrado.";
		}
		else
		{		
			// Borramos la imagen almacenada en el servidor
			$directorioSubidas = sfConfig::get('app_imagen_articulos');
									
			$ruta_borrar = $directorioSubidas.'/'.$obj_articulo->getImagen();
			
			unlink($ruta_borrar);
			
			// Borramos el Artículo que hemos escogido
			$this->acc_articulos->borrarArticulo($id_articulo);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_articulos->obtenerObjArticulo($id_articulo); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el artículo.";		
			}
			else
			{
				$this->msg = "El artículo se ha borrado correctamente.";
			}
		}
	}
}
