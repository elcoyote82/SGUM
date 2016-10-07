<?php


abstract class BaseVentasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ventas';

	
	const CLASS_DEFAULT = 'lib.model.Ventas';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_VENTA = 'ventas.ID_VENTA';

	
	const ID_MD5_VENTA = 'ventas.ID_MD5_VENTA';

	
	const ID_USUARIO = 'ventas.ID_USUARIO';

	
	const ID_CLIENTE = 'ventas.ID_CLIENTE';

	
	const ID_ESTADO_VENTA = 'ventas.ID_ESTADO_VENTA';

	
	const NUM_VENTA = 'ventas.NUM_VENTA';

	
	const CREATED_AT = 'ventas.CREATED_AT';

	
	const UPDATED_AT = 'ventas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdVenta', 'IdMd5Venta', 'IdUsuario', 'IdCliente', 'IdEstadoVenta', 'NumVenta', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (VentasPeer::ID_VENTA, VentasPeer::ID_MD5_VENTA, VentasPeer::ID_USUARIO, VentasPeer::ID_CLIENTE, VentasPeer::ID_ESTADO_VENTA, VentasPeer::NUM_VENTA, VentasPeer::CREATED_AT, VentasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_venta', 'id_md5_venta', 'id_usuario', 'id_cliente', 'id_estado_venta', 'num_venta', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdVenta' => 0, 'IdMd5Venta' => 1, 'IdUsuario' => 2, 'IdCliente' => 3, 'IdEstadoVenta' => 4, 'NumVenta' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (VentasPeer::ID_VENTA => 0, VentasPeer::ID_MD5_VENTA => 1, VentasPeer::ID_USUARIO => 2, VentasPeer::ID_CLIENTE => 3, VentasPeer::ID_ESTADO_VENTA => 4, VentasPeer::NUM_VENTA => 5, VentasPeer::CREATED_AT => 6, VentasPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_venta' => 0, 'id_md5_venta' => 1, 'id_usuario' => 2, 'id_cliente' => 3, 'id_estado_venta' => 4, 'num_venta' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/VentasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.VentasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = VentasPeer::getTableMap();
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
		return str_replace(VentasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(VentasPeer::ID_VENTA);

		$criteria->addSelectColumn(VentasPeer::ID_MD5_VENTA);

		$criteria->addSelectColumn(VentasPeer::ID_USUARIO);

		$criteria->addSelectColumn(VentasPeer::ID_CLIENTE);

		$criteria->addSelectColumn(VentasPeer::ID_ESTADO_VENTA);

		$criteria->addSelectColumn(VentasPeer::NUM_VENTA);

		$criteria->addSelectColumn(VentasPeer::CREATED_AT);

		$criteria->addSelectColumn(VentasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ventas.ID_VENTA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ventas.ID_VENTA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = VentasPeer::doSelectRS($criteria, $con);
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
		$objects = VentasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return VentasPeer::populateObjects(VentasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			VentasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = VentasPeer::getOMClass();
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
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$rs = VentasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinClientes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$rs = VentasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstadoVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);

		$rs = VentasPeer::doSelectRS($criteria, $con);
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

		VentasPeer::addSelectColumns($c);
		$startcol = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

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
										$temp_obj2->addVentas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinClientes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		VentasPeer::addSelectColumns($c);
		$startcol = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ClientesPeer::addSelectColumns($c);

		$c->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getClientes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addVentas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstadoVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		VentasPeer::addSelectColumns($c);
		$startcol = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstadoVentasPeer::addSelectColumns($c);

		$c->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstadoVentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstadoVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addVentas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$criteria->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);

		$rs = VentasPeer::doSelectRS($criteria, $con);
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

		VentasPeer::addSelectColumns($c);
		$startcol2 = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ClientesPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ClientesPeer::NUM_COLUMNS;

		EstadoVentasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstadoVentasPeer::NUM_COLUMNS;

		$c->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$c->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();


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
					$temp_obj2->addVentas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1);
			}


					
			$omClass = ClientesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getClientes(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addVentas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initVentass();
				$obj3->addVentas($obj1);
			}


					
			$omClass = EstadoVentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstadoVentas(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addVentas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initVentass();
				$obj4->addVentas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$criteria->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);

		$rs = VentasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptClientes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);

		$rs = VentasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstadoVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VentasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VentasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$rs = VentasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		VentasPeer::addSelectColumns($c);
		$startcol2 = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientesPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientesPeer::NUM_COLUMNS;

		EstadoVentasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoVentasPeer::NUM_COLUMNS;

		$c->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);

		$c->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClientes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1);
			}

			$omClass = EstadoVentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoVentas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initVentass();
				$obj3->addVentas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptClientes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		VentasPeer::addSelectColumns($c);
		$startcol2 = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		EstadoVentasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoVentasPeer::NUM_COLUMNS;

		$c->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(VentasPeer::ID_ESTADO_VENTA, EstadoVentasPeer::ID_ESTADO_VENTA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1);
			}

			$omClass = EstadoVentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoVentas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initVentass();
				$obj3->addVentas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadoVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		VentasPeer::addSelectColumns($c);
		$startcol2 = (VentasPeer::NUM_COLUMNS - VentasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ClientesPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ClientesPeer::NUM_COLUMNS;

		$c->addJoin(VentasPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(VentasPeer::ID_CLIENTE, ClientesPeer::ID_CLIENTE);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVentass();
				$obj2->addVentas($obj1);
			}

			$omClass = ClientesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getClientes(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addVentas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initVentass();
				$obj3->addVentas($obj1);
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
		return VentasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(VentasPeer::ID_VENTA); 

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
			$comparison = $criteria->getComparison(VentasPeer::ID_VENTA);
			$selectCriteria->add(VentasPeer::ID_VENTA, $criteria->remove(VentasPeer::ID_VENTA), $comparison);

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
			$affectedRows += VentasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(VentasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(VentasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ventas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(VentasPeer::ID_VENTA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += VentasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = VentasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/AlbaranesSalida.php';

						$c = new Criteria();
			
			$c->add(AlbaranesSalidaPeer::ID_VENTA, $obj->getIdVenta());
			$affectedRows += AlbaranesSalidaPeer::doDelete($c, $con);

			include_once 'lib/model/AlbaranesVenta.php';

						$c = new Criteria();
			
			$c->add(AlbaranesVentaPeer::ID_VENTA, $obj->getIdVenta());
			$affectedRows += AlbaranesVentaPeer::doDelete($c, $con);

			include_once 'lib/model/ArticulosXVenta.php';

						$c = new Criteria();
			
			$c->add(ArticulosXVentaPeer::ID_VENTA, $obj->getIdVenta());
			$affectedRows += ArticulosXVentaPeer::doDelete($c, $con);

			include_once 'lib/model/Salidas.php';

						$c = new Criteria();
			
			$c->add(SalidasPeer::ID_VENTA, $obj->getIdVenta());
			$affectedRows += SalidasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Ventas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(VentasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(VentasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(VentasPeer::DATABASE_NAME, VentasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = VentasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(VentasPeer::DATABASE_NAME);

		$criteria->add(VentasPeer::ID_VENTA, $pk);


		$v = VentasPeer::doSelect($criteria, $con);

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
			$criteria->add(VentasPeer::ID_VENTA, $pks, Criteria::IN);
			$objs = VentasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseVentasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/VentasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.VentasMapBuilder');
}
