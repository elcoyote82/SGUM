<?php use_helper('I18N') ?>
<table class='centrarTablas'>
	<tr>
		<td colspan='2' align="center"><?php echo "<br \>".image_tag('../images/prohibido.png')."<br \><br \>"; echo __("<strong> ACCESO DENEGADO </strong><br \><br \>");?></td>
	</tr>
	<tr>
		<td colspan='2' align="center"><?php echo __("You don't have the required permission to access this page."); ?></td>
	</tr>
	<tr>
		<td align="center">
			<strong><?php echo button_to('Inicio','/default/index',array('class'  => 'buttonEsqueleto')); ?></strong>
		</td>
		<td>
			<strong><?php echo button_to('Salir','/logout',array('class'  => 'buttonEsqueleto')); ?></strong>
		</td>
	</tr>
</table>