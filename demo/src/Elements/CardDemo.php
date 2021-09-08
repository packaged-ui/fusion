<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Card\Card;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\FlexGrow;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\FusionDemo\AbstractDemoPage;

class CardDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Cards';
  }

  public function __construct()
  {
    ResourceManager::inline()->requireCss(
      "
      .grid { background: transparent; --grid-cell-width: 400px; }
      .grid__cell{ padding: 20px!important; background: transparent; }
    .card-demo{
      width:100%;
      height:100%;
    }
  
    "
    );
  }

  protected function _getFaIcon()
  {
    return FaIcon::ID_CARD;
  }

  protected function _content(): array
  {
    $return = $common = [];

    $common[] = $this->_showCard(Card::create('Card Content')->setHeader('Card Header'));

    $header = [
      FlexGrow::create("Header"),
      Button::create("Action Button")->sizeXsmall()->flat(),
    ];

    $common[] = $this->_showCard(Card::create('Card Content')->setHeader($header)->setFooter('Footer'));

    $common[] = $this->_showCard(Card::create('')->setTitle("Card Title"));
    $common[] = $this->_showCard(
      Card::create('')
        ->setTitle("Card Title W/Act")->setHeader(Button::create("Action Button")->sizeXsmall()->flat())
    );
    $common[] = $this->_showCard(
      Card::create('')
        ->setTitle("Card Title W/Act")->setHeader(
          [FlexGrow::create("Header"), Button::create("Action Button")->sizeXsmall()->outline()->primary()]
        )
    );
    $common[] = $this->_showCard(Card::create('')->addFooterAction(Link::create('#', "Example Action")));

    $common[] = $this->_showCard(Card::create('Card Content without container')->disableContentContainer());

    $return[] = GridLayout::createWithCells(...$common);

    $clrs = [];
    foreach(Color::getKeyedValues() as $color => $name)
    {
      $clrs[] = $this->_showCard(
        Card::create($name . ' Card Content')
          ->setColor(new Color($color))->withoutShadow()->addClass(Fusion::PADDING_SMALL)
          ->disableContentContainer()
      );
    }
    $return[] = LineBreak::create();
    $return[] = GridLayout::createWithCells(...$clrs);

    return [$return];
  }

  protected function _showCard($ele)
  {
    return Div::create($ele)->addClass('card-demo');
  }
}
