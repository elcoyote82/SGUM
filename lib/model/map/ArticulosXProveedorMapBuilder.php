<?php



class ArticulosXProveedorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosXProveedorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos_x_proveedor');
		$tMap->setPhpName('ArticulosXProveedor');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO_X_PROVEEDOR', 'IdArticuloXProveedor', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

		$tMap->addForeignKey('ID_PROVEEDOR', 'IdProveedor', 'int', CreoleTypes::INTEGER, 'proveedores', 'ID_PROVEEDOR', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 