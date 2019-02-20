<?php
namespace PackagedUi\Elegance\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;

class GridInner extends AbstractContainerTag
{
  protected $_tag = 'div';
  protected $_bordered = false;

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('layout-grid__inner');
    if($this->_bordered)
    {
      $ele->addClass('layout-grid__inner--bordered');
    }
    return $ele;
  }

  public function bordered($bordered = true)
  {
    $this->_bordered = $bordered;
    return $this;
  }
}
