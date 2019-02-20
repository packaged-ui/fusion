<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\Elegance\Card\Card;

class CardDemo extends DemoSection
{
  protected function _content()
  {
    $return = [];

    $return[] = Card::create('Card Content')->setHeader('Card Header');
    $return[] = LineBreak::create();
    $return[] = Card::create('Card Content')->disableContentContainer();
    return $return;
  }
}
