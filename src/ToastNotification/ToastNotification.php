<?php

namespace PackagedUi\Fusion\ToastNotification;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ToastNotification extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var Color */
  protected $_color;

  protected $_icon;

  protected $_title;

  protected $_persistent;

  /** @var int */
  protected $_displayDuration = 0;

  /** @var int */
  protected $_delay = 0;
  /** @var bool */
  protected $_iconRight = false;

  /**
   * @inheritDoc
   */
  public function getBlockName(): string
  {
    return 'toast-notification';
  }

  /**
   * @param mixed $icon
   * @param bool  $right
   *
   * @return ToastNotification
   */
  public function setIcon($icon, bool $right = false)
  {
    $this->_icon = $icon;
    $this->_iconRight = $right;
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

  /**
   * @return ToastNotification
   */
  public function persistent()
  {
    $this->_persistent = true;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass($this->getElementName());
    $this->setAttribute('data-toast-notification-time-to-show', $this->_displayDuration);
    $this->setAttribute('data-toast-notification-delay', $this->_delay);
    if($this->_persistent)
    {
      $this->setAttribute('data-persistent', $this->_persistent);
    }
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    $icon = $this->_icon ? Div::create($this->_icon)->addClass($this->getElementName('icon')) : null;
    $title = $this->_title ? Div::create($this->_title)->addClass($this->getElementName('title')) : null;

    return [
      $this->_iconRight ? null : $icon,
      Div::create(
        $title,
        Div::create($this->_content)->addClass($this->getElementName('description'))
      )->addClass($this->getElementName('content')),
      $this->_iconRight ? $icon : null,
    ];
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
