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
  protected $_position = 'bottom';

  /** @var string|null */
  protected $_size;

  /**
   * @return string
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
  public function setTooltip(string $tooltip): Tooltip
  {
    $this->_tooltip = $tooltip;
    return $this;
  }

  /**
   * @param TooltipSize|null $size
   *
   * @return Tooltip
   */
  public function setSize(TooltipSize $size = null): Tooltip
  {
    $this->_size = $size;
    return $this;
  }

  /**
   * @param TooltipPosition $position
   *
   * @return $this
   */
  public function setPosition(TooltipPosition $position): Tooltip
  {
    $this->_position = $position;
    return $this;
  }

  protected function _getContentForRender()
  {
    return Div::create($this->_content)
      ->addClass($this->getElementName())
      ->setAttribute('aria-label', $this->_tooltip)
      ->setAttribute('role', 'tooltip')
      ->setAttribute('data-microtip-position', $this->_position)
      ->setAttribute('data-microtip-size', $this->_size);
  }
}
