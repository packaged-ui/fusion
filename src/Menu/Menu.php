<?php
namespace PackagedUi\Elegance\Menu;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\Elegance\Lists\ListBox;

class Menu extends ListBox
{
  protected $_tag = 'nav';

  protected function _prepareForProduce(): HtmlTag
  {
    return parent::_prepareForProduce()->addClass('menu');
  }
}
