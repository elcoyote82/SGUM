<?php



class AlbaranesSalidaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlbaranesSalidaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('albaranes_salida');
		$tMap->setPhpName('AlbaranesSalida');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ALBARAN_SALIDA', 'IdAlbaranSalida', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_ALBARAN', 'IdMd5Albaran', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_SALIDA', 'IdSalida', 'int', CreoleTypes::INTEGER, 'salidas', 'ID_SALIDA', true, null);

		$tMap->addForeignKey('ID_VENTA', 'IdVenta', 'int', CreoleTypes::INTEGER, 'ventas', 'ID_VENTA', true, null);

		$tMap->addColumn('NUM_ALBARAN_SALIDA', 'NumAlbaranSalida', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RUTA_ALBARAN', 'RutaAlbaran', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 