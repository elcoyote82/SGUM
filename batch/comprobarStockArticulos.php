<?php

/**
 * Script que comprueba si los articulos están bajos de existencias
 *
 * @package    SGUM
 * @subpackage batch
 * @name       comprobarStockArticulos.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */

define('SF_ROOT_DIR',    realpath(dirname(__file__).'/..'));
define('SF_APP',         'panel');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       1);

require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();


// batch process here

// Obtenemos un objeto de la clase Articulos
$acc_articulos = new AccionesArticulos();

// Comprobamos la fecha de la ultima actualizacion
$actualizamos = $acc_articulos->comprobarUltimaActualizacionStock();

if($actualizamos)
{
	// Comprobamos el Stock de los Articulos
	$stock_actualizado = $acc_articulos->comprobarStockArticulos();
}

?>