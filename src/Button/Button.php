<?php
namespace PackagedUi\Fusion\Button;

use Packaged\Glimpse\Tags\Div;
use Packaged\Helpers\ValueAs;
use Packaged\SafeHtml\ISafeHtmlProducer;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use PackagedUi\Fusion\Layout\LayoutInterface;

class Button extends \Packaged\Glimpse\Tags\Button implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return ButtonInterface::BUTTON;
  }

  public function flat()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_FLAT);
    return $this;
  }

  public function outline()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_OUTLINE);
    return $this;
  }

  public function round()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_ROUND);
    return $this;
  }

  public function fab()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_FAB);
    return $this;
  }

  public function raised()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_RAISED);
    return $this;
  }

  public function sizeExtraLarge()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_XLARGE);
    return $this;
  }

  public function sizeLarge()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_LARGE);
    return $this;
  }

  public function sizeSmall()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_SMALL);
    return $this;
  }

  public function sizeXsmall()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_XSMALL);
    return $this;
  }

  public function primary()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_PRIMARY);
    return $this;
  }

  public function accent()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_ACCENT);
    return $this;
  }

  public function success()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_SUCCESS);
    return $this;
  }

  public function danger()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_DANGER);
    return $this;
  }

  public function warning()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_WARNING);
    return $this;
  }

  public function info()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_INFO);
    return $this;
  }

  public function disable()
  {
    $this->addModifier(ButtonInterface::_BUTTON_MOD_DISABLED);
    $this->setAttribute('disabled', null);
    return $this;
  }

  /* ICONS */

  protected $_icon;
  /** @var ButtonIconPosition */
  protected $_iconPosition;

  protected function _getContentForRender()
  {
    $content = parent::_getContentForRender();
    if($this->_icon && $this->_iconPosition)
    {
      $content = ValueAs::arr($content);
      $icon = Div::create($this->_icon)->addClass(
        $this->getElementName(ButtonInterface::_BUTTON_ELE_ICON),
        LayoutInterface::DISPLAY_INLINE_FLEX_VCENTRE
      );

      $icon->addClass($this->getModifier($this->_iconPosition, ButtonInterface::_BUTTON_ELE_ICON));
      if($this->_iconPosition->is(ButtonIconPosition::RIGHT))
      {
        $content[] = $icon;
      }
      else
      {
        array_unshift($content, $icon);
      }
    }
    return $content;
  }

  public function setIcon(ISafeHtmlProducer $icon, ButtonIconPosition $position = null)
  {
    $this->_icon = $icon;
    $this->_iconPosition = $position ?? ($this->_iconPosition ?? ButtonIconPosition::LEFT());
    return $this;
  }

  public function setIconLeft(ISafeHtmlProducer $icon)
  {
    return $this->setIcon($icon, ButtonIconPosition::LEFT());
  }

  public function setIconRight(ISafeHtmlProducer $icon)
  {
    return $this->setIcon($icon, ButtonIconPosition::RIGHT());
  }
}
