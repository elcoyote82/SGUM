<?php



class FamiliasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FamiliasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('familias');
		$tMap->setPhpName('Familias');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_FAMILIA', 'IdFamilia', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_FAMILIA', 'IdMd5Familia', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BORRADO', 'Borrado', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 