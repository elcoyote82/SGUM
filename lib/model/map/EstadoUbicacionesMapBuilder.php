<?php



class EstadoUbicacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadoUbicacionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('estado_ubicaciones');
		$tMap->setPhpName('EstadoUbicaciones');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ESTADO_UBICACION', 'IdEstadoUbicacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTADO_UBICACION', 'EstadoUbicacion', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 