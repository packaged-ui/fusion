<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Button;
use Packaged\Glimpse\Tags\HorizontalRule;
use PackagedUi\Elegance\Elegance;

class Buttons extends DemoSection
{
  protected function _content()
  {
    $return = [];

    $return[] = Button::create("Default");
    $return[] = Button::create("Primary")->addClass(Elegance::BUTTON_PRIMARY);
    $return[] = Button::create("Secondary")->addClass(Elegance::BUTTON_SECONDARY);
    $return[] = Button::create("Success")->addClass(Elegance::BUTTON_SUCCESS);
    $return[] = Button::create("Danger")->addClass(Elegance::BUTTON_DANGER);
    $return[] = Button::create("Warning")->addClass(Elegance::BUTTON_WARNING);
    $return[] = Button::create("Info")->addClass(Elegance::BUTTON_INFO);
    $return[] = Button::create("Dark")->addClass(Elegance::BUTTON_DARK);
    $return[] = Button::create("Link")->addClass(Elegance::BUTTON_LINK);

    $return[] = HorizontalRule::create();

    $return[] = Button::create("Default")->addClass(Elegance::BUTTON_OUTLINE);
    $return[] = Button::create("Primary")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_PRIMARY);
    $return[] = Button::create("Secondary")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_SECONDARY);
    $return[] = Button::create("Success")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_SUCCESS);
    $return[] = Button::create("Danger")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_DANGER);
    $return[] = Button::create("Warning")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_WARNING);
    $return[] = Button::create("Info")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_INFO);
    $return[] = Button::create("Dark")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_DARK);
    $return[] = Button::create("Link")->addClass(Elegance::BUTTON_OUTLINE)->addClass(Elegance::BUTTON_LINK);

    $return[] = HorizontalRule::create();

    $return[] = Button::create("Default")->addClass(Elegance::BUTTON_FLAT);
    $return[] = Button::create("Primary")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_PRIMARY);
    $return[] = Button::create("Secondary")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_SECONDARY);
    $return[] = Button::create("Success")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_SUCCESS);
    $return[] = Button::create("Danger")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_DANGER);
    $return[] = Button::create("Warning")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_WARNING);
    $return[] = Button::create("Info")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_INFO);
    $return[] = Button::create("Dark")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_DARK);
    $return[] = Button::create("Link")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_LINK);

    $primaryButtons = [];
    $primaryButtons[] = Button::create("Primary")->addClass(Elegance::BUTTON_PRIMARY);
    $primaryButtons[] = Button::create("Primary")->addClass(Elegance::BUTTON_OUTLINE)->addClass(
      Elegance::BUTTON_PRIMARY
    );
    $primaryButtons[] = Button::create("Primary")->addClass(Elegance::BUTTON_FLAT)->addClass(Elegance::BUTTON_PRIMARY);

    $styles = [
      Elegance::BUTTON_ROUND,
      Elegance::BUTTON_XLARGE,
      Elegance::BUTTON_LARGE,
      Elegance::BUTTON_SMALL,
      Elegance::BUTTON_XSMALL,
      Elegance::BUTTON_DISABLED,
      Elegance::BUTTON_FAB,
    ];

    foreach($styles as $style)
    {
      $return[] = HorizontalRule::create();
      /** @var Button $button */
      foreach($primaryButtons as $button)
      {
        $btn = clone $button;
        if($style === Elegance::BUTTON_DISABLED)
        {
          $btn->setAttribute('disabled', null);
        }
        $return[] = $btn->addClass($style)->setContent($style);
      }
    }

    return $return;
  }
}
