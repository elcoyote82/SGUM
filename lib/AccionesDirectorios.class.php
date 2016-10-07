<?php
/**
 * Clase para las funciones con Directorios
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesDirectorios.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesDirectorios 
{
    /**
     * Constructor de la clas AccionesDirectorios
     */
	public function __construct()
	{								
	}
	
	/**
	 * Obtener el directorio
	 * 
	 * @param  string $path Ruta
	 * 
	 * @return string $dir Directorio
	 */
	public function getdir($path)
	{
		$i = strpos($path,"\\");
		if ($i === false)
		{
			$dir = ".";
		}
		else
		{
			$dir = substr($path,0,$i);
		}
		return $dir;
	}
	
	/**
	 * Obtiene un escaneo del directorio
	 * 
	 * @param  string $path Ruta
	 * 
	 * @return string $ar_files Array con los archivos del directorio
	 */
	public function my_scandir($path)
	{
		$d = opendir($path);
		$ar_files = array();
		
		if ($d !== false)
		{
			while(($file=readdir($d))!== false)
			{
				if ((strcmp($file,".")) and (strcmp($file,"..")))
				array_push($ar_files,$file);
			}
			closedir($d);
		}
		return $ar_files;
	}
	
	/**
	 * Limpiar la ruta de Directorios Vacios de manera Recursiva
	 * 
	 * @param  string $path Ruta
	 */
	public function limpiarDirectoriosVaciosRecursivo($path)
	{
		$content = my_scandir($path);
		foreach($content as $s)
		{
			$subdir = $path."/".$s;
			if (is_dir($subdir)) limpiarDirectoriosVaciosRecursivo($subdir);
		}
		rmdir($path);
	}
	
	/**
	 * Limpiar Directorios Vacios
	 * 
	 * @param  string $path Ruta
	 */
	public function limpiar_directorios_vacios($path)
	{
		$content = my_scandir($path);
		foreach($content as $s)
		{
			$subdir = $path."/".$s;
			if (is_dir($subdir)) limpiar_directorios_vacios_recursivo($subdir);
		}
	}
	
	/**
	 * Rmdir R recursivo
	 * 
	 * @param  string $path Ruta
	 */
	public function rmdir_r_recursivo($path)
	{
		$content = my_scandir($path);
		foreach($content as $s)
		{
			$x = $path."/".$s;
			if (is_dir($x)) rmdir_r_recursivo($x);
			else unlink($x);
		}
		rmdir($path);
	}

	/**
	 * Rmdir
	 * 
	 * @param  string $path Ruta
	 * 
	 * @return TRUE OR FALSE
	 */
	public function rmdir_r($path)
	{
		if (is_dir($path))
		{
			$content = my_scandir($path);
			foreach($content as $s)
			{
				$x = $path."/".$s;
				if (is_dir($x)) rmdir_r_recursivo($x);
				else unlink($x);
			}
			
			return rmdir($path);
		}
		else
		{
			return unlink($path);
		}
	}
	
	/**
	 * Crear un directorio
	 * 
	 * @param  string $path Ruta
	 * @param  string $mode Modo
	 */
	public function mkdir_r($path,$mode)
	{
		$lista = split('/',$path);
		$path2 = "";
		
		foreach($lista as $item)
		{
			$path2 = $path2.$item."/";
			if (!file_exists($path2)) mkdir($path2);
			elseif (!is_dir($path2)) return false;
		}
		
		return chmod($path,$mode);
		//return true;
	}
	
	/**
	 * Renombar
	 * 
	 * @param  string $path Ruta
	 * 
	 * @return TRUE OR FALSE
	 */
	 public function rename($path,$path_new)
	 {
	 	return rename($path,$path_new);
	 }	
}
?>