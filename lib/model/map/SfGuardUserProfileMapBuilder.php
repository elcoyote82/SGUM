<?php



class SfGuardUserProfileMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardUserProfileMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_user_profile');
		$tMap->setPhpName('SfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_PROFILE', 'IdProfile', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5', 'IdMd5', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('APELLIDOS', 'Apellidos', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('IMAGEN', 'Imagen', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('IDIOMA', 'Idioma', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 