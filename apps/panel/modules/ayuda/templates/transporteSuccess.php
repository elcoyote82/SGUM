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
	<?php echo __("AYUDA MÓDULO TRANSPORTE"); ?>
</div>
<div id="textoLateralAyuda">	
	<ul>
		<li><strong><?php echo __("Conductores")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Conductores"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verTransporteConductores',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Conductores"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorTransporteConductores',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Conductor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearTransporteConductor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Conductor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarTransporteConductor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Conductor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarTransporteConductor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Conductor"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaTransporteConductor',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Empresa"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaTransporteConductor_Empresa',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
		</ul>
		<li><strong><?php echo __("Empresas de Transporte")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Ver Empresas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/verTransporteEmpresas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Empresas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorTransporteEmpresas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Crear Empresa"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/crearTransporteEmpresa',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Editar Empresa"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/editarTransporteEmpresa',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Borrar Empresa"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/borrarTransporteEmpresa',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Empresa"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaTransporteEmpresa',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Conductores"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaTransporteEmpresa_Conductores',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
		</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>