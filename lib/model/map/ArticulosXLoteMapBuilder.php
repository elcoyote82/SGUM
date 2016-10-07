<?php



class ArticulosXLoteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosXLoteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos_x_lote');
		$tMap->setPhpName('ArticulosXLote');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO_X_LOTE', 'IdArticuloXLote', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

		$tMap->addForeignKey('ID_UBICACION', 'IdUbicacion', 'int', CreoleTypes::INTEGER, 'ubicaciones', 'ID_UBICACION', true, null);

		$tMap->addColumn('LOTE', 'Lote', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 