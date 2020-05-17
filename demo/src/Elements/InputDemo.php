<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Form\Option;
use Packaged\Glimpse\Tags\Form\Select;
use Packaged\Glimpse\Tags\Form\Textarea;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Button\ButtonInterface;
use PackagedUi\Fusion\Input\ToggleInput;
use PackagedUi\FusionDemo\AbstractDemoPage;

class InputDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Inputs';
  }

  protected function _getFaIcon()
  {
    return FaIcon::KEYBOARD;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Input::create()
      ->setAttribute('placeholder', 'Placeholder text')
      ->setType(Input::TYPE_TEXT);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Select::create(Option::collection(['a', 'b', 'c']));

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Textarea::create("This is a text area");

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Input::create()
      ->setValue('Text Here')
      ->setType(Input::TYPE_TEXT);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = [
      ToggleInput::create(new SafeHtml('Unchecked'))
        ->setCheckedContent('Checked'),
    ];

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = ToggleInput::create('Unchecked')
      ->setCheckedContent('Checked')
      ->addClass(ButtonInterface::BUTTON)
      ->setName('my_button')
      ->setValue('my_value')
      ->setCheckedClass(Button::bem()->modifier(ButtonInterface::_BUTTON_MOD_ACCENT));

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = ToggleInput::create(FaIcon::create(FaIcon::SQUARE)->sizeX10())
      ->setCheckedContent(FaIcon::create(FaIcon::CHECK_SQUARE)->sizeX10())
      ->setName('my_button')
      ->setValue('my_value');

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = [
      ToggleInput::create([FaIcon::create(FaIcon::CIRCLE), ' Radio 1'])
        ->setCheckedContent([FaIcon::create(FaIcon::CHECK_CIRCLE), ' Radio 1'])
        ->setName('button_test')
        ->setType(Input::TYPE_RADIO),
      ToggleInput::create([FaIcon::create(FaIcon::CIRCLE), ' Radio 2'])
        ->setCheckedContent([FaIcon::create(FaIcon::CHECK_CIRCLE), ' Radio 2'])
        ->setName('button_test')
        ->setType(Input::TYPE_RADIO),
    ];

    return $return;
  }
}
