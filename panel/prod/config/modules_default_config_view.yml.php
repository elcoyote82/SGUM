<?php
// auto-generated by sfViewConfigHandler
// date: 2012/04/23 12:22:15
$context  = $this->getContext();
$response = $context->getResponse();


  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'SGUM', false, false);
  $response->addMeta('robots', 'noindex, nofollow', false, false);
  $response->addMeta('description', 'Sistema de Gestión de Ubicaciones', false, false);
  $response->addMeta('keywords', 'symfony, pfc, sgum, ubicaciones,', false, false);
  $response->addMeta('language', 'es', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addJavascript('jquery.min.js');
  $response->addJavascript('jquery-ui-custom.js');
  $response->addJavascript('jquery.js');


