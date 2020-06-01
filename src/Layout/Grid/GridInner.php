<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class GridInner extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'grid__inner';
  }

  protected $_tag = 'div';
  protected $_bordered = false;

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    if($this->_bordered)
    {
      $ele->addClass($this->getModifier('bordered'));
    }
    return $ele;
  }

  public function bordered($bordered = true)
  {
    $this->_bordered = $bordered;
    return $this;
  }
}
