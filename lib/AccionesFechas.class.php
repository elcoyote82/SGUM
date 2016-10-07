<?php

/**
 * Clase con diferentes funciones para manejar las fechas y horas
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesFechas.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesFechas {

	/**
	 * Constructor de la clase AccionesFechas
	 */
	public function __construct()
	{								
	}
	
	/**
	 * Cambia el formato de una fecha de dd/mm/YYYY a dd-mm-YYYY
	 * 
	 * @param  string $fecha Fecha con formato dd/mm/YYYY
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public static function cambiarFormatoFecha($fecha)
	{
		if(!isset($fecha)) $fecha = "00/00/0000";
		
		list($dia,$mes,$anho) = explode("/",$fecha);
		
		return $dia."-".$mes."-".$anho;
	}
	
	/**
	 * Cambia el formato de una fecha de dd/mm/YYYY a YYYY/mm/dd
	 * 
	 * @param  string $fecha Fecha con formato dd/mm/YYYY
	 * 
	 * @return string $fecha Fecha con formato YYYY/mm/dd
	 */
	public static function cambiarFormatoFecha1($fecha)
	{
		if(!isset($fecha)) $fecha = "00/00/0000";
		
		list($dia,$mes,$anho) = explode("/",$fecha);
		
		return $anho."/".$mes."/".$dia;
	}	
	
	/**
	 * Cambia el formato de una fecha de dd/mm/YYYY a YYYY-mm-dd
	 * 
	 * @param  string $fecha Fecha con formato dd/mm/YYYY
	 * 
	 * @return string $fecha Fecha con formato YYYY-mm-dd
	 */
	public static function cambiarFormatoFecha2($fecha)
	{
		if(!isset($fecha)) $fecha = "00/00/0000";
		
		list($dia,$mes,$anho) = explode("/",$fecha);
		
		return $anho."-".$mes."-".$dia;
	}
	
	/**
	 * Cambia el formato de una fecha de dd-mm-YYYY a dd/mm/YYYY
	 * 
	 * @param  string $fecha Fecha con formato dd-mm-YYYY
	 * 
	 * @return string $fecha Fecha con formato dd/mm/YYYY
	 */
	public static function cambiarFormatoFecha4($fecha)
	{
		if(!isset($fecha)) $fecha = "00-00-0000";
		
		list($dia,$mes,$anho) = explode("-",$fecha);
		
		return $dia."/".$mes."/".$anho;
	}
	
	/**
	 * Cambia el formato de una fecha de dd-mm-YYYY a YYYY/mm/dd
	 * 
	 * @param  string $fecha Fecha con formato dd-mm-YYYY
	 * 
	 * @return string $fecha Fecha con formato YYYY/mm/dd
	 */
	public static function cambiarFormatoFecha5($fecha)
	{
		if(!isset($fecha)) $fecha = "00-00-0000";
		
		list($dia,$mes,$anho) = explode("-",$fecha);
		
		return $anho."/".$mes."/".$dia;
	}
	
	/**
	 * Cambia el formato de una fecha de dd-mm-YYYY a YYYY-mm-dd
	 * 
	 * @param  string $fecha Fecha con formato dd-mm-YYYY
	 * 
	 * @return string $fecha Fecha con formato YYYY-mm-dd
	 */
	public static function cambiarFormatoFecha6($fecha)
	{
		if(!isset($fecha)) $fecha = "00-00-0000";
		
		list($dia,$mes,$anho) = explode("-",$fecha);
		
		return $anho."/".$mes."/".$dia;
	}
	
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd a YYYY/mm/dd
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd
	 * 
	 * @return string $fecha Fecha con formato YYYY/mm/dd
	 */
	public static function cambiarFormatoFecha7($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00";
		
		list($anho,$mes,$dia) = explode("-",$fecha);
		
		return $anho."/".$mes."/".$dia;
	}
	
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd a dd/mm/YYYY
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd
	 * 
	 * @return string $fecha Fecha con formato dd/mm/YYYY
	 */
	public static function cambiarFormatoFecha8($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00";
		
		list($anho,$mes,$dia) = explode("-",$fecha);
		
		return $dia."/".$mes."/".$anho;
	}
	
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd a dd-mm-YYYY
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public static function cambiarFormatoFecha9($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00";
		
		list($anho,$mes,$dia) = explode("-",$fecha);
		
		return $dia."-".$mes."-".$anho;
	}
	
		/**
	 * Cambia el formato de una fecha de YYYY/mm/dd a YYYY-mm-dd
	 * 
	 * @param  string $fecha Fecha con formato YYYY/mm/dd
	 * 
	 * @return string $fecha Fecha con formato YYYY-mm-dd
	 */
	public static function cambiarFormatoFecha10($fecha)
	{
		if(!isset($fecha)) $fecha = "0000/00/00";
		
		list($anho,$mes,$dia) = explode("/",$fecha);
		
		return $anho."-".$mes."-".$dia;
	}
	
	/**
	 * Cambia el formato de una fecha de YYYY/mm/dd a dd/mm/YYYY
	 * 
	 * @param  string $fecha Fecha con formato YYYY/mm/dd
	 * 
	 * @return string $fecha Fecha con formato dd/mm/YYYY
	 */
	public static function cambiarFormatoFecha11($fecha)
	{
		if(!isset($fecha)) $fecha = "0000/00/00";
		
		list($anho,$mes,$dia) = explode("/",$fecha);
		
		return $dia."/".$mes."/".$anho;
	}
	
	/**
	 * Cambia el formato de una fecha de YYYY/mm/dd a dd-mm-YYYY
	 * 
	 * @param  string $fecha Fecha con formato YYYY/mm/dd
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public static function cambiarFormatoFecha12($fecha)
	{
		if(!isset($fecha)) $fecha = "0000/00/00";
		
		list($anho,$mes,$dia) = explode("/",$fecha);
		
		return $dia."-".$mes."-".$anho;
	}
		
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd HH:mm:ss a dd-mm-YYYY
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd HH:mm:ss
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public static function cambiarFormatoFecha13($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00 00:00:00";
		
		list($date,$hora) = explode(" ",$fecha);
		list($anho,$mes,$dia) = explode('-',$date);
		
		$date = $dia."-".$mes."-".$anho;
		
		return $date;		
	}
	

		
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd HH:mm:ss a j M, YYYY HH:mm:ss
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd HH:mm:ss
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public function cambiarFormatoFecha14($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00 00:00:00";
		
		list($date,$hora) = explode(" ",$fecha);
		list($anho,$mes,$dia) = explode('-',$date);
		
		$salida = $dia." ".$this->obtenerNombreMes($mes).", ".$anho." ".$hora;
		
		return $salida;		
	}	
	
	/**
	 * Cambia el formato de una fecha de YYYY-mm-dd HH:mm:ss a j M, YYYY HH:mm:ss
	 * 
	 * @param  string $fecha Fecha con formato YYYY-mm-dd HH:mm:ss
	 * 
	 * @return string $fecha Fecha con formato dd-mm-YYYY
	 */
	public function cambiarFormatoFecha15($fecha)
	{
		if(!isset($fecha)) $fecha = "0000-00-00 00:00:00";
		
		list($date,$hora) = explode(" ",$fecha);
		list($anho,$mes,$dia) = explode('-',$date);
		
		$salida = $dia." ".$this->obtenerNombreMes2($mes).", ".$anho." ".$hora;
		
		return $salida;		
	}
	
	/**
	 * Unimos las partes para tranformarla en la fecha de nacimiento, en formato YYYY-mm-dd
	 * 
	 * @param $dia_nac  Día de nacimiento
	 * @param $mes_nac  Mes de nacimiento
	 * @param $anho_nac Año de nacimiento
	 * 
	 * @return $fecha_nac Fecha de nacimiento con el formato correcto
	 */
	public function unirFechaNac($dia_nac,$mes_nac,$anho_nac)
	{
		$fecha_nac = $anho_nac."-".$mes_nac."-".$dia_nac;
		return $fecha_nac;
	}
	
	/**
	 * Obtenemos la fecha actual en formato Y-m-d
	 * 
	 * @return $fecha
	 */
	public function obtenerFechaActual()
	{
		$fecha = date('Y-m-d');
		return $fecha;
	}
	
	/**
	 * Crear un select de días para la fecha de nacimiento
	 * 
	 * @return $ar_dias_nac
	 */
	public function obtenerSelectDias()
	{
		// Creamos un array con los días para la fecha de nacimiento
		$ar_dias_nac[0] = "--";
		for ($i=1;$i<=31;$i++)
		{
			$ar_dias_nac[$i] = $this->agregarCeros($i);
		}
		
		// Array con los días para la fecha de nacimiento
		return $ar_dias_nac;
	}

	/**
	 * Crear un select de meses para la fecha de nacimiento
	 * 
	 * @return $ar_meses_nac
	 */
	public function obtenerSelectMeses()
	{
		// Creamos un array con los meses para la fecha de nacimiento
		$ar_meses_nac[0] = "--";
		for ($i=1;$i<=12;$i++)
		{
			$ar_meses_nac[$i] = $this->agregarCeros($i);
		}
		
		// Array con los meses para la fecha de nacimiento
		return $ar_meses_nac;
	}

	/**
	 * Crear un select de anhos para la fecha de nacimiento
	 * 
	 * @return $ar_anhos_nac
	 */
	public function obtenerSelectAnhos()
	{
		// Creamos un array con los anhos para la fecha de nacimiento
		$ar_anhos_nac[0] = "----";
		for ($i=1900;$i<2009;$i++)
		{
			$ar_anhos_nac[$i] = $i;
		}
		
		// Array con los anhos para la fecha de nacimiento
		return $ar_anhos_nac;
	}

	/**
	 * Agrega ceros a las fechas
	 * 
	 * @param  integer $numero Numero sin ceros delante
	 * 
	 * @return integer $numero Numero con ceros delante
	 */
	public function agregarCeros($numero)
	{
		if ($numero == 1)
		{
			$numero = "01";
		}
		elseif($numero == 2)
		{
			$numero = "02";
		}
		elseif($numero == 3)
		{
			$numero = "03";
		}
		elseif($numero == 4)
		{
			$numero ="04";
		}
		elseif($numero == 5)
		{
			$numero = "05";
		}
		elseif($numero == 6)
		{
			$numero = "06";
		}
		elseif($numero == 7)
		{
			$numero = "07";
		}
		elseif($numero == 8)
		{
			$numero = "08";
		}
		elseif($numero == 9)
		{
			$numero = "09";
		}
		else
		{
			return $numero;
		}
		
		return $numero;
	}
	
	/**
	 * Devuelve el nombre del mes segun el numero de mes que le introduces
	 * 
	 * @param  integer $month Representacion numerica de un mes, sin ceros iniciales(1 a 12)
	 * 
	 * @return string  Nombre del mes
	 */
	public function obtenerNombreMes($month)
	{
		$month = ($month - 1) % 12 + 1;
		switch($month) {
			case 1:  return __('Enero');break;
			case 2:  return __('Febrero');break;
			case 3:  return __('Marzo');break;
			case 4:  return __('Abril');break;
			case 5:  return __('Mayo');break;
			case 6:  return __('Junio');break;
			case 7:  return __('Julio');break;
			case 8:  return __('Agosto');break;
			case 9:  return __('Septiembre');break;
			case 10: return __('Octubre');break;
			case 11: return __('Noviembre');break;
			case 12: return __('Diciembre');break;
		}
	}
	
	/**
	 * Devuelve el nombre del mes segun el numero de mes que le introduces
	 * 
	 * @param  integer $month Representacion numerica de un mes, sin ceros iniciales(1 a 12)
	 * 
	 * @return string  Nombre del mes
	 */
	public function obtenerNombreMes2($month)
	{
		$month = ($month - 1) % 12 + 1;
		switch($month) {
			case 1:  return 'Enero';break;
			case 2:  return 'Febrero';break;
			case 3:  return 'Marzo';break;
			case 4:  return 'Abril';break;
			case 5:  return 'Mayo';break;
			case 6:  return 'Junio';break;
			case 7:  return 'Julio';break;
			case 8:  return 'Agosto';break;
			case 9:  return 'Septiembre';break;
			case 10: return 'Octubre';break;
			case 11: return 'Noviembre';break;
			case 12: return 'Diciembre';break;
		}
	}
	
	/**
	 * Devuelve el nombre del dia de la semana
	 * 
	 * @param  integer $day Dia en numero de la semana, 1 (para Lunes) a 7 (para Domingo) 
	 * 
	 * @return string  Nombre del dia de la semana
	 */
	public function obtenerNombreDia($day)
	{
		switch($day) {
			case 1:  return __('Lunes');break;
			case 2:  return __('Martes');break;
			case 3:  return __('Miércoles');break;
			case 4:  return __('Jueves');break;
			case 5:  return __('Viernes');break;
			case 6:  return __('Sábado');break;
			case 7:  return __('Domingo');break;
		}
	}
	
	/**
	 * Devuelve la abreviatura del mes segun el numero de mes
	 * 
	 * @param  integer $month Numero del mes
	 * 
	 * @return string  Nombre del mes en abreviatura
	 */
	public function obtenerAbrNombreMes($month)
	{
		$month = ($month - 1) % 12 + 1;
		switch($month) {
			case 1:  return __('Ene');break;
			case 2:  return __('Feb');break;
			case 3:  return __('Mar');break;
			case 4:  return __('Abr');break;
			case 5:  return __('May');break;
			case 6:  return __('Jun');break;
			case 7:  return __('Jul');break;
			case 8:  return __('Ago');break;
			case 9:  return __('Sep');break;
			case 10: return __('Oct');break;
			case 11: return __('Nov');break;
			case 12: return __('Dic');break;
		}
	}
	
	/**
	 * Devuelve una cadena en español con la abreviatura de los dias de la semana
	 * 
	 * @param  string $cadena  Cadena abreviada de los dias de la semana en ingles
	 * 
	 * @return string $cadena2 Cadena abreviada de los dias de la semana en español
	 */
	public function obtenerCadenaAbrevDiasEsp($cadena)
	{
		$temporal = array();
		$cadena = explode("-", $cadena);
		foreach($cadena as $cad)
		{
			switch($cad) {
				case "Mon": array_push($temporal,"Lun");break;
				case "Tue": array_push($temporal,"Mar");break;
				case "Wed": array_push($temporal,"Mie");break;
				case "Thu": array_push($temporal,"Jue");break;
				case "Fri": array_push($temporal,"Vie");break;
				case "Sat": array_push($temporal,"Sab");break;
				case "Sun": array_push($temporal,"Dom");break;
			}
		} 		
		$cadena2 = implode("-",$temporal);
		return $cadena2;
	}
	
	/**
	 * Devuelve una cadena con los dias de la semana en ingles
	 * 
	 * @param  string $cadena  Cadena abreviada de los dias en ingles
	 * 
	 * @return string $cadena2 Cadena con los dias en ingles
	 */
	public function obtenerCadenaDiasEng($cadena)
	{
		$temporal = array();
		$cadena = explode("-", $cadena);
		foreach($cadena as $cad)
		{
			switch($cad) {
				case "Mon": array_push($temporal,"Monday");break;
				case "Tue": array_push($temporal,"Tuesday");break;
				case "Wed": array_push($temporal,"Wednesday");break;
				case "Thu": array_push($temporal,"Thursday");break;
				case "Fri": array_push($temporal,"Friday");break;
				case "Sat": array_push($temporal,"Saturday");break;
				case "Sun": array_push($temporal,"Sunday");break;
			}
		} 		
		$cadena2 = implode("-",$temporal);
		return $cadena2;
	}	
	
	/**
	 * Devuelve el numero del dia de la semana correspondiente al primer dia del mes
	 * 
	 * @param integer $month Numero de mes
	 * @param integer $year  Numero de anho
	 * 
	 * @return integer Numero del dia de la semana(1, lunes, al 7, domingo)
	 */
	public static function day_of_first($month, $year)
	{
		return date('N', mktime(0, 0, 0, $month, 1, $year));
	}

	/**
	 *  Devuelve el numero de dias del mes
	 * 
	 * @param integer $month Numero de mes
	 * @param integer $year  Numero de anho
	 * 
	 * @return integer Numero de dias del mes(28 a 31)
	 */
	public static function days_in_month($month, $year)
	{
		return date('t', mktime(0, 0, 0, $month, 1, $year));
	}
	
	/**
	 * Devuelve el numero de semanas del mes
	 * 
	 * @param integer $month Numero de mes
	 * @param integer $year  Numero de anho
	 * 
	 * @return integer Numero de semanas
	 */ 
	public static function weeks_in_month($month, $year)
	{
		return ceil((UtilsCalendario::days_in_month($month, $year) + (7 + UtilsCalendario::day_of_first($month, $year) - 1) % 7) / 7);
	}	
	
	/**
	 * Obtener las fechas de la semana segun la fecha actual
	 * 
	 * @param  integer $year  Anho actual
	 * @param  integer $month Mes actual
	 * @param  integer $day   Dia actual
	 * 
	 * @return array   $dias  Array con las fechas
	 */
	public static function obtener_dia_semana($year,$month,$day)
	{
		$primer_dia = mktime(0,0,0,$month,$day,$year);
		$ultimo_dia = mktime(0,0,0,$month,$day,$year);
		
		while(date("w",$primer_dia)!=1){
			$primer_dia -= 3600;
		}
		while(date("w",$ultimo_dia)!=0){
			$ultimo_dia += 3600;
		}
		$dias = array();
		for($i=0;$i<7;$i++)
		{			
			array_push($dias,date("Y-m-d",strtotime ("+".$i."days",$primer_dia)));
		}

		return $dias;
	}
	
	/**
	 * Obtener el dia siguiente
	 * 
	 * @param integer $year
	 * @param integer $month
	 * @param integer $day
	 * 
	 * @return $fecha
	 */
	public static function obtener_dia_siguiente($year,$month,$day)
	{
		$fecha_unix = mktime(0,0,0,$month,$day,$year);

		$fecha = date("Y-m-d",strtotime ("+1 day",$fecha_unix));
		
		return $fecha;
	}
	
	/**
	 * Obtener el dia anterior
	 * 
	 * @param integer $year
	 * @param integer $month
	 * @param integer $day
	 * 
	 * @return $fecha
	 */
	public static function obtener_dia_anterior($year,$month,$day)
	{
		$fecha_unix = mktime(0,0,0,$month,$day,$year);

		$fecha = date("Y-m-d",strtotime ("-1 day",$fecha_unix));
		
		return $fecha;
	}
	
	/**
	 * Obtener la semana siguiente
	 * 
	 * @param integer $year
	 * @param integer $month
	 * @param integer $day
	 * 
	 * @return $fecha
	 */
	public static function obtener_semana_siguiente($year,$month,$day)
	{
		$fecha_unix = mktime(0,0,0,$month,$day,$year);

		$fecha = date("Y-m-d",strtotime ("+1 week",$fecha_unix));
		
		return $fecha;
	}
	
	/**
	 * Obtener la semana anterior
	 * 
	 * @param integer $year
	 * @param integer $month
	 * @param integer $day
	 * 
	 * @return $fecha
	 */
	public static function obtener_semana_anterior($year,$month,$day)
	{
		$fecha_unix = mktime(0,0,0,$month,$day,$year);

		$fecha = date("Y-m-d",strtotime ("-1 week",$fecha_unix));
		
		return $fecha;
	}
	
	/**
	 * 
	 * Agrega tiempo (años, meses, dias, horas, minutos, segundos) a una fecha especifica
	 * @param string $date Fecha para sumar
	 * @param string $dd Dia
	 * @param string $mm Mes
	 * @param string $yy Año
	 * @param string $hh Hora
	 * @param string $mn Minutos
	 * @param string $ss Segundos
	 */
	public function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0)
	{
		$date_r = getdate(strtotime($date));
		$date_result = date("Y-m-d H:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
		return $date_result;
	}
	
	/**
	 * Obtenemos la fecha mayor. Si el resultado es mayor que cero la $fecha1 es mayor que la $fecha2
	 * 
	 * @param datetime $fecha1 Fecha con formato Y-m-d H:i:s
	 * @param datetime $fecha2 Fecha con formato Y-m-d H:i:s
	 * 
	 * @param boolean TRUE si la $fecha1 es mayor que la $fecha2
	 * 
	 */
	public function obtenerFechaMayor($fecha1, $fecha2)
	{
		list($data1, $hour1) = explode(" ",$fecha1);
		list($year1, $mes1, $dia1) = explode("-",$data1);
		list($hora1, $minuto1, $segundo1) = explode(":",$hour1);
		
		list($data2, $hour2) = explode(" ",$fecha2);
		list($year2, $mes2, $dia2) = explode("-",$data2);
		list($hora2, $minuto2, $segundo2) = explode(":",$hour2); 

		// Calculamos timestamp de las dos fechas 
		$timestamp1 = mktime($hora1,$minuto1,$segundo1,$mes1,$dia1,$year1); 
		$timestamp2 = mktime($hora2,$minuto2,$segundo2,$mes2,$dia2,$year2); 
		
		// Resto a una fecha la otra 
		$segundos_diferencia = $timestamp1 - $timestamp2;
		
		if($segundos_diferencia >= 0)
		{
			return true;
		}
		else
		{
			return false;
		} 
	}
}
?>