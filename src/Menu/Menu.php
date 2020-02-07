<?php
namespace PackagedUi\Fusion\Menu;

use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use PackagedUi\Fusion\Lists\ListBox;

class Menu extends ListBox implements Component
{
  use ComponentTrait;
  use BemComponentTrait;

  public function getBlockName(): string
  {
    return 'menu';
  }

  protected $_tag = 'nav';
}
