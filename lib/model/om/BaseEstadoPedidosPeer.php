<?php


abstract class BaseEstadoPedidosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'estado_pedidos';

	
	const CLASS_DEFAULT = 'lib.model.EstadoPedidos';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ESTADO_PEDIDO = 'estado_pedidos.ID_ESTADO_PEDIDO';

	
	const ESTADO_PEDIDO = 'estado_pedidos.ESTADO_PEDIDO';

	
	const CREATED_AT = 'estado_pedidos.CREATED_AT';

	
	const UPDATED_AT = 'estado_pedidos.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoPedido', 'EstadoPedido', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EstadoPedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ESTADO_PEDIDO, EstadoPedidosPeer::CREATED_AT, EstadoPedidosPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_pedido', 'estado_pedido', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoPedido' => 0, 'EstadoPedido' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, ),
		BasePeer::TYPE_COLNAME => array (EstadoPedidosPeer::ID_ESTADO_PEDIDO => 0, EstadoPedidosPeer::ESTADO_PEDIDO => 1, EstadoPedidosPeer::CREATED_AT => 2, EstadoPedidosPeer::UPDATED_AT => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_pedido' => 0, 'estado_pedido' => 1, 'created_at' => 2, 'updated_at' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EstadoPedidosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EstadoPedidosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EstadoPedidosPeer::getTableMap();
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
		return str_replace(EstadoPedidosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$criteria->addSelectColumn(EstadoPedidosPeer::ESTADO_PEDIDO);

		$criteria->addSelectColumn(EstadoPedidosPeer::CREATED_AT);

		$criteria->addSelectColumn(EstadoPedidosPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(estado_pedidos.ID_ESTADO_PEDIDO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT estado_pedidos.ID_ESTADO_PEDIDO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstadoPedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstadoPedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EstadoPedidosPeer::doSelectRS($criteria, $con);
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
		$objects = EstadoPedidosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EstadoPedidosPeer::populateObjects(EstadoPedidosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EstadoPedidosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EstadoPedidosPeer::getOMClass();
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
		return EstadoPedidosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EstadoPedidosPeer::ID_ESTADO_PEDIDO); 

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
			$comparison = $criteria->getComparison(EstadoPedidosPeer::ID_ESTADO_PEDIDO);
			$selectCriteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, $criteria->remove(EstadoPedidosPeer::ID_ESTADO_PEDIDO), $comparison);

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
			$affectedRows += EstadoPedidosPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(EstadoPedidosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstadoPedidosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EstadoPedidos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += EstadoPedidosPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = EstadoPedidosPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Pedidos.php';

						$c = new Criteria();
			
			$c->add(PedidosPeer::ID_ESTADO_PEDIDO, $obj->getIdEstadoPedido());
			$affectedRows += PedidosPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(EstadoPedidos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstadoPedidosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstadoPedidosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstadoPedidosPeer::DATABASE_NAME, EstadoPedidosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstadoPedidosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EstadoPedidosPeer::DATABASE_NAME);

		$criteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, $pk);


		$v = EstadoPedidosPeer::doSelect($criteria, $con);

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
			$criteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, $pks, Criteria::IN);
			$objs = EstadoPedidosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEstadoPedidosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EstadoPedidosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EstadoPedidosMapBuilder');
}
