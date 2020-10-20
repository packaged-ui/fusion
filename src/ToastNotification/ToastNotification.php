<?php

namespace PackagedUi\Fusion\ToastNotification;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use PackagedUi\Fusion\Layout\XyGrid\XyCell;
use PackagedUi\Fusion\Layout\XyGrid\XyGrid;
use PackagedUi\Fusion\Layout\XyGrid\XySize;

class ToastNotification extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var Color */
  protected $_color;

  protected $_icon;

  protected $_description;

  protected $_title;

  /** @var int */
  protected $_displayDuration = 0;

  /** @var int */
  protected $_delay = 0;

  /**
   * @inheritDoc
   */
  public function getBlockName(): string
  {
    return 'toast-notification';
  }

  /**
   * @param mixed $icon
   *
   * @return ToastNotification
   */
  public function setIcon($icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  /**
   * @param mixed $description
   *
   * @return ToastNotification
   */
  public function setDescription($description)
  {
    $this->_description = $description;
    return $this;
  }

  /**
   * @param int $delay
   *
   * @return ToastNotification
   */
  public function setDelay(int $delay): ToastNotification
  {
    $this->_delay = $delay;
    return $this;
  }

  /**
   * @param mixed $title
   *
   * @return ToastNotification
   */
  public function setTitle($title)
  {
    $this->_title = $title;
    return $this;
  }

  /**
   * @param int $displayDuration
   *
   * @return ToastNotification
   */
  public function setDisplayDuration(int $displayDuration): ToastNotification
  {
    $this->_displayDuration = $displayDuration;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass($this->getElementName());
    $this->setAttribute('data-toast-notification-time-to-show', $this->_displayDuration);
    $this->setAttribute('data-toast-notification-delay', $this->_delay);
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    $icon = null;
    $size = XySize::MOBILE(12);
    if($this->_icon)
    {
      $icon = XyCell::create(
        $this->_icon
      )->addClass($this->getElementName('icon'))->setSizes(XySize::MOBILE(3));
      $size = XySize::MOBILE(9);
    }

    return XyGrid::create(
      XyCell::create(
        Div::create(
          $this->_title
        )->addClass($this->getElementName('title')),
        Div::create(
          $this->_description
        )->addClass($this->getElementName('description'))
      )->addClass($this->getElementName('content'))->setSizes($size),
      $icon
    )->marginX();
  }

  public function setColor(Color $color = null)
  {
    if($this->_color instanceof Color)
    {
      $this->removeClass($this->getModifier('with-color'), $this->_color->background(), $this->_color->border());
    }

    if($color)
    {
      $this->addClass($this->getModifier('with-color'), $color->background(), $color->border());
    }

    $this->_color = $color;

    return $this;
  }

  public function removable()
  {
    $this->addModifier('removable');
    return $this;
  }
}
