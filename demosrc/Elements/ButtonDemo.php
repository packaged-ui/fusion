<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\BemComponent\Bem;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Button\ButtonIconPosition;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\AbstractDemoPage;

class ButtonDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Buttons';
  }

  protected function _getFaIcon()
  {
    return FaIcon::MOUSE_POINTER;
  }

  protected function _content(): array
  {
    $return = [];
    $btnBem = Bem::block(Fusion::BUTTON);

    $return[] = Input::create()->setType(Input::TYPE_SUBMIT)->setValue('Default');
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Primary')
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_PRIMARY));
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Accent')
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_ACCENT));
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Success')
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_SUCCESS));
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Danger')
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_DANGER));
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Warning')
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_WARNING));
    $return[] = Input::create()->setType(Input::TYPE_BUTTON)->setValue('Info')->addClass(Fusion::_BUTTON_MOD_INFO);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Link::create("#", "Default")->addClass($btnBem->getBlockName());
    $return[] = Link::create("#", "Primary")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_PRIMARY), $btnBem->getBlockName());
    $return[] = Link::create("#", "Accent")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_ACCENT), $btnBem->getBlockName());
    $return[] = Link::create("#", "Success")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_SUCCESS), $btnBem->getBlockName());
    $return[] = Link::create("#", "Danger")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_DANGER), $btnBem->getBlockName());
    $return[] = Link::create("#", "Warning")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_WARNING), $btnBem->getBlockName());
    $return[] = Link::create("#", "Info")
      ->addClass($btnBem->modifier(Fusion::_BUTTON_MOD_INFO), $btnBem->getBlockName());

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

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("Default")->flat()->outline();
    $return[] = Button::create("Primary")->flat()->outline()->primary();
    $return[] = Button::create("Accent")->flat()->outline()->accent();
    $return[] = Button::create("Success")->flat()->outline()->success();
    $return[] = Button::create("Danger")->flat()->outline()->danger();
    $return[] = Button::create("Warning")->flat()->outline()->warning();
    $return[] = Button::create("Info")->flat()->outline()->info();

    $primaryButtons = [];
    $primaryButtons[] = Button::create("Primary")->primary();
    $primaryButtons[] = Button::create("Primary")->outline()->primary();
    $primaryButtons[] = Button::create("Primary")->flat()->primary();

    $styles = [
      Fusion::_BUTTON_MOD_ROUND,
      Fusion::_BUTTON_MOD_XLARGE,
      Fusion::_BUTTON_MOD_LARGE,
      Fusion::_BUTTON_MOD_SMALL,
      Fusion::_BUTTON_MOD_XSMALL,
      Fusion::_BUTTON_MOD_DISABLED,
      Fusion::_BUTTON_MOD_RAISED,
    ];

    foreach($styles as $style)
    {
      $return[] = LineBreak::create();
      $return[] = LineBreak::create();
      /** @var Button $button */
      foreach($primaryButtons as $button)
      {
        $btn = clone $button;
        if($style === Fusion::_BUTTON_MOD_DISABLED)
        {
          $btn->disable();
        }
        else
        {
          $btn->addClass($btnBem->modifier($style));
        }
        $return[] = $btn->setContent($style);
      }
    }

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("+")->fab();

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Button::create("Default")->setIcon(FaIcon::create(FaIcon::FORWARD))->primary();
    $return[] = Button::create("Default")->setIcon(FaIcon::create(FaIcon::FORWARD), ButtonIconPosition::RIGHT())
      ->primary();

    return $return;
  }
}
