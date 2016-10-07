<?php



class EstadoEntradasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadoEntradasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('estado_entradas');
		$tMap->setPhpName('EstadoEntradas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ESTADO_ENTRADA', 'IdEstadoEntrada', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTADO_ENTRADA', 'EstadoEntrada', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 