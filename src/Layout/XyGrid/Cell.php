<?php
namespace PackagedUi\Fusion\Layout\XyGrid;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Cell extends Div implements Component
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
    return 'cell';
  }

  public function large(int $spread = 0)
  {
    if($spread)
    {
      $this->addClass('large-' . $spread);
    }
    return $this;
  }

  public function medium(int $spread = 0)
  {
    if($spread)
    {
      $this->addClass('medium-' . $spread);
    }
    return $this;
  }

  public function small(int $spread = 0)
  {
    if($spread)
    {
      $this->addClass('small-' . $spread);
    }
    return $this;
  }

}
