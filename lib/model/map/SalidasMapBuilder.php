<?php



class SalidasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SalidasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('salidas');
		$tMap->setPhpName('Salidas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_SALIDA', 'IdSalida', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_SALIDA', 'IdMd5Salida', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_VENTA', 'IdVenta', 'int', CreoleTypes::INTEGER, 'ventas', 'ID_VENTA', true, null);

		$tMap->addForeignKey('ID_TRANSPORTE_CONDUCTOR', 'IdTransporteConductor', 'int', CreoleTypes::INTEGER, 'transporte_conductores', 'ID_TRANSPORTE_CONDUCTOR', true, null);

		$tMap->addForeignKey('ID_ESTADO_SALIDA', 'IdEstadoSalida', 'int', CreoleTypes::INTEGER, 'estado_salidas', 'ID_ESTADO_SALIDA', true, null);

		$tMap->addColumn('NUM_SALIDA', 'NumSalida', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 