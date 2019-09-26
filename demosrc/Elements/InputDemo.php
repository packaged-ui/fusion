<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\FusionDemo\DemoSection;

class InputDemo extends DemoSection
{
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
