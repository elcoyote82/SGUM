<?php use_helper('Validation', 'I18N') ?>
<div id='page_login'>
	<div id='contenedor_login'>
		<div id="opc_login_msg" align='left'>
			<?php echo __("Por favor introduzca el nombre de usuario y la contraseña."); ?>
		</div>
		<div id="opc_login_acceso" align='left'>
			<strong><?php echo __("Usuario: "); ?></strong><em><?php echo __("administrador"); ?></em>
			<strong><?php echo __("Contraseña: "); ?></strong><em><?php echo __("administrador"); ?></em><br />
			<strong><?php echo __("Usuario: "); ?></strong><em><?php echo __("comercial"); ?></em>
			<strong><?php echo __("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contraseña: "); ?></strong><em><?php echo __("comercial"); ?></em><br /> 
			<strong><?php echo __("Usuario: "); ?></strong><em><?php echo __("almacenero"); ?></em>
			<strong><?php echo __("&nbsp;&nbsp;&nbsp;&nbsp;Contraseña: "); ?></strong><em><?php echo __("almacenero"); ?></em><br />  	
		</div>
		<br />
		<div id="caja_login">
			<?php echo form_tag('@sf_guard_signin') ?>
				<div class="opc_login">
					<?php echo form_error('username'),label_for('username', __('username:')),input_tag('username', $sf_data->get('sf_params')->get('username'));?>
				</div>
				<div class="opc_login">
					<?php echo form_error('password'),label_for('password', __('password:')),input_password_tag('password'); ?>
				</div>
				<br />
				<div class='opc_login_boton' align='center'>
					<?php echo submit_tag(__('Entrar'),array('class'  => 'buttonEsqueleto')); ?>		
				</div>
			</form>
		</div>
	</div>
</div>