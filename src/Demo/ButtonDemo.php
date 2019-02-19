<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\HorizontalRule;
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
    $return[] = Link::create("#", "Secondary")->addClass(Elegance::BUTTON_SECONDARY, Elegance::BUTTON);
    $return[] = Link::create("#", "Success")->addClass(Elegance::BUTTON_SUCCESS, Elegance::BUTTON);
    $return[] = Link::create("#", "Danger")->addClass(Elegance::BUTTON_DANGER, Elegance::BUTTON);
    $return[] = Link::create("#", "Warning")->addClass(Elegance::BUTTON_WARNING, Elegance::BUTTON);
    $return[] = Link::create("#", "Info")->addClass(Elegance::BUTTON_INFO, Elegance::BUTTON);
    $return[] = Link::create("#", "Dark")->addClass(Elegance::BUTTON_DARK, Elegance::BUTTON);
    $return[] = Link::create("#", "Link")->addClass(Elegance::BUTTON_LINK, Elegance::BUTTON);

    $return[] = HorizontalRule::create();

    $return[] = EleganceButton::create("Default");
    $return[] = EleganceButton::create("Primary")->primary();
    $return[] = EleganceButton::create("Secondary")->secondary();
    $return[] = EleganceButton::create("Success")->success();
    $return[] = EleganceButton::create("Danger")->danger();
    $return[] = EleganceButton::create("Warning")->warning();
    $return[] = EleganceButton::create("Info")->info();
    $return[] = EleganceButton::create("Dark")->dark();
    $return[] = EleganceButton::create("Link")->link();

    $return[] = HorizontalRule::create();

    $return[] = EleganceButton::create("Default")->outline();
    $return[] = EleganceButton::create("Primary")->outline()->primary();
    $return[] = EleganceButton::create("Secondary")->outline()->secondary();
    $return[] = EleganceButton::create("Success")->outline()->success();
    $return[] = EleganceButton::create("Danger")->outline()->danger();
    $return[] = EleganceButton::create("Warning")->outline()->warning();
    $return[] = EleganceButton::create("Info")->outline()->info();
    $return[] = EleganceButton::create("Dark")->outline()->dark();
    $return[] = EleganceButton::create("Link")->outline()->link();

    $return[] = HorizontalRule::create();

    $return[] = EleganceButton::create("Default")->flat();
    $return[] = EleganceButton::create("Primary")->flat()->primary();
    $return[] = EleganceButton::create("Secondary")->flat()->secondary();
    $return[] = EleganceButton::create("Success")->flat()->success();
    $return[] = EleganceButton::create("Danger")->flat()->danger();
    $return[] = EleganceButton::create("Warning")->flat()->warning();
    $return[] = EleganceButton::create("Info")->flat()->info();
    $return[] = EleganceButton::create("Dark")->flat()->dark();
    $return[] = EleganceButton::create("Link")->flat()->link();

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
      Elegance::BUTTON_FAB,
      Elegance::BUTTON_RAISED,
    ];

    foreach($styles as $style)
    {
      $return[] = HorizontalRule::create();
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

    return $return;
  }
}
