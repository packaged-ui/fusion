<?php

namespace PackagedUi\Fusion\Layout\XyGrid;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

/**
 * Class GridContainer
 * @package PackagedUi\Fusion\Layout\XyGrid
 */
class XyContainer extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /**
   * GridContainer constructor.
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
    return 'grid-container';
  }

  /**
   * @return $this
   */
  public function fluid()
  {
    $this->addClass('fluid');
    return $this;
  }

}
