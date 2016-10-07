<?php

/**
 * administracion actions.
 *
 * @package    SGUM
 * @subpackage administracion
 * @name       administracionActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class administracionActions extends sfActions
{

	/**
	 * Ejecuta la accion de listar todos los usuarios de la aplicación
	 */
	public function executeIndex()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos todos los grupos de la aplicación
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Obtenemos todos los permisos de la aplicación
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		
		// Creamos la busqueda a BD
		$usuarios = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$login = $this->getRequestParameter('login');
		$login = $this->acc_url->parsearRecepcion($login);
		$this->login = $login;
		if ($this->login != '')
		{
			$usuarios->add(sfGuardUserPeer::USERNAME,'%'.$this->login.'%',Criteria::LIKE);
		}	
				
		$grupo = $this->getRequestParameter('grupo');
		$grupo = $this->acc_url->parsearRecepcion($grupo);
		$this->grupo = $grupo;
		if ($this->grupo != 0)
		{				
			$usuarios->add(sfGuardUserGroupPeer::GROUP_ID,$this->grupo);
			$usuarios->addJoin(sfGuardUserGroupPeer::USER_ID,sfGuardUserPeer::ID);	
		}
		
		$permiso = $this->getRequestParameter('permiso');
		$permiso = $this->acc_url->parsearRecepcion($permiso);
		$this->permiso = $permiso;		
		if ($this->permiso != 0)
		{				
			$usuarios->add(sfGuardUserPermissionPeer::PERMISSION_ID,$this->permiso);
			$usuarios->addJoin(sfGuardUserPermissionPeer::USER_ID,sfGuardUserPeer::ID);	
		}
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(sfGuardUserPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(sfGuardUserPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$usuarios->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$usuarios->add(sfGuardUserPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$usuarios->add(sfGuardUserPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('sfGuardUser', 15);
		$pager->setCriteria($usuarios);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  
  	/**
	* Ejecuta acción de los Usuarios para autocompletar desde la accion buscarLogin
	*/
	public function executeBuscarLogin() 
	{	
		$this->login = $this->getRequestParameter('login'); 	
	
		//Objeto para los usuarios
		$usuarios = new Criteria();
	  	
		$this->usuarios = sfGuardUserPeer::doSelect($usuarios);	   
	}
	
	/**
	 * Cambiar el Password de un usuario
	 */
	public function executeCambiarPassword()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
			
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el nombre del usuario a editar
		$username = $this->acc_admin->obtenerUserName($id_usuario);
		
		// Buscamos el objeto User con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
			
		// Recogemos password del formulario
		$this->password = $this->getRequestParameter('password');
			
		// Preguntamos por el password para la validacion
		if($this->password != '')
		{
			// Recogemos password2 del formulario
			$this->password2 = $this->getRequestParameter('password2');
				
			// Actualizamos el password
			$password_actualizado = $this->acc_admin->actualizarPassword($id_usuario,$this->password);
						
			if($password_actualizado)
			{
				$this->msg = "El password se ha actualizado correctamente.";		
			}
			else
			{
				$this->msg = "No se ha podido actualizar el password.";
			}
		}  
	}
  
	/**
	 * Validacion de cambiar password
	 */
	public function handleErrorCambiarPassword()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
			
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el nombre del usuario a editar
		$username = $this->acc_admin->obtenerUserName($id_usuario);
		
		// Buscamos el objeto User con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
			
		// Recogemos password del formulario
		$this->password = $this->getRequestParameter('password');
		
		// Recogemos password2 del formulario
		$this->password2 = $this->getRequestParameter('password2');
					
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de cambiar el grupo
	 */
	public function executeCambiarGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un selct con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();  	
		
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el id del grupo al que pertenece el usuario
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
			
		// Buscamos el objeto sfGuardUser con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
		
		// Obtenemos el id del grupo
		$this->grupo = $this->getRequestParameter('grupo');
		
		if($this->grupo != '')
		{
			// Guardamos el objeto sfGuardUserGroup
			$usergroup_salvado = $this->acc_admin->actualizarUserGroup($id_usuario,$this->grupo);
			
			if($usergroup_salvado)
			{
				$this->msg = "El grupo se ha actualizado correctamente.";
			}
			else
			{
				$this->msg = "No se ha actuzalido el grupo correctamente.";
			}
		}
	}

	/**
	 * Validación de editar usuario Administradro o CRC
	 */
	public function handleErrorCambiarGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un selct con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();  	
		
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el id del grupo al que pertenece el usuario
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
			
		// Buscamos el objeto sfGuardUser con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
		
		// Obtenemos el id del grupo
		$this->grupo = $this->getRequestParameter('grupo');
		
		return sfView::SUCCESS;
	}
	
	/**
	 * Crear un Usuario Administrador o CRC
	 */
	public function executeCrearUsuario()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Obtenemos un select con los grupos
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		  	  		
		// Recogemos los datos del formulario
		$this->username = $this->getRequestParameter('username');	
		$this->grupo = $this->getRequestParameter('grupo');
		$this->permiso = $this->getRequestParameter('permiso');
		$this->password = $this->getRequestParameter('password');
		$this->password2 = $this->getRequestParameter('password2');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->email = $this->getRequestParameter('email');	
		
		// Preguntamos por el username para la validacion
		if ($this->username != '')
		{
			// Guardamos el objeto sfGuardUser
			$user_salvado = $this->acc_admin->guardarUsuario($this->username,$this->password);	
			
			if($user_salvado)
			{				
				// Recogemos el id del ultimo usuario
				$id_ult_user_insert = $this->acc_admin->obtenerUltimoIdUsuario();
					
				// Guardamos el objeto SfGuardProfile
				$profile_salvado = $this->acc_admin->guardarProfile($id_ult_user_insert,$this->nombre,$this->apellidos,$this->telefono,$this->email,'','');
				
				if($profile_salvado)
				{		  										
					// Guardamos el objeto sfGuardUserGroup
					$usergroup_salvado = $this->acc_admin->guardarUserGroup($id_ult_user_insert,$this->grupo);
							
					if($usergroup_salvado) 
					{	
						// Guardamos el objeto sfGuardUserPermission
						$user_permission = $this->acc_admin->guardarUserPermission($id_ult_user_insert,$this->permiso);
						
						if($user_permission)
						{
							$this->msg = "Los datos han sido insertados correctamente.";	
						}													
						else
						{
							// Borramos el sfGuardUser que habiamos creado
							$this->acc_admin->borrarUsuario($id_ult_user_insert);			
							
							// Comprobamos que lo hemos borrado						
							$temp = $this->acc_admin->obtenerObjUsuario($id_ult_user_insert);
							    	  	
							if ($temp)
							{
								$this->msg = "No se ha podido borrar el usuario.";
							}
							else
							{
								$this->msg = "No se ha podido guardar el usuario.";
							}
						}
					}
					else
					{		  	
						// Borramos el sfGuardUser que habiamos creado
						$this->acc_admin->borrarUsuario($id_ult_user_insert);			
						
						// Comprobamos que lo hemos borrado						
						$temp = $this->acc_admin->obtenerObjUsuario($id_ult_user_insert);
						    	  	
						if ($temp)
						{
							$this->msg = "No se ha podido borrar el usuario.";
						}
						else
						{
							$this->msg = "No se ha podido guardar el usuario.";
						}		  		
					}	
				}
				else
				{
					// Borramos el objeto sfGuardUser que habiamos creado
					$this->acc_admin->borrarUsuario($id_ult_user_insert);		
					
					// Comprobamos que lo hemos borrado	
					$temp = $this->acc_admin->obtenerObjUsuario($id_ult_user_insert); 
					      	  	
					if ($temp)
					{
						$this->msg = "No se ha podido borrar el usuario.";		
					}
					else
					{
						$this->msg = "No se ha podido guardar el usuario.";
					}						  		
				}
			}
			else
			{
				$this->msg = "No se ha podido guardar el usuario.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de crear usuario
	 */
	public function handleErrorCrearUsuario()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Obtenemos un select con los grupos
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		  	  		
		// Recogemos los datos del formulario
		$this->username = $this->getRequestParameter('username');	
		$this->grupo = $this->getRequestParameter('grupo');
		$this->permiso = $this->getRequestParameter('permiso');
		$this->password = $this->getRequestParameter('password');
		$this->password2 = $this->getRequestParameter('password2');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->email = $this->getRequestParameter('email');
				
		return sfView::SUCCESS;
	}
	
	/**
	 * Editar un Usuario
	 */
	public function executeEditarUsuario()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();  	
		
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el id del grupo al que pertenece el usuario
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
			
		// Buscamos el objeto sfGuardUser con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
		
		// Obtenemos el profile, datos personales, del usuario
		$this->profile = $this->acc_admin->obtenerObjProfileXIdUsuario($id_usuario);
		
		// Obtenemos el id del profile
		$id_profile = $this->profile->getIdProfile();
			
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		
		// Preguntamos por el nombre para la validacion
		if($this->nombre != '')
		{	
			// Recogemos los datos del formulario			
			$this->apellidos = $this->getRequestParameter('apellidos');
			$this->telefono = $this->getRequestParameter('telefono');
			$this->email = $this->getRequestParameter('email');		
			  
			// Actualizamos el profile
			$profile_actualizado = $this->acc_admin->actualizarProfile($id_profile,$id_usuario,$this->nombre,$this->apellidos,$this->telefono,$this->email);
			
			// Actualizamos el objeto Profile, datos personales
			if ($profile_actualizado)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado el perfil.";	
			}
		}
	}
 
	/**
	 * Validacion de editar usuario
	 */
	public function handleErrorEditarUsuario()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();  	
		
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Obtenemos el id del grupo al que pertenece el usuario
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
			
		// Buscamos el objeto sfGuardUser con ese id
		$this->usuario = $this->acc_admin->obtenerObjUsuario($id_usuario);
		
		// Obtenemos el profile, datos personales, del usuario
		$this->profile = $this->acc_admin->obtenerObjProfileXIdUsuario($id_usuario);
			
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');	
		$this->email = $this->getRequestParameter('email');	
			
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar usuarios
	 */
	public function executeBorrarUsuario()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del usuario  	
		$this->id_md5_usuario = $this->getRequestParameter('id_md5_usuario');
			
		$id_usuario = $this->acc_admin->obtenerIdUsuarioXIdMd5($this->id_md5_usuario);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_admin->comprobarUsuario($id_usuario);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El usuario ha intervenido en pedidos o ventas de mercancías, no puede ser borrado.";
		}
		else
		{
			// Borramos el sfGuardUser que hemos escogido
			$this->acc_admin->borrarUsuario($id_usuario);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjUsuario($id_usuario); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el usuario.";		
			}
			else
			{
				$this->msg = "El usuario se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Administración de los grupos de la aplicación
	 */
	public function executeAdministrarGrupos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select todos los grupos de la aplicación
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Creamos la busqueda a BD
		$grupos = new Criteria();
		
		// Obtenemos el valor del id del grupo buscado
		$grupo = $this->getRequestParameter('grupo');
		$this->grupo = $grupo;
		
		if ($this->grupo != 0)
		{
			$grupos->add(sfGuardGroupPeer::ID,$this->grupo);
		}
		
		$pager_grupos = new sfPropelPager('sfGuardGroup', 20);
		$pager_grupos->setCriteria($grupos);
		$pager_grupos->setPage($this->getRequestParameter('page_grupo', 1));
		$pager_grupos->init();
		
		$this->pager_grupos = $pager_grupos;
	}

	/**
	 * Ejecuta la accion de agregar un grupo, y añadirle un permiso
	 */
	public function executeCrearGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Array con los tipos de permisos
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->permiso = $this->getRequestParameter('permiso');
		
		// Hacemos la validacion
		if ($this->nombre != '')
		{
			// Guardamos un nuevo objeto sfGuardGroup
			$grupo_salvado = $this->acc_admin->guardarGrupo($this->nombre,$this->descripcion);
						
			// Guardamos el objeto sfGuardGroup creado
			if ($grupo_salvado) 
			{
				// Recogemos el id del ultimo grupo
				$id_ult_grupo_insert = $this->acc_admin->obtenerUltimoIdGrupo();
				
				// Guardamos el objeto sfGuardGroupPermission
				$grouppermission_salvado = $this->acc_admin->guardarGroupPermission($id_ult_grupo_insert,$this->permiso);
							
				if($grouppermission_salvado)
				{	
					$this->msg = "Los datos han sido insertados correctamente.";	
				}													
				else
				{
					// Borramos el sfGuardGroup que habiamos creado
					$this->acc_admin->borrarGrupo($id_ult_grupo_insert);			
							
					// Comprobamos que lo hemos borrado						
					$temp = $this->acc_admin->obtenerObjGrupo($id_ult_grupo_insert);
							    	  	
					if ($temp)
					{
						$this->msg = "No se ha podido borrar el grupo.";
					}
					else
					{
						$this->msg = "No se ha podido guardar el grupo.";
					}
				}
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar grupos
	 */
	public function handleErrorCrearGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Array con los tipos de permisos
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		
		// Obtenemos un select con los grupos
		$this->ar_grupos = $this->acc_admin->obtenerSelectGrupos();
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
		$this->permiso = $this->getRequestParameter('permiso');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un grupo
	 */
	public function executeEditarGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del grupo  	
		$this->id_md5_grupo = $this->getRequestParameter('id_md5_grupo');
			
		$id_grupo = $this->acc_admin->obtenerIdGrupoXIdMd5($this->id_md5_grupo);
					
		// Buscamos el objeto sfGuardGroup con ese id
		$this->grupo = $this->acc_admin->obtenerObjGrupo($id_grupo);
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
		
		// Hacemos la validacion
		if ($this->nombre != '')
		{
			// Actualizamos un nuevo objeto sfGuardGroup
			$grupo_actualizado = $this->acc_admin->actualizarGrupo($id_grupo,$this->nombre,$this->descripcion);
			
			// Actualizamos el objeto sfGuardGroup
			if ($grupo_actualizado) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar grupos
	 */
	public function handleErrorEditarGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del grupo  	
		$this->id_md5_grupo = $this->getRequestParameter('id_md5_grupo');
			
		$id_grupo = $this->acc_admin->obtenerIdGrupoXIdMd5($this->id_md5_grupo);
					
		// Buscamos el objeto sfGuardGroup con ese id
		$this->grupo = $this->acc_admin->obtenerObjGrupo($id_grupo);
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar grupos
	 */
	public function executeBorrarGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del grupo 	
		$this->id_md5_grupo = $this->getRequestParameter('id_md5_grupo');
			
		$id_grupo = $this->acc_admin->obtenerIdGrupoXIdMd5($this->id_md5_grupo);
		
		// Comprobamos si tiene usuarios
		$usuarios_grupo = $this->acc_admin->comprobarUsuariosGrupo($id_grupo);
		
		// Si tiene usuarios
		if($usuarios_grupo)
		{
			$this->msg = "El grupo tiene usuarios asignados, debe asignarles un nuevo grupo.";
		}
		else
		{			
			// Borramos el sfGuadrGroup que hemos escogido
			$this->acc_admin->borrarGrupo($id_grupo);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjGrupo($id_grupo); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el grupo.";		
			}
			else
			{
				$this->msg = "El grupo se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de ver los usuarios pertenecientes a un grupo
	 */
	public function executeVerUsuariosGrupo()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del grupo 	
		$this->id_md5_grupo = $this->getRequestParameter('id_md5_grupo');
			
		$id_grupo = $this->acc_admin->obtenerIdGrupoXIdMd5($this->id_md5_grupo);
		
		$this->nombreGrupo = $this->acc_admin->obtenerNombreGrupo($id_grupo);
		
		// Buscamos los usuarios con el id del grupo recogido
		$usuarios = new Criteria();
		$usuarios->add(sfGuardUserGroupPeer::GROUP_ID, $id_grupo);
		$usuarios->addJoin(sfGuardUserGroupPeer::USER_ID,sfGuardUserPeer::ID);
			
		// Llamamos al paginador		
		$pager = new sfPropelPager('sfGuardUser', 10);
		$pager->setCriteria($usuarios);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
			  
		$this->pager = $pager;		 	   	
	}
	
	/**
	 * Administración de los permisos de la aplicación
	 */
	public function executeAdministrarPermisos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select todos los permisos de la aplicación
		$this->ar_permisos = $this->acc_admin->obtenerSelectPermisos();
		
		// Creamos la busqueda a BD
		$permisos = new Criteria();
		
		// Obtenemos el valor del id del permiso buscado
		$permiso = $this->getRequestParameter('permiso');
		$this->permiso = $permiso;
		if ($this->permiso != 0)
		{
			$permisos->add(sfGuardPermissionPeer::ID,$this->permiso);
		}
		
		$pager_permisos = new sfPropelPager('sfGuardPermission', 20);
		$pager_permisos->setCriteria($permisos);
		$pager_permisos->setPage($this->getRequestParameter('page_permiso', 1));
		$pager_permisos->init();
		
		$this->pager_permisos = $pager_permisos;
	}	
	
	/**
	 * Ejecuta la accion de agregar un permiso
	 */
	public function executeCrearPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
		
		// Hacemos la validacion
		if ($this->nombre != '')
		{
			// Guardamos un nuevo objeto sfGuardPermission
			$permiso_salvado = $this->acc_admin->guardarPermiso($this->nombre,$this->descripcion);
						
			// Guardamos el objeto sfGuardPermission creado
			if ($permiso_salvado) 
			{	
				$this->msg = "Los datos han sido insertados correctamente.";			
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar permisos
	 */
	public function handleErrorCrearPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un permiso
	 */
	public function executeEditarPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del permiso  	
		$this->id_md5_permiso = $this->getRequestParameter('id_md5_permiso');
			
		$id_permiso = $this->acc_admin->obtenerIdPermisoXIdMd5($this->id_md5_permiso);
					
		// Buscamos el objeto sfGuardPermission con ese id
		$this->permiso = $this->acc_admin->obtenerObjPermiso($id_permiso);
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
		
		// Hacemos la validacion
		if ($this->nombre != '')
		{
			// Actualizamos un nuevo objeto sfGuardPermission
			$permiso_actualizado = $this->acc_admin->actualizarPermiso($id_permiso,$this->nombre,$this->descripcion);
			
			// Actualizamos el objeto sfGuardPermission
			if ($permiso_actualizado) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar grupos
	 */
	public function handleErrorEditarPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del permiso  	
		$this->id_md5_permiso = $this->getRequestParameter('id_md5_permiso');
			
		$id_permiso = $this->acc_admin->obtenerIdPermisoXIdMd5($this->id_md5_permiso);
					
		// Buscamos el objeto sfGuardPermission con ese id
		$this->permiso = $this->acc_admin->obtenerObjPermiso($id_permiso);
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->descripcion = $this->getRequestParameter('descripcion');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar grupos
	 */
	public function executeBorrarPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del permiso 	
		$this->id_md5_permiso = $this->getRequestParameter('id_md5_permiso');
			
		$id_permiso = $this->acc_admin->obtenerIdPermisoXIdMd5($this->id_md5_permiso);
		
		// Comprobamos si tiene grupos
		$grupos_permiso = $this->acc_admin->comprobarGruposPermiso($id_permiso);
		
		// Comprobamos si tiene usuarios
		$usuarios_permiso = $this->acc_admin->comprobarUsuariosPermiso($id_permiso);
		
		// Si tiene grupos
		if($grupos_permiso)
		{
			$this->msg = "El permiso tiene grupos asignados.";
		}
		// Si tiene usuarios
		elseif($grupos_permiso)
		{
			$this->msg = "El permiso tiene usuarios asignados.";
		}
		else
		{
			// Borramos el sfGuardPermission que hemos escogido
			$this->acc_admin->borrarPermiso($id_permiso);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjPermiso($id_permiso); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el permiso.";		
			}
			else
			{
				$this->msg = "El permiso se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de ver los usuarios pertenecientes a un permiso
	 */
	public function executeVerUsuariosPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del permiso 	
		$this->id_md5_permiso = $this->getRequestParameter('id_md5_permiso');
			
		$id_permiso = $this->acc_admin->obtenerIdPermisoXIdMd5($this->id_md5_permiso);
		
		$this->nombrePermiso = $this->acc_admin->obtenerNombrePermiso($id_permiso);
		
		// Buscamos los usuarios con el id del permiso recogido
		$usuarios = new Criteria();
		$usuarios->add(sfGuardUserPermissionPeer::PERMISSION_ID, $id_permiso);
		$usuarios->addJoin(sfGuardUserPermissionPeer::USER_ID,sfGuardUserPeer::ID);
			
		// Llamamos al paginador		
		$pager = new sfPropelPager('sfGuardUser', 10);
		$pager->setCriteria($usuarios);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
			  
		$this->pager = $pager;		 	   	
	}
	
	/**
	 * Ejecuta la accion de ver los grupos pertenecientes a un permiso
	 */
	public function executeVerGruposPermiso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del permiso 	
		$this->id_md5_permiso = $this->getRequestParameter('id_md5_permiso');
			
		$id_permiso = $this->acc_admin->obtenerIdPermisoXIdMd5($this->id_md5_permiso);
		
		$this->nombrePermiso = $this->acc_admin->obtenerNombrePermiso($id_permiso);
		
		// Buscamos los grupos con el id del permiso recogido
		$grupos = new Criteria();
		$grupos->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $id_permiso);
		$grupos->addJoin(sfGuardGroupPermissionPeer::GROUP_ID,sfGuardGroupPeer::ID);
			
		// Llamamos al paginador		
		$pager = new sfPropelPager('sfGuardGroup', 10);
		$pager->setCriteria($grupos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
			  
		$this->pager = $pager;			 	   	
	}
	
	/**
	 * Administración de los diferentes estados de la aplicacion
	 */
	public function executeAdministrarEstados()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Creamos la busqueda de los Estados de los Pedidos a BD
		$estado_pedidos = new Criteria();
		
		$pager_estado_pedidos = new sfPropelPager('EstadoPedidos', 20);
		$pager_estado_pedidos->setCriteria($estado_pedidos);
		$pager_estado_pedidos->setPage($this->getRequestParameter('$page_estado_pedidos', 1));
		$pager_estado_pedidos->init();
		
		$this->pager_estado_pedidos = $pager_estado_pedidos;
				
		// Creamos la busqueda de los Estados de las entradas a BD
		$estado_entradas = new Criteria();
		
		$pager_estado_entradas = new sfPropelPager('EstadoEntradas', 20);
		$pager_estado_entradas->setCriteria($estado_entradas);
		$pager_estado_entradas->setPage($this->getRequestParameter('$page_estado_entradas', 1));
		$pager_estado_entradas->init();
		
		$this->pager_estado_entradas = $pager_estado_entradas;
		
		// Creamos la busqueda de los Estados de las Salidas a BD
		$estado_salidas = new Criteria();
		
		$pager_estado_salidas = new sfPropelPager('EstadoSalidas', 20);
		$pager_estado_salidas->setCriteria($estado_salidas);
		$pager_estado_salidas->setPage($this->getRequestParameter('$page_estado_salidas', 1));
		$pager_estado_salidas->init();
		
		$this->pager_estado_salidas = $pager_estado_salidas;
		
		// Creamos la busqueda de los Estados de las Ventas a BD
		$estado_ventas = new Criteria();
		
		$pager_estado_ventas = new sfPropelPager('EstadoVentas', 20);
		$pager_estado_ventas->setCriteria($estado_ventas);
		$pager_estado_ventas->setPage($this->getRequestParameter('$page_estado_ventas', 1));
		$pager_estado_ventas->init();
		
		$this->pager_estado_ventas = $pager_estado_ventas;
	}	
	
	/**
	 * Ejecuta la accion de agregar un estado pedido
	 */
	public function executeCrearEstadoPedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_pedido = $this->getRequestParameter('estado_pedido');
		
		// Hacemos la validacion
		if ($this->estado_pedido != '')
		{
			// Guardamos un nuevo objeto EstadoPedido
			$id_estado_pedido_save = $this->acc_admin->guardarEstadoPedido($this->estado_pedido);
						
			// Guardamos el objeto EstadoPedido creado
			if ($id_estado_pedido_save) 
			{	
				$this->msg = "Los datos han sido insertados correctamente.";			
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar estado pedido
	 */
	public function handleErrorCrearEstadoPedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_pedido = $this->getRequestParameter('estado_pedido');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un estado pedido
	 */
	public function executeEditarEstadoPedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado pedido
		$this->id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
										
		// Buscamos el objeto Estado Pedido con ese id
		$this->obj_estado_pedido = $this->acc_admin->obtenerObjEstadoPedido($this->id_estado_pedido);
		
		// Recogemos los datos del formulario
		$this->estado_pedido = $this->getRequestParameter('estado_pedido');
		
		// Hacemos la validacion
		if ($this->estado_pedido != '')
		{
			// Actualizamos un nuevo objeto Estado Pedido
			$estado_pedido_update = $this->acc_admin->actualizarEstadoPedido($this->id_estado_pedido,$this->estado_pedido);
			
			// Actualizamos el objeto Estado Pedido
			if ($estado_pedido_update !== false) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar estado pedido
	 */
	public function handleErrorEditarEstadoPedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado pedido
		$this->id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
										
		// Buscamos el objeto Estado Pedido con ese id
		$this->obj_estado_pedido = $this->acc_admin->obtenerObjEstadoPedido($this->id_estado_pedido);
		
		// Recogemos los datos del formulario
		$this->estado_pedido = $this->getRequestParameter('estado_pedido');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar estado pedido
	 */
	public function executeBorrarEstadoPedido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado pedido 	
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_admin->comprobarEstadoPedido($id_estado_pedido);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El estado ya ha sido usado, debe asignar a los pedidos un nuevo estado.";
		}
		else
		{
			// Borramos el estado pedido que hemos escogido
			$this->acc_admin->borrarEstadoPedido($id_estado_pedido);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjEstadoPedido($id_estado_pedido); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el estado pedido.";		
			}
			else
			{
				$this->msg = "El estado pedido se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de agregar un estado entrada
	 */
	public function executeCrearEstadoEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_entrada = $this->getRequestParameter('estado_entrada');
		
		// Hacemos la validacion
		if ($this->estado_entrada != '')
		{
			// Guardamos un nuevo objeto EstadoEntrada
			$id_estado_entrada_save = $this->acc_admin->guardarEstadoEntrada($this->estado_entrada);
						
			// Guardamos el objeto EstadoEntrada creado
			if ($id_estado_entrada_save) 
			{	
				$this->msg = "Los datos han sido insertados correctamente.";			
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar estado entrada
	 */
	public function handleErrorCrearEstadoEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_entrada = $this->getRequestParameter('estado_entrada');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un estado entrada
	 */
	public function executeEditarEstadoEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado entrada
		$this->id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
										
		// Buscamos el objeto Estado Entrada con ese id
		$this->obj_estado_entrada = $this->acc_admin->obtenerObjEstadoEntrada($this->id_estado_entrada);
		
		// Recogemos los datos del formulario
		$this->estado_entrada = $this->getRequestParameter('estado_entrada');
		
		// Hacemos la validacion
		if ($this->estado_entrada != '')
		{
			// Actualizamos un nuevo objeto Estado Entrada
			$estado_entrada_update = $this->acc_admin->actualizarEstadoEntrada($this->id_estado_entrada,$this->estado_entrada);
			
			// Actualizamos el objeto Estado Entrada
			if ($estado_entrada_update !== false) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar estado entrada
	 */
	public function handleErrorEditarEstadoEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado entrada
		$this->id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
										
		// Buscamos el objeto Estado Entrada con ese id
		$this->obj_estado_entrada = $this->acc_admin->obtenerObjEstadoEntrada($this->id_estado_entrada);
		
		// Recogemos los datos del formulario
		$this->estado_entrada = $this->getRequestParameter('estado_entrada');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar estado entrada
	 */
	public function executeBorrarEstadoEntrada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado entrada 	
		$id_estado_entrada = $this->getRequestParameter('id_estado_entrada');
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_admin->comprobarEstadoEntrada($id_estado_entrada);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El estado ya ha sido usado, debe asignar a las entradas un nuevo estado.";
		}
		else
		{
			// Borramos el estado entrada que hemos escogido
			$this->acc_admin->borrarEstadoEntrada($id_estado_entrada);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjEstadoEntrada($id_estado_entrada); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el estado entrada.";		
			}
			else
			{
				$this->msg = "El estado entrada se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de agregar un estado salida
	 */
	public function executeCrearEstadoSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_salida = $this->getRequestParameter('estado_salida');
		
		// Hacemos la validacion
		if ($this->estado_salida != '')
		{
			// Guardamos un nuevo objeto EstadoSalida
			$id_estado_salida_save = $this->acc_admin->guardarEstadoSalida($this->estado_salida);
						
			// Guardamos el objeto EstadoSalida creado
			if ($id_estado_salida_save) 
			{	
				$this->msg = "Los datos han sido insertados correctamente.";			
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar estado salida
	 */
	public function handleErrorCrearEstadoSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_salida = $this->getRequestParameter('estado_salida');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un estado salida
	 */
	public function executeEditarEstadoSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado salida
		$this->id_estado_salida = $this->getRequestParameter('id_estado_salida');
										
		// Buscamos el objeto Estado Salida con ese id
		$this->obj_estado_salida = $this->acc_admin->obtenerObjEstadoSalida($this->id_estado_salida);
		
		// Recogemos los datos del formulario
		$this->estado_salida = $this->getRequestParameter('estado_salida');
		
		// Hacemos la validacion
		if ($this->estado_salida != '')
		{
			// Actualizamos un nuevo objeto Estado Salida
			$estado_salida_update = $this->acc_admin->actualizarEstadoSalida($this->id_estado_salida,$this->estado_salida);
			
			// Actualizamos el objeto Estado Salida
			if ($estado_salida_update !== false) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar estado salida
	 */
	public function handleErrorEditarEstadoSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado salida
		$this->id_estado_salida = $this->getRequestParameter('id_estado_salida');
										
		// Buscamos el objeto Estado Salida con ese id
		$this->obj_estado_salida = $this->acc_admin->obtenerObjEstadoSalida($this->id_estado_salida);
		
		// Recogemos los datos del formulario
		$this->estado_salida = $this->getRequestParameter('estado_salida');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar estado salida
	 */
	public function executeBorrarEstadoSalida()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado salida 	
		$id_estado_salida = $this->getRequestParameter('id_estado_salida');
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_admin->comprobarEstadoSalida($id_estado_salida);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El estado ya ha sido usado, debe asignar a las salidas un nuevo estado.";
		}
		else
		{
			// Borramos el estado salida que hemos escogido
			$this->acc_admin->borrarEstadoSalida($id_estado_salida);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjEstadoSalida($id_estado_salida); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el estado salida.";		
			}
			else
			{
				$this->msg = "El estado salida se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de agregar un estado venta
	 */
	public function executeCrearEstadoVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_venta = $this->getRequestParameter('estado_venta');
		
		// Hacemos la validacion
		if ($this->estado_venta != '')
		{
			// Guardamos un nuevo objeto EstadoVenta
			$id_estado_venta_save = $this->acc_admin->guardarEstadoVenta($this->estado_venta);
						
			// Guardamos el objeto EstadoVenta creado
			if ($id_estado_venta_save) 
			{	
				$this->msg = "Los datos han sido insertados correctamente.";			
			}
			else
			{
				$this->msg = "Los datos no han sido insertados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de agregar estado venta
	 */
	public function handleErrorCrearEstadoVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Recogemos los datos del formulario
		$this->estado_venta = $this->getRequestParameter('estado_venta');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de editar un estado venta
	 */
	public function executeEditarEstadoVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado venta
		$this->id_estado_venta = $this->getRequestParameter('id_estado_venta');
										
		// Buscamos el objeto Estado Venta con ese id
		$this->obj_estado_venta = $this->acc_admin->obtenerObjEstadoVenta($this->id_estado_venta);
		
		// Recogemos los datos del formulario
		$this->estado_venta = $this->getRequestParameter('estado_venta');
		
		// Hacemos la validacion
		if ($this->estado_venta != '')
		{
			// Actualizamos un nuevo objeto Estado Venta
			$estado_venta_update = $this->acc_admin->actualizarEstadoVenta($this->id_estado_venta,$this->estado_venta);
			
			// Actualizamos el objeto Estado Venta
			if ($estado_venta_update !== false) 
			{
				$this->msg = "Los datos han sido actualizados correctamente.";				
			}
			else
			{
				$this->msg = "Los datos no han sido actualizados correctamente.";
			}	
		}    
	}

	/**
	 * HandleError de editar estado venta
	 */
	public function handleErrorEditarEstadoVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado venta
		$this->id_estado_venta = $this->getRequestParameter('id_estado_venta');
										
		// Buscamos el objeto Estado Venta con ese id
		$this->obj_estado_venta = $this->acc_admin->obtenerObjEstadoVenta($this->id_estado_venta);
		
		// Recogemos los datos del formulario
		$this->estado_venta = $this->getRequestParameter('estado_venta');
	
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar estado venta
	 */
	public function executeBorrarEstadoVenta()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Recogemos el id del estado venta 	
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_admin->comprobarEstadoVenta($id_estado_venta);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El estado ya ha sido usado, debe asignar a las ventas un nuevo estado.";
		}
		else
		{
			// Borramos el estado venta que hemos escogido
			$this->acc_admin->borrarEstadoVenta($id_estado_venta);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_admin->obtenerObjEstadoVenta($id_estado_venta); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el estado venta.";		
			}
			else
			{
				$this->msg = "El estado venta se ha borrado correctamente.";
			}
		}
	}

	/**
	 * Ejecuta la accion de administrar la tarea programada
	 */
	public function executeAdministrarTareaProgramada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesArticulo
		$this->acc_articulos = new AccionesArticulos();

		// Obtenemos el objeto de la tarea programada
		$obj_tarea_programada = $this->acc_admin->obtenerObjConfTareaProgramada();
		
		// Obtenemos un select con los tiempos de repeticion disponibles
		$this->ar_tiempo_repeticion = $this->acc_admin->obtenerSelectTiempoRepeticion();
		
		$this->tiempo_repeticion = $obj_tarea_programada->getTiempoRepeticion();
		
		$this->repeticion = $this->getRequestParameter('repeticion');
				
		if($this->repeticion != '')
		{
			// Guardar información en configuracion
			$this->acc_admin->actualizarTiempoTareaProgramada($this->repeticion);
			
			// Obtenemos el objeto de la tarea programada ya que se actualizaron sus valores
			$obj_tarea_programada = $this->acc_admin->obtenerObjConfTareaProgramada();
			$this->tiempo_repeticion = $obj_tarea_programada->getTiempoRepeticion();
		}

		$this->actualizar_ahora = $this->getRequestParameter('actualizar_ahora');
		
		if($this->actualizar_ahora)
		{
			$this->acc_articulos->comprobarStockArticulos();			
			$this->actualizar_ahora = false;// Guardamos el objeto EstadoEntrada creado
			
			$this->msg = "El stock de los artículos ha sido actualizado correctamente.";			
		}
	}

	/**
	 * Ejecuta la accion de administrar la numeracion de los números de albarán 
	 */
	public function executeAdministrarNumeracion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();

		// Obtenemos el array con los valores de los numeros de labaran de la tarea programada
		$this->ar_num_albaran = $this->acc_admin->obtenerTodosNumAlbaran();
		
		$this->numero_albaran_pedido = $this->getRequestParameter('numero_albaran_pedido');
		$this->numero_albaran_entrada = $this->getRequestParameter('numero_albaran_entrada');
		$this->numero_albaran_venta = $this->getRequestParameter('numero_albaran_venta');
		$this->numero_albaran_salida = $this->getRequestParameter('numero_albaran_salida');
				
		if($this->numero_albaran_pedido != '')
		{
			// Actualizar información en configuracion
			$this->acc_admin->actualizarNumerosAlbaran(1,$this->numero_albaran_pedido);
			
			// Obtenemos el array con los valores de los numeros de labaran de la tarea programada
			$this->ar_num_albaran = $this->acc_admin->obtenerTodosNumAlbaran();
		}
		
		if($this->numero_albaran_entrada != '')
		{
			// Actualizar información en configuracion
			$this->acc_admin->actualizarNumerosAlbaran(2,$this->numero_albaran_entrada);
		}
		
		if($this->numero_albaran_venta != '')
		{
			// Actualizar información en configuracion
			$this->acc_admin->actualizarNumerosAlbaran(3,$this->numero_albaran_venta);
		}
		
		if($this->numero_albaran_salida != '')
		{
			// Actualizar información en configuracion
			$this->acc_admin->actualizarNumerosAlbaran(4,$this->numero_albaran_salida);
		}	
				// Obtenemos el array con los valores de los numeros de labaran de la tarea programada
			$this->ar_num_albaran = $this->acc_admin->obtenerTodosNumAlbaran();
	
	}
}
