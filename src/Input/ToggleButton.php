<?php

namespace PackagedUi\Fusion\Input;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ToggleButton extends Div implements Component
{

  protected $_tag = 'label';

  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    $this->addClass($this->getBlockName());
    parent::__construct($content);
  }

  public function getBlockName(): string
  {
    return 'toggle-button';
  }

  protected function _getContentForRender()
  {
    return [
      Input::create()->setType(Input::TYPE_CHECKBOX),
      Span::create()->addClass('slider', 'round'),
    ];
  }
}
