<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;

class GridInner extends AbstractContainerTag
{
  protected $_tag = 'div';
  protected $_bordered = false;

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('grid__inner');
    if($this->_bordered)
    {
      $ele->addClass('grid__inner--bordered');
    }
    return $ele;
  }

  public function bordered($bordered = true)
  {
    $this->_bordered = $bordered;
    return $this;
  }
}
