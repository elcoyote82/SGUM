<?php



class ArticulosXEntradaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosXEntradaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos_x_entrada');
		$tMap->setPhpName('ArticulosXEntrada');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO_X_ENTRADA', 'IdArticuloXEntrada', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_ENTRADA', 'IdEntrada', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_UBICACION', 'IdUbicacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LOTE', 'Lote', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 