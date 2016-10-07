<?php



class SalidasXArticuloMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SalidasXArticuloMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('salidas_x_articulo');
		$tMap->setPhpName('SalidasXArticulo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_SALIDA_X_ARTICULO', 'IdSalidaXArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_SALIDA', 'IdSalida', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 