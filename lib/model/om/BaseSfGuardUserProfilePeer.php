<?php


abstract class BaseSfGuardUserProfilePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_user_profile';

	
	const CLASS_DEFAULT = 'lib.model.SfGuardUserProfile';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_PROFILE = 'sf_guard_user_profile.ID_PROFILE';

	
	const ID_MD5 = 'sf_guard_user_profile.ID_MD5';

	
	const USER_ID = 'sf_guard_user_profile.USER_ID';

	
	const NOMBRE = 'sf_guard_user_profile.NOMBRE';

	
	const APELLIDOS = 'sf_guard_user_profile.APELLIDOS';

	
	const TELEFONO = 'sf_guard_user_profile.TELEFONO';

	
	const EMAIL = 'sf_guard_user_profile.EMAIL';

	
	const IMAGEN = 'sf_guard_user_profile.IMAGEN';

	
	const IDIOMA = 'sf_guard_user_profile.IDIOMA';

	
	const UPDATED_AT = 'sf_guard_user_profile.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdProfile', 'IdMd5', 'UserId', 'Nombre', 'Apellidos', 'Telefono', 'Email', 'Imagen', 'Idioma', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (SfGuardUserProfilePeer::ID_PROFILE, SfGuardUserProfilePeer::ID_MD5, SfGuardUserProfilePeer::USER_ID, SfGuardUserProfilePeer::NOMBRE, SfGuardUserProfilePeer::APELLIDOS, SfGuardUserProfilePeer::TELEFONO, SfGuardUserProfilePeer::EMAIL, SfGuardUserProfilePeer::IMAGEN, SfGuardUserProfilePeer::IDIOMA, SfGuardUserProfilePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_profile', 'id_md5', 'user_id', 'nombre', 'apellidos', 'telefono', 'email', 'imagen', 'idioma', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdProfile' => 0, 'IdMd5' => 1, 'UserId' => 2, 'Nombre' => 3, 'Apellidos' => 4, 'Telefono' => 5, 'Email' => 6, 'Imagen' => 7, 'Idioma' => 8, 'UpdatedAt' => 9, ),
		BasePeer::TYPE_COLNAME => array (SfGuardUserProfilePeer::ID_PROFILE => 0, SfGuardUserProfilePeer::ID_MD5 => 1, SfGuardUserProfilePeer::USER_ID => 2, SfGuardUserProfilePeer::NOMBRE => 3, SfGuardUserProfilePeer::APELLIDOS => 4, SfGuardUserProfilePeer::TELEFONO => 5, SfGuardUserProfilePeer::EMAIL => 6, SfGuardUserProfilePeer::IMAGEN => 7, SfGuardUserProfilePeer::IDIOMA => 8, SfGuardUserProfilePeer::UPDATED_AT => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id_profile' => 0, 'id_md5' => 1, 'user_id' => 2, 'nombre' => 3, 'apellidos' => 4, 'telefono' => 5, 'email' => 6, 'imagen' => 7, 'idioma' => 8, 'updated_at' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SfGuardUserProfileMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SfGuardUserProfileMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SfGuardUserProfilePeer::getTableMap();
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
		return str_replace(SfGuardUserProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SfGuardUserProfilePeer::ID_PROFILE);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::ID_MD5);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::USER_ID);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::NOMBRE);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::APELLIDOS);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::TELEFONO);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::EMAIL);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::IMAGEN);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::IDIOMA);

		$criteria->addSelectColumn(SfGuardUserProfilePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(sf_guard_user_profile.ID_PROFILE)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user_profile.ID_PROFILE)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
		$objects = SfGuardUserProfilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SfGuardUserProfilePeer::populateObjects(SfGuardUserProfilePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SfGuardUserProfilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SfGuardUserProfilePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = SfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (SfGuardUserProfilePeer::NUM_COLUMNS - SfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(SfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSfGuardUserProfiles();
				$obj2->addSfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = SfGuardUserProfilePeer::doSelectRS($criteria, $con);
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

		SfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (SfGuardUserProfilePeer::NUM_COLUMNS - SfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(SfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSfGuardUserProfile($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSfGuardUserProfiles();
				$obj2->addSfGuardUserProfile($obj1);
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
		return SfGuardUserProfilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SfGuardUserProfilePeer::ID_PROFILE); 

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
			$comparison = $criteria->getComparison(SfGuardUserProfilePeer::ID_PROFILE);
			$selectCriteria->add(SfGuardUserProfilePeer::ID_PROFILE, $criteria->remove(SfGuardUserProfilePeer::ID_PROFILE), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SfGuardUserProfilePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SfGuardUserProfilePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SfGuardUserProfile) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SfGuardUserProfilePeer::ID_PROFILE, (array) $values, Criteria::IN);
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

	
	public static function doValidate(SfGuardUserProfile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SfGuardUserProfilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SfGuardUserProfilePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SfGuardUserProfilePeer::DATABASE_NAME, SfGuardUserProfilePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SfGuardUserProfilePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(SfGuardUserProfilePeer::ID_PROFILE, $pk);


		$v = SfGuardUserProfilePeer::doSelect($criteria, $con);

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
			$criteria->add(SfGuardUserProfilePeer::ID_PROFILE, $pks, Criteria::IN);
			$objs = SfGuardUserProfilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSfGuardUserProfilePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SfGuardUserProfileMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SfGuardUserProfileMapBuilder');
}
