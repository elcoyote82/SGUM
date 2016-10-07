<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
	<div id='caja_total'>
		<div id="header">
			<div id="header_interno">
				<?php $modulo = sfContext::getInstance()->getModuleName(); ?>						
				 <?php if (strcmp($modulo,"sfGuardAuth")==0): ?>
				 	<div class="titulo_header">
						<?php $modulo = "Bienvenido"; ?>
						<?php echo "Bienvenido"; ?>
					</div>
				<?php else: ?>
					<div class="titulo_header">
						<?php echo "SGUM"; ?>
					</div>
					<div id='cerrarSesion'>
						<?php $id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id']; ?>
						<?php $acc_admin = new Administracion(); ?>
						<?php $username = $acc_admin->obtenerUserName($id_usuario); ?>
						<?php echo ('Bienvenido, '.$username); ?>
						<?php echo link_to(image_tag('/images/cerrar_sesion.png'),'/logout') ?>
					</div>
				<?php endif; ?>				
			</div>
			<?php if(isset($menu_botones)): ?>
			  <div id='navegacion'>			  
				<?php foreach($menu_botones as $nombre => $ruta): ?>				
				  <?php if (strcmp($modulo,strtolower($nombre)) == 0): ?>
				  	<?php if($modulo == "default"): ?>
						<div class='botonNavSeleccionado'><?php echo link_to("Inicio",$ruta); ?></div>
					<?php else: ?>
						<div class='botonNavSeleccionado'><?php echo link_to($nombre,$ruta); ?></div>
					<?php endif; ?>
				  <?php else: ?>				  
				  	<?php if($nombre == "default"): ?>
						<div class='botonNav'><?php echo link_to("Inicio",$ruta); ?></div>
					<?php elseif($nombre == "Articulos"): ?>	
						<?php if ($modulo == "familias"): ?>
							<div class='botonNavSeleccionado'><?php echo link_to("Articulos",$ruta); ?></div>
						<?php elseif ($modulo == "ubicaciones"): ?>
							<div class='botonNavSeleccionado'><?php echo link_to("Articulos",$ruta); ?></div>
						<?php else: ?>
							<div class='botonNav'><?php echo link_to($nombre,$ruta); ?></div>
						<?php endif; ?>							
					<?php else: ?>
						<div class='botonNav'><?php echo link_to($nombre,$ruta); ?></div>
					<?php endif; ?>
				  <?php endif; ?>	      
				<?php endforeach; ?>	    
			  </div>
			<?php endif; ?>	
		</div>
		<div id='contenedor'>
			<?php echo $sf_data->getRaw('sf_content') ?>
		</div>
		<script type="text/javascript" src="<?php echo sfConfig::get('app_javascript_func'); ?>"></script>
	</div>
</body>
</html>
