<div id="tituloAyuda" >
	<?php echo __('Manual de Usuario'); ?>
</div>
<div id="textoAyuda">
	<?php echo __("Además de la ayuda vía Web, puede descargar el manual del usuario ").link_to(image_tag("/images/pdf.png","size=20x20"),'/ayuda/descargarManualUsuario');?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Administración'),'/ayuda/administracion');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("En este módulo se realizará la administración de los usuarios, grupos y permisos, la gestión 
		nos permitirá agregarlos, editarlos y borrarlos. Además dispondremos de la gestión de los estados de 
		pedidos, entradas, salidas y ventas. Sólo podrán acceder a esta sección aquellos usuarios que tengan 
		permisos de	administrador, de no ser así el botón de Administrador no aparecerá en el menú de la pantalla
		principal.")?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Artículos'),'/ayuda/articulos');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Todos los artículos almacenados se encontrarán listados en esta sección. Nos permitirá ver 
		todos los productos disponibles y sus datos, tengan stock o no. También podremos gestionar las Familias 
		en las que se agrupan los artículos. En este apartado también podremos gestionar las ubicaciones donde se
		ubicarán los artículos y ver entre otras funcionalidades, la capacidad en la cual se encuentran.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Proveedores'),'/ayuda/proveedores');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("En este apartado se listarán todos los proveedores que se encuentran almacenados en la base de
		datos. Nos permitirá agregar, editar y borrar proveedores, además de disponer de un acceso directo a los 
		contactos de cada proveedor.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Pedidos'),'/ayuda/pedidos');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Este módulo nos permitirá agregar nuevos pedidos de mercancías, así como ver el estado de los 
		pedidos pendientes. También se guardará un registro de todos los pedidos completados que es accesible desde
		esta sección.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Entradas'),'/ayuda/entradas');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Sección que nos permitirá ver un listado con todas las entradas realizadas en el almacén. 
		Además de poder realizar una nueva, podremos ver aquellas que se encuentran pendientes, es decir, el pedido
		está recibido y completo pero aún no se ha ubicado en el almacén.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Clientes'),'/ayuda/clientes');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Módulo idéntico al de proveedores, pero en este caso son Clientes. Se listarán todos los 
		clientes que se encuentran almacenados en la base de datos. Nos permitirá agregar, editar y borrar 
		clientes, además de disponer de un acceso directo a los contactos de cada cliente.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Ventas'),'/ayuda/ventas');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Este módulo nos permitirá realizar las ventas de las mercancías almacenadas en el almacén, 
		así como ver el estado de las que se encuentren pendientes. También se guardará un registro de todas las
		ventas completadas para no perder la trazabilidad de la aplicación en ningún momento.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Salidas'),'/ayuda/salidas');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Sección que nos permitirá ver un listado con todas las salidas realizadas en el almacén. 
		Además de poder realizar una nueva, podremos ver aquellas que se encuentran pendientes, es decir, la venta
		está realizada pero aún no se ha sacado la mercancía del almacén.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Transporte'),'/ayuda/transporte');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("La aplicación SGUM nos permite gracias a este módulo llevar un control de todo el personal de 
		transporte que interviene en los procesos de pedidos y ventas. Podremos gestionar las empresas de 
		transporte, agregando, editando o borrando sus datos, tanto como los conductores de las mismas. De esta 
		forma nos permite saber en cada momento qué conductor y qué empresa ha realizado una entrega o envío de 
		mercancía, por si ocurriese alguna incidencia.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Contactos'),'/ayuda/contactos');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Tantos en los proveedores como los clientes tenemos la posibilidad de agregar contactos. En este
		módulo se listarán todos los contactos que se hayan guardado, además de poder buscar de manera específica
		si se trata de un proveedor o de un cliente.");?>
</div>
<div id="tituloAyuda" >
	<?php echo link_to(__('Informes'),'/ayuda/informes');; ?>
</div>
<div id="textoAyuda">
	<?php echo __("Cada vez que se realiza un pedido, entrada, salida o venta de mercancías se generará 
		automáticamente un informe con todos los datos que interviene. Este módulo se usará como un gestor 
		documental, donde podremos encontrar todos los informes generados en la aplicación y que permitirá 
		de nuevo mantener la trazabilidad.");?>
</div>