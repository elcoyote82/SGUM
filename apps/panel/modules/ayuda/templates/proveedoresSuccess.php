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
	<?php echo __("AYUDA MÓDULO PROVEEDORES"); ?>
</div>
<div id="textoLateralAyuda">	
	<ul>
		<li><strong><?php echo __("Proveedores")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Proveedores"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verProveedores',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Proveedores"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorProveedores',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Proveedor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearProveedor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Proveedor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarProveedor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Proveedor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarProveedor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Proveedor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaProveedor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Artículos"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaProveedor_Articulos',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Últimos Pedidos"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaProveedor_UltimosPedidos',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Contactos"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaProveedor_Contactos',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
		</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>