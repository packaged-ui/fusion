<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Tiles\Enum\TileLayout;
use PackagedUi\Fusion\Tiles\Tile;
use PackagedUi\Fusion\Tiles\TileAction;
use PackagedUi\Fusion\Tiles\Tiles;
use PackagedUi\FusionDemo\AbstractDemoPage;

class TileDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Tile';
  }

  protected function _getFaIcon()
  {
    return FaIcon::TH_LIST;
  }

  protected function _content(): array
  {
    $return = [];
    $return[] = Tiles::create(
      Tile::create()->setTitle('Tile 1')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->setColor(Color::BLUE),
      Tile::create()->setTitle('Tile 2')->setColor(Color::RED)
    );

    $i = 0;
    $return[] = LineBreak::create();

    $return[] = $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID);
    while(count($tiles->getTiles()) < 5)
    {
      $tile = Tile::create()->setTitle('Tile ' . ++$i)->setColor(Color::INDIGO);
      if($i < 4)
      {
        $tile->addProperty('label', 'value');
      }
      $tiles->addTile($tile);
    }

    return $return;
  }
}
