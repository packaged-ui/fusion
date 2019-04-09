<?php
namespace PackagedUi\Fusion\Menu;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Lists\ListBox;

class Menu extends ListBox
{
  protected $_tag = 'nav';

  protected function _prepareForProduce(): HtmlElement
  {
    return parent::_prepareForProduce()->addClass('menu');
  }
}
