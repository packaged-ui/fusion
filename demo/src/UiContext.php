<?php
namespace PackagedUi\FusionDemo;

use Cubex\Context\Context;

class UiContext extends Context
{
  /** @var ConfigHandler */
  protected $_configHandler;

  /**
   * @return ConfigHandler
   */
  public function configHandler(): ConfigHandler
  {
    return $this->_configHandler;
  }

  /**
   * @param ConfigHandler $configHandler
   *
   * @return UiContext
   */
  public function setConfigHandler(ConfigHandler $configHandler): UiContext
  {
    $this->_configHandler = $configHandler;
    return $this;
  }

}
