<?php

namespace PackagedUi\Fusion\Layout\XyGrid;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

/**
 * Class GridX
 * @package PackagedUi\Fusion\Layout\XyGrid
 */
class XyGrid extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /**
   * GridX constructor.
   *
   * @param mixed ...$content
   */
  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  /**
   * @return string
   */
  public function getBlockName(): string
  {
    return 'grid-x';
  }

  /**
   * @return $this
   */
  public function marginX(): self
  {
    $this->addClass('grid-margin-x');
    return $this;
  }

  /**
   * @return $this
   */
  public function marginY(): self
  {
    $this->addClass('grid-margin-y');
    return $this;
  }

}