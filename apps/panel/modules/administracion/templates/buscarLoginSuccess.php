<ul>
<?php foreach ($usuarios as $usuario): ?>
	<?php if (strncasecmp($usuario->getUsername(),$login,strlen($login))==0): ?>
		<li id='auto'><?php echo $usuario->getUsername(); ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>