<?php
namespace PackagedUi\Fusion\Menu;

use PackagedUi\Fusion\Lists\ListBox;

class Menu extends ListBox
{
  protected function _constructComponent()
  {
    parent::_constructComponent();
    $this->addClass('menu');
  }

  protected $_tag = 'nav';
}
