<?php if ($id_contactado != 0): ?>
	<?php if ($ar_jefes): ?>
		<?php echo select_tag('id_jefe',options_for_select($ar_jefes,$id_jefe)); ?>
	<?php endif; ?>
<?php endif; ?>