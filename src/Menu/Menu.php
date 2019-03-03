<?php
namespace PackagedUi\Fusion\Menu;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\Fusion\Lists\ListBox;

class Menu extends ListBox
{
  protected $_tag = 'nav';

  protected function _prepareForProduce(): HtmlTag
  {
    return parent::_prepareForProduce()->addClass('menu');
  }
}