<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Inicio'),'/ayuda/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administración'),'/ayuda/administracion'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Articulos'),'/ayuda/articulos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Proveedores'),'/ayuda/proveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos'),'/ayuda/pedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas'),'/ayuda/entradas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/ayuda/clientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas'),'/ayuda/ventas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas'),'/ayuda/salidas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Transporte'),'/ayuda/transporte'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/ayuda/contactos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes'),'/ayuda/informes'); ?></div>
</div>
<div id="tituloAyuda" >
	<?php echo __("AYUDA MÓDULO ADMINISTRACIÓN"); ?>
</div>
<div id="textoLateralAyuda">
	<ul>
		<li><strong><?php echo __("Usuarios")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Usuarios"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verUsuarios',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Usuarios"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorUsuarios',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Usuario"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearUsuario',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Usuario"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarUsuario',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Cambiar Password"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/cambiarPassword',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Cambiar Grupo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/cambiarGrupo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Usuario"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarUsuario',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
		<br />
		<li><strong><?php echo __("Grupos")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Grupos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verGrupos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Grupos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorGrupos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Grupo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearGrupo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Grupo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarGrupo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Grupo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarGrupo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
		<br />
		<li><strong><?php echo __("Permisos")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Permisos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verPermisos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Permisos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorPermisos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Permiso"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearPermiso',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Permiso"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarPermiso',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Permiso"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarPermiso',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
		<br />
		<li><strong><?php echo __("Administración de Estados")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Estados"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verEstados',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Estado"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearEstado',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Estado"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarEstado',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Estado"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarEstado',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
		<br />
		<li><strong><?php echo __("Opciones Configurables")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Tarea Programada"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/configurarTiempoTareaProgramada',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Numeración Informes"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/configurarNumeracion',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>