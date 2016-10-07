<?php



class ConfiguracionNumerosAlbaranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ConfiguracionNumerosAlbaranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('configuracion_numeros_albaran');
		$tMap->setPhpName('ConfiguracionNumerosAlbaran');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_CONFIGURACION_NUM_ALBARAN', 'IdConfiguracionNumAlbaran', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMERO_ALBARAN', 'NumeroAlbaran', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPO_INFORME', 'TipoInforme', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 