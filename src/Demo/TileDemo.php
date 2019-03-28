<?php
namespace PackagedUi\Fusion\Demo;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Link;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Tiles\Enum\TileLayout;
use PackagedUi\Fusion\Tiles\Tile;
use PackagedUi\Fusion\Tiles\TileAction;
use PackagedUi\Fusion\Tiles\Tiles;

class TileDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] = Tiles::create(
      Tile::create()->setTitle('Tile 1')->addAction(
        TileAction::create()->setLink(
          Link::create('#', FaIcon::create(FaIcon::EDIT))
        )
      ),
      Tile::create()->setTitle('Tile 2')
    );

    $i = 0;
    $return[] = $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID);
    while(count($tiles->getTiles()) < 5)
    {
      $tile = Tile::create()->setTitle('Tile ' . ++$i);
      if($i < 4)
      {
        $tile->addProperty('label', 'value');
      }
      $tiles->addTile($tile);
    }

    return SafeHtml::escape($return);
  }
}
