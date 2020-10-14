<?php

namespace PackagedUi\Fusion\VerticalStepper;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Step extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_header;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  public function getBlockName(): string
  {
    return 'step';
  }

  /**
   * @param mixed $header
   *
   * @return Step
   */
  public function setHeader(...$header)
  {
    $this->_header = $header;
    return $this;
  }

  protected function _getContentForRender()
  {
    return Div::create(
      Div::create(...$this->_header)->addClass($this->getElementName('header')),
      Div::create($this->getContent())->addClass($this->getElementName('content'))
    );
  }
}
