<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Button\EleganceButton;
use PackagedUi\Elegance\Card\Card;
use PackagedUi\Elegance\Layout\Flex;
use PackagedUi\Elegance\Layout\FlexGrow;

class CardDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];

    $return[] = Card::create('Card Content')->setHeader('Card Header');
    $return[] = LineBreak::create();

    $header = Flex::create(
      FlexGrow::create("Header"),
      EleganceButton::create("Action Button")->sizeXsmall()->flat()
    );

    $return[] = Card::create('Card Content')->setHeader($header);
    $return[] = LineBreak::create();
    $return[] = Card::create('Card Content')->disableContentContainer();
    return SafeHtml::escape($return);
  }
}
