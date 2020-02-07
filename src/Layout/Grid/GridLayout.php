<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Core\AbstractContainerTag;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class GridLayout extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'grid';
  }

  protected $_tag = 'div';

  public static function createWithInner(...$content)
  {
    return self::create(GridInner::create(...$content));
  }
}
