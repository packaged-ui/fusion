<?php

namespace PackagedUi\Fusion\Tooltip;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Tooltip extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var string */
  protected $_tooltip;

  /**
   * @inheritDoc
   */
  public function getBlockName(): string
  {
    return 'tooltip';
  }

  /**
   * @param string $tooltip
   *
   * @return Tooltip
   */
  public function setTooltip(string $tooltip)
  {
    $this->_tooltip = $tooltip;
    return $this;
  }

  protected function _getContentForRender()
  {
    return Div::create(
      $this->_content,
      Span::create($this->_tooltip)->addClass($this->getElementName('text'))
    )->addClass($this->getElementName());
  }
}
