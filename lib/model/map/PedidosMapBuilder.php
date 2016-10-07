<?php



class PedidosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PedidosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pedidos');
		$tMap->setPhpName('Pedidos');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_PEDIDO', 'IdPedido', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_PEDIDO', 'IdMd5Pedido', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_USUARIO', 'IdUsuario', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('ID_PROVEEDOR', 'IdProveedor', 'int', CreoleTypes::INTEGER, 'proveedores', 'ID_PROVEEDOR', true, null);

		$tMap->addForeignKey('ID_ESTADO_PEDIDO', 'IdEstadoPedido', 'int', CreoleTypes::INTEGER, 'estado_pedidos', 'ID_ESTADO_PEDIDO', true, null);

		$tMap->addColumn('NUM_PEDIDO', 'NumPedido', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 