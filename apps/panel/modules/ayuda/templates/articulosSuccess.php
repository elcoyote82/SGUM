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
	<?php echo __("AYUDA MÓDULO ARTÍCULOS"); ?>
</div>
<div id="textoLateralAyuda">
	<ul>
		<li><strong><?php echo __("Artículos")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Artículos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verArticulos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Artículos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorArticulos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Artículo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearArticulo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Artículo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarArticulo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Artículo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarArticulo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Artículo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaArticulo',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Inventario"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaArticulo_Inventario',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Ubicación"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaArticulo_Ubicacion',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Proveedores"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaArticulo_Proveedores',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
		</ul>
		<br />
		<li><strong><?php echo __("Familias")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Familias"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verFamilias',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Familias"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorFamilias',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Familia"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearFamilia',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Familia"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarFamilia',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Familia"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarFamilia',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Familia"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaFamilia',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
		<br />
		<li><strong><?php echo __("Ubicaciones")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Ubicaciones"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verUbicaciones',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Ubicaciones"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorUbicaciones',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Ubicación"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearUbicacion',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Ubicación"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarUbicacion',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Ubicación"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarUbicacion',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Ubicación"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaUbicacion',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
		</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>