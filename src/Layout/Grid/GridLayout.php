<?php
namespace PackagedUi\Elegance\Layout\Grid;

use Packaged\Glimpse\Tags\Div;

class GridLayout extends Div
{
  public function __construct($content = null)
  {
    parent::__construct($content);
    $this->addClass('layout-grid');
  }
}
