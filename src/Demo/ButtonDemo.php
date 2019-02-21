<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\Elegance\Button\EleganceButton;
use PackagedUi\Elegance\Elegance;

class ButtonDemo extends DemoSection
{
  protected function _content()
  {
    $return = [];

    $return[] = Link::create("#", "Default")->addClass(Elegance::BUTTON);
    $return[] = Link::create("#", "Primary")->addClass(Elegance::BUTTON_PRIMARY, Elegance::BUTTON);
    $return[] = Link::create("#", "Accent")->addClass(Elegance::BUTTON_ACCENT, Elegance::BUTTON);
    $return[] = Link::create("#", "Success")->addClass(Elegance::BUTTON_SUCCESS, Elegance::BUTTON);
    $return[] = Link::create("#", "Danger")->addClass(Elegance::BUTTON_DANGER, Elegance::BUTTON);
    $return[] = Link::create("#", "Warning")->addClass(Elegance::BUTTON_WARNING, Elegance::BUTTON);
    $return[] = Link::create("#", "Info")->addClass(Elegance::BUTTON_INFO, Elegance::BUTTON);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = EleganceButton::create("Default");
    $return[] = EleganceButton::create("Primary")->primary();
    $return[] = EleganceButton::create("Accent")->accent();
    $return[] = EleganceButton::create("Success")->success();
    $return[] = EleganceButton::create("Danger")->danger();
    $return[] = EleganceButton::create("Warning")->warning();
    $return[] = EleganceButton::create("Info")->info();

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = EleganceButton::create("Default")->outline();
    $return[] = EleganceButton::create("Primary")->outline()->primary();
    $return[] = EleganceButton::create("Accent")->outline()->accent();
    $return[] = EleganceButton::create("Success")->outline()->success();
    $return[] = EleganceButton::create("Danger")->outline()->danger();
    $return[] = EleganceButton::create("Warning")->outline()->warning();
    $return[] = EleganceButton::create("Info")->outline()->info();

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = EleganceButton::create("Default")->flat();
    $return[] = EleganceButton::create("Primary")->flat()->primary();
    $return[] = EleganceButton::create("Accent")->flat()->accent();
    $return[] = EleganceButton::create("Success")->flat()->success();
    $return[] = EleganceButton::create("Danger")->flat()->danger();
    $return[] = EleganceButton::create("Warning")->flat()->warning();
    $return[] = EleganceButton::create("Info")->flat()->info();

    $primaryButtons = [];
    $primaryButtons[] = EleganceButton::create("Primary")->primary();
    $primaryButtons[] = EleganceButton::create("Primary")->outline()->primary();
    $primaryButtons[] = EleganceButton::create("Primary")->flat()->primary();

    $styles = [
      Elegance::BUTTON_ROUND,
      Elegance::BUTTON_XLARGE,
      Elegance::BUTTON_LARGE,
      Elegance::BUTTON_SMALL,
      Elegance::BUTTON_XSMALL,
      Elegance::BUTTON_DISABLED,
      Elegance::BUTTON_RAISED,
    ];

    foreach($styles as $style)
    {
      $return[] = LineBreak::create();
      $return[] = LineBreak::create();
      /** @var EleganceButton $button */
      foreach($primaryButtons as $button)
      {
        $btn = clone $button;
        if($style === Elegance::BUTTON_DISABLED)
        {
          $btn->disable();
        }
        else
        {
          $btn->addClass($style);
        }
        $return[] = $btn->setContent($style);
      }
    }

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = EleganceButton::create("+")->fab();

    return $return;
  }
}
