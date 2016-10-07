<?php
/**
 * Clase para controlar la administración de usuarios, grupos y permisos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       Administracion.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class Administracion 
{
	/**
	* @var integer $id_ult_grupo_insert Identificador del ultimo grupo insertado
	*/	
	protected $id_ult_grupo_insert;
	  
	/**
	* @var integer $id_ult_user_insert Identificador del ultimo usuario insertado
	*/	
	protected $id_ult_user_insert;
	
	/**
	* @var integer $id_ult_perm_insert Identificador del ultimo permiso insertado
	*/	
	protected $id_ult_perm_insert;
	
	/**
	* @var integer $id_ult_profile_insert Identificador del ultimo profile insertado
	*/	
	protected $id_ult_profile_insert;
  
  
	/**
	 * Constructor de la clase Administracion
	 */
	public function __construct()
	{
		
	}
	
	/************************************ MÉTODOS PARA LA TABLA DE SF_GUARD_USER ***********************************/
	
	/**
	 * Guardamos un objeto sfGuardUser
	 * 
	 * @param string $username Nombre de usuario
	 * @param string $password Contraseña del usuario
	 * 
	 * @return boolean TRUE si todo ha ido correctamente 
	 */
	public function guardarUsuario($username,$password)
	{
		// Creamos un nuevo objeto sfGuardUser
		$user = new sfGuardUser();
		$user->setUsername($username);
		$user->setPassword($password);
		
		// Guardamos el user en la BD
		$user_salvado = $user->save();
				
		// Obtenemos el id del ultimo usuario insertado
		$this->id_ult_user_insert = $user->getId();		
		
		if ($user_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del usuario que acabamos de guardar
			$key_user = sfConfig::get('app_private_key_sf_guard_user');
			
			// Creamos un nuevo objeto sfGuardUser
			$usuario_act = new sfGuardUser();
			$usuario_act->setId($this->id_ult_user_insert);
			
			// Generamos el id_md5 del usuario
			$id_md5 = hash_hmac('md5',$this->id_ult_user_insert,$key_user);
			$usuario_act->setIdMd5($id_md5);
			
			// Actualizamos el usuario
			$user_actualizado = sfGuardUserPeer::doUpdate($usuario_act);
			
			if($user_actualizado)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Obtener el ultimo id insertado en la tabla sfGuardUser
	 * 
	 * @return integer $id_ult_user_insert Id del ultimo usuario insertado
	 */	
	public function obtenerUltimoIdUsuario()
	{
		return $this->id_ult_user_insert;
	}
	
	/**
	 * Actualizamos el Password de un usuario
	 * 
	 * @param integer $id_usuario Id del usuario
	 * @param string  $password   Nuevo Password del usuario
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, FALSE en caso contrario
	 */
	 public function actualizarPassword($id_usuario,$password)
	 {
	 	// Creamos un uveo objeto sfGuardUser
	 	$usuario = new sfGuardUser();
	 	$usuario->setId($id_usuario);
	 	$usuario->setPassword($password);
	 	
	 	// Actualizamos el usuario en la BD
	 	$password_actualizado = sfGuardUserPeer::doUpdate($usuario);
	 	
	 	return $password_actualizado;
	 }
	 
	/**
	 * Comprobar si un usuario está siendo usado
	 * 
	 * @param integer $id_usuario Id del usuario
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarUsuario($id_usuario)
	{
		// Buscamos si el usuario está siendo usado en la tabla Pedidos
		$usuarios = new Criteria();
		$usuarios->add(PedidosPeer::ID_USUARIO,$id_usuario);		
		$usuarios1 = PedidosPeer::doSelect($usuarios);
				
		// Buscamos si el usuario está siendo usado en la tabla Ventas
		$usuarios = new Criteria();
		$usuarios->add(VentasPeer::ID_USUARIO,$id_usuario);		
		$usuarios2 = VentasPeer::doSelect($usuarios);
		
		// Si el articulo no está vacio
		if(!empty($articulos1) || !empty($articulos2))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	 
	/**
	 * Borrar un Usuario de la tabla sfGuardUser
	 * 
	 * @param integer $id_usuario Id del usuario a borrar
	 */
	 public function borrarUsuario($id_usuario)
	 {
	 	// Borramos el Usuario de la tabla sfGuardUser
	 	sfGuardUserPeer::doDelete($id_usuario);
	 }	
	
	/**
	 * Obtener el objeto sfGuardUser a partir del id de usuario
	 * 
	 * @param integer $id_usuario Id del usuario
	 * 
	 * @return objeto $usuario    Objeto sfGuardUser buscado por el id del usuario, FALSE en caso de que no exista
	 */
	public function obtenerObjUsuario($id_usuario)
	{
		// Obtenemos el objeto usuario de sfGuardUser
		$usuario = sfGuardUserPeer::retrieveByPk($id_usuario);
		
		// Si está definido el objeto usuario
		if(isset($usuario))
		{
			return $usuario;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos sfGuardUser
	 * 
	 * @return array $ar_usuarios   Array de todos los objetos sfGuardUser
	 */
	public function obtenerTodosUsuarios()
	{
		// Obtenemos todos los usuarios de la tabla sfGuardUser
		$usuarios = new Criteria();
		$ar_usuarios = sfGuardUserPeer::doSelect($usuarios);
		
		// Si hay usuarios
		if(!empty($ar_usuarios))
		{
			return $ar_usuarios;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto sfGuardUser a partir del id de md5 del usuario
	 * 
	 * @param integer $id_md5   Id Md5 del usuario
	 * 
	 * @return objeto $usuario  Objeto sfGuardUser buscado por el id md5 del usuario
	 */
	public function obtenerObjUsuarioXIdMd5($id_md5)
	{
		// Obtenemos el id del usuario a partir del id md5
		$id_usuario = $this->obtenerIdUsuarioXIdMd5($id_md5);
		
		// Obtenemos el objeto usuario de sfGuardUser
		$usuario = sfGuardUserPeer::retrieveByPk($id_usuario);
		
		// Si está definido el objeto usuario
		if(isset($usuario))
		{
			return $usuario;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el IdMd5 del Usuario a partir del id del usuario
	 * 
	 * @param  integer $id_usuario Id del usuario
	 * 
	 * @return string  $id_md5     Id Md5 de usuario
	 */
	public function obtenerIdMd5Usuario($id_usuario)
	{
		// Obtenemos el objeto usuario de sfGuardUser
		$usuario = sfGuardUserPeer::retrieveByPk($id_usuario);
		
		// Si está definido el objeto usuario
		if(isset($usuario))
		{
			// Obtenemos el Id Md5 a partir del objeto sfGuardUser
			$id_md5 = $usuario->getIdMd5();
			
			return $id_md5;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del usuario a partir del Id Md5
	 * 
	 * @param  string  $id_md5     Id Md5 del usuario
	 * 
	 * @return integer $id_usuario Id del usuario
	 */
	public function obtenerIdUsuarioXIdMd5($id_md5)
	{
		// Obtenemos el objeto sfGuardUser que tenga ese $id_md5
		$usuario = new Criteria();
		$usuario->add(sfGuardUserPeer::ID_MD5,$id_md5);
		$usuario1 = sfGuardUserPeer::doSelect($usuario);
		
		// Si no se encuentra ningún objeto sfGuardUser
		if(empty($usuario1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del usuario a partir del objeto sfGuardUser
			$id_usuario = $usuario1[0]->getId();
			
			return $id_usuario;			
		}
	}	
	
	/**
	 * Obtener el UserName a partir del id del usuario
	 * 
	 * @param  integer $id_usuario Id del usuario
	 * 
	 * @return string  $username   Nombre de usuario
	 */
	public function obtenerUserName($id_usuario)
	{
		// Obtenemos el objeto usuario de sfGuardUser
		$usuario = sfGuardUserPeer::retrieveByPk($id_usuario);
		
		// Si está definido el objeto usuario
		if(isset($usuario))
		{
			// Obtenemos el Nombre del usuario a partir del objeto sfGuardUser
			$username = $usuario->getUsername();
			
			return $username;
		}
		else
		{
			return false;
		}
	}
		
	/**
	 * Obtener la Fecha de modificación (updated_at) a partir del id del usuario
	 * 
	 * @param  integer $id_usuario Id del usuario
	 * 
	 * @return string  $updated_at Fecha de modificación del usuario (YYYY-mm-dd H:m:s)
	 */
	public function obtenerUpdatedUsuario($id_usuario)
	{
		// Obtenemos el objeto sfGuardUser a partir del $id_usuario
		$usuario = sfGuardUserPeer::retrieveByPk($id_usuario);
		
		// Si está definido el objeto sfGuardUser
		if(isset($usuario))
		{
			// Obtenemos updated_at a partir del objeto sfGuardUser
			$updated_at = $usuario->getUpdatedAt();
			
			return $updated_at;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener un Select con todos los usuarios de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_usuarios  Array de usuarios con llave el id del usuario y contenido el Nombre del usuario
	 */
	public function obtenerSelectUsuarios()
	{
		// Obtenemos todos los usuarios
		$usuarios = $this->obtenerTodosUsuarios();
		
		// Creamos un array con los usuarios para el select del formulario
		$ar_usuarios[0] = "";
		
		foreach($usuarios as $usuario)
		{
			$usuario_nombre = $usuario->getUsername();
			$i = $usuario->getId();
			$ar_usuarios[$i] = $usuario_nombre;
		}
		
		// Array con el nombre de los usuarios y llave el id
		return $ar_usuarios;
	}
	 
	/**
	 * Obtener un Select con todos los usuarios de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_usuarios  Array de usuarios con llave el id del usuario y contenido el Nombre del usuario
	 */
	public function obtenerSelectUsuarios2()
	{
		// Obtenemos todos los usuarios
		$usuarios = $this->obtenerTodosUsuarios();
		
		// Creamos un array con los usuarios para el select del formulario
		$ar_usuarios[0] = "-------";
		
		foreach($usuarios as $usuario)
		{
			$usuario_nombre = $usuario->getUsername();
			$i = $usuario->getId();
			$ar_usuarios[$i] = $usuario_nombre;
		}
		
		// Array con el nombre de los usuarios y llave el id
		return $ar_usuarios;
	}

	/**
	 * Obtener un Select con todos los usuarios de la aplicacion
	 * ID = 0 -> "Seleccionar Usuario"
	 * 
	 * @return array $ar_usuarios  Array de usuarios con llave el id del usuario y contenido el Nombre del usuario
	 */
	public function obtenerSelectUsuarios3()
	{
		// Obtenemos todos los usuarios
		$usuarios = $this->obtenerTodosUsuarios();
		
		// Creamos un array con los usuarios para el select del formulario
		$ar_usuarios[0] = "Seleccionar Usuario";
		
		foreach($usuarios as $usuario)
		{
			$usuario_nombre = $usuario->getUsername();
			$i = $usuario->getId();
			$ar_usuarios[$i] = $usuario_nombre;
		}
		
		// Array con el nombre de los usuarios y llave el id
		return $ar_usuarios;
	}
	
	/************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_USER **************************************************/
	
	/************************************* MÉTODOS PARA LA TABLA DE SF_GUARD_GROUP **************************************************/
	
	/**
	 * Guardar un objeto sfGuardGroup, se almacena el id del ultimo grupo insertado
	 * 
	 * @param string $nombre      Nombre del grupo
	 * @param string $descripcion Descripción del grupo
	 * 
	 * @return boolean $grupo_salvado TRUE si toda ha ido correctamente
	 */
	public function guardarGrupo($nombre,$descripcion)
	{
		// Creamos un nuevo objeto sfGuardGroup
		$grupo = new sfGuardGroup();
		$grupo->setName($nombre);
		$grupo->setDescription($descripcion);
		
		// Guardamos el grupo en la BD
		$grupo_salvado = $grupo->save();
		
		// Obtenemos el id del ultimo grupo insertado
		$this->id_ult_grupo_insert = $grupo->getId();
		
		if ($grupo_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del grupo que acabamos de guardar
			$key_grupo = sfConfig::get('app_private_key_sf_guard_group');
			
			// Creamos un nuevo objeto sfGuardGroup
			$grupo_act = new sfGuardGroup();
			$grupo_act->setId($this->id_ult_grupo_insert);
			
			// Generamos el id_md5 del suario
			$id_md5 = hash_hmac('md5',$this->id_ult_grupo_insert,$key_grupo);
			$grupo_act->setIdMd5($id_md5);
			
			// Actualizamos el objeto sfGuardGroup
			$grupo_actualizado = sfGuardUserPeer::doUpdate($grupo_act);
			
			if($grupo_actualizado)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Obtener el ultimo id insertado en la tabla sfGuardGroup
	 * 
	 * @return integer $id_ult_grupo_insert Id del ultimo grupo insertado
	 */	
	public function obtenerUltimoIdGrupo()
	{
		return $this->id_ult_grupo_insert;
	}
	
	/**
	 * Actualizamos un grupo de la tabla sfGuardGroup
	 * 
	 * @param integer $id_grupo    Id del Grupo
	 * @param string  $nombre      Nuevo Nombre del grupo
	 * @param string  $descripcion Nueva Descripcion del grupo
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, FALSE en caso contrario
	 */
	 public function actualizarGrupo($id_grupo,$nombre,$descripcion)
	 {
	 	// Creamos un nuevo objeto sfGuardGroup
	 	$grupo = new sfGuardGroup();
	 	$grupo->setId($id_grupo);
	 	$grupo->setName($nombre);
	 	$grupo->setDescription($descripcion);
	 	
	 	// Actualizamos el Grupo en la BD
	 	$grupo_actualizado = sfGuardGroupPeer::doUpdate($grupo);
	 	
	 	return $grupo_actualizado;
	 }
	 
	/**
	 * Borrar un Grupo de la tabla sfGuardGroup
	 * 
	 * @param integer $id_grupo Id del grupo a borrar
	 */
	 public function borrarGrupo($id_grupo)
	 {
	 	// Borramos el Usuario de la tabla sfGuardGroup
	 	sfGuardGroupPeer::doDelete($id_grupo);
	 }
	
	/**
	 * Obtener el objeto sfGuardGroup a partir del id de grupo
	 * 
	 * @param integer $id_grupo Id del grupo
	 * 
	 * @return objeto $grupo    Objeto sfGuardGroup buscado por el id del grupo
	 */
	public function obtenerObjGrupo($id_grupo)
	{
		// Obtenemos el objeto grupo de sfGuardGroup
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			return $grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos sfGuardGroup
	 * 
	 * @return array $ar_grupos   Array de todos los objetos sfGuardGroup
	 */
	public function obtenerTodosGrupos()
	{
		// Obtenemos todos los grupos de la tabla sfGuardGroup
		$grupos = new Criteria();
		$ar_grupos = sfGuardGroupPeer::doSelect($grupos);
		
		// Si hay grupos
		if(!empty($ar_grupos))
		{
			return $ar_grupos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto sfGuardGroup a partir del id de md5 del grupo
	 * 
	 * @param integer $id_md5 Id Md5 del grupo
	 * 
	 * @return objeto $grupo  Objeto sfGuardGroup buscado por el id md5 del grupo
	 */
	public function obtenerObjGrupoXIdMd5($id_md5)
	{
		// Obtenemos el id del grupo a partir del id md5
		$id_grupo = $this->obtenerIdGrupoXIdMd5($id_md5);
		
		// Obtenemos el objeto sfGuardGroup
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			return $grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el IdMd5 del Grupo a partir del id del grupo
	 * 
	 * @param  integer $id_grupo Id del grupo
	 * 
	 * @return string  $id_md5   Id Md5 del grupo
	 */
	public function obtenerIdMd5Grupo($id_grupo)
	{
		// Obtenemos el objeto grupo de sfGuardGroup
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			// Obtenemos el Id Md5 a partir del objeto sfGuardGroup
			$id_md5 = $grupo->getIdMd5();
			
			return $id_md5;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del grupo a partir del Id Md5
	 * 
	 * @param  string  $id_md5   Id Md5 del grupo
	 * 
	 * @return integer $id_grupo Id del grupo
	 */
	public function obtenerIdGrupoXIdMd5($id_md5)
	{
		// Obtenemos el objeto sfGuardGroup que tenga ese $id_md5
		$grupo = new Criteria();
		$grupo->add(sfGuardGroupPeer::ID_MD5,$id_md5);
		$grupo1 = sfGuardGroupPeer::doSelect($grupo);
		
		// Si no se encuentra ningún objeto sfGuardGroup
		if(empty($grupo1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del grupo a partir del objeto sfGuardGroup
			$id_usuario = $grupo1[0]->getId();
			
			return $id_usuario;			
		}
	}
	
	/**
	 * Obtener el Nombre del Grupo a partir del id del grupo
	 * 
	 * @param  integer $id_grupo     Id del grupo
	 * 
	 * @return string  $nombre_grupo Nombre del grupo
	 */
	public function obtenerNombreGrupo($id_grupo)
	{
		// Obtenemos el objeto sfGuardGroup a partir del $id_grupo
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			// Obtenemos el Nombre del Grupo a partir del objeto sfGuardGroup
			$nombre_grupo = $grupo->getName();
			
			return $nombre_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener la descripción del Grupo a partir del id del grupo
	 * 
	 * @param  integer $id_grupo          Id del grupo
	 * 
	 * @return string  $descripcion_grupo Descripción del grupo
	 */
	public function obtenerDescripcionGrupo($id_grupo)
	{
		// Obtenemos el objeto sfGuardGroup a partir del $id_grupo
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			// Obtenemos la descripción a partir del objeto sfGuardGroup
			$descripcion_grupo = $grupo->getDescription();
			
			return $descripcion_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener la Fecha de modificación (updated_at) del Grupo a partir del id del grupo
	 * 
	 * @param  integer $id_grupo   Id del grupo
	 * 
	 * @return string  $updated_at Descripción del grupo
	 */
	public function obtenerUpdatedGrupo($id_grupo)
	{
		// Obtenemos el objeto sfGuardGroup a partir del $id_grupo
		$grupo = sfGuardGroupPeer::retrieveByPk($id_grupo);
		
		// Si está definido el objeto sfGuardGroup
		if(isset($grupo))
		{
			// Obtenemos la fecha de modificacion a partir del objeto sfGuardGroup
			$updated_at = $grupo->getUpdatedAt();
			
			return $updated_at;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener un Select con todos los grupos de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_grupos  Array de grupos con llave el id del grupo y contenido el Nombre del grupo
	 */
	public function obtenerSelectGrupos()
	{
		// Obtenemos todos los grupos
		$grupos = $this->obtenerTodosGrupos();
		
		// Creamos un array con los grupos para el select del formulario
		$ar_grupos[0] = "";
		
		foreach($grupos as $grupo)
		{
			$grupo_nombre = $grupo->getName();
			$i = $grupo->getId();
			$ar_grupos[$i] = $grupo_nombre;
		}
		
		// Array con el nombre de los grupos y llave el id
		return $ar_grupos;
	}
	
	/**
	 * Obtener un Select con todos los grupos de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_grupos  Array de grupos con llave el id del grupo y contenido el Nombre del grupo
	 */
	public function obtenerSelectGrupos2()
	{
		// Obtenemos todos los grupos
		$grupos = $this->obtenerTodosGrupos();
		
		// Creamos un array con los grupos para el select del formulario
		$ar_grupos[0] = "-------";
		
		foreach($grupos as $grupo)
		{
			$grupo_nombre = $grupo->getName();
			$i = $grupo->getId();
			$ar_grupos[$i] = $grupo_nombre;
		}
		
		// Array con el nombre de los grupos y llave el id
		return $ar_grupos;
	}
	
	/**
	 * Obtener un Select con todos los grupos de la aplicacion
	 * ID = 0 -> "Seleccionar Grupo"
	 * 
	 * @return array $ar_grupos  Array de grupos con llave el id del grupo y contenido el Nombre del grupo
	 */
	public function obtenerSelectGrupos3()
	{
		// Obtenemos todos los grupos
		$grupos = $this->obtenerTodosGrupos();
		
		// Creamos un array con los grupos para el select del formulario
		$ar_grupos[0] = "Seleccionar Grupo";
		
		foreach($grupos as $grupo)
		{
			$grupo_nombre = $grupo->getName();
			$i = $grupo->getId();
			$ar_grupos[$i] = $grupo_nombre;
		}
		
		// Array con el nombre de los grupos y llave el id
		return $ar_grupos;
	}
	
	
	/***************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_GROUP *******************************/
	
	/************************************** MÉTODOS PARA LA TABLA DE SF_GUARD_PERMISSION ******************************/
	
	/**
	 * Guardar un objeto sfGuardPermission, se almacena el id del ultimo grupo insertado
	 * 
	 * @param string $nombre      Nombre del permiso
	 * @param string $descripcion Descripción del permiso
	 * 
	 * @return boolean $permiso_salvado TRUE si toda ha ido correctamente
	 */
	public function guardarPermiso($nombre,$descripcion)
	{
		// Creamos un nuevo objeto sfGuardPermission
		$permiso = new sfGuardPermission();
		$permiso->setName($nombre);
		$permiso->setDescription($descripcion);
		
		// Guardamos el permiso en la BD
		$permiso_salvado = $permiso->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$this->id_ult_perm_insert = $permiso->getId();
		
		if ($permiso_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del permiso que acabamos de guardar
			$key_permiso = sfConfig::get('app_private_key_sf_guard_permission');
			
			// Creamos un nuevo objeto sfGuardPermission
			$permiso_act = new sfGuardPermission();
			$permiso_act->setId($this->id_ult_perm_insert);
			
			// Generamos el id_md5 del suario
			$id_md5 = hash_hmac('md5',$this->id_ult_perm_insert,$key_permiso);
			$permiso_act->setIdMd5($id_md5);
			
			// Actualizamos el objeto sfGuardGroup
			$permiso_actualizado = sfGuardPermissionPeer::doUpdate($permiso_act);
			
			if($permiso_actualizado)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Obtener el ultimo id insertado en la tabla sfGuardPermission
	 * 
	 * @return integer $id_ult_perm_insert Id del ultimo permiso insertado
	 */	
	public function obtenerUltimoIdPermiso()
	{
		return $this->id_ult_perm_insert;
	}
	
	/**
	 * Actualizamos un permiso de la tabla sfGuardPermission
	 * 
	 * @param integer $id_permiso  Id del Permiso
	 * @param string  $nombre      Nuevo Nombre del permiso
	 * @param string  $descripcion Nueva Descripcion del permiso
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, FALSE en caso contrario
	 */
	 public function actualizarPermiso($id_permiso,$nombre,$descripcion)
	 {
	 	// Creamos un nuevo objeto sfGuardPermission
	 	$permiso = new sfGuardPermission();
	 	$permiso->setId($id_permiso);
	 	$permiso->setName($nombre);
	 	$permiso->setDescription($descripcion);
	 	
	 	// Actualizamos el Permiso en la BD
	 	$permiso_actualizado = sfGuardPermissionPeer::doUpdate($permiso);
	 	
	 	return $permiso_actualizado;
	 }
	 
	/**
	 * Borrar un Permiso de la tabla sfGuardPermission
	 * 
	 * @param integer $id_permiso Id del Permiso a borrar
	 */
	 public function borrarPermiso($id_permiso)
	 {
	 	// Borramos el Usuario de la tabla sfGuardGroup
	 	sfGuardPermissionPeer::doDelete($id_permiso);
	 }	
	
	/**
	 * Obtener el objeto sfGuardPermission a partir del id de permiso
	 * 
	 * @param integer $id_permiso Id del permiso
	 * 
	 * @return objeto $permiso    Objeto sfGuardPermission buscado por el id del permiso
	 */
	public function obtenerObjPermiso($id_permiso)
	{
		// Obtenemos el objeto permiso de sfGuardPermission
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			return $permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos sfGuardPermission
	 * 
	 * @return array $ar_permisos   Array de todos los objetos sfGuardPermission
	 */
	public function obtenerTodosPermisos()
	{
		// Obtenemos todos los permisos de la tabla sfGuardPermission
		$permisos = new Criteria();
		$ar_permisos = sfGuardPermissionPeer::doSelect($permisos);
		
		// Si hay permisos
		if(!empty($ar_permisos))
		{
			return $ar_permisos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto sfGuardPermission a partir del id de md5 del permiso
	 * 
	 * @param integer $id_md5  Id Md5 del permiso
	 * 
	 * @return objeto $permiso Objeto sfGuardPermission buscado por el id md5 del permiso
	 */
	public function obtenerObjPermisoXIdMd5($id_md5)
	{
		// Obtenemos el id del permiso a partir del id md5
		$id_permiso = $this->obtenerIdPermisoXIdMd5($id_md5);
		
		// Obtenemos el objeto sfGuardPermission
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			return $permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el IdMd5 del Permiso a partir del id del permiso
	 * 
	 * @param  integer $id_permiso Id del permiso
	 * 
	 * @return string  $id_md5   Id Md5 del permiso
	 */
	public function obtenerIdMd5Permiso($id_permiso)
	{
		// Obtenemos el objeto permiso de sfGuardPermission
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			// Obtenemos el Id Md5 a partir del objeto sfGuardPermission
			$id_md5 = $permiso->getIdMd5();
			
			return $id_md5;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del permiso a partir del Id Md5
	 * 
	 * @param  string  $id_md5   Id Md5 del permiso
	 * 
	 * @return integer $id_permiso Id del permiso
	 */
	public function obtenerIdPermisoXIdMd5($id_md5)
	{
		// Obtenemos el objeto sfGuardPermission que tenga ese $id_md5
		$permiso = new Criteria();
		$permiso->add(sfGuardPermissionPeer::ID_MD5,$id_md5);
		$permiso1 = sfGuardPermissionPeer::doSelect($permiso);
		
		// Si no se encuentra ningún objeto sfGuardPermission
		if(empty($permiso1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del permiso a partir del objeto sfGuardPermission
			$id_usuario = $permiso1[0]->getId();
			
			return $id_usuario;			
		}
	}
	
	/**
	 * Obtener el Nombre del Permiso a partir del id del permiso
	 * 
	 * @param  integer $id_permiso     Id del permiso
	 * 
	 * @return string  $nombre_permiso Nombre del permiso
	 */
	public function obtenerNombrePermiso($id_permiso)
	{
		// Obtenemos el objeto sfGuardPermission a partir del $id_permiso
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			// Obtenemos el Nombre del Permiso a partir del objeto sfGuardPermission
			$nombre_permiso = $permiso->getName();
			
			return $nombre_permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener la descripción del Permiso a partir del id del permiso
	 * 
	 * @param  integer $id_permiso          Id del permiso
	 * 
	 * @return string  $descripcion_permiso Descripción del permiso
	 */
	public function obtenerDescripcionPermiso($id_permiso)
	{
		// Obtenemos el objeto sfGuardPermission a partir del $id_permiso
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			// Obtenemos la descripción a partir del objeto sfGuardPermission
			$descripcion_permiso = $permiso->getDescription();
			
			return $descripcion_permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener la Fecha de modificación (updated_at) del Permiso a partir del id del permiso
	 * 
	 * @param  integer $id_permiso   Id del permiso
	 * 
	 * @return string  $updated_at Descripción del permiso
	 */
	public function obtenerUpdatedPermiso($id_permiso)
	{
		// Obtenemos el objeto sfGuardPermission a partir del $id_permiso
		$permiso = sfGuardPermissionPeer::retrieveByPk($id_permiso);
		
		// Si está definido el objeto sfGuardPermission
		if(isset($permiso))
		{
			// Obtenemos la fecha de modificacion a partir del objeto sfGuardPermission
			$updated_at = $permiso->getUpdatedAt();
			
			return $updated_at;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener un Select con todos los permisos de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_permisos  Array de permisos con llave el id del permiso y contenido el Nombre del permiso
	 */
	public function obtenerSelectPermisos()
	{
		// Obtenemos todos los permisos
		$permisos = $this->obtenerTodosPermisos();
		
		// Creamos un array con los permisos para el select del formulario
		$ar_permisos[0] = "";
		
		foreach($permisos as $permiso)
		{
			$permiso_nombre = $permiso->getName();
			$i = $permiso->getId();
			$ar_permisos[$i] = $permiso_nombre;
		}
		
		// Array con el nombre de los permisos y llave el id
		return $ar_permisos;
	}
	
	/**
	 * Obtener un Select con todos los permisos de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_permisos  Array de permisos con llave el id del permiso y contenido el Nombre del permiso
	 */
	public function obtenerSelectPermisos2()
	{
		// Obtenemos todos los permisos
		$permisos = $this->obtenerTodosPermisos();
		
		// Creamos un array con los permisos para el select del formulario
		$ar_permisos[0] = "------";
		
		foreach($permisos as $permiso)
		{
			$permiso_nombre = $permiso->getName();
			$i = $permiso->getId();
			$ar_permisos[$i] = $permiso_nombre;
		}
		
		// Array con el nombre de los permisos y llave el id
		return $ar_permisos;
	}
	
	/**
	 * Obtener un Select con todos los permisos de la aplicacion
	 * ID = 0 -> "Seleccionar Permiso"
	 * 
	 * @return array $ar_permisos  Array de permisos con llave el id del permiso y contenido el Nombre del permiso
	 */
	public function obtenerSelectPermisos3()
	{
		// Obtenemos todos los permisos
		$permisos = $this->obtenerTodosPermisos();
		
		// Creamos un array con los permisos para el select del formulario
		$ar_permisos[0] = "Seleccionar Permiso";
		
		foreach($permisos as $permiso)
		{
			$permiso_nombre = $permiso->getName();
			$i = $permiso->getId();
			$ar_permisos[$i] = $permiso_nombre;
		}
		
		// Array con el nombre de los permisos y llave el id
		return $ar_permisos;
	}
	
	/*****************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_PERMISSION **************************************/
	
	/**************************************** MÉTODOS PARA LA TABLA DE SF_GUARD_USER_PROFILE ****************************************/				
 	
 	/**
 	 * Guardamos el perfil del usuario, un nuevo objeto SfGuardUserProfile
 	 * 
 	 * @param integer $id_usuario Id del usuario del perfil
 	 * @param string  $nombre     Nombre del usuario
 	 * @param string  $apellidos  Apellidos del usuario
 	 * @param string  $telefono   Teléfono del usuario
 	 * @param string  $email      Email del usuario
 	 * @param string  $imagen     Ruta de la imagen del usuario
 	 * @param string  $idioma     Idioma y cultura del usuario
 	 * 
 	 * @return boolean TRUE si todo ha ido correctamente
 	 */
	public function guardarProfile($id_usuario,$nombre,$apellidos,$telefono,$email,$imagen,$idioma)
	{
		// Creamos un nuevo objeto SfGuardUserProfile
		$profile = new SfGuardUserProfile();
		$profile->setUserId($id_usuario);
		$profile->setNombre($nombre);
		$profile->setApellidos($apellidos);
		$profile->setTelefono($telefono);
		$profile->setEmail($email);
		$profile->setImagen($imagen);
		$profile->setIdioma($idioma);
		
		// Guardamos el objeto SfGuardUserProfile en la BD
		$profile_salvado = $profile->save();
		
		// Obtenemos el id del ultimo profile insertado
		$this->id_ult_profile_insert = $profile->getIdProfile();		
		
		if ($profile_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del profile que acabamos de guardar
			$key_profile = sfConfig::get('app_private_key_sf_guard_user_profile');
			
			// Creamos un nuevo objeto SfGuardUserProfile
			$profile_act = new SfGuardUserProfile();
			$profile_act->setIdProfile($this->id_ult_profile_insert);
			
			// Generamos el id_md5 del profile
			$id_md5 = hash_hmac('md5',$this->id_ult_profile_insert,$key_profile);
			$profile_act->setIdMd5($id_md5);
			
			// Actualizamos el usuario
			$profile_actualizado = SfGuardUserProfilePeer::doUpdate($profile_act);
			
			if($profile_actualizado)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un objeto profile
	 * 
	 * @param integer $id_profile Id del profile a actualizar
	 * @param integer $userid     Identificador del user
	 * @param string  $nombre     Nombre del usuario
	 * @param string  $apellidos  Apellidos del usuario
	 * @param string  $telefono   Telefono del usuario
	 * @param string  $email      Email del usuario
	 * 
	 * @return boolean $profile_actualizado True si se ha actualizado correctamente, False en caso contario
	 */
	public function actualizarProfile($id_profile,$userid,$nombre,$apellidos,$telefono,$email)
	{
		// Creamos un nuevo objeto ASfGuardUserProfile
		$profile = new SfGuardUserProfile();
		$profile->setIdProfile($id_profile);
		$profile->setUserId($userid);
		$profile->setNombre($nombre);$profile->setApellidos($apellidos);
		$profile->setTelefono($telefono);
		$profile->setEmail($email);
		
		// Actualizamos el user en la BD
		$profile_actualizado = SfGuardUserProfilePeer::doUpdate($profile);
		
		return $profile_actualizado;
	}
	
	/**
	 * Obtener el ultimo id insertado en la tabla SfGuardProfile
	 * 
	 * @return integer $id_ult_profile_insert Id del ultimo profile insertado
	 */	
	public function obtenerUltimoIdProfile()
	{
		return $this->id_ult_profile_insert;
	}
 	
 	
 	/**
	 * Obtener el objeto SfGuardUserProfile a partir del id de profile
	 * 
	 * @param integer $id_profile Id del profile
	 * 
	 * @return objeto $profile    Objeto SfGuardUserProfile buscado por el id del profile
	 */
	public function obtenerObjProfile($id_profile)
	{
		// Obtenemos el objeto profile de SfGuardUserProfile
		$profile = SfGuardUserProfilePeer::retrieveByPk($id_profile);
		
		// Si está definido el objeto SfGuardUserProfile
		if(isset($profile))
		{
			return $profile;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto SfGuardUserProfile a partir del id de md5 del profile
	 * 
	 * @param integer $id_md5  Id Md5 del profile
	 * 
	 * @return objeto $profile Objeto SfGuardUserProfile buscado por el id md5 del profile
	 */
	public function obtenerObjProfileXIdMd5($id_md5)
	{
		// Obtenemos el id del profile a partir del id md5
		$id_profile = $this->obtenerIdProfileXIdMd5($id_md5);
		
		// Obtenemos el objeto SfGuardUserProfile
		$profile = SfGuardUserProfilePeer::retrieveByPk($id_profile);
		
		// Si está definido el objeto SfGuardUserProfile
		if(isset($profile))
		{
			return $profile;
		}
		else
		{
			return false;
		}
	}
	
	 /**
	 * Obtener el objeto SfGuardUserProfile a partir del id de usuario
	 * 
	 * @param integer $id_usuario Id del Usuario
	 * 
	 * @return objeto $profile    Objeto SfGuardUserProfile buscado por el id de usuario
	 */
	public function obtenerObjProfileXIdUsuario($id_usuario)
	{
		// Obtenemos el objeto SfGuardUserProfile que tenga ese $id_usuario
		$profile = new Criteria();
		$profile->add(SfGuardUserProfilePeer::USER_ID,$id_usuario);
		$profile1 = SfGuardUserProfilePeer::doSelect($profile);
		
		// Si está definido el objeto SfGuardUserProfile
		if(isset($profile1))
		{
			return $profile1[0];
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el IdMd5 del Profile a partir del id del profile
	 * 
	 * @param  integer $id_profile Id del profile
	 * 
	 * @return string  $id_md5   Id Md5 del profile
	 */
	public function obtenerIdMd5Profile($id_profile)
	{
		// Obtenemos el objeto profile de SfGuardUserProfile
		$profile = SfGuardUserProfilePeer::retrieveByPk($id_profile);
		
		// Si está definido el objeto SfGuardUserProfile
		if(isset($profile))
		{
			// Obtenemos el Id Md5 a partir del objeto SfGuardUserProfile
			$id_md5 = $profile->getIdMd5();
			
			return $id_md5;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del profile a partir del Id Md5
	 * 
	 * @param  string  $id_md5   Id Md5 del profile
	 * 
	 * @return integer $id_profile Id del profile
	 */
	public function obtenerIdProfileXIdMd5($id_md5)
	{
		// Obtenemos el objeto SfGuardUserProfile que tenga ese $id_md5
		$profile = new Criteria();
		$profile->add(SfGuardUserProfilePeer::ID_MD5,$id_md5);
		$profile1 = SfGuardUserProfilePeer::doSelect($profile);
		
		// Si no se encuentra ningún objeto SfGuardUserProfile
		if(empty($profile1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del profile a partir del objeto SfGuardUserProfile
			$id_usuario = $profile1[0]->getId();
			
			return $id_usuario;			
		}
	}
	
	/**
	 * Obtener el id de usuario a partir del id de profile
	 * 
	 * @param  string  $id_profile Id del profile
	 * 
	 * @return integer $user_id    Id del usuario
	 */
	public function obtenerUserIdXIdProfile($id_profile)
	{
		// Obtenemos el objeto profile de SfGuardUserProfile
		$profile = SfGuardUserProfilePeer::retrieveByPk($id_profile);
		
		// Si está definido el objeto SfGuardUserProfile
		if(isset($profile))
		{
			// Obtenemos el UserId a partir del objeto SfGuardUserProfile
			$user_id = $profile->getUserId();
			
			return $user_id;
		}
		else
		{
			return false;
		}
	}
	
	/***************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_USER_PROFILE ************************************************/
	
	
	/**************************************** MÉTODOS PARA LA TABLA DE SF_GUARD_USER_GROUP **************************************************/
	
	/**
	 * Guardamos un objeto sfGuarduserGroup
	 * 
	 * @param integer $id_usuario Id del usuario
	 * @param integer $id_grupo   Id del grupo al que pertenece
	 * 
	 * @return boolean $user_group_salvado TRUE si se ha salvado correctamente, FALSE en caso contrario
	 */
	public function guardarUserGroup($id_usuario,$id_grupo)
	{
		// Creamos un nuevo objeto sfGuarduserGroup
		$user_group = new sfGuardUserGroup();
		$user_group->setUserId($id_usuario);
		$user_group->setGroupId($id_grupo);
		
		// Guardamos el objeto sfGuarduserGroup en la BD
		$user_group_salvado = $user_group->save();
		
		return $user_group_salvado;
	}
	
	/**
	 * Actualizamos un objeto de la tabla sfGuardUserGroup
	 * 
	 * @param integer  $id_usuario  Id del usuario
	 * @param integer  $id_grupo    Id del grupo
	 * 
	 * @return boolean True si se ha guardado correctamente, False en caso contario
	 */
	 public function actualizarUserGroup($id_usuario,$id_grupo)
	 {
	 	// Actualizamos en UserGroup con el id del usuario y el id del grupo recogido.
	 	$con = Propel::getConnection();
	 	
	 	$b = new Criteria();
	 	$b->add(sfGuardUserGroupPeer::USER_ID, $id_usuario);
	 	
	 	$c = new Criteria();
	 	$c->add(sfGuardUserGroupPeer::GROUP_ID, $id_grupo);
	 	
	 	$user_group_salvado = BasePeer::doUpdate($b,$c,$con);
	 	
	 	return $user_group_salvado;
	 }	
	
	/**
	 * Obtener el objeto sfGuardUserGroup a partir del Id del Usuario
	 * 
	 * @param  integer $id_usuario Id del usuario
	 * 
	 * @return objeto $obj_usergroup  Objeto sfGuardUserGroup
	 */
	public function obtenerObjUserGroupXIdUsuario($id_usuario)
	{
		// Buscamos el objeto sfGuardUserGroup para el id del usuario
		$usergroup = new Criteria();
		$usergroup->add(sfGuardUserGroupPeer::USER_ID,$id_usuario);		
		$usergroup1 = sfGuardUserGroupPeer::doSelect($usergroup);
		
		// Si no encontramos ningún grupo para el usuario
		if(empty($usergroup1))
		{
			return false;
		}
		else
		{
			$obj_usergroup = $usergroup1[0];
			
			return $obj_usergroup;	
		}
	}
	
	/**
	 * Obtener el Id Grupo a partir de un objeto sfGuarUserGroup
	 * 
	 * @param  objeto $usergroup Objeto sfGuardUserGroup
	 * 
	 * @return integer $id_grupo
	 */
	public function obtenerIdGrupoXObjUserGroup($obj_usergroup)
	{
		// Obtenemos el id del grupo a partir del objeto sfGuardUserGroup
		$id_grupo = $obj_usergroup->getGroupId();
		
		if(isset($id_grupo))
		{
			return $id_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del Grupo a partir del Id del usuario
	 * 
	 * @param integer  $id_usuario Id del usuario
	 * 
	 * @return integer $id_grupo   Id del grupo al que pertenece el usuario
	 */
	public function obtenerIdGrupoXIdUsuario($id_usuario)
	{
		// Obtenemos el objeto sfGuardUserGroup apartir del id de usuario
		$obj_usergroup = $this->obtenerObjUserGroupXIdUsuario($id_usuario);
		
		if($obj_usergroup)
		{
			$id_grupo = $obj_usergroup->getGroupId();
			
			return $id_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Comprobar si un grupo tiene usuarios asignados
	 * 
	 * @param integer $id_grupo Id del grupo
	 * 
	 * @return boolean TRUE si tiene usuarios asignados, FALSE en caso contrario
	 */
	public function comprobarUsuariosGrupo($id_grupo)
	{
		// Buscamos si el grupo tiene usuarios en la tabla sfGuardUserGroup
		$usergroup = new Criteria();
		$usergroup->add(sfGuardUserGroupPeer::GROUP_ID,$id_grupo);		
		$usergroup1 = sfGuardUserGroupPeer::doSelect($usergroup);
		
		// Si el grupo no está vacio
		if(!empty($usergroup1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/***************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_USER_GROUP ************************************************/
	
	
	/**************************************** MÉTODOS PARA LA TABLA DE SF_GUARD_USER_PERMISSION *********************************************/
	
	/**
	 * Guardamos un objeto sfGuardUserPermission
	 * 
	 * @param integer $id_usuario Id del usuario
	 * @param integer $id_permiso Id del permisos asignado al usuario
	 * 
	 * @return boolean $user_permission_salvado TRUE si se ha salvado correctamente, FALSE en caso contrario
	 */
	public function guardarUserPermission($id_usuario,$id_permiso)
	{
		// Creamos un nuevo objeto sfGuardUserPermission
		$user_permission = new sfGuardUserPermission();
		$user_permission->setUserId($id_usuario);
		$user_permission->setPermissionId($id_permiso);
		
		// Guardamos el objeto sfGuardUserPermission en la BD
		$user_permission_salvado = $user_permission->save();
		
		return $user_permission_salvado;
	}	
	
	/**
	 * Obtener el objeto sfGuardUserPermission a partir del Id del Usuario
	 * 
	 * @param  integer $id_usuario Id del usuario
	 * 
	 * @return objeto $obj_userpermission  Objeto sfGuardUserPermission
	 */
	public function obtenerObjUserPermissionXIdUsuario($id_usuario)
	{
		// Buscamos el objeto sfGuardUserPermission para el id del usuario
		$userpermission = new Criteria();
		$userpermission->add(sfGuardUserPermissionPeer::USER_ID,$id_usuario);		
		$userpermission1 = sfGuardUserPermissionPeer::doSelect($userpermission);
		
		// Si no encontramos ningún permiso para el usuario
		if(empty($userpermission1))
		{
			return false;
		}
		else
		{
			$obj_userpermission = $userpermission1[0];
			
			return $obj_userpermission;	
		}
	}
	
	/**
	 * Obtener el Id Permiso a partir de un objeto sfGuardUserPermission
	 * 
	 * @param  objeto $obj_userpermission Objeto sfGuardUserPermission
	 * 
	 * @return integer $id_permiso
	 */
	public function obtenerIdPermisoXObjUserPermission($obj_userpermission)
	{
		// Obtenemos el id del permiso a partir del objeto sfGuardUserPermission
		$id_permiso = $obj_userpermission->getPermissionId();
		
		if(isset($id_permiso))
		{
			return $id_permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del Permiso a partir del Id del usuario
	 * 
	 * @param integer  $id_usuario Id del usuario
	 * 
	 * @return integer $id_permiso   Id del permiso al que pertenece el usuario
	 */
	public function obtenerIdPermisoXIdUsuario($id_usuario)
	{
		// Obtenemos el objeto sfGuardUserPermission apartir del id de usuario
		$obj_userpermission = $this->obtenerObjUserPermissionXIdUsuario($id_usuario);
		
		if($obj_userpermission)
		{
			$id_permiso = $obj_userpermission->getPermissionId();
			
			return $id_permiso;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Comprobar si un permiso tiene usuarios asignados
	 * 
	 * @param integer $id_permiso Id del permiso
	 * 
	 * @return boolean TRUE si tiene usuarios asignados, FALSE en caso contrario
	 */
	public function comprobarUsuariosPermiso($id_permiso)
	{
		// Buscamos si el permiso tiene usuarios en la tabla sfGuardUserPermission
		$userpermission = new Criteria();
		$userpermission->add(sfGuardUserPermissionPeer::PERMISSION_ID,$id_permiso);		
		$userpermission1 = sfGuardUserPermissionPeer::doSelect($userpermission);
		
		// Si el permiso no está vacio
		if(!empty($userpermission1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/***************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_USER_PERMISSION ********************************************/
	
	
	/**************************************** MÉTODOS PARA LA TABLA DE SF_GUARD_GROUP_PERMISSION *********************************************/
	
	/**
	 * Guardamos un objeto sfGuardGroupPermission
	 * 
	 * @param integer $id_grupo   Id del grupo
	 * @param integer $id_permiso Id del permiso asignado al grupo
	 * 
	 * @return boolean $group_permission_salvado TRUE si se ha salvado correctamente, FALSE en caso contrario
	 */
	public function guardarGroupPermission($id_grupo,$id_permiso)
	{
		// Creamos un nuevo objeto sfGuardGroupPermission
		$group_permission = new sfGuardGroupPermission();
		$group_permission->setGroupId($id_grupo);
		$group_permission->setPermissionId($id_permiso);
		
		// Guardamos el objeto sfGuardGroupPermission en la BD
		$group_permission_salvado = $group_permission->save();
		
		return $group_permission_salvado;
	}
	
	/**
	 * Obtener el objeto sfGuardGroupPermission a partir del Id del permiso
	 * 
	 * @param  integer $id_permiso Id del permiso
	 * 
	 * @return objeto $obj_grouppermission  Objeto sfGuardGroupPermission
	 */
	public function obtenerObjGroupPermissionXIdPermiso($id_permiso)
	{
		// Buscamos el objeto sfGuardUserGroup para el id del usuario
		$grouppermission = new Criteria();
		$grouppermission->add(sfGuardGroupPermissionPeer::PERMISSION_ID,$id_permiso);		
		$grouppermission1 = sfGuardGroupPermissionPeer::doSelect($grouppermission);
		
		// Si no encontramos ningún grupo para el usuario
		if(empty($grouppermission1))
		{
			return false;
		}
		else
		{
			$obj_grouppermission = $grouppermission1[0];
			
			return $obj_grouppermission;	
		}
	}
	
	/**
	 * Obtener el objeto sfGuardGroupPermission a partir del Id del Grupo
	 * 
	 * @param  integer $id_grupo Id del grupo
	 * 
	 * @return objeto $obj_grouppermission  Objeto sfGuardGroupPermission
	 */
	public function obtenerObjGroupPermissionXIdGrupo($id_grupo)
	{
		// Buscamos el objeto sfGuardUserGroup para el id del usuario
		$grouppermission = new Criteria();
		$grouppermission->add(sfGuardGroupPermissionPeer::GROUP_ID,$id_grupo);		
		$grouppermission1 = sfGuardGroupPermissionPeer::doSelect($grouppermission);
		
		// Si no encontramos ningún grupo para el usuario
		if(empty($grouppermission1))
		{
			return false;
		}
		else
		{
			$obj_grouppermission = $grouppermission1[0];
			
			return $obj_grouppermission;	
		}
	}
	
	/**
	 * Obtener el Id Grupo a partir de un objeto sfGuardGroupPermission
	 * 
	 * @param  objeto $usergroup Objeto sfGuardGroupPermission
	 * 
	 * @return integer $id_grupo
	 */
	public function obtenerIdGrupoXObjGroupPermission($obj_grouppermission)
	{
		// Obtenemos el id del grupo a partir del objeto sfGuardGroupPermission
		$id_grupo = $obj_grouppermission->getGroupId();
		
		if(isset($id_grupo))
		{
			return $id_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del Grupo a partir del Id del Permiso
	 * 
	 * @param integer  $id_permiso Id del permiso
	 * 
	 * @return integer $id_grupo   Id del grupo que tiene ese permiso
	 */
	public function obtenerIdGrupoXIdPermiso($id_permiso)
	{
		// Obtenemos el objeto sfGuardUserGroup apartir del id de usuario
		$obj_grouppermission = $this->obtenerObjGroupPermissionXIdPermiso($id_permiso);
		
		if($obj_grouppermission)
		{
			$id_grupo = $obj_grouppermission->getGroupId();
			
			return $id_grupo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Comprobar si un permiso tiene grupos asignados
	 * 
	 * @param integer $id_permiso Id del permiso
	 * 
	 * @return boolean TRUE si tiene grupos asignados, FALSE en caso contrario
	 */
	public function comprobarGruposPermiso($id_permiso)
	{
		// Buscamos si el permiso tiene grupos en la tabla sfGuardGroupPermission
		$grouppermission = new Criteria();
		$grouppermission->add(sfGuardGroupPermissionPeer::PERMISSION_ID,$id_permiso);		
		$grouppermission1 = sfGuardGroupPermissionPeer::doSelect($grouppermission);
		
		// Si el permiso no está vacio
		if(!empty($grouppermission1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/***************************************FIN MÉTODOS PARA LA TABLA DE SF_GUARD_GROUP_PERMISSION *******************************************/
			
	/**************************************** MÉTODOS PARA LA TABLA DE ESTADO PEDIDOS *********************************************/
	
	/**
	 * Guardar un objeto Estado Pedido
	 * 
	 * @param string   $estado_pedido          Nombre del Estado Pedido
	 * 
	 * @return boolean $id_estado_pedido_save  Id del Estado Pedido guardado, o FALSE en caso contrario
	 */
	public function guardarEstadoPedido($estado_pedido)
	{
		// Creamos un nuevo objeto Estado Pedido
		$obj_estado_pedido = new EstadoPedidos();
		$obj_estado_pedido->setEstadoPedido($estado_pedido);
		
		// Guardamos el permiso en la BD
		$obj_estado_pedido_save = $obj_estado_pedido->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$id_estado_pedido_save = $obj_estado_pedido->getIdEstadoPedido();
		
		if ($obj_estado_pedido_save)
		{
			return $id_estado_pedido_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un Estado Pedido de la tabla Estados Pedidos
	 * 
	 * @param integer $id_estado_pedido  Id del Estado Pedido
	 * @param string  $estado_pedido     Nombre del Estado Pedido
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoPedido($id_estado_pedido,$estado_pedido)
	 {
	 	// Creamos un nuevo objeto Estado Pedido
	 	$obj_estado_pedido = new EstadoPedidos();
	 	$obj_estado_pedido->setIdEstadoPedido($id_estado_pedido);
	 	$obj_estado_pedido->setEstadoPedido($estado_pedido);
	 	
	 	// Actualizamos el Estado Pedido en la BD
	 	$estados_pedidos_update = EstadoPedidosPeer::doUpdate($obj_estado_pedido);
	 	
	 	return $estados_pedidos_update;
	 }
	 
	/**
	 * Borrar un Estado Pedido de la tabla Estados Pedidos
	 * 
	 * @param integer $id_estado_pedido Id del Estado Pedido a borrar
	 */
	 public function borrarEstadoPedido($id_estado_pedido)
	 {
	 	// Borramos el Estado Pedido de la tabla sfGuardGroup
	 	EstadoPedidosPeer::doDelete($id_estado_pedido);
	 }	
	
	/**
	 * Obtener el objeto Estado Pedido a partir del Id del Estado Pedido
	 * 
	 * @param integer $id_estado_pedido Id del Estado Pedido
	 * 
	 * @return objeto $obj_estado_pedido    Objeto Estado Pedido buscado por el Id del Estado Pedido
	 */
	public function obtenerObjEstadoPedido($id_estado_pedido)
	{
		// Obtenemos el objeto permiso de Estado Pedido
		$obj_estado_pedido = EstadoPedidosPeer::retrieveByPk($id_estado_pedido);
		
		// Si está definido el objeto Estado Pedido
		if(isset($obj_estado_pedido))
		{
			return $obj_estado_pedido;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Estado Pedidos
	 * 
	 * @return array $ar_estado_pedidos   Array de todos los objetos Estado Pedidos
	 */
	public function obtenerTodosEstadoPedidos()
	{
		// Obtenemos todos los Estados Pedido de la tabla Estado Pedidos
		$estado_pedidos = new Criteria();
		$ar_estado_pedidos = EstadoPedidosPeer::doSelect($estado_pedidos);
		
		// Si hay Estado Pedidos
		if(!empty($ar_estado_pedidos))
		{
			return $ar_estado_pedidos;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Pedidos de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_pedidos  Array de Estado Pedidos con llave el id del estado pedidos y contenido el Nombre del estado pedido
	 */
	public function obtenerSelectEstadoPedidos()
	{
		// Obtenemos todos los Estado Pedidos
		$estado_pedidos = $this->obtenerTodosEstadoPedidos();
		
		// Creamos un array con los Estado Pedidos para el select del formulario
		$ar_estado_pedidos[0] = "";
		
		foreach($estado_pedidos as $estado_pedido)
		{
			$nombre_estado_pedido = $estado_pedido->getEstadoPedido();
			$i = $estado_pedido->getIdEstadoPedido();
			$ar_estado_pedidos[$i] = $nombre_estado_pedido;
		}
		
		// Array con el nombre de los Estado Pedidos y llave el id
		return $ar_estado_pedidos;
	}
	
	/**
	 * Obtener un Select con todos los Estado Pedidos de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_estado_pedidos  Array de Estado Pedidos con llave el id del estado pedidos y contenido el Nombre del estado pedido
	 */
	public function obtenerSelectEstadoPedidos2()
	{
		// Obtenemos todos los Estado Pedidos
		$estado_pedidos = $this->obtenerTodosEstadoPedidos();
		
		// Creamos un array con los Estado Pedidos para el select del formulario
		$ar_estado_pedidos[0] = "------";
		
		foreach($estado_pedidos as $estado_pedido)
		{
			$nombre_estado_pedido = $estado_pedido->getEstadoPedido();
			$i = $estado_pedido->getIdEstadoPedido();
			$ar_estado_pedidos[$i] = $nombre_estado_pedido;
		}
		
		// Array con el nombre de los Estado Pedidos y llave el id
		return $ar_estado_pedidos;
	}
	
	/**
	 * Obtener un Select con todos los Estado Pedidos de la aplicacion
	 * ID = 0 -> "Seleccionar Estado Pedido"
	 * 
	 * @return array $ar_estado_pedidos  Array de Estado Pedidos con llave el id del estado pedidos y contenido el Nombre del estado pedido
	 */
	public function obtenerSelectEstadoPedidos3()
	{
		// Obtenemos todos los Estado Pedidos
		$estado_pedidos = $this->obtenerTodosEstadoPedidos();
		
		// Creamos un array con los Estado Pedidos para el select del formulario
		$ar_estado_pedidos[0] = "Seleccionar Estado Pedido";
		
		foreach($estado_pedidos as $estado_pedido)
		{
			$nombre_estado_pedido = $estado_pedido->getEstadoPedido();
			$i = $estado_pedido->getIdEstadoPedido();
			$ar_estado_pedidos[$i] = $nombre_estado_pedido;
		}
		
		// Array con el nombre de los Estado Pedidos y llave el id
		return $ar_estado_pedidos;
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Pedidos Pendientes, id menor que 5, de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_pedidos  Array de Estado Pedidos con llave el id del estado pedidos y contenido el Nombre del estado pedido
	 */
	public function obtenerSelectEstadoPedidosPendientes()
	{
		// Obtenemos todos los Estado Pedidos
		$estado_pedidos = $this->obtenerTodosEstadoPedidos();
		
		// Creamos un array con los Estado Pedidos para el select del formulario
		$ar_estado_pedidos[0] = "";
		
		foreach($estado_pedidos as $estado_pedido)
		{
			if($estado_pedido->getIdEstadoPedido() != 5)
			{
				$nombre_estado_pedido = $estado_pedido->getEstadoPedido();
				$i = $estado_pedido->getIdEstadoPedido();
				$ar_estado_pedidos[$i] = $nombre_estado_pedido;	
			}
		}
		
		// Array con el nombre de los Estado Pedidos y llave el id
		return $ar_estado_pedidos;
	}
	
	/**
	 * Comprobar si un estado pedido esta siendo usado
	 * 
	 * @param integer $id_estado_pedido Id del estado pedido
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarEstadoPedido($id_estado_pedido)
	{
		// Buscamos si el estado pedido está siendo usado en la tabla Pedidos
		$estado_pedido = new Criteria();
		$estado_pedido->add(PedidosPeer::ID_ESTADO_PEDIDO,$id_estado_pedido);		
		$estado_pedido1 = PedidosPeer::doSelect($estado_pedido);
		
		// Si el estado pedido no está vacio
		if(!empty($estado_pedido1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**************************************** MÉTODOS PARA LA TABLA DE ESTADO ENTRADAS *********************************************/
	
	/**
	 * Guardar un objeto Estado Entrada
	 * 
	 * @param string   $estado_entrada          Nombre del Estado Entrada
	 * 
	 * @return boolean $id_estado_entrada_save  Id del Estado Entrada guardado, o FALSE en caso contrario
	 */
	public function guardarEstadoEntrada($estado_entrada)
	{
		// Creamos un nuevo objeto Estado Entrada
		$obj_estado_entrada = new EstadoEntradas();
		$obj_estado_entrada->setEstadoEntrada($estado_entrada);
		
		// Guardamos el permiso en la BD
		$obj_estado_entrada_save = $obj_estado_entrada->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$id_estado_entrada_save = $obj_estado_entrada->getIdEstadoEntrada();
		
		if ($obj_estado_entrada_save)
		{
			return $id_estado_entrada_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un Estado Entrada de la tabla Estados Entradas
	 * 
	 * @param integer $id_estado_entrada  Id del Estado Entrada
	 * @param string  $estado_entrada     Nombre del Estado Entrada
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoEntrada($id_estado_entrada,$estado_entrada)
	 {
	 	// Creamos un nuevo objeto Estado Entrada
	 	$obj_estado_entrada = new EstadoEntradas();
	 	$obj_estado_entrada->setIdEstadoEntrada($id_estado_entrada);
	 	$obj_estado_entrada->setEstadoEntrada($estado_entrada);
	 	
	 	// Actualizamos el Estado Entrada en la BD
	 	$estados_entradas_update = EstadoEntradasPeer::doUpdate($obj_estado_entrada);
	 	
	 	return $estados_entradas_update;
	 }
	 
	/**
	 * Borrar un Estado Entrada de la tabla Estados Entradas
	 * 
	 * @param integer $id_estado_entrada Id del Estado Entrada a borrar
	 */
	 public function borrarEstadoEntrada($id_estado_entrada)
	 {
	 	// Borramos el Estado Entrada de la tabla sfGuardGroup
	 	EstadoEntradasPeer::doDelete($id_estado_entrada);
	 }	
	
	/**
	 * Obtener el objeto Estado Entrada a partir del Id del Estado Entrada
	 * 
	 * @param integer $id_estado_entrada Id del Estado Entrada
	 * 
	 * @return objeto $obj_estado_entrada    Objeto Estado Entrada buscado por el Id del Estado Entrada
	 */
	public function obtenerObjEstadoEntrada($id_estado_entrada)
	{
		// Obtenemos el objeto permiso de Estado Entrada
		$obj_estado_entrada = EstadoEntradasPeer::retrieveByPk($id_estado_entrada);
		
		// Si está definido el objeto Estado Entrada
		if(isset($obj_estado_entrada))
		{
			return $obj_estado_entrada;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Estado Entradas
	 * 
	 * @return array $ar_estado_entradas   Array de todos los objetos Estado Entradas
	 */
	public function obtenerTodosEstadoEntradas()
	{
		// Obtenemos todos los Estados Entrada de la tabla Estado Entradas
		$estado_entradas = new Criteria();
		$ar_estado_entradas = EstadoEntradasPeer::doSelect($estado_entradas);
		
		// Si hay Estado Entradas
		if(!empty($ar_estado_entradas))
		{
			return $ar_estado_entradas;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Entradas de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_entradas  Array de Estado Entradas con llave el id del estado entradas y contenido el Nombre del estado entrada
	 */
	public function obtenerSelectEstadoEntradas()
	{
		// Obtenemos todos los Estado Entradas
		$estado_entradas = $this->obtenerTodosEstadoEntradas();
		
		// Creamos un array con los Estado Entradas para el select del formulario
		$ar_estado_entradas[0] = "";
		
		foreach($estado_entradas as $estado_entrada)
		{
			$nombre_estado_entrada = $estado_entrada->getEstadoEntrada();
			$i = $estado_entrada->getIdEstadoEntrada();
			$ar_estado_entradas[$i] = $nombre_estado_entrada;
		}
		
		// Array con el nombre de los Estado Entradas y llave el id
		return $ar_estado_entradas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Entradas de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_estado_entradas  Array de Estado Entradas con llave el id del estado entradas y contenido el Nombre del estado entrada
	 */
	public function obtenerSelectEstadoEntradas2()
	{
		// Obtenemos todos los Estado Entradas
		$estado_entradas = $this->obtenerTodosEstadoEntradas();
		
		// Creamos un array con los Estado Entradas para el select del formulario
		$ar_estado_entradas[0] = "------";
		
		foreach($estado_entradas as $estado_entrada)
		{
			$nombre_estado_entrada = $estado_entrada->getEstadoEntrada();
			$i = $estado_entrada->getIdEstadoEntrada();
			$ar_estado_entradas[$i] = $nombre_estado_entrada;
		}
		
		// Array con el nombre de los Estado Entradas y llave el id
		return $ar_estado_entradas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Entradas de la aplicacion
	 * ID = 0 -> "Seleccionar Estado Entrada"
	 * 
	 * @return array $ar_estado_entradas  Array de Estado Entradas con llave el id del estado entradas y contenido el Nombre del estado entrada
	 */
	public function obtenerSelectEstadoEntradas3()
	{
		// Obtenemos todos los Estado Entradas
		$estado_entradas = $this->obtenerTodosEstadoEntradas();
		
		// Creamos un array con los Estado Entradas para el select del formulario
		$ar_estado_entradas[0] = "Seleccionar Estado Entrada";
		
		foreach($estado_entradas as $estado_entrada)
		{
			$nombre_estado_entrada = $estado_entrada->getEstadoEntrada();
			$i = $estado_entrada->getIdEstadoEntrada();
			$ar_estado_entradas[$i] = $nombre_estado_entrada;
		}
		
		// Array con el nombre de los Estado Entradas y llave el id
		return $ar_estado_entradas;
	}
	
	/**
	 * Comprobar si un estado entrada esta siendo usado
	 * 
	 * @param integer $id_estado_entrada Id del estado entrada
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarEstadoEntrada($id_estado_entrada)
	{
		// Buscamos si el estado entrada está siendo usado en la tabla Entradas
		$estado_entrada = new Criteria();
		$estado_entrada->add(EntradasPeer::ID_ESTADO_ENTRADA,$id_estado_entrada);		
		$estado_entrada1 = EntradasPeer::doSelect($estado_entrada);
		
		// Si el estado entrada no está vacio
		if(!empty($estado_entrada1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**************************************** MÉTODOS PARA LA TABLA DE ESTADO SALIDAS *********************************************/
	
	/**
	 * Guardar un objeto Estado Salida
	 * 
	 * @param string   $estado_salida          Nombre del Estado Salida
	 * 
	 * @return boolean $id_estado_salida_save  Id del Estado Salida guardado, o FALSE en caso contrario
	 */
	public function guardarEstadoSalida($estado_salida)
	{
		// Creamos un nuevo objeto Estado Salida
		$obj_estado_salida = new EstadoSalidas();
		$obj_estado_salida->setEstadoSalida($estado_salida);
		
		// Guardamos el permiso en la BD
		$obj_estado_salida_save = $obj_estado_salida->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$id_estado_salida_save = $obj_estado_salida->getIdEstadoSalida();
		
		if ($obj_estado_salida_save)
		{
			return $id_estado_salida_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un Estado Salida de la tabla Estados Salidas
	 * 
	 * @param integer $id_estado_salida  Id del Estado Salida
	 * @param string  $estado_salida     Nombre del Estado Salida
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoSalida($id_estado_salida,$estado_salida)
	 {
	 	// Creamos un nuevo objeto Estado Salida
	 	$obj_estado_salida = new EstadoSalidas();
	 	$obj_estado_salida->setIdEstadoSalida($id_estado_salida);
	 	$obj_estado_salida->setEstadoSalida($estado_salida);
	 	
	 	// Actualizamos el Estado Salida en la BD
	 	$estados_salidas_update = EstadoSalidasPeer::doUpdate($obj_estado_salida);
	 	
	 	return $estados_salidas_update;
	 }
	 
	/**
	 * Borrar un Estado Salida de la tabla Estados Salidas
	 * 
	 * @param integer $id_estado_salida Id del Estado Salida a borrar
	 */
	 public function borrarEstadoSalida($id_estado_salida)
	 {
	 	// Borramos el Estado Salida de la tabla sfGuardGroup
	 	EstadoSalidasPeer::doDelete($id_estado_salida);
	 }	
	
	/**
	 * Obtener el objeto Estado Salida a partir del Id del Estado Salida
	 * 
	 * @param integer $id_estado_salida Id del Estado Salida
	 * 
	 * @return objeto $obj_estado_salida    Objeto Estado Salida buscado por el Id del Estado Salida
	 */
	public function obtenerObjEstadoSalida($id_estado_salida)
	{
		// Obtenemos el objeto permiso de Estado Salida
		$obj_estado_salida = EstadoSalidasPeer::retrieveByPk($id_estado_salida);
		
		// Si está definido el objeto Estado Salida
		if(isset($obj_estado_salida))
		{
			return $obj_estado_salida;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Estado Salidas
	 * 
	 * @return array $ar_estado_salidas   Array de todos los objetos Estado Salidas
	 */
	public function obtenerTodosEstadoSalidas()
	{
		// Obtenemos todos los Estados Salida de la tabla Estado Salidas
		$estado_salidas = new Criteria();
		$ar_estado_salidas = EstadoSalidasPeer::doSelect($estado_salidas);
		
		// Si hay Estado Salidas
		if(!empty($ar_estado_salidas))
		{
			return $ar_estado_salidas;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Salidas de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_salidas  Array de Estado Salidas con llave el id del estado salidas y contenido el Nombre del estado salida
	 */
	public function obtenerSelectEstadoSalidas()
	{
		// Obtenemos todos los Estado Salidas
		$estado_salidas = $this->obtenerTodosEstadoSalidas();
		
		// Creamos un array con los Estado Salidas para el select del formulario
		$ar_estado_salidas[0] = "";
		
		foreach($estado_salidas as $estado_salida)
		{
			$nombre_estado_salida = $estado_salida->getEstadoSalida();
			$i = $estado_salida->getIdEstadoSalida();
			$ar_estado_salidas[$i] = $nombre_estado_salida;
		}
		
		// Array con el nombre de los Estado Salidas y llave el id
		return $ar_estado_salidas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Salidas de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_estado_salidas  Array de Estado Salidas con llave el id del estado salidas y contenido el Nombre del estado salida
	 */
	public function obtenerSelectEstadoSalidas2()
	{
		// Obtenemos todos los Estado Salidas
		$estado_salidas = $this->obtenerTodosEstadoSalidas();
		
		// Creamos un array con los Estado Salidas para el select del formulario
		$ar_estado_salidas[0] = "------";
		
		foreach($estado_salidas as $estado_salida)
		{
			$nombre_estado_salida = $estado_salida->getEstadoSalida();
			$i = $estado_salida->getIdEstadoSalida();
			$ar_estado_salidas[$i] = $nombre_estado_salida;
		}
		
		// Array con el nombre de los Estado Salidas y llave el id
		return $ar_estado_salidas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Salidas de la aplicacion
	 * ID = 0 -> "Seleccionar Estado Salida"
	 * 
	 * @return array $ar_estado_salidas  Array de Estado Salidas con llave el id del estado salidas y contenido el Nombre del estado salida
	 */
	public function obtenerSelectEstadoSalidas3()
	{
		// Obtenemos todos los Estado Salidas
		$estado_salidas = $this->obtenerTodosEstadoSalidas();
		
		// Creamos un array con los Estado Salidas para el select del formulario
		$ar_estado_salidas[0] = "Seleccionar Estado Salida";
		
		foreach($estado_salidas as $estado_salida)
		{
			$nombre_estado_salida = $estado_salida->getEstadoSalida();
			$i = $estado_salida->getIdEstadoSalida();
			$ar_estado_salidas[$i] = $nombre_estado_salida;
		}
		
		// Array con el nombre de los Estado Salidas y llave el id
		return $ar_estado_salidas;
	}
	
	/**
	 * Comprobar si un estado salida esta siendo usado
	 * 
	 * @param integer $id_estado_salida Id del estado salida
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarEstadoSalida($id_estado_salida)
	{
		// Buscamos si el estado salida está siendo usado en la tabla Salidas
		$estado_salida = new Criteria();
		$estado_salida->add(SalidasPeer::ID_ESTADO_SALIDA,$id_estado_salida);		
		$estado_salida1 = SalidasPeer::doSelect($estado_salida);
		
		// Si el estado salida no está vacio
		if(!empty($estado_salida1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**************************************** MÉTODOS PARA LA TABLA DE ESTADO VENTAS *********************************************/
	
	/**
	 * Guardar un objeto Estado Venta
	 * 
	 * @param string   $estado_venta          Nombre del Estado Venta
	 * 
	 * @return boolean $id_estado_venta_save  Id del Estado Venta guardado, o FALSE en caso contrario
	 */
	public function guardarEstadoVenta($estado_venta)
	{
		// Creamos un nuevo objeto Estado Venta
		$obj_estado_venta = new EstadoVentas();
		$obj_estado_venta->setEstadoVenta($estado_venta);
		
		// Guardamos el permiso en la BD
		$obj_estado_venta_save = $obj_estado_venta->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$id_estado_venta_save = $obj_estado_venta->getIdEstadoVenta();
		
		if ($obj_estado_venta_save)
		{
			return $id_estado_venta_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un Estado Venta de la tabla Estados Ventas
	 * 
	 * @param integer $id_estado_venta  Id del Estado Venta
	 * @param string  $estado_venta     Nombre del Estado Venta
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoVenta($id_estado_venta,$estado_venta)
	 {
	 	// Creamos un nuevo objeto Estado Venta
	 	$obj_estado_venta = new EstadoVentas();
	 	$obj_estado_venta->setIdEstadoVenta($id_estado_venta);
	 	$obj_estado_venta->setEstadoVenta($estado_venta);
	 	
	 	// Actualizamos el Estado Venta en la BD
	 	$estados_ventas_update = EstadoVentasPeer::doUpdate($obj_estado_venta);
	 	
	 	return $estados_ventas_update;
	 }
	 
	/**
	 * Borrar un Estado Venta de la tabla Estados Ventas
	 * 
	 * @param integer $id_estado_venta Id del Estado Venta a borrar
	 */
	 public function borrarEstadoVenta($id_estado_venta)
	 {
	 	// Borramos el Estado Venta de la tabla sfGuardGroup
	 	EstadoVentasPeer::doDelete($id_estado_venta);
	 }	
	
	/**
	 * Obtener el objeto Estado Venta a partir del Id del Estado Venta
	 * 
	 * @param integer $id_estado_venta Id del Estado Venta
	 * 
	 * @return objeto $obj_estado_venta    Objeto Estado Venta buscado por el Id del Estado Venta
	 */
	public function obtenerObjEstadoVenta($id_estado_venta)
	{
		// Obtenemos el objeto permiso de Estado Venta
		$obj_estado_venta = EstadoVentasPeer::retrieveByPk($id_estado_venta);
		
		// Si está definido el objeto Estado Venta
		if(isset($obj_estado_venta))
		{
			return $obj_estado_venta;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Estado Ventas
	 * 
	 * @return array $ar_estado_ventas   Array de todos los objetos Estado Ventas
	 */
	public function obtenerTodosEstadoVentas()
	{
		// Obtenemos todos los Estados Venta de la tabla Estado Ventas
		$estado_ventas = new Criteria();
		$ar_estado_ventas = EstadoVentasPeer::doSelect($estado_ventas);
		
		// Si hay Estado Ventas
		if(!empty($ar_estado_ventas))
		{
			return $ar_estado_ventas;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Ventas de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_ventas  Array de Estado Ventas con llave el id del estado ventas y contenido el Nombre del estado venta
	 */
	public function obtenerSelectEstadoVentas()
	{
		// Obtenemos todos los Estado Ventas
		$estado_ventas = $this->obtenerTodosEstadoVentas();
		
		// Creamos un array con los Estado Ventas para el select del formulario
		$ar_estado_ventas[0] = "";
		
		foreach($estado_ventas as $estado_venta)
		{
			$nombre_estado_venta = $estado_venta->getEstadoVenta();
			$i = $estado_venta->getIdEstadoVenta();
			$ar_estado_ventas[$i] = $nombre_estado_venta;
		}
		
		// Array con el nombre de los Estado Ventas y llave el id
		return $ar_estado_ventas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Ventas de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_estado_ventas  Array de Estado Ventas con llave el id del estado ventas y contenido el Nombre del estado venta
	 */
	public function obtenerSelectEstadoVentas2()
	{
		// Obtenemos todos los Estado Ventas
		$estado_ventas = $this->obtenerTodosEstadoVentas();
		
		// Creamos un array con los Estado Ventas para el select del formulario
		$ar_estado_ventas[0] = "------";
		
		foreach($estado_ventas as $estado_venta)
		{
			$nombre_estado_venta = $estado_venta->getEstadoVenta();
			$i = $estado_venta->getIdEstadoVenta();
			$ar_estado_ventas[$i] = $nombre_estado_venta;
		}
		
		// Array con el nombre de los Estado Ventas y llave el id
		return $ar_estado_ventas;
	}
	
	/**
	 * Obtener un Select con todos los Estado Ventas de la aplicacion
	 * ID = 0 -> "Seleccionar Estado Venta"
	 * 
	 * @return array $ar_estado_ventas  Array de Estado Ventas con llave el id del estado ventas y contenido el Nombre del estado venta
	 */
	public function obtenerSelectEstadoVentas3()
	{
		// Obtenemos todos los Estado Ventas
		$estado_ventas = $this->obtenerTodosEstadoVentas();
		
		// Creamos un array con los Estado Ventas para el select del formulario
		$ar_estado_ventas[0] = "Seleccionar Estado Venta";
		
		foreach($estado_ventas as $estado_venta)
		{
			$nombre_estado_venta = $estado_venta->getEstadoVenta();
			$i = $estado_venta->getIdEstadoVenta();
			$ar_estado_ventas[$i] = $nombre_estado_venta;
		}
		
		// Array con el nombre de los Estado Ventas y llave el id
		return $ar_estado_ventas;
	}
	
	/**
	 * Comprobar si un estado venta esta siendo usado
	 * 
	 * @param integer $id_estado_venta Id del estado venta
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarEstadoVenta($id_estado_venta)
	{
		// Buscamos si el estado venta está siendo usado en la tabla Ventas
		$estado_venta = new Criteria();
		$estado_venta->add(VentasPeer::ID_ESTADO_VENTA,$id_estado_venta);		
		$estado_venta1 = VentasPeer::doSelect($estado_venta);
		
		// Si el estado venta no está vacio
		if(!empty($estado_venta1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**************************************** MÉTODOS PARA LA TABLA DE ESTADO UBICACIONES *********************************************/
	
	/**
	 * Guardar un objeto Estado Ubicacion
	 * 
	 * @param string   $estado_ubicacion          Nombre del Estado Ubicacion
	 * 
	 * @return boolean $id_estado_ubicacion_save  Id del Estado Ubicacion guardado, o FALSE en caso contrario
	 */
	public function guardarEstadoUbicacion($estado_ubicacion)
	{
		// Creamos un nuevo objeto Estado Ubicacion
		$obj_estado_ubicacion = new EstadoUbicaciones();
		$obj_estado_ubicacion->setEstadoUbicacion($estado_ubicacion);
		
		// Guardamos el permiso en la BD
		$obj_estado_ubicacion_save = $obj_estado_ubicacion->save();
		
		// Obtenemos el id del ultimo permiso insertado
		$id_estado_ubicacion_save = $obj_estado_ubicacion->getIdEstadoUbicacion();
		
		if ($obj_estado_ubicacion_save)
		{
			return $id_estado_ubicacion_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizamos un Estado Ubicacion de la tabla Estados Ubicaciones
	 * 
	 * @param integer $id_estado_ubicacion  Id del Estado Ubicacion
	 * @param string  $estado_ubicacion     Nombre del Estado Ubicacion
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoUbicacion($id_estado_ubicacion,$estado_ubicacion)
	 {
	 	// Creamos un nuevo objeto Estado Ubicacion
	 	$obj_estado_ubicacion = new EstadoUbicaciones();
	 	$obj_estado_ubicacion->setIdEstadoUbicacion($id_estado_ubicacion);
	 	$obj_estado_ubicacion->setEstadoUbicacion($estado_ubicacion);
	 	
	 	// Actualizamos el Estado Ubicacion en la BD
	 	$estados_ubicaciones_update = EstadoUbicacionesPeer::doUpdate($obj_estado_ubicacion);
	 	
	 	return $estados_ubicaciones_update;
	 }
	 
	/**
	 * Borrar un Estado Ubicacion de la tabla Estados Ubicaciones
	 * 
	 * @param integer $id_estado_ubicacion Id del Estado Ubicacion a borrar
	 */
	 public function borrarEstadoUbicacion($id_estado_ubicacion)
	 {
	 	// Borramos el Estado Ubicacion de la tabla sfGuardGroup
	 	EstadoUbicacionesPeer::doDelete($id_estado_ubicacion);
	 }	
	
	/**
	 * Obtener el objeto Estado Ubicacion a partir del Id del Estado Ubicacion
	 * 
	 * @param integer $id_estado_ubicacion Id del Estado Ubicacion
	 * 
	 * @return objeto $obj_estado_ubicacion    Objeto Estado Ubicacion buscado por el Id del Estado Ubicacion
	 */
	public function obtenerObjEstadoUbicacion($id_estado_ubicacion)
	{
		// Obtenemos el objeto permiso de Estado Ubicacion
		$obj_estado_ubicacion = EstadoUbicacionesPeer::retrieveByPk($id_estado_ubicacion);
		
		// Si está definido el objeto Estado Ubicacion
		if(isset($obj_estado_ubicacion))
		{
			return $obj_estado_ubicacion;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Estado Ubicaciones
	 * 
	 * @return array $ar_estado_ubicaciones   Array de todos los objetos Estado Ubicaciones
	 */
	public function obtenerTodosEstadoUbicaciones()
	{
		// Obtenemos todos los Estados Ubicacion de la tabla Estado Ubicaciones
		$estado_ubicaciones = new Criteria();
		$ar_estado_ubicaciones = EstadoUbicacionesPeer::doSelect($estado_ubicaciones);
		
		// Si hay Estado Ubicaciones
		if(!empty($ar_estado_ubicaciones))
		{
			return $ar_estado_ubicaciones;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Obtener un Select con todos los Estado Ubicaciones de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_ubicaciones  Array de Estado Ubicaciones con llave el id del estado ubicaciones y contenido el Nombre del estado ubicacion
	 */
	public function obtenerSelectEstadoUbicaciones()
	{
		// Obtenemos todos los Estado Ubicaciones
		$estado_ubicaciones = $this->obtenerTodosEstadoUbicaciones();
		
		foreach($estado_ubicaciones as $estado_ubicacion)
		{
			$nombre_estado_ubicacion = $estado_ubicacion->getEstadoUbicacion();
			$i = $estado_ubicacion->getIdEstadoUbicacion();
			$ar_estado_ubicaciones[$i] = $nombre_estado_ubicacion;
		}
		
		// Array con el nombre de los Estado Ubicaciones y llave el id
		return $ar_estado_ubicaciones;
	}
	
	/**
	 * Obtener un Select con todos los Estado Ubicaciones de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_estado_ubicaciones  Array de Estado Ubicaciones con llave el id del estado ubicaciones y contenido el Nombre del estado ubicacion
	 */
	public function obtenerSelectEstadoUbicaciones1()
	{
		// Obtenemos todos los Estado Ubicaciones
		$estado_ubicaciones = $this->obtenerTodosEstadoUbicaciones();
		
		// Creamos un array con los Estado Ubicaciones para el select del formulario
		$ar_estado_ubicaciones[0] = "";
		
		foreach($estado_ubicaciones as $estado_ubicacion)
		{
			$nombre_estado_ubicacion = $estado_ubicacion->getEstadoUbicacion();
			$i = $estado_ubicacion->getIdEstadoUbicacion();
			$ar_estado_ubicaciones[$i] = $nombre_estado_ubicacion;
		}
		
		// Array con el nombre de los Estado Ubicaciones y llave el id
		return $ar_estado_ubicaciones;
	}
	
	/**
	 * Obtener un Select con todos los Estado Ubicaciones de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_estado_ubicaciones  Array de Estado Ubicaciones con llave el id del estado ubicaciones y contenido el Nombre del estado ubicacion
	 */
	public function obtenerSelectEstadoUbicaciones2()
	{
		// Obtenemos todos los Estado Ubicaciones
		$estado_ubicaciones = $this->obtenerTodosEstadoUbicaciones();
		
		// Creamos un array con los Estado Ubicaciones para el select del formulario
		$ar_estado_ubicaciones[0] = "------";
		
		foreach($estado_ubicaciones as $estado_ubicacion)
		{
			$nombre_estado_ubicacion = $estado_ubicacion->getEstadoUbicacion();
			$i = $estado_ubicacion->getIdEstadoUbicacion();
			$ar_estado_ubicaciones[$i] = $nombre_estado_ubicacion;
		}
		
		// Array con el nombre de los Estado Ubicaciones y llave el id
		return $ar_estado_ubicaciones;
	}
	
	/**
	 * Obtener un Select con todos los Estado Ubicaciones de la aplicacion
	 * ID = 0 -> "Seleccionar Estado Ubicacion"
	 * 
	 * @return array $ar_estado_ubicaciones  Array de Estado Ubicaciones con llave el id del estado ubicaciones y contenido el Nombre del estado ubicacion
	 */
	public function obtenerSelectEstadoUbicaciones3()
	{
		// Obtenemos todos los Estado Ubicaciones
		$estado_ubicaciones = $this->obtenerTodosEstadoUbicaciones();
		
		// Creamos un array con los Estado Ubicaciones para el select del formulario
		$ar_estado_ubicaciones[0] = "Seleccionar Estado Ubicación";
		
		foreach($estado_ubicaciones as $estado_ubicacion)
		{
			$nombre_estado_ubicacion = $estado_ubicacion->getEstadoUbicacion();
			$i = $estado_ubicacion->getIdEstadoUbicacion();
			$ar_estado_ubicaciones[$i] = $nombre_estado_ubicacion;
		}
		
		// Array con el nombre de los Estado Ubicaciones y llave el id
		return $ar_estado_ubicaciones;
	}	
	
	/************************************************** OTROS MÉTODOS ************************************************************************/
	/**
	 * Obtener un Select con los tiempos de repeticion para la tarea programda
	 * ID = 0 -> "5 minutos"
	 * 
	 * @return array $ar_tiempo_repeticion  Array de tiempos de repeticion con llave el tiempo en segundos y contenido el texto
	 */
	public function obtenerSelectTiempoRepeticion()
	{
		// Creamos un array
		$ar_tiempo_repeticion = array("300" => "5 minutos",
							"600" => "10 minutos",
							"900" => "15 minutos",
							"1800" => "30 minutos",
							"3600" => "1 hora",
							"7200" => "2 horas",
							"18000" => "5 horas",
							"43200" => "12 horas",
							"86400" => "1 día",
							"259200" => "3 días",
							"604800" => "7 días",		
							);
		
		// Array de tiempos de repeticion
		return $ar_tiempo_repeticion;
	}
	
	/**
	 * Obtenemos el obj de la configuracion de la tarea programada
	 */
	public function obtenerObjConfTareaProgramada()
	{
		// Obtenemos el obj de la configuracion de la tarea programada
		$obj_tarea_programada = ConfiguracionTareaProgramadaPeer::retrieveByPk(1);
		
		return $obj_tarea_programada;
	}
	
	/**
	 * Actualizamos el valor del tiempo de repeticion de la tarea programada
	 */
	public function actualizarTiempoTareaProgramada($tiempo_repeticion)
	{
		// Creamos un nuevo objeto tarea programada
	 	$obj_tarea_programada = new ConfiguracionTareaProgramada();
	 	$obj_tarea_programada->setIdConfiguracion(1);
	 	$obj_tarea_programada->setTiempoRepeticion($tiempo_repeticion);
	 	
	 	// Actualizamos la tarea programada en la BD
	 	$obj_tarea_programada_update = ConfiguracionTareaProgramadaPeer::doUpdate($obj_tarea_programada);
	 	
	 	return $obj_tarea_programada_update;
	}
	
	/**
	 * Actualizamos el valor de la fecha de ultima actualizacion de la tarea programada
	 */
	public function actualizarFechaTiempoUltimaActualizacion($ultima_actualizacion)
	{
		// Creamos un nuevo objeto tarea programada
	 	$obj_tarea_programada = new ConfiguracionTareaProgramada();
	 	$obj_tarea_programada->setIdConfiguracion(1);
	 	$obj_tarea_programada->setFechaUltimaActualizacion($ultima_actualizacion);
	 	
	 	// Actualizamos la tarea programada en la BD
	 	$obj_tarea_programada_update = ConfiguracionTareaProgramadaPeer::doUpdate($obj_tarea_programada);
	 	
	 	return $obj_tarea_programada_update;
	}
		
	/**
	 * Obtener todos los objetos de la Tabla de Configuracion Num Albaran
	 * 
	 * @return array $ar_num_albaran   Array de todos los objetos Configuracion Num Albaran
	 */
	public function obtenerTodosNumAlbaran()
	{
		// Obtenemos todos los Estados Venta de la tabla Estado Ventas
		$num_albaran = new Criteria();
		$ar_num_albaran = ConfiguracionNumerosAlbaranPeer::doSelect($num_albaran);
		
		// Si hay Configuracion de Numeros de Alban
		if(!empty($ar_num_albaran))
		{
			return $ar_num_albaran;
		}
		else
		{
			return false;
		}
	}
		
	/**
	 * Actualizamos el valor de los numeros de Albaran
	 */
	public function actualizarNumerosAlbaran($id_numero_albaran, $numero_albaran)
	{
		// Creamos un nuevo objeto numero albaran
	 	$obj_numeros_albaran = new ConfiguracionNumerosAlbaran();
	 	$obj_numeros_albaran->setIdConfiguracionNumAlbaran($id_numero_albaran);
	 	$obj_numeros_albaran->setNumeroAlbaran($numero_albaran);
	 	
	 	// Actualizamos  objeto numero albaran
	 	$obj_numeros_albaran_update = ConfiguracionNumerosAlbaranPeer::doUpdate($obj_numeros_albaran);
	 	
	 	return $obj_numeros_albaran_update;
	}
	
	/**
	 * Obtener el objeto numeros de Albaran
	 * 
	 * @param integer $id_numero_albaran 
	 * 
	 * @return objeto $obj_numeros_albaran    Objeto delos numeros de Albaran
	 */
	public function obtenerObjNumeroAlbaran($id_numero_albaran)
	{
		// Obtenemos el  objeto numero albaran
		$obj_numeros_albaran = ConfiguracionNumerosAlbaranPeer::retrieveByPk($id_numero_albaran);
		
		// Si está definido el  objeto numero albaran
		if(isset($obj_numeros_albaran))
		{
			return $obj_numeros_albaran;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el valor del numero de labaran segun el id_configuracion_num_albaran
	 * 
	 * @param integer $id_numero_albaran 
	 * 
	 * @return objeto $valor_numero_albaran    Valor del numero de alabaran
	 */
	public function obtenerValorNumeroAlbaran($id_numero_albaran)
	{
		// Obtenemos el  objeto numero albaran
		$obj_numeros_albaran = ConfiguracionNumerosAlbaranPeer::retrieveByPk($id_numero_albaran);
		
		// Si está definido el  objeto numero albaran
		if(isset($obj_numeros_albaran))
		{
			$valor_numero_albaran = $obj_numeros_albaran->getNumeroAlbaran();
			return $valor_numero_albaran;
		}
		else
		{
			return "AAA";
		}
	}
}
?>