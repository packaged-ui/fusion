<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;

class GridLayout extends AbstractContainerTag
{
  protected $_tag = 'div';

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('grid');
    return $ele;
  }

  public static function createWithInner(...$content)
  {
    return self::create(GridInner::create(...$content));
  }
}
