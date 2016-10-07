<?php



class UbicacionesXArticuloMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UbicacionesXArticuloMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('ubicaciones_x_articulo');
		$tMap->setPhpName('UbicacionesXArticulo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_UBICACIONES_X_ARTICULO', 'IdUbicacionesXArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_UBICACION', 'IdUbicacion', 'int', CreoleTypes::INTEGER, 'ubicaciones', 'ID_UBICACION', true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

	} 
} 