<?php



class EntradasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EntradasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('entradas');
		$tMap->setPhpName('Entradas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ENTRADA', 'IdEntrada', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_ENTRADA', 'IdMd5Entrada', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_PEDIDO', 'IdPedido', 'int', CreoleTypes::INTEGER, 'pedidos', 'ID_PEDIDO', true, null);

		$tMap->addForeignKey('ID_TRANSPORTE_CONDUCTOR', 'IdTransporteConductor', 'int', CreoleTypes::INTEGER, 'transporte_conductores', 'ID_TRANSPORTE_CONDUCTOR', true, null);

		$tMap->addForeignKey('ID_ESTADO_ENTRADA', 'IdEstadoEntrada', 'int', CreoleTypes::INTEGER, 'estado_entradas', 'ID_ESTADO_ENTRADA', true, null);

		$tMap->addColumn('NUM_ENTRADA', 'NumEntrada', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 