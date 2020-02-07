<?php
namespace PackagedUi\Fusion\Layout;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;

class FlexGrow extends Div
{
  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass(LayoutInterface::DISPLAY_FLEX_GROW);
    return parent::_prepareForProduce();
  }
}
