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
  use ComponentTrait;
  use BemComponentTrait;

  public function getBlockName(): string
  {
    return ButtonInferface::BUTTON;
  }

  public function flat()
  {
    $this->addClass(ButtonInferface::BUTTON_FLAT);
    return $this;
  }

  public function outline()
  {
    $this->addClass(ButtonInferface::BUTTON_OUTLINE);
    return $this;
  }

  public function round()
  {
    $this->addClass(ButtonInferface::BUTTON_ROUND);
    return $this;
  }

  public function fab()
  {
    $this->addClass(ButtonInferface::BUTTON_FAB);
    return $this;
  }

  public function raised()
  {
    $this->addClass(ButtonInferface::BUTTON_RAISED);
    return $this;
  }

  public function sizeExtraLarge()
  {
    $this->addClass(ButtonInferface::BUTTON_XLARGE);
    return $this;
  }

  public function sizeLarge()
  {
    $this->addClass(ButtonInferface::BUTTON_LARGE);
    return $this;
  }

  public function sizeSmall()
  {
    $this->addClass(ButtonInferface::BUTTON_SMALL);
    return $this;
  }

  public function sizeXsmall()
  {
    $this->addClass(ButtonInferface::BUTTON_XSMALL);
    return $this;
  }

  public function primary()
  {
    $this->addClass(ButtonInferface::BUTTON_PRIMARY);
    return $this;
  }

  public function accent()
  {
    $this->addClass(ButtonInferface::BUTTON_ACCENT);
    return $this;
  }

  public function success()
  {
    $this->addClass(ButtonInferface::BUTTON_SUCCESS);
    return $this;
  }

  public function danger()
  {
    $this->addClass(ButtonInferface::BUTTON_DANGER);
    return $this;
  }

  public function warning()
  {
    $this->addClass(ButtonInferface::BUTTON_WARNING);
    return $this;
  }

  public function info()
  {
    $this->addClass(ButtonInferface::BUTTON_INFO);
    return $this;
  }

  public function disable()
  {
    $this->addClass(ButtonInferface::BUTTON_DISABLED);
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
        $this->getElementName(ButtonInferface::BUTTON_ELE_ICON),
        LayoutInterface::DISPLAY_INLINE_FLEX_VCENTRE
      );

      $icon->addClass($this->getModifier($this->_iconPosition, ButtonInferface::BUTTON_ELE_ICON));
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
