<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Card\Card;
use PackagedUi\Fusion\Layout\Flex;
use PackagedUi\Fusion\Layout\FlexGrow;

class CardDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    $return[] = Card::create('Card Content')->setHeader('Card Header');
    $return[] = LineBreak::create();

    $header = Flex::create(
      FlexGrow::create("Header"),
      Button::create("Action Button")->sizeXsmall()->flat()
    );

    $return[] = Card::create('Card Content')->setHeader($header)->setFooter('Footer');
    $return[] = LineBreak::create();
    $return[] = Card::create('Card Content')->disableContentContainer();
    return $return;
  }
}
