<?php



class ArticulosXSalidaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticulosXSalidaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('articulos_x_salida');
		$tMap->setPhpName('ArticulosXSalida');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ARTICULO_X_SALIDA', 'IdArticuloXSalida', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ARTICULO', 'IdArticulo', 'int', CreoleTypes::INTEGER, 'articulos', 'ID_ARTICULO', true, null);

		$tMap->addForeignKey('ID_SALIDA', 'IdSalida', 'int', CreoleTypes::INTEGER, 'salidas', 'ID_SALIDA', true, null);

		$tMap->addColumn('ID_UBICACION', 'IdUbicacion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LOTE', 'Lote', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 