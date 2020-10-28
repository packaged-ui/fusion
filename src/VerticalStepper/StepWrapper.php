<?php

namespace PackagedUi\Fusion\VerticalStepper;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use function count;

class StepWrapper extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  public function getBlockName(): string
  {
    return 'step-wrapper';
  }

  protected function _getContentForRender()
  {
    $this->getContent()[count($this->getContent()) - 1]->addClass('step--last');
    $this->getContent()[0]->addClass('step--first');
    return $this->getContent();
  }

  public function border()
  {
    $this->addClass($this->getModifier('border'));
    return $this;
  }

  public function iconMiddle()
  {
    $this->addClass($this->getModifier('icon-middle'));
    return $this;
  }
}
