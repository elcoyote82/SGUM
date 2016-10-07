<?php


abstract class BaseTransporteConductoresPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'transporte_conductores';

	
	const CLASS_DEFAULT = 'lib.model.TransporteConductores';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_TRANSPORTE_CONDUCTOR = 'transporte_conductores.ID_TRANSPORTE_CONDUCTOR';

	
	const ID_MD5_TRANSPORTE_CONDUCTOR = 'transporte_conductores.ID_MD5_TRANSPORTE_CONDUCTOR';

	
	const ID_TRANSPORTE_EMPRESA = 'transporte_conductores.ID_TRANSPORTE_EMPRESA';

	
	const NOMBRE = 'transporte_conductores.NOMBRE';

	
	const APELLIDOS = 'transporte_conductores.APELLIDOS';

	
	const TELEFONO = 'transporte_conductores.TELEFONO';

	
	const TELEFONO_TRABAJO = 'transporte_conductores.TELEFONO_TRABAJO';

	
	const TELEFONO_OTRO = 'transporte_conductores.TELEFONO_OTRO';

	
	const MOVIL = 'transporte_conductores.MOVIL';

	
	const OBSERVACIONES = 'transporte_conductores.OBSERVACIONES';

	
	const CREATED_AT = 'transporte_conductores.CREATED_AT';

	
	const UPDATED_AT = 'transporte_conductores.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransporteConductor', 'IdMd5TransporteConductor', 'IdTransporteEmpresa', 'Nombre', 'Apellidos', 'Telefono', 'TelefonoTrabajo', 'TelefonoOtro', 'Movil', 'Observaciones', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, TransporteConductoresPeer::NOMBRE, TransporteConductoresPeer::APELLIDOS, TransporteConductoresPeer::TELEFONO, TransporteConductoresPeer::TELEFONO_TRABAJO, TransporteConductoresPeer::TELEFONO_OTRO, TransporteConductoresPeer::MOVIL, TransporteConductoresPeer::OBSERVACIONES, TransporteConductoresPeer::CREATED_AT, TransporteConductoresPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transporte_conductor', 'id_md5_transporte_conductor', 'id_transporte_empresa', 'nombre', 'apellidos', 'telefono', 'telefono_trabajo', 'telefono_otro', 'movil', 'observaciones', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransporteConductor' => 0, 'IdMd5TransporteConductor' => 1, 'IdTransporteEmpresa' => 2, 'Nombre' => 3, 'Apellidos' => 4, 'Telefono' => 5, 'TelefonoTrabajo' => 6, 'TelefonoOtro' => 7, 'Movil' => 8, 'Observaciones' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR => 0, TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR => 1, TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA => 2, TransporteConductoresPeer::NOMBRE => 3, TransporteConductoresPeer::APELLIDOS => 4, TransporteConductoresPeer::TELEFONO => 5, TransporteConductoresPeer::TELEFONO_TRABAJO => 6, TransporteConductoresPeer::TELEFONO_OTRO => 7, TransporteConductoresPeer::MOVIL => 8, TransporteConductoresPeer::OBSERVACIONES => 9, TransporteConductoresPeer::CREATED_AT => 10, TransporteConductoresPeer::UPDATED_AT => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transporte_conductor' => 0, 'id_md5_transporte_conductor' => 1, 'id_transporte_empresa' => 2, 'nombre' => 3, 'apellidos' => 4, 'telefono' => 5, 'telefono_trabajo' => 6, 'telefono_otro' => 7, 'movil' => 8, 'observaciones' => 9, 'created_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TransporteConductoresMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TransporteConductoresMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TransporteConductoresPeer::getTableMap();
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
		return str_replace(TransporteConductoresPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addSelectColumn(TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR);

		$criteria->addSelectColumn(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA);

		$criteria->addSelectColumn(TransporteConductoresPeer::NOMBRE);

		$criteria->addSelectColumn(TransporteConductoresPeer::APELLIDOS);

		$criteria->addSelectColumn(TransporteConductoresPeer::TELEFONO);

		$criteria->addSelectColumn(TransporteConductoresPeer::TELEFONO_TRABAJO);

		$criteria->addSelectColumn(TransporteConductoresPeer::TELEFONO_OTRO);

		$criteria->addSelectColumn(TransporteConductoresPeer::MOVIL);

		$criteria->addSelectColumn(TransporteConductoresPeer::OBSERVACIONES);

		$criteria->addSelectColumn(TransporteConductoresPeer::CREATED_AT);

		$criteria->addSelectColumn(TransporteConductoresPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(transporte_conductores.ID_TRANSPORTE_CONDUCTOR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT transporte_conductores.ID_TRANSPORTE_CONDUCTOR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TransporteConductoresPeer::doSelectRS($criteria, $con);
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
		$objects = TransporteConductoresPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TransporteConductoresPeer::populateObjects(TransporteConductoresPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TransporteConductoresPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TransporteConductoresPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTransporteEmpresas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);

		$rs = TransporteConductoresPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTransporteEmpresas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol = (TransporteConductoresPeer::NUM_COLUMNS - TransporteConductoresPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TransporteEmpresasPeer::addSelectColumns($c);

		$c->addJoin(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TransporteConductoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TransporteEmpresasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTransporteEmpresas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTransporteConductores($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTransporteConductoress();
				$obj2->addTransporteConductores($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TransporteConductoresPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);

		$rs = TransporteConductoresPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol2 = (TransporteConductoresPeer::NUM_COLUMNS - TransporteConductoresPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TransporteEmpresasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TransporteEmpresasPeer::NUM_COLUMNS;

		$c->addJoin(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TransporteEmpresasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTransporteEmpresas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTransporteConductores($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTransporteConductoress();
				$obj2->addTransporteConductores($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return TransporteConductoresPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR); 

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
			$comparison = $criteria->getComparison(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);
			$selectCriteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, $criteria->remove(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR), $comparison);

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
			$affectedRows += TransporteConductoresPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(TransporteConductoresPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TransporteConductoresPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TransporteConductores) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += TransporteConductoresPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = TransporteConductoresPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Entradas.php';

						$c = new Criteria();
			
			$c->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $obj->getIdTransporteConductor());
			$affectedRows += EntradasPeer::doDelete($c, $con);

			include_once 'lib/model/Salidas.php';

						$c = new Criteria();
			
			$c->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $obj->getIdTransporteConductor());
			$affectedRows += SalidasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(TransporteConductores $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TransporteConductoresPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TransporteConductoresPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TransporteConductoresPeer::DATABASE_NAME, TransporteConductoresPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TransporteConductoresPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TransporteConductoresPeer::DATABASE_NAME);

		$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, $pk);


		$v = TransporteConductoresPeer::doSelect($criteria, $con);

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
			$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, $pks, Criteria::IN);
			$objs = TransporteConductoresPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTransporteConductoresPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TransporteConductoresMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TransporteConductoresMapBuilder');
}
