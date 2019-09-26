<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\DemoSection;

class ButtonDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    $return[] = Input::create()->setType(Input::TYPE_SUBMIT)->setValue('Default');
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Primary')->addClass(Fusion::BUTTON_PRIMARY);
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Accent')->addClass(Fusion::BUTTON_ACCENT);
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Success')->addClass(Fusion::BUTTON_SUCCESS);
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Danger')->addClass(Fusion::BUTTON_DANGER);
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Warning')->addClass(Fusion::BUTTON_WARNING);
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Info')->addClass(Fusion::BUTTON_INFO);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Link::create("#", "Default")->addClass(Fusion::BUTTON);
    $return[] = Link::create("#", "Primary")->addClass(Fusion::BUTTON_PRIMARY, Fusion::BUTTON);
    $return[] = Link::create("#", "Accent")->addClass(Fusion::BUTTON_ACCENT, Fusion::BUTTON);
    $return[] = Link::create("#", "Success")->addClass(Fusion::BUTTON_SUCCESS, Fusion::BUTTON);
    $return[] = Link::create("#", "Danger")->addClass(Fusion::BUTTON_DANGER, Fusion::BUTTON);
    $return[] = Link::create("#", "Warning")->addClass(Fusion::BUTTON_WARNING, Fusion::BUTTON);
    $return[] = Link::create("#", "Info")->addClass(Fusion::BUTTON_INFO, Fusion::BUTTON);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("Default");
    $return[] = Button::create("Primary")->primary();
    $return[] = Button::create("Accent")->accent();
    $return[] = Button::create("Success")->success();
    $return[] = Button::create("Danger")->danger();
    $return[] = Button::create("Warning")->warning();
    $return[] = Button::create("Info")->info();

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("Default")->outline();
    $return[] = Button::create("Primary")->outline()->primary();
    $return[] = Button::create("Accent")->outline()->accent();
    $return[] = Button::create("Success")->outline()->success();
    $return[] = Button::create("Danger")->outline()->danger();
    $return[] = Button::create("Warning")->outline()->warning();
    $return[] = Button::create("Info")->outline()->info();

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("Default")->flat();
    $return[] = Button::create("Primary")->flat()->primary();
    $return[] = Button::create("Accent")->flat()->accent();
    $return[] = Button::create("Success")->flat()->success();
    $return[] = Button::create("Danger")->flat()->danger();
    $return[] = Button::create("Warning")->flat()->warning();
    $return[] = Button::create("Info")->flat()->info();

    $primaryButtons = [];
    $primaryButtons[] = Button::create("Primary")->primary();
    $primaryButtons[] = Button::create("Primary")->outline()->primary();
    $primaryButtons[] = Button::create("Primary")->flat()->primary();

    $styles = [
      Fusion::BUTTON_ROUND,
      Fusion::BUTTON_XLARGE,
      Fusion::BUTTON_LARGE,
      Fusion::BUTTON_SMALL,
      Fusion::BUTTON_XSMALL,
      Fusion::BUTTON_DISABLED,
      Fusion::BUTTON_RAISED,
    ];

    foreach($styles as $style)
    {
      $return[] = LineBreak::create();
      $return[] = LineBreak::create();
      /** @var Button $button */
      foreach($primaryButtons as $button)
      {
        $btn = clone $button;
        if($style === Fusion::BUTTON_DISABLED)
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

    $return[] = Button::create("+")->fab();

    return $return;
  }
}
