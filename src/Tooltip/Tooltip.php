<?php

namespace PackagedUi\Fusion\Tooltip;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Tooltip extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var string */
  protected $_tooltip;

  /** @var string */
  protected $_position = 'auto';

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
    return Div::create($this->_content)
      ->addClass($this->getElementName())
      ->setAttribute('data-tooltip', $this->_tooltip)
      ->setAttribute('data-tooltip-position', $this->_position);
  }

  public function setPosition(TooltipPosition $position)
  {
    $this->_position = $position->getValue();
    return $this;
  }
}
