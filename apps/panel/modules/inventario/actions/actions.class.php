<?php

/**
 * inventario actions.
 *
 * @package    SGUM
 * @subpackage inventario
 * @name       inventarioActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class inventarioActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
}
