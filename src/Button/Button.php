<?php
namespace PackagedUi\Fusion\Button;

use PackagedUi\Fusion\ButtonInferface;

class Button extends \Packaged\Glimpse\Tags\Button
{
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
}