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
 * @version    SVN: $Id: BasesfGuardUserActions.class.php 10861 2008-08-13 16:28:32Z boutell $
 */
class BasesfGuardUserActions extends autosfGuardUserActions
{
  public function validateEdit()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST && !$this->getRequestParameter('id'))
    {
      if ($this->getRequestParameter('sf_guard_user[password]') == '')
      {
        $this->getRequest()->setError('sf_guard_user{password}', $this->getContext()->getI18N()->__('Password is mandatory'));

        return false;
      }
    }

    return true;
  }

  protected function addFiltersCriteria($c)
  {
    // Tom Boutell (tom@punkave.com): implement filtering for groups. If 
    // any groups are checked, display only users who are in one or more 
    // of the checked groups. Also, take steps to prevent the base class
    // implementation from attempting to incorrectly filter for groups.

    if (isset($this->filters['groups'])) 
    {
      $groups = $this->filters['groups'];
      if (count($groups)) 
      {
        $c->addJoin(sfGuardUserPeer::ID