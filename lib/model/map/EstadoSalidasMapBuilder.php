<?php



class EstadoSalidasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadoSalidasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('estado_salidas');
		$tMap->setPhpName('EstadoSalidas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ESTADO_SALIDA', 'IdEstadoSalida', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTADO_SALIDA', 'EstadoSalida', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 