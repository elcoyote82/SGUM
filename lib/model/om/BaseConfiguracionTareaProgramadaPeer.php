<?php


abstract class BaseConfiguracionTareaProgramadaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'configuracion_tarea_programada';

	
	const CLASS_DEFAULT = 'lib.model.ConfiguracionTareaProgramada';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_CONFIGURACION = 'configuracion_tarea_programada.ID_CONFIGURACION';

	
	const TIEMPO_REPETICION = 'configuracion_tarea_programada.TIEMPO_REPETICION';

	
	const FECHA_ULTIMA_ACTUALIZACION = 'configuracion_tarea_programada.FECHA_ULTIMA_ACTUALIZACION';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdConfiguracion', 'TiempoRepeticion', 'FechaUltimaActualizacion', ),
		BasePeer::TYPE_COLNAME => array (ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION, ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION, ),
		BasePeer::TYPE_FIELDNAME => array ('id_configuracion', 'tiempo_repeticion', 'fecha_ultima_actualizacion', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdConfiguracion' => 0, 'TiempoRepeticion' => 1, 'FechaUltimaActualizacion' => 2, ),
		BasePeer::TYPE_COLNAME => array (ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION => 0, ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION => 1, ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id_configuracion' => 0, 'tiempo_repeticion' => 1, 'fecha_ultima_actualizacion' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ConfiguracionTareaProgramadaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ConfiguracionTareaProgramadaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ConfiguracionTareaProgramadaPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ConfiguracionTareaProgramadaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION);

		$criteria->addSelectColumn(ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION);

		$criteria->addSelectColumn(ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION);

	}

	const COUNT = 'COUNT(configuracion_tarea_programada.ID_CONFIGURACION)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT configuracion_tarea_programada.ID_CONFIGURACION)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConfiguracionTareaProgramadaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConfiguracionTareaProgramadaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ConfiguracionTareaProgramadaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ConfiguracionTareaProgramadaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ConfiguracionTareaProgramadaPeer::populateObjects(ConfiguracionTareaProgramadaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ConfiguracionTareaProgramadaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ConfiguracionTareaProgramadaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ConfiguracionTareaProgramadaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION);
			$selectCriteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, $criteria->remove(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ConfiguracionTareaProgramadaPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ConfiguracionTareaProgramada) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(ConfiguracionTareaProgramada $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ConfiguracionTareaProgramadaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ConfiguracionTareaProgramadaPeer::DATABASE_NAME, ConfiguracionTareaProgramadaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ConfiguracionTareaProgramadaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);

		$criteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, $pk);


		$v = ConfiguracionTareaProgramadaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, $pks, Criteria::IN);
			$objs = ConfiguracionTareaProgramadaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseConfiguracionTareaProgramadaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ConfiguracionTareaProgramadaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ConfiguracionTareaProgramadaMapBuilder');
}
