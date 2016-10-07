<?php


abstract class BaseSalidasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'salidas';

	
	const CLASS_DEFAULT = 'lib.model.Salidas';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_SALIDA = 'salidas.ID_SALIDA';

	
	const ID_MD5_SALIDA = 'salidas.ID_MD5_SALIDA';

	
	const ID_VENTA = 'salidas.ID_VENTA';

	
	const ID_TRANSPORTE_CONDUCTOR = 'salidas.ID_TRANSPORTE_CONDUCTOR';

	
	const ID_ESTADO_SALIDA = 'salidas.ID_ESTADO_SALIDA';

	
	const NUM_SALIDA = 'salidas.NUM_SALIDA';

	
	const CREATED_AT = 'salidas.CREATED_AT';

	
	const UPDATED_AT = 'salidas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdSalida', 'IdMd5Salida', 'IdVenta', 'IdTransporteConductor', 'IdEstadoSalida', 'NumSalida', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (SalidasPeer::ID_SALIDA, SalidasPeer::ID_MD5_SALIDA, SalidasPeer::ID_VENTA, SalidasPeer::ID_TRANSPORTE_CONDUCTOR, SalidasPeer::ID_ESTADO_SALIDA, SalidasPeer::NUM_SALIDA, SalidasPeer::CREATED_AT, SalidasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_salida', 'id_md5_salida', 'id_venta', 'id_transporte_conductor', 'id_estado_salida', 'num_salida', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdSalida' => 0, 'IdMd5Salida' => 1, 'IdVenta' => 2, 'IdTransporteConductor' => 3, 'IdEstadoSalida' => 4, 'NumSalida' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (SalidasPeer::ID_SALIDA => 0, SalidasPeer::ID_MD5_SALIDA => 1, SalidasPeer::ID_VENTA => 2, SalidasPeer::ID_TRANSPORTE_CONDUCTOR => 3, SalidasPeer::ID_ESTADO_SALIDA => 4, SalidasPeer::NUM_SALIDA => 5, SalidasPeer::CREATED_AT => 6, SalidasPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_salida' => 0, 'id_md5_salida' => 1, 'id_venta' => 2, 'id_transporte_conductor' => 3, 'id_estado_salida' => 4, 'num_salida' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SalidasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SalidasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SalidasPeer::getTableMap();
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
		return str_replace(SalidasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SalidasPeer::ID_SALIDA);

		$criteria->addSelectColumn(SalidasPeer::ID_MD5_SALIDA);

		$criteria->addSelectColumn(SalidasPeer::ID_VENTA);

		$criteria->addSelectColumn(SalidasPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addSelectColumn(SalidasPeer::ID_ESTADO_SALIDA);

		$criteria->addSelectColumn(SalidasPeer::NUM_SALIDA);

		$criteria->addSelectColumn(SalidasPeer::CREATED_AT);

		$criteria->addSelectColumn(SalidasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(salidas.ID_SALIDA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT salidas.ID_SALIDA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SalidasPeer::doSelectRS($criteria, $con);
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
		$objects = SalidasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SalidasPeer::populateObjects(SalidasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SalidasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SalidasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTransporteConductores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstadoSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VentasPeer::addSelectColumns($c);

		$c->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSalidas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTransporteConductores(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TransporteConductoresPeer::addSelectColumns($c);

		$c->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TransporteConductoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSalidas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstadoSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstadoSalidasPeer::addSelectColumns($c);

		$c->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstadoSalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstadoSalidas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSalidas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$criteria->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
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

		SalidasPeer::addSelectColumns($c);
		$startcol2 = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TransporteConductoresPeer::NUM_COLUMNS;

		EstadoSalidasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstadoSalidasPeer::NUM_COLUMNS;

		$c->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$c->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$c->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSalidas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1);
			}


					
			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSalidas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initSalidass();
				$obj3->addSalidas($obj1);
			}


					
			$omClass = EstadoSalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstadoSalidas(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSalidas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initSalidass();
				$obj4->addSalidas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTransporteConductores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$criteria->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstadoSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalidasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalidasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$criteria->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$rs = SalidasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol2 = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TransporteConductoresPeer::NUM_COLUMNS;

		EstadoSalidasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoSalidasPeer::NUM_COLUMNS;

		$c->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$c->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1);
			}

			$omClass = EstadoSalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoSalidas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSalidass();
				$obj3->addSalidas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTransporteConductores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol2 = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		EstadoSalidasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoSalidasPeer::NUM_COLUMNS;

		$c->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$c->addJoin(SalidasPeer::ID_ESTADO_SALIDA, EstadoSalidasPeer::ID_ESTADO_SALIDA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1);
			}

			$omClass = EstadoSalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoSalidas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSalidass();
				$obj3->addSalidas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadoSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SalidasPeer::addSelectColumns($c);
		$startcol2 = (SalidasPeer::NUM_COLUMNS - SalidasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TransporteConductoresPeer::NUM_COLUMNS;

		$c->addJoin(SalidasPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$c->addJoin(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSalidass();
				$obj2->addSalidas($obj1);
			}

			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSalidas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSalidass();
				$obj3->addSalidas($obj1);
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
		return SalidasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SalidasPeer::ID_SALIDA); 

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
			$comparison = $criteria->getComparison(SalidasPeer::ID_SALIDA);
			$selectCriteria->add(SalidasPeer::ID_SALIDA, $criteria->remove(SalidasPeer::ID_SALIDA), $comparison);

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
			$affectedRows += SalidasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(SalidasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SalidasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Salidas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SalidasPeer::ID_SALIDA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += SalidasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = SalidasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/AlbaranesSalida.php';

						$c = new Criteria();
			
			$c->add(AlbaranesSalidaPeer::ID_SALIDA, $obj->getIdSalida());
			$affectedRows += AlbaranesSalidaPeer::doDelete($c, $con);

			include_once 'lib/model/ArticulosXSalida.php';

						$c = new Criteria();
			
			$c->add(ArticulosXSalidaPeer::ID_SALIDA, $obj->getIdSalida());
			$affectedRows += ArticulosXSalidaPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Salidas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SalidasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SalidasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SalidasPeer::DATABASE_NAME, SalidasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SalidasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SalidasPeer::DATABASE_NAME);

		$criteria->add(SalidasPeer::ID_SALIDA, $pk);


		$v = SalidasPeer::doSelect($criteria, $con);

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
			$criteria->add(SalidasPeer::ID_SALIDA, $pks, Criteria::IN);
			$objs = SalidasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSalidasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SalidasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SalidasMapBuilder');
}
