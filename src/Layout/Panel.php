<?php
namespace PackagedUi\Fusion\Layout;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Color\Color;

class Panel extends AbstractContainerTag
{
  protected $_tag = 'div';
  /**
   * @var null|\PackagedUi\Fusion\Color\Color
   */
  protected $_color;

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass(LayoutInterface::PANEL);
    if($this->_color)
    {
      $this->addClass($this->_color->background());
      $this->addClass($this->_color->border());
    }
    return parent::_prepareForProduce();
  }

  public function setColor(Color $color)
  {
    $this->_color = $color;
    return $this;
  }
}
