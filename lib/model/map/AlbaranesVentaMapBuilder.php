<?php



class AlbaranesVentaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlbaranesVentaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('albaranes_venta');
		$tMap->setPhpName('AlbaranesVenta');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ALBARAN_VENTA', 'IdAlbaranVenta', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_ALBARAN', 'IdMd5Albaran', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('ID_VENTA', 'IdVenta', 'int', CreoleTypes::INTEGER, 'ventas', 'ID_VENTA', true, null);

		$tMap->addColumn('NUM_ALBARAN_VENTA', 'NumAlbaranVenta', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RUTA_ALBARAN', 'RutaAlbaran', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 