<?php
namespace PackagedUi\Elegance\Layout\Grid;

use Packaged\Glimpse\Tags\Div;

class GridCell extends Div
{
  const CLASS_ALIGN_TOP = 'layout-grid__cell--align-top';
  const CLASS_ALIGN_MIDDLE = 'layout-grid__cell--align-middle';
  const CLASS_ALIGN_BOTTOM = 'layout-grid__cell--align-bottom';

  public function __construct($content = null)
  {
    parent::__construct($content);
    $this->addClass('layout-grid__cell');
  }

  public static function create($content = '', $span = null)
  {
    $return = parent::create($content);
    if($span !== null && $span >= 1 && $span <= 12)
    {
      $return->addClass('layout-grid__cell--span-' . $span);
    }
    return $return;
  }
}
