<?php



class UbicacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UbicacionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ubicaciones');
		$tMap->setPhpName('Ubicaciones');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_UBICACION', 'IdUbicacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_UBICACION', 'IdMd5Ubicacion', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('ID_ESTADO_UBICACION', 'IdEstadoUbicacion', 'int', CreoleTypes::INTEGER, 'estado_ubicaciones', 'ID_ESTADO_UBICACION', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 