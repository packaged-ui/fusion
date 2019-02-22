<?php
namespace PackagedUi\Elegance\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;

class GridLayout extends AbstractContainerTag
{
  protected $_tag = 'div';

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('grid');
    return $ele;
  }
}
