<?php



class ConfiguracionTareaProgramadaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ConfiguracionTareaProgramadaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('configuracion_tarea_programada');
		$tMap->setPhpName('ConfiguracionTareaProgramada');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_CONFIGURACION', 'IdConfiguracion', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TIEMPO_REPETICION', 'TiempoRepeticion', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECHA_ULTIMA_ACTUALIZACION', 'FechaUltimaActualizacion', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 