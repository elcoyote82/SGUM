<?php


abstract class BasePedidosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pedidos';

	
	const CLASS_DEFAULT = 'lib.model.Pedidos';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_PEDIDO = 'pedidos.ID_PEDIDO';

	
	const ID_MD5_PEDIDO = 'pedidos.ID_MD5_PEDIDO';

	
	const ID_USUARIO = 'pedidos.ID_USUARIO';

	
	const ID_PROVEEDOR = 'pedidos.ID_PROVEEDOR';

	
	const ID_ESTADO_PEDIDO = 'pedidos.ID_ESTADO_PEDIDO';

	
	const NUM_PEDIDO = 'pedidos.NUM_PEDIDO';

	
	const CREATED_AT = 'pedidos.CREATED_AT';

	
	const UPDATED_AT = 'pedidos.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdPedido', 'IdMd5Pedido', 'IdUsuario', 'IdProveedor', 'IdEstadoPedido', 'NumPedido', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (PedidosPeer::ID_PEDIDO, PedidosPeer::ID_MD5_PEDIDO, PedidosPeer::ID_USUARIO, PedidosPeer::ID_PROVEEDOR, PedidosPeer::ID_ESTADO_PEDIDO, PedidosPeer::NUM_PEDIDO, PedidosPeer::CREATED_AT, PedidosPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_pedido', 'id_md5_pedido', 'id_usuario', 'id_proveedor', 'id_estado_pedido', 'num_pedido', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdPedido' => 0, 'IdMd5Pedido' => 1, 'IdUsuario' => 2, 'IdProveedor' => 3, 'IdEstadoPedido' => 4, 'NumPedido' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (PedidosPeer::ID_PEDIDO => 0, PedidosPeer::ID_MD5_PEDIDO => 1, PedidosPeer::ID_USUARIO => 2, PedidosPeer::ID_PROVEEDOR => 3, PedidosPeer::ID_ESTADO_PEDIDO => 4, PedidosPeer::NUM_PEDIDO => 5, PedidosPeer::CREATED_AT => 6, PedidosPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_pedido' => 0, 'id_md5_pedido' => 1, 'id_usuario' => 2, 'id_proveedor' => 3, 'id_estado_pedido' => 4, 'num_pedido' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PedidosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PedidosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PedidosPeer::getTableMap();
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
		return str_replace(PedidosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PedidosPeer::ID_PEDIDO);

		$criteria->addSelectColumn(PedidosPeer::ID_MD5_PEDIDO);

		$criteria->addSelectColumn(PedidosPeer::ID_USUARIO);

		$criteria->addSelectColumn(PedidosPeer::ID_PROVEEDOR);

		$criteria->addSelectColumn(PedidosPeer::ID_ESTADO_PEDIDO);

		$criteria->addSelectColumn(PedidosPeer::NUM_PEDIDO);

		$criteria->addSelectColumn(PedidosPeer::CREATED_AT);

		$criteria->addSelectColumn(PedidosPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(pedidos.ID_PEDIDO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pedidos.ID_PEDIDO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PedidosPeer::doSelectRS($criteria, $con);
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
		$objects = PedidosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PedidosPeer::populateObjects(PedidosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PedidosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PedidosPeer::getOMClass();
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
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProveedores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstadoPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
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

		PedidosPeer::addSelectColumns($c);
		$startcol = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

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
										$temp_obj2->addPedidos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProveedores(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PedidosPeer::addSelectColumns($c);
		$startcol = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProveedoresPeer::addSelectColumns($c);

		$c->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProveedoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProveedores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPedidos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstadoPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PedidosPeer::addSelectColumns($c);
		$startcol = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstadoPedidosPeer::addSelectColumns($c);

		$c->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstadoPedidosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstadoPedidos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPedidos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$criteria->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
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

		PedidosPeer::addSelectColumns($c);
		$startcol2 = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProveedoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProveedoresPeer::NUM_COLUMNS;

		EstadoPedidosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstadoPedidosPeer::NUM_COLUMNS;

		$c->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$c->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();


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
					$temp_obj2->addPedidos($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1);
			}


					
			$omClass = ProveedoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProveedores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPedidos($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPedidoss();
				$obj3->addPedidos($obj1);
			}


					
			$omClass = EstadoPedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstadoPedidos(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addPedidos($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initPedidoss();
				$obj4->addPedidos($obj1);
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
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$criteria->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProveedores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstadoPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PedidosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PedidosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$criteria->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = PedidosPeer::doSelectRS($criteria, $con);
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

		PedidosPeer::addSelectColumns($c);
		$startcol2 = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProveedoresPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProveedoresPeer::NUM_COLUMNS;

		EstadoPedidosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoPedidosPeer::NUM_COLUMNS;

		$c->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$c->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProveedoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProveedores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1);
			}

			$omClass = EstadoPedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoPedidos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initPedidoss();
				$obj3->addPedidos($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProveedores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PedidosPeer::addSelectColumns($c);
		$startcol2 = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		EstadoPedidosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoPedidosPeer::NUM_COLUMNS;

		$c->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(PedidosPeer::ID_ESTADO_PEDIDO, EstadoPedidosPeer::ID_ESTADO_PEDIDO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

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
					$temp_obj2->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1);
			}

			$omClass = EstadoPedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoPedidos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initPedidoss();
				$obj3->addPedidos($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadoPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PedidosPeer::addSelectColumns($c);
		$startcol2 = (PedidosPeer::NUM_COLUMNS - PedidosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProveedoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProveedoresPeer::NUM_COLUMNS;

		$c->addJoin(PedidosPeer::ID_USUARIO, sfGuardUserPeer::ID);

		$c->addJoin(PedidosPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PedidosPeer::getOMClass();

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
					$temp_obj2->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPedidoss();
				$obj2->addPedidos($obj1);
			}

			$omClass = ProveedoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProveedores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPedidos($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initPedidoss();
				$obj3->addPedidos($obj1);
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
		return PedidosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PedidosPeer::ID_PEDIDO); 

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
			$comparison = $criteria->getComparison(PedidosPeer::ID_PEDIDO);
			$selectCriteria->add(PedidosPeer::ID_PEDIDO, $criteria->remove(PedidosPeer::ID_PEDIDO), $comparison);

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
			$affectedRows += PedidosPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(PedidosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PedidosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Pedidos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PedidosPeer::ID_PEDIDO, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += PedidosPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = PedidosPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/AlbaranesEntrada.php';

						$c = new Criteria();
			
			$c->add(AlbaranesEntradaPeer::ID_PEDIDO, $obj->getIdPedido());
			$affectedRows += AlbaranesEntradaPeer::doDelete($c, $con);

			include_once 'lib/model/AlbaranesPedido.php';

						$c = new Criteria();
			
			$c->add(AlbaranesPedidoPeer::ID_PEDIDO, $obj->getIdPedido());
			$affectedRows += AlbaranesPedidoPeer::doDelete($c, $con);

			include_once 'lib/model/ArticulosXPedido.php';

						$c = new Criteria();
			
			$c->add(ArticulosXPedidoPeer::ID_PEDIDO, $obj->getIdPedido());
			$affectedRows += ArticulosXPedidoPeer::doDelete($c, $con);

			include_once 'lib/model/Entradas.php';

						$c = new Criteria();
			
			$c->add(EntradasPeer::ID_PEDIDO, $obj->getIdPedido());
			$affectedRows += EntradasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Pedidos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PedidosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PedidosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PedidosPeer::DATABASE_NAME, PedidosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PedidosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PedidosPeer::DATABASE_NAME);

		$criteria->add(PedidosPeer::ID_PEDIDO, $pk);


		$v = PedidosPeer::doSelect($criteria, $con);

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
			$criteria->add(PedidosPeer::ID_PEDIDO, $pks, Criteria::IN);
			$objs = PedidosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePedidosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PedidosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PedidosMapBuilder');
}
