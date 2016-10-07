<?php



class ArticulosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos');
		$tMap->setPhpName('Articulos');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_ARTICULO', 'IdMd5Articulo', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_FAMILIA', 'IdFamilia', 'int', CreoleTypes::INTEGER, 'familias', 'ID_FAMILIA', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('DATOS_PRODUCTO', 'DatosProducto', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('STOCK', 'Stock', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STOCK_MINIMO', 'StockMinimo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('AVISO_MINIMO', 'AvisoMinimo', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('STOCK_BAJO', 'StockBajo', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('IMAGEN', 'Imagen', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BORRADO', 'Borrado', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 