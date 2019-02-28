<?php
namespace PackagedUi\Fusion\Layout;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\Fusion\LayoutInterface;

class FlexGrow extends Div
{
  protected function _prepareForProduce(): HtmlTag
  {
    $this->addClass(LayoutInterface::DISPLAY_FLEX_GROW);
    return parent::_prepareForProduce();
  }
}
