<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
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

    $return[] = Input::create()
      ->setValue('Text Here')
      ->setType(Input::TYPE_TEXT);

    return $return;
  }
}
