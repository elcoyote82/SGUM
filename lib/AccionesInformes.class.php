<?php

/**
 * Clase para gestionar todo lo relacionado con los informes
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesInformes.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesInformes extends TCPDF {
	
	public $datos;
	
	/**
	 * Para que salgan bien los caracteres con acentos y ñ en el pdf
	 * @param $message mensaje para transformar
	 * 
	 * return @message mensaje transformado
	 */
	public function convert($message) {
		
		
		$replace = explode(",","á,é,í,ó,ú,ñ,A,É,I,Ó,Ú,Ñ");
 		$search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ");
 		$message= str_replace($search, $replace, $message);
		return $message;
	}
	
	/**
	 * Cuando llamamos a esta funcion (en nuestro caso desde las acciones donde generamos los informes),
	 * se guarda el array de datos $info en la variable publica de esta clase $this->datos
	 * 
	 * @param $info array con los datos que mostraremos en el pdf y que almacenamos para ello en $this->datos
	 * 
	 */
	public function generarDatos($info)
	{
		$this->datos = $info;
	}
	
	/**
	 * Devuelve los datos guardados en la variable $this->datos
	 * 
	 * @return $this->datos datos almacenados en la variable publica $datos de esta clase
	 */
	public function datos()
	{
		return $this->datos;
	}
		
	/**
	 * Funcion que se encarga de imprimir el contenido de la tabla con los datos que nos interesan del informe en el pdf
	 * 
	 * @header cabecera de la tabla
	 * @data array de datos del contenido de la tabla
	 * @tipo tipo de informe (llamadas, sms, fax, log)
	 * 
	 */
	public function ColoredTable($header,$data, $tipo)
	{
		// Colors, line width and bold font
		$this->SetFillColor(98, 133, 189);
		$this->SetTextColor(255);
		//$this->SetDrawColor(128, 0, 0);
		//$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$this->Ln(12);
		
		if ($tipo == "informe_pedido")
		{
			$w = array(40, 20, 40, 20, 20, 15, 15, 20, 20, 20, 35);
		}
		elseif ($tipo=="informe_venta")
		{
			$w = array(40, 20, 40, 20, 20, 15, 15, 20, 20, 20, 35);
		}
		elseif ($tipo=="informe_entrada")
		{
			$w = array(40, 20, 40, 20, 20, 15, 15, 20, 20, 20, 35);
		}
		elseif ($tipo=="informe_salida")
		{
			$w = array(40, 20, 40, 20, 20, 15, 15, 20, 20, 20, 35);
		}
		
		// Cabeceras
		for($i = 0; $i < count($header); $i++)
		$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 1;
		
		// Datos tabla		
		foreach($data as $row) 
		{
			if($tipo == "informe_pedido")
			{
		  		// Obtenemos la informacion
		  		$acc_pedidos = new AccionesPedidos();
				$acc_proveedores = new AccionesProveedores();
				
				// Obtenemos el id del pedido
				$id_pedido = $row->getIdPedido();			  	
				// Obtenemos el objeto Pedido
				$obj_pedido = $acc_pedidos->obtenerObjPedido($id_pedido);
				
				// Obtenemos el id del proveedor
				$id_proveedor = $obj_pedido->getIdProveedor();
				// Obtenemos el objeto proveedor
				$obj_proveedor = $acc_proveedores->obtenerObjProveedor($id_proveedor);
				
				$this->Cell($w[0], 5, $this->convert($obj_proveedor->getNombre()), 'LR', 0, 'L', $fill);	
				$this->Cell($w[1], 5, $this->convert($obj_proveedor->getCifNif()), 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 5, $this->convert($obj_proveedor->getDireccion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[3], 5, $this->convert($obj_proveedor->getPoblacion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[4], 5, $this->convert($obj_proveedor->getProvincia()), 'LR', 0, 'L', $fill);
				$this->Cell($w[5], 5, $this->convert($obj_proveedor->getCP()), 'LR', 0, 'L', $fill);
				$this->Cell($w[6], 5, $this->convert($this->format_country($obj_proveedor->getPais())), 'LR', 0, 'L', $fill);
				$this->Cell($w[7], 5, $this->convert($obj_proveedor->getTelefono()), 'LR', 0, 'L', $fill);
				$this->Cell($w[8], 5, $this->convert($obj_proveedor->getMovil()), 'LR', 0, 'L', $fill);
				$this->Cell($w[9], 5, $this->convert($obj_proveedor->getFax()), 'LR', 0, 'L', $fill);
				$this->Cell($w[10], 5, $this->convert($obj_proveedor->getEmail()), 'LR', 0, 'L', $fill);
			}
			elseif($tipo == "informe_venta")
			{	
				// Obtenemos la informacion
				$acc_ventas = new AccionesVentas();
				$acc_clientes = new AccionesClientes();
							
				// Obtenemos el id de la venta
				$id_venta = $row->getIdVenta();
				// Obtenemos el objeto Venta
				$obj_venta = $acc_ventas->obtenerObjVenta($id_venta);
				
				// Obtenemos el id del cliente
				$id_cliente = $obj_venta->getIdCliente();					
				// Obtenemos el objeto cliente
				$obj_cliente = $acc_clientes->obtenerObjCliente($id_cliente);
				
				$this->Cell($w[0], 5, $this->convert($obj_cliente->getNombre()), 'LR', 0, 'L', $fill);	
				$this->Cell($w[1], 5, $this->convert($obj_cliente->getCifNif()), 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 5, $this->convert($obj_cliente->getDireccion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[3], 5, $this->convert($obj_cliente->getPoblacion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[4], 5, $this->convert($obj_cliente->getProvincia()), 'LR', 0, 'L', $fill);
				$this->Cell($w[5], 5, $this->convert($obj_cliente->getCP()), 'LR', 0, 'L', $fill);
				$this->Cell($w[6], 5, $this->convert($this->format_country($obj_cliente->getPais())), 'LR', 0, 'L', $fill);
				$this->Cell($w[7], 5, $this->convert($obj_cliente->getTelefono()), 'LR', 0, 'L', $fill);
				$this->Cell($w[8], 5, $this->convert($obj_cliente->getMovil()), 'LR', 0, 'L', $fill);
				$this->Cell($w[9], 5, $this->convert($obj_cliente->getFax()), 'LR', 0, 'L', $fill);
				$this->Cell($w[10], 5, $this->convert($obj_cliente->getEmail()), 'LR', 0, 'L', $fill);
			}
			elseif($tipo == "informe_entrada")
			{
				// Obtenemos la informacion
				$acc_entradas = new AccionesEntradas();
			  	$acc_pedidos = new AccionesPedidos();
			  	$acc_proveedores = new AccionesProveedores();
			  	$acc_transporte = new AccionesTransporte();
			  	
			  	// Obtenemos el id de la entrada
				$id_entrada = $row->getIdEntrada();			
				// Obtenemos el objeto Entrada
				$obj_entrada = $acc_entradas->obtenerObjEntrada($id_entrada);
				
				// Obtenemos el id del pedido		
				$id_pedido = $obj_entrada->getIdPedido();
				// Obtenemos el objeto pedido
				$obj_pedido = $acc_pedidos->obtenerObjPedido($id_pedido);
				
				// Obtenemos el id del proveedor
				$id_proveedor = $obj_pedido->getIdProveedor();					
				// Obtenemos el objeto Proveedor
				$obj_proveedor = $acc_proveedores->obtenerObjProveedor($id_proveedor);	
	
				// Obtenemos el id del conductor
				$id_transporte_conductor = $obj_entrada->getIdTransporteConductor();
				// Obtenemos el objeto Conductor
				$obj_transporte_conductor = $acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
				
				// Obtenemos la objeto Empresa de Transporte
				$obj_transporte_empresa = $acc_transporte->obtenerObjTransporteEmpresa($obj_transporte_conductor->getIdTransporteEmpresa());
								
				$this->Cell($w[0], 5, $this->convert($obj_proveedor->getNombre()), 'LR', 0, 'L', $fill);	
				$this->Cell($w[1], 5, $this->convert($obj_proveedor->getCifNif()), 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 5, $this->convert($obj_proveedor->getDireccion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[3], 5, $this->convert($obj_proveedor->getPoblacion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[4], 5, $this->convert($obj_proveedor->getProvincia()), 'LR', 0, 'L', $fill);
				$this->Cell($w[5], 5, $this->convert($obj_proveedor->getCP()), 'LR', 0, 'L', $fill);
				$this->Cell($w[6], 5, $this->convert($this->format_country($obj_proveedor->getPais())), 'LR', 0, 'L', $fill);
				$this->Cell($w[7], 5, $this->convert($obj_proveedor->getTelefono()), 'LR', 0, 'L', $fill);
				$this->Cell($w[8], 5, $this->convert($obj_proveedor->getMovil()), 'LR', 0, 'L', $fill);
				$this->Cell($w[9], 5, $this->convert($obj_proveedor->getFax()), 'LR', 0, 'L', $fill);
				$this->Cell($w[10], 5, $this->convert($obj_proveedor->getEmail()), 'LR', 0, 'L', $fill);			
			}
			elseif($tipo == "informe_salida")
			{
				// Obtenemos la informacion
				$acc_salidas = new AccionesSalidas();
			  	$acc_ventas = new AccionesVentas();
			  	$acc_clientes = new AccionesClientes();
			  	$acc_transporte = new AccionesTransporte();
			  	
			  	// Obtenemos el id de la salida
				$id_salida = $row->getIdSalida();			
				// Obtenemos el objeto Salida
				$obj_salida = $acc_salidas->obtenerObjSalida($id_salida);
				
				// Obtenemos el id del venta		
				$id_venta = $obj_salida->getIdVenta();
				// Obtenemos el objeto Venta
				$obj_venta = $acc_ventas->obtenerObjVenta($id_venta);
				
				// Obtenemos el id del cliente
				$id_cliente = $obj_venta->getIdCliente();					
				// Obtenemos el objeto Cliente
				$obj_cliente = $acc_clientes->obtenerObjCliente($id_cliente);	
	
				// Obtenemos el id del conductor
				$id_transporte_conductor = $obj_salida->getIdTransporteConductor();
				// Obtenemos el objeto Conductor
				$obj_transporte_conductor = $acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
								
				// Obtenemos la objeto Empresa de Transporte
				$obj_transporte_empresa = $acc_transporte->obtenerObjTransporteEmpresa($obj_transporte_conductor->getIdTransporteEmpresa());
								
				$this->Cell($w[0], 5, $this->convert($obj_cliente->getNombre()), 'LR', 0, 'L', $fill);	
				$this->Cell($w[1], 5, $this->convert($obj_cliente->getCifNif()), 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 5, $this->convert($obj_cliente->getDireccion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[3], 5, $this->convert($obj_cliente->getPoblacion()), 'LR', 0, 'L', $fill);
				$this->Cell($w[4], 5, $this->convert($obj_cliente->getProvincia()), 'LR', 0, 'L', $fill);
				$this->Cell($w[5], 5, $this->convert($obj_cliente->getCP()), 'LR', 0, 'L', $fill);
				$this->Cell($w[6], 5, $this->convert($this->format_country($obj_cliente->getPais())), 'LR', 0, 'L', $fill);
				$this->Cell($w[7], 5, $this->convert($obj_cliente->getTelefono()), 'LR', 0, 'L', $fill);
				$this->Cell($w[8], 5, $this->convert($obj_cliente->getMovil()), 'LR', 0, 'L', $fill);
				$this->Cell($w[9], 5, $this->convert($obj_cliente->getFax()), 'LR', 0, 'L', $fill);
				$this->Cell($w[10], 5, $this->convert($obj_cliente->getEmail()), 'LR', 0, 'L', $fill);		
			}
			$this->Ln();
			$fill=!$fill;				
			break;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
		
		if($tipo == "informe_pedido")
		{
			$this->Ln(20);
			$this->Cell(185,0,'LINEAS DE PEDIDO','B',0,'C',0);
			$this->SetFillColor(98, 133, 189);
			$this->SetTextColor(255);
			$this->SetFont('', 'B');
			$this->Ln();
			$this->Cell(30, 0, 'Nombre', 'TLRB', 0, 'L', 1);
			$this->Cell(30, 0, 'Familia', 'TLRB', 0, 'L', 1);
			$this->Cell(150, 0, 'Datos', 'TLRB', 0, 'C', 1);
			$this->Cell(15, 0, 'Cantidad', 'TLRB', 0, 'C', 1);
			$this->Ln();
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			foreach($data as $row) 
			{		
				$acc_articulos = new AccionesArticulos();
				$obj_articulo = $acc_articulos->obtenerObjArticulo($row->getIdArticulo());
				
				$acc_familias = new AccionesFamilias();
				$obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia());
										
				$this->Cell(30, 6, $this->convert($obj_articulo->getNombre()), 'LR', 0, 'L', $fill);
				$this->Cell(30, 6, $this->convert($obj_familia->getNombre()), 'LR', 0, 'C', $fill);
				$this->Cell(150, 6,$this->convert($obj_articulo->getDatosProducto()), 'LR', 0, 'C', $fill);
				$this->Cell(15, 6,$this->convert($row->getCantidad()), 'LR', 0, 'C', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(225, 0, '', 'T');
		}
		elseif($tipo == "informe_venta")
		{
			$this->Ln(20);
			$this->Cell(185,0,'LINEAS DE VENTA','B',0,'C',0);
			$this->SetFillColor(98, 133, 189);
			$this->SetTextColor(255);
			$this->SetFont('', 'B');
			$this->Ln();
			$this->Cell(30, 0, 'Nombre', 'TLRB', 0, 'L', 1);
			$this->Cell(30, 0, 'Familia', 'TLRB', 0, 'L', 1);
			$this->Cell(150, 0, 'Datos', 'TLRB', 0, 'C', 1);
			$this->Cell(15, 0, 'Cantidad', 'TLRB', 0, 'C', 1);
			$this->Ln();
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			foreach($data as $row) 
			{		
				$acc_articulos = new AccionesArticulos();
				$obj_articulo = $acc_articulos->obtenerObjArticulo($row->getIdArticulo());
				
				$acc_familias = new AccionesFamilias();
				$obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia());
										
				$this->Cell(30, 6, $this->convert($obj_articulo->getNombre()), 'LR', 0, 'L', $fill);
				$this->Cell(30, 6, $this->convert($obj_familia->getNombre()), 'LR', 0, 'C', $fill);
				$this->Cell(150, 6,$this->convert($obj_articulo->getDatosProducto()), 'LR', 0, 'C', $fill);
				$this->Cell(15, 6,$this->convert($row->getCantidad()), 'LR', 0, 'C', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(225, 0, '', 'T');
		}
		elseif($tipo == "informe_entrada")
		{
			$this->Ln(20);
			$this->Cell(185,0,'LINEAS DE ENTRADA','B',0,'C',0);
			$this->SetFillColor(98, 133, 189);
			$this->SetTextColor(255);
			$this->SetFont('', 'B');
			$this->Ln();
			$this->Cell(30, 0, 'Nombre', 'TLRB', 0, 'L', 1);
			$this->Cell(30, 0, 'Familia', 'TLRB', 0, 'L', 1);
			$this->Cell(150, 0, 'Datos', 'TLRB', 0, 'C', 1);
			$this->Cell(25, 0, 'Lote', 'TLRB', 0, 'C', 1);
			$this->Cell(15, 0, 'Ubicación', 'TLRB', 0, 'C', 1);
			$this->Ln();
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			foreach($data as $row) 
			{		
				$acc_articulos = new AccionesArticulos();
				$obj_articulo = $acc_articulos->obtenerObjArticulo($row->getIdArticulo());
				
				$acc_familias = new AccionesFamilias();
				$obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia());
				
				$acc_ubicaciones = new AccionesUbicaciones();
				$nombre_ubicacion = $acc_ubicaciones->obtenerNombreUbicacionXIdUbicacion($row->getIdUbicacion());
				
				$this->Cell(30, 6, $this->convert($obj_articulo->getNombre()), 'LR', 0, 'L', $fill);
				$this->Cell(30, 6, $this->convert($obj_familia->getNombre()), 'LR', 0, 'C', $fill);
				$this->Cell(150, 6,$this->convert($obj_articulo->getDatosProducto()), 'LR', 0, 'C', $fill);
				$this->Cell(25, 6,$this->convert($row->getLote()), 'LR', 0, 'C', $fill);
				$this->Cell(15, 6,$this->convert($nombre_ubicacion), 'LR', 0, 'C', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(250, 0, '', 'T');
		}
		elseif($tipo == "informe_salida")
		{
			$this->Ln(20);
			$this->Cell(185,0,'LINEAS DE SALIDA','B',0,'C',0);
			$this->SetFillColor(98, 133, 189);
			$this->SetTextColor(255);
			$this->SetFont('', 'B');
			$this->Ln();
			$this->Cell(30, 0, 'Nombre', 'TLRB', 0, 'L', 1);
			$this->Cell(30, 0, 'Familia', 'TLRB', 0, 'L', 1);
			$this->Cell(150, 0, 'Datos', 'TLRB', 0, 'C', 1);
			$this->Cell(25, 0, 'Lote', 'TLRB', 0, 'C', 1);
			$this->Cell(15, 0, 'Ubicación', 'TLRB', 0, 'C', 1);
			$this->Ln();
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			foreach($data as $row) 
			{		
				$acc_articulos = new AccionesArticulos();
				$obj_articulo = $acc_articulos->obtenerObjArticulo($row->getIdArticulo());
				
				$acc_familias = new AccionesFamilias();
				$obj_familia = $acc_familias->obtenerObjFamilia($obj_articulo->getIdFamilia());
					
				$acc_ubicaciones = new AccionesUbicaciones();
				$nombre_ubicacion = $acc_ubicaciones->obtenerNombreUbicacionXIdUbicacion($row->getIdUbicacion());
									
				$this->Cell(30, 6, $this->convert($obj_articulo->getNombre()), 'LR', 0, 'L', $fill);
				$this->Cell(30, 6, $this->convert($obj_familia->getNombre()), 'LR', 0, 'C', $fill);
				$this->Cell(150, 6,$this->convert($obj_articulo->getDatosProducto()), 'LR', 0, 'C', $fill);
				$this->Cell(25, 6,$this->convert($row->getLote()), 'LR', 0, 'C', $fill);
				$this->Cell(15, 6,$this->convert($nombre_ubicacion), 'LR', 0, 'C', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(250, 0, '', 'T');
		}
	}
	
	/**
	 * Funcion que genera un informe en pdf a partir de un array de datos que le pasamos
	 * 
	 * @param $datos array con los datos para generar el informe
	 * @param $header cabecera con los titulos de los datos que le pasamos
	 * @param $tipo tipo de informe que vamos a generar (pedido, venta, entrada, salida)
	 * 
	 */	 
	 public function generarInforme($datos,$header,$tipo)
	 {	 	
	 	// Create new PDF document
	 	if($tipo=="informe_pedido")
	 	{
		 	$pdf = new AccionesInformes('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);	
	 	}
	 	elseif($tipo=="informe_pedido")
	 	{
		 	$pdf = new AccionesInformes('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);	
	 	}
	 	elseif($tipo=="informe_entrada")
	 	{
		 	$pdf = new AccionesInformes('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);	
	 	}
	 	elseif($tipo=="informe_salida")
	 	{
		 	$pdf = new AccionesInformes('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);	
	 	}
	 	else
	 	{
	 		$pdf = new AccionesInformes('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	 	}
	 	
		// Informacion del documento
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Adrián Corujo Carballedo');		
		$pdf->SetTitle('SGUM');
		$pdf->SetSubject('Sistema de Gestión de Ubicaciones de Mercancía');
		
		// Keywords asociadas al documento
		$pdf->SetKeywords('SGUM, PFC');	
		
		// Establecemos la cabecera por defecto
		$pdf->setHeaderData(sfConfig::get('app_tcpdf_image'),sfConfig::get('app_tcpdf_image_width'), $pdf->title, $pdf->subject."\n".$pdf->author);

		// Establecemos la fuente de texto de la cabecera y el pie
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// Establecemos los margenes
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// Salto de pagina automatico al llegar al final de una pagina
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// Relacion para escalado de imagen
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
				
		// Establecemos caracter�sticas del idioma que usaremos
		$l = Array();
		$l['a_meta_charset'] = 'UTF-8';
		$l['a_meta_dir'] = 'ltr';
		$l['a_meta_language'] = 'es';
		$l['w_page'] = 'Página';
		$pdf->setLanguageArray($l); 
				
		// Tamaño y tipo de letra
		$pdf->SetFont('helvetica', '', 20);
		
		// Añadimos una pagina de pdf
		$pdf->AddPage();
		
		if ($tipo == "informe_pedido")
		{
			// Obtenemos el id del pedido
			$id_pedido = $this->datos[0]->getIdPedido();
			
		  	// Generamos el pdf
		  	$acc_pedidos = new AccionesPedidos();
		  	$acc_fechas = new AccionesFechas();
		  	
			// Obtenemos el objeto Pedido
			$obj_pedido = $acc_pedidos->obtenerObjPedido($id_pedido);
			
			$numero_pedido = $obj_pedido->getNumPedido();
			$fecha_pedido = $acc_fechas->cambiarFormatoFecha15($obj_pedido->getUpdatedAt());
			$titulo_pedido = "Pedido '".$numero_pedido."' | ".$fecha_pedido;
			$pdf->Cell(0, 0, $this->convert($titulo_pedido), 0, 0, 'C');
		}
		elseif ($tipo == "informe_venta")
		{
			// Obtenemos el id de la venta
			$id_venta = $this->datos[0]->getIdVenta();
			
		  	// Generamos el pdf
		  	$acc_ventas = new AccionesVentas();
		  	$acc_fechas = new AccionesFechas();
		  	
			// Obtenemos el objeto Venta
			$obj_venta = $acc_ventas->obtenerObjVenta($id_venta);
			
			$numero_venta = $obj_venta->getNumVenta();
			$fecha_venta = $acc_fechas->cambiarFormatoFecha15($obj_venta->getUpdatedAt());
			$titulo_venta = "Venta '".$numero_venta."' | ".$fecha_venta;
			$pdf->Cell(0, 0, $this->convert($titulo_venta), 0, 0, 'C');
		}
		elseif ($tipo == "informe_entrada")
		{
			// Obtenemos el id de la entrada
			$id_entrada = $this->datos[0]->getIdEntrada();
			
		  	// Generamos el pdf
		  	$acc_entradas = new AccionesEntradas();
		  	$acc_fechas = new AccionesFechas();
		  	
			// Obtenemos el objeto Entrada
			$obj_entrada = $acc_entradas->obtenerObjEntrada($id_entrada);
			
			$numero_entrada = $obj_entrada->getNumEntrada();
			$fecha_entrada = $acc_fechas->cambiarFormatoFecha15($obj_entrada->getUpdatedAt());
			$titulo_entrada = "Entrada '".$numero_entrada."' | ".$fecha_entrada;
			
			$pdf->Cell(0, 0, $this->convert($titulo_entrada), 0, 0, 'C');
		}
		elseif ($tipo == "informe_salida")
		{
			// Obtenemos el id de la salida
			$id_salida = $this->datos[0]->getIdSalida();
			
		  	// Generamos el pdf
		  	$acc_salidas = new AccionesSalidas();
		  	$acc_fechas = new AccionesFechas();
		  	
			// Obtenemos el objeto Salida
			$obj_salida = $acc_salidas->obtenerObjSalida($id_salida);
			
			$numero_salida = $obj_salida->getNumSalida();
			$fecha_salida = $acc_fechas->cambiarFormatoFecha15($obj_salida->getUpdatedAt());
			$titulo_salida = "Salida '".$numero_salida."' | ".$fecha_salida;
			
			$pdf->Cell(0, 0, $this->convert($titulo_salida), 0, 0, 'C');
		}
		
		$pdf->SetFont('helvetica', '', 8);
		//$pdf->Cell(0, 0, date('d-m-Y H:i:s'), 0, 0, 'R');
		$pdf->Ln();
		
		// Tamaño y tipo de letra
		$pdf->SetFont('helvetica', '', 9);
		
		// Imprimimos la tabla con el contenido en el pdf
		$pdf->ColoredTable($header, $this->datos, $tipo);
									
		// Cerramos y mostramos la salida del documento pdf
		if($tipo == "informe_pedido")
		{
		  	// Generamos el pdf
		  	$acc_pedidos = new AccionesPedidos();
		  	
			// Obtenemos el id del pedido
			$id_pedido = $this->datos[0]->getIdPedido();		  	
			// Obtenemos el objeto Pedido
			$obj_pedido = $acc_pedidos->obtenerObjPedido($id_pedido);
						
			// Obtenemos la ruta de los informes pedidos
			$ruta_informes_pedidos = sfConfig::get('app_informes_pedidos');
			
			// Creamos el nombre del informe pedido
			$nombre_informe_pedido = $id_pedido."_".date('Y_m_d_H_i_s');
			
			// Ruta del Informe Pedido
			$ruta_albaran = $ruta_informes_pedidos.$nombre_informe_pedido;
			
			// Guardamos el Informe de pedido en el servidor
			$pdf->Output($ruta_albaran.".pdf", "F");
			
			// Guardamos el Informe Pedido
			$albaran_pedido_guardado = $this->guardarAlbaranPedido($id_pedido,$nombre_informe_pedido);
			
			return $albaran_pedido_guardado;
		}
		elseif($tipo == "informe_venta")
		{
		  	// Generamos el pdf
		  	$acc_ventas = new AccionesVentas();
		  	
			// Obtenemos el id de la venta
			$id_venta = $this->datos[0]->getIdVenta();			
			// Obtenemos el objeto Venta
			$obj_venta = $acc_ventas->obtenerObjVenta($id_venta);
						
			// Obtenemos la ruta de los informes ventas
			$ruta_informes_ventas = sfConfig::get('app_informes_ventas');
			
			// Creamos el nombre del informe venta
			$nombre_informe_venta = $id_venta."_".date('Y_m_d_H_i_s');
			
			// Ruta del Informe Venta
			$ruta_albaran = $ruta_informes_ventas.$nombre_informe_venta;
			
			// Guardamos el Informe de venta en el servidor
			$pdf->Output($ruta_albaran.".pdf", "F");
			
			// Guardamos el Informe Venta
			$albaran_venta_guardado = $this->guardarAlbaranVenta($id_venta,$nombre_informe_venta);
			
			return $albaran_venta_guardado;
		}
		elseif($tipo == "informe_entrada")
		{		
		  	// Generamos el pdf
		  	$acc_entradas = new AccionesEntradas();
		  	
		  	// Obtenemos el id de la entrada
			$id_entrada = $this->datos[0]->getIdEntrada();			
			// Obtenemos el objeto Entrada
			$obj_entrada = $acc_entradas->obtenerObjEntrada($id_entrada);
				
			// Obtenemos la ruta de los informes entradas
			$ruta_informes_entradas = sfConfig::get('app_informes_entradas');
			
			// Creamos el nombre del informe entrada
			$nombre_informe_entrada = $id_entrada."_".date('Y_m_d_H_i_s');
			
			// Ruta del Informe Entrada
			$ruta_albaran = $ruta_informes_entradas.$nombre_informe_entrada;
			
			// Guardamos el Informe de entrada en el servidor
			$pdf->Output($ruta_albaran.".pdf", "F");
			
			// Guardamos el Informe Entrada
			$albaran_entrada_guardado = $this->guardarAlbaranEntrada($id_entrada,$nombre_informe_entrada);
			
			return $albaran_entrada_guardado;
		}
		 elseif($tipo == "informe_salida")
		{		
		  	// Generamos el pdf
		  	$acc_salidas = new AccionesSalidas();
		  	
		  	// Obtenemos el id de la salida
			$id_salida = $this->datos[0]->getIdSalida();			
			// Obtenemos el objeto Entrada
			$obj_salida = $acc_salidas->obtenerObjSalida($id_salida);
			
			// Obtenemos la ruta de los informes salidas
			$ruta_informes_salidas = sfConfig::get('app_informes_salidas');
			
			// Creamos el nombre del informe salida
			$nombre_informe_salida = $id_salida."_".date('Y_m_d_H_i_s');
			
			// Ruta del Informe Entrada
			$ruta_albaran = $ruta_informes_salidas.$nombre_informe_salida;
			
			// Guardamos el Informe de salida en el servidor
			$pdf->Output($ruta_albaran.".pdf", "F");
			
			// Guardamos el Informe Entrada
			$albaran_salida_guardado = $this->guardarAlbaranSalida($id_salida,$nombre_informe_salida);
			
			return $albaran_salida_guardado;
		}
		else
		{
			$pdf->Output('Informe.pdf', 'I');	
		}
	 }
	 
	function format_country($country_iso, $culture = null)
	{
	  $c = new sfCultureInfo($culture === null ? sfContext::getInstance()->getUser()->getCulture() : $culture);
	  $countries = $c->getCountries();
	
	  return isset($countries[$country_iso]) ? $countries[$country_iso] : '';
	}
	
	/**
	 * Guardar un albaran de pedido
	 * 
	 * @param integer $id_pedido  Id del pedido
	 * @param integer $ruta_albaran  Ruta del albaran sin extension
	 */
	public function guardarAlbaranPedido($id_pedido,$ruta_albaran)
	{
		// Creamos un nuevo objeto AlbaranesPedido
		$albaran_pedido = new AlbaranesPedido();
		$albaran_pedido->setIdPedido($id_pedido);				
		$albaran_pedido->setRutaAlbaran($ruta_albaran);
		
		// Guardamos el albaran en la BD
		$albaran_pedido_salvado = $albaran_pedido->save();
		
		// Obtenemos el id del ultimo albaran insertado
		$id_albaran_pedido_save = $albaran_pedido->getIdAlbaranPedido();
		
		if ($id_albaran_pedido_save)
		{
			// Obtenemos la clave para generar el id_md5 del albaran pedido que acabamos de guardar
			$key_albaran_pedido = sfConfig::get('app_private_key_albaranes_pedido');
									
			// Creamos un nuevo objeto AlbaranesPedido
			$albaran_pedido_act = new AlbaranesPedido();
			$albaran_pedido_act->setIdAlbaranPedido($id_albaran_pedido_save);
			
			// Generamos el id_md5 del Albaran Pedido
			$id_md5_albaran_pedido = hash_hmac('md5',$id_albaran_pedido_save,$key_albaran_pedido);
			$albaran_pedido_act->setIdMd5Albaran($id_md5_albaran_pedido);
			
			// Guardamos el número del albaran pedido
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(1);
			//$num_albaran_pedido = "AAA".$id_albaran_pedido_save;
			$num_albaran_pedido = $valor_num_albaran.$id_albaran_pedido_save;
			$albaran_pedido_act->setNumAlbaranPedido($num_albaran_pedido);
			
			// Actualizamos el objeto AlbaranesPedido
			$albaran_pedido_update = AlbaranesPedidoPeer::doUpdate($albaran_pedido_act);
			
			if($albaran_pedido_update !== false)
			{
				return $id_albaran_pedido_save;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Guardar un albaran de venta
	 * 
	 * @param integer $id_venta  Id de la venta
	 * @param integer $ruta_albaran  Ruta del albaran sin extension
	 */
	public function guardarAlbaranVenta($id_venta,$ruta_albaran)
	{
		// Creamos un nuevo objeto AlbaranesVenta
		$albaran_venta = new AlbaranesVenta();
		$albaran_venta->setIdVenta($id_venta);				
		$albaran_venta->setRutaAlbaran($ruta_albaran);
		
		// Guardamos el albaran en la BD
		$albaran_venta_salvado = $albaran_venta->save();
		
		// Obtenemos el id del ultimo albaran insertado
		$id_albaran_venta_save = $albaran_venta->getIdAlbaranVenta();
		
		if ($id_albaran_venta_save)
		{
			// Obtenemos la clave para generar el id_md5 del albaran venta que acabamos de guardar
			$key_albaran_venta = sfConfig::get('app_private_key_albaranes_venta');
									
			// Creamos un nuevo objeto Albaranesventa
			$albaran_venta_act = new AlbaranesVenta();
			$albaran_venta_act->setIdAlbaranVenta($id_albaran_venta_save);
			
			// Generamos el id_md5 del Albaran Pedido
			$id_md5_albaran_venta = hash_hmac('md5',$id_albaran_venta_save,$key_albaran_venta);
			$albaran_venta_act->setIdMd5Albaran($id_md5_albaran_venta);
			
			// Guardamos el número del albaran venta
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(3);			
			//$num_albaran_venta = "AAA".$id_albaran_venta_save;
			$num_albaran_venta = $valor_num_albaran.$id_albaran_venta_save;
			$albaran_venta_act->setNumAlbaranVenta($num_albaran_venta);
			
			// Actualizamos el objeto AlbaranesVenta
			$albaran_venta_update = AlbaranesVentaPeer::doUpdate($albaran_venta_act);
			
			if($albaran_venta_update !== false)
			{
				return $id_albaran_venta_save;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Guardar un albaran de entrada
	 * 
	 * @param integer $id_entrada  Id de la entrada
	 * @param integer $ruta_albaran  Ruta del albaran sin extension
	 */
	public function guardarAlbaranEntrada($id_entrada,$ruta_albaran)
	{
		// Creamos un nuevo objeto AlbaranesEntrada
		$albaran_entrada = new AlbaranesEntrada();
		$albaran_entrada->setIdEntrada($id_entrada);				
		$albaran_entrada->setRutaAlbaran($ruta_albaran);
				
		// Obtenemos el objeto Entrada
		$acc_entradas = new AccionesEntradas();
		$obj_entrada = $acc_entradas->obtenerObjEntrada($id_entrada);
		
		// Obtenemos el id del pedido		
		$id_pedido = $obj_entrada->getIdPedido();
					
		$albaran_entrada->setIdPedido($id_pedido);
		
		// Guardamos el albaran en la BD
		$albaran_entrada_salvado = $albaran_entrada->save();
		
		// Obtenemos el id del ultimo albaran insertado
		$id_albaran_entrada_save = $albaran_entrada->getIdAlbaranEntrada();
				
		if ($id_albaran_entrada_save)
		{
			// Obtenemos la clave para generar el id_md5 del albaran entrada que acabamos de guardar
			$key_albaran_entrada = sfConfig::get('app_private_key_albaranes_entrada');
									
			// Creamos un nuevo objeto AlbaranesEntrada
			$albaran_entrada_act = new AlbaranesEntrada();
			$albaran_entrada_act->setIdAlbaranEntrada($id_albaran_entrada_save);
			
			// Generamos el id_md5 del Albaran Entrada
			$id_md5_albaran_entrada = hash_hmac('md5',$id_albaran_entrada_save,$key_albaran_entrada);
			$albaran_entrada_act->setIdMd5Albaran($id_md5_albaran_entrada);
			
			// Guardamos el número del albaran entrada
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(2);			
			//$num_albaran_entrada = "AAA".$id_albaran_entrada_save;
			$num_albaran_entrada = $valor_num_albaran.$id_albaran_entrada_save;
			$albaran_entrada_act->setNumAlbaranEntrada($num_albaran_entrada);
			
			// Actualizamos el objeto AlbaranesEntrada
			$albaran_entrada_update = AlbaranesEntradaPeer::doUpdate($albaran_entrada_act);
			
			if($albaran_entrada_update !== false)
			{
				return $id_albaran_entrada_save;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	

	/**
	 * Guardar un albaran de salida
	 * 
	 * @param integer $id_salida  Id de la salida
	 * @param integer $ruta_albaran  Ruta del albaran sin extension
	 */
	public function guardarAlbaranSalida($id_salida,$ruta_albaran)
	{
		// Creamos un nuevo objeto AlbaranesSalida
		$albaran_salida = new AlbaranesSalida();
		$albaran_salida->setIdSalida($id_salida);				
		$albaran_salida->setRutaAlbaran($ruta_albaran);
				
		// Obtenemos el objeto Salida
		$acc_salidas = new AccionesSalidas();
		$obj_salida = $acc_salidas->obtenerObjSalida($id_salida);
		
		// Obtenemos el id de la venta		
		$id_venta= $obj_salida->getIdVenta();
					
		$albaran_salida->setIdVenta($id_venta);
		
		// Guardamos el albaran en la BD
		$albaran_salida_salvado = $albaran_salida->save();
		
		// Obtenemos el id del ultimo albaran insertado
		$id_albaran_salida_save = $albaran_salida->getIdAlbaranSalida();
		
		if ($id_albaran_salida_save)
		{
			// Obtenemos la clave para generar el id_md5 del albaran salida que acabamos de guardar
			$key_albaran_salida = sfConfig::get('app_private_key_albaranes_salida');
									
			// Creamos un nuevo objeto AlbaranesSalida
			$albaran_salida_act = new AlbaranesSalida();
			$albaran_salida_act->setIdAlbaranSalida($id_albaran_salida_save);
			
			// Generamos el id_md5 del Albaran Salida
			$id_md5_albaran_salida = hash_hmac('md5',$id_albaran_salida_save,$key_albaran_salida);
			$albaran_salida_act->setIdMd5Albaran($id_md5_albaran_salida);
			
			// Guardamos el número del albaran salida
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(4);
			//$num_albaran_salida = "AAA".$id_albaran_salida_save;
			$num_albaran_salida = $valor_num_albaran.$id_albaran_salida_save;
			$albaran_salida_act->setNumAlbaranSalida($num_albaran_salida);
			
			// Actualizamos el objeto AlbaranesSalida
			$albaran_salida_update = AlbaranesSalidaPeer::doUpdate($albaran_salida_act);
			
			if($albaran_salida_update !== false)
			{
				return $id_albaran_salida_save;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Obtenemos el objeto Informe Pedido a partir del id del pedido
	 * 
	 * @param integer $id_pedido Id del pedido
	 * 
	 * @return objeto $obj_informe_pedido El informe pedido buscado
	 * 
	 */
	public function obtenerObjInformePedido($id_pedido)
	{
		$informe_pedido = new Criteria();
		$informe_pedido->add(AlbaranesPedidoPeer::ID_PEDIDO,$id_pedido);
		
		$obj_informe_pedido = AlbaranesPedidoPeer::doSelect($informe_pedido);
		
		if(!empty($obj_informe_pedido))
		{
			return $obj_informe_pedido[0];
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtenemos el objeto Informe Venta  a partir del id de la venta
	 * 
	 * @param integer $id_venta Id de la venta
	 * 
	 * @return objeto $obj_informe_venta El informe venta buscado
	 * 
	 */
	public function obtenerObjInformeVenta($id_venta)
	{
		$informe_venta = new Criteria();
		$informe_venta->add(AlbaranesVentaPeer::ID_VENTA,$id_venta);
		
		$obj_informe_venta = AlbaranesVentaPeer::doSelect($informe_venta);
		
		if(!empty($obj_informe_venta))
		{
			return $obj_informe_venta[0];
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtenemos el objeto Informe Entrada a partir del id de la entrada
	 * 
	 * @param integer $id_entrada Id de la entrada
	 * 
	 * @return objeto $obj_informe_entrada El informe entrada buscado
	 * 
	 */
	public function obtenerObjInformeEntrada($id_entrada)
	{
		$informe_entrada = new Criteria();
		$informe_entrada->add(AlbaranesEntradaPeer::ID_ENTRADA,$id_entrada);
		
		$obj_informe_entrada = AlbaranesEntradaPeer::doSelect($informe_entrada);
		
		if(!empty($obj_informe_entrada))
		{
			return $obj_informe_entrada[0];
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtenemos el objeto Informe Salida  a partir del id de la salida
	 * 
	 * @param integer $id_salida Id de la salida
	 * 
	 * @return objeto $obj_informe_salida El informe salida buscado
	 * 
	 */
	public function obtenerObjInformeSalida($id_salida)
	{
		$informe_salida = new Criteria();
		$informe_salida->add(AlbaranesSalidaPeer::ID_SALIDA,$id_salida);
		
		$obj_informe_salida = AlbaranesSalidaPeer::doSelect($informe_salida);
		
		if(!empty($obj_informe_salida))
		{
			return $obj_informe_salida[0];
		}
		else
		{
			return false;
		}
	}
}
?>
