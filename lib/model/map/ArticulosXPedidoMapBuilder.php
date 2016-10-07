<?php



class ArticulosXPedidoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosXPedidoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos_x_pedido');
		$tMap->setPhpName('ArticulosXPedido');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO_X_PEDIDO', 'IdArticuloXPedido', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

		$tMap->addForeignKey('ID_PEDIDO', 'IdPedido', 'int', CreoleTypes::INTEGER, 'pedidos', 'ID_PEDIDO', true, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 