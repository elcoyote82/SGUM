<?php


abstract class BaseEstadoVentasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'estado_ventas';

	
	const CLASS_DEFAULT = 'lib.model.EstadoVentas';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ESTADO_VENTA = 'estado_ventas.ID_ESTADO_VENTA';

	
	const ESTADO_VENTA = 'estado_ventas.ESTADO_VENTA';

	
	const CREATED_AT = 'estado_ventas.CREATED_AT';

	
	const UPDATED_AT = 'estado_ventas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoVenta', 'EstadoVenta', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EstadoVentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ESTADO_VENTA, EstadoVentasPeer::CREATED_AT, EstadoVentasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_venta', 'estado_venta', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoVenta' => 0, 'EstadoVenta' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, ),
		BasePeer::TYPE_COLNAME => array (EstadoVentasPeer::ID_ESTADO_VENTA => 0, EstadoVentasPeer::ESTADO_VENTA => 1, EstadoVentasPeer::CREATED_AT => 2, EstadoVentasPeer::UPDATED_AT => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_venta' => 0, 'estado_venta' => 1, 'created_at' => 2, 'updated_at' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EstadoVentasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EstadoVentasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EstadoVentasPeer::getTableMap();
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
		return str_replace(EstadoVentasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstadoVentasPeer::ID_ESTADO_VENTA);

		$criteria->addSelectColumn(EstadoVentasPeer::ESTADO_VENTA);

		$criteria->addSelectColumn(EstadoVentasPeer::CREATED_AT);

		$criteria->addSelectColumn(EstadoVentasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(estado_ventas.ID_ESTADO_VENTA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT estado_ventas.ID_ESTADO_VENTA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstadoVentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstadoVentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EstadoVentasPeer::doSelectRS($criteria, $con);
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
		$objects = EstadoVentasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EstadoVentasPeer::populateObjects(EstadoVentasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EstadoVentasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EstadoVentasPeer::getOMClass();
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
		return EstadoVentasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EstadoVentasPeer::ID_ESTADO_VENTA); 

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
			$comparison = $criteria->getComparison(EstadoVentasPeer::ID_ESTADO_VENTA);
			$selectCriteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, $criteria->remove(EstadoVentasPeer::ID_ESTADO_VENTA), $comparison);

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
			$affectedRows += EstadoVentasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(EstadoVentasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstadoVentasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EstadoVentas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += EstadoVentasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = EstadoVentasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Ventas.php';

						$c = new Criteria();
			
			$c->add(VentasPeer::ID_ESTADO_VENTA, $obj->getIdEstadoVenta());
			$affectedRows += VentasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(EstadoVentas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstadoVentasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstadoVentasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstadoVentasPeer::DATABASE_NAME, EstadoVentasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstadoVentasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EstadoVentasPeer::DATABASE_NAME);

		$criteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, $pk);


		$v = EstadoVentasPeer::doSelect($criteria, $con);

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
			$criteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, $pks, Criteria::IN);
			$objs = EstadoVentasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEstadoVentasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EstadoVentasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EstadoVentasMapBuilder');
}
