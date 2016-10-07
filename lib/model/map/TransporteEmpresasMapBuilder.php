<?php



class TransporteEmpresasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TransporteEmpresasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('transporte_empresas');
		$tMap->setPhpName('TransporteEmpresas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_TRANSPORTE_EMPRESA', 'IdTransporteEmpresa', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_TRANSPORTE_EMPRESA', 'IdMd5TransporteEmpresa', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CIF_NIF', 'CifNif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('POBLACION', 'Poblacion', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('PROVINCIA', 'Provincia', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('CP', 'Cp', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('TELEFONO2', 'Telefono2', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MOVIL', 'Movil', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('WEB', 'Web', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BORRADO', 'Borrado', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 