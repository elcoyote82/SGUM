<?php



class EntradasXArticuloMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EntradasXArticuloMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('entradas_x_articulo');
		$tMap->setPhpName('EntradasXArticulo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ENTRADA_X_ARTICULO', 'IdEntradaXArticulo', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ENTRADA', 'IdEntrada', 'int', CreoleTypes::INTEGER, 'entradas', 'ID_ENTRADA', true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 