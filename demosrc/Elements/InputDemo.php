<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Form\Option;
use Packaged\Glimpse\Tags\Form\Select;
use Packaged\Glimpse\Tags\Form\Textarea;
use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\FontAwesome\FaIcon;
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

    return $return;
  }
}
