<?php


abstract class BaseEstadoUbicacionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'estado_ubicaciones';

	
	const CLASS_DEFAULT = 'lib.model.EstadoUbicaciones';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ESTADO_UBICACION = 'estado_ubicaciones.ID_ESTADO_UBICACION';

	
	const ESTADO_UBICACION = 'estado_ubicaciones.ESTADO_UBICACION';

	
	const CREATED_AT = 'estado_ubicaciones.CREATED_AT';

	
	const UPDATED_AT = 'estado_ubicaciones.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoUbicacion', 'EstadoUbicacion', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EstadoUbicacionesPeer::ID_ESTADO_UBICACION, EstadoUbicacionesPeer::ESTADO_UBICACION, EstadoUbicacionesPeer::CREATED_AT, EstadoUbicacionesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_ubicacion', 'estado_ubicacion', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoUbicacion' => 0, 'EstadoUbicacion' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, ),
		BasePeer::TYPE_COLNAME => array (EstadoUbicacionesPeer::ID_ESTADO_UBICACION => 0, EstadoUbicacionesPeer::ESTADO_UBICACION => 1, EstadoUbicacionesPeer::CREATED_AT => 2, EstadoUbicacionesPeer::UPDATED_AT => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_ubicacion' => 0, 'estado_ubicacion' => 1, 'created_at' => 2, 'updated_at' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EstadoUbicacionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EstadoUbicacionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EstadoUbicacionesPeer::getTableMap();
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
		return str_replace(EstadoUbicacionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstadoUbicacionesPeer::ID_ESTADO_UBICACION);

		$criteria->addSelectColumn(EstadoUbicacionesPeer::ESTADO_UBICACION);

		$criteria->addSelectColumn(EstadoUbicacionesPeer::CREATED_AT);

		$criteria->addSelectColumn(EstadoUbicacionesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(estado_ubicaciones.ID_ESTADO_UBICACION)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT estado_ubicaciones.ID_ESTADO_UBICACION)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstadoUbicacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstadoUbicacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EstadoUbicacionesPeer::doSelectRS($criteria, $con);
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
		$objects = EstadoUbicacionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EstadoUbicacionesPeer::populateObjects(EstadoUbicacionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EstadoUbicacionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EstadoUbicacionesPeer::getOMClass();
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
		return EstadoUbicacionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EstadoUbicacionesPeer::ID_ESTADO_UBICACION); 

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
			$comparison = $criteria->getComparison(EstadoUbicacionesPeer::ID_ESTADO_UBICACION);
			$selectCriteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, $criteria->remove(EstadoUbicacionesPeer::ID_ESTADO_UBICACION), $comparison);

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
			$affectedRows += EstadoUbicacionesPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(EstadoUbicacionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstadoUbicacionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EstadoUbicaciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += EstadoUbicacionesPeer::doOnDeleteCascade($criteria, $con);
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, Connection $con)
	{
				$affectedRows = 0;

				$objects = EstadoUbicacionesPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Ubicaciones.php';

						$c = new Criteria();
			
			$c->add(UbicacionesPeer::ID_ESTADO_UBICACION, $obj->getIdEstadoUbicacion());
			$affectedRows += UbicacionesPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(EstadoUbicaciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstadoUbicacionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstadoUbicacionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstadoUbicacionesPeer::DATABASE_NAME, EstadoUbicacionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstadoUbicacionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EstadoUbicacionesPeer::DATABASE_NAME);

		$criteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, $pk);


		$v = EstadoUbicacionesPeer::doSelect($criteria, $con);

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
			$criteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, $pks, Criteria::IN);
			$objs = EstadoUbicacionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEstadoUbicacionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EstadoUbicacionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EstadoUbicacionesMapBuilder');
}
