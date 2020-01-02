<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Card\Card;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Flex;
use PackagedUi\Fusion\Layout\FlexGrow;
use PackagedUi\FusionDemo\AbstractDemoPage;

class CardDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Cards';
  }

  protected function _getFaIcon()
  {
    return FaIcon::ID_CARD;
  }

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

    foreach(Color::getKeyedValues() as $color => $name)
    {
      $return[] = LineBreak::create();
      $return[] = Card::create($name . ' Card Content')
        ->setColor(new Color($color))->withoutShadow()->addClass(Fusion::PADDING_SMALL)
        ->disableContentContainer();
    }

    return $return;
  }
}
