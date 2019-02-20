<?php
namespace PackagedUi\Elegance\Layout;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\Elegance\LayoutInterface;

class Flex extends AbstractContainerTag
{
  protected $_tag = 'div';

  protected function _prepareForProduce(): HtmlTag
  {
    $this->addClass(LayoutInterface::DISPLAY_FLEX);
    return parent::_prepareForProduce();
  }
}
