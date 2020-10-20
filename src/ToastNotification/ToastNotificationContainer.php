<?php

namespace PackagedUi\Fusion\ToastNotification;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ToastNotificationContainer extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var ToastNotification[] */
  protected $_toastNotifications = [];

  /** @var int */
  protected $_delay = 5000;

  /** @var ToastNotificationPosition */
  protected $_position;

  /**
   * @inheritDoc
   */
  public function getBlockName(): string
  {
    return 'toast-notification-container';
  }

  /**
   * @param ToastNotification $toastNotification
   *
   * @return ToastNotificationContainer
   */
  public function addToastNotification(ToastNotification $toastNotification): ToastNotificationContainer
  {
    $this->_toastNotifications[] = $toastNotification;
    return $this;
  }

  /**
   * @param int $delay
   *
   * @return ToastNotificationContainer
   */
  public function setDelay(int $delay): ToastNotificationContainer
  {
    $this->_delay = $delay;
    return $this;
  }

  /**
   * @param ToastNotificationPosition $position
   *
   * @return ToastNotificationContainer
   */
  public function setPosition(ToastNotificationPosition $position): ToastNotificationContainer
  {
    $this->_position = $position;
    return $this;
  }

  /**
   * @return ToastNotificationContainer
   */
  public function removable(): ToastNotificationContainer
  {
    foreach($this->_toastNotifications as $toastNotification)
    {
      $toastNotification->removable();
    }
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass($this->getElementName());
    if($this->_position)
    {
      $this->addModifier($this->_position);
    }
    $this->setAttribute('data-toast-notification-delay', $this->_delay);
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    return $this->_toastNotifications;
  }
}
