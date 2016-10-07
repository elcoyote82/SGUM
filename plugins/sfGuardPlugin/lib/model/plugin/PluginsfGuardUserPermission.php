<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPermission.php 4939 2007-08-30 14:00:49Z fabien $
 */
class PluginsfGuardUserPermission extends BasesfGuardUserPermission
{
  public function save($con = null)
  {
    // Solucion cuando no se guarda UserGrupo, no funciona el save().
  	// Añadido $a y return $a porque se reescribio el codigo sab
  	
    $a = parent::save($con);

    $this->getsfGuardUser($con)->reloadGroupsAndPermissions();
    
    return $a;
  }
}
