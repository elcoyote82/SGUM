<?php



class TransporteConductoresMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TransporteConductoresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('transporte_conductores');
		$tMap->setPhpName('TransporteConductores');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_TRANSPORTE_CONDUCTOR', 'IdTransporteConductor', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_TRANSPORTE_CONDUCTOR', 'IdMd5TransporteConductor', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_TRANSPORTE_EMPRESA', 'IdTransporteEmpresa', 'int', CreoleTypes::INTEGER, 'transporte_empresas', 'ID_TRANSPORTE_EMPRESA', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('APELLIDOS', 'Apellidos', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO_TRABAJO', 'TelefonoTrabajo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO_OTRO', 'TelefonoOtro', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MOVIL', 'Movil', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 