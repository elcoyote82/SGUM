<?php



class VentasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.VentasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ventas');
		$tMap->setPhpName('Ventas');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_VENTA', 'IdVenta', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_VENTA', 'IdMd5Venta', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_USUARIO', 'IdUsuario', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('ID_CLIENTE', 'IdCliente', 'int', CreoleTypes::INTEGER, 'clientes', 'ID_CLIENTE', true, null);

		$tMap->addForeignKey('ID_ESTADO_VENTA', 'IdEstadoVenta', 'int', CreoleTypes::INTEGER, 'estado_ventas', 'ID_ESTADO_VENTA', true, null);

		$tMap->addColumn('NUM_VENTA', 'NumVenta', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 