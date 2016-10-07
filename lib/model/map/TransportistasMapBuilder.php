<?php



class TransportistasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TransportistasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('transportistas');
		$tMap->setPhpName('Transportistas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_TRANSPORTISTA', 'IdTransportista', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('APELLIDOS', 'Apellidos', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('EMPRESA', 'Empresa', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 