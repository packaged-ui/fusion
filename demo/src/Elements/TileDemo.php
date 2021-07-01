<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Media\Image;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Avatar\Avatar;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Tiles\Enum\TileLayout;
use PackagedUi\Fusion\Tiles\Tile;
use PackagedUi\Fusion\Tiles\TileAction;
use PackagedUi\Fusion\Tiles\Tiles;

class TileDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Tile';
  }

  protected function _getFaIcon()
  {
    return FaIcon::TH_LIST;
  }

  /**
   * Example of the default Tile
   *
   * @return HtmlTag
   */
  final public function DefaultTile(): HtmlTag
  {
    return Tile::create()->setTitle('This is a tile');
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultTileLabel(): HtmlTag
  {
    return Tile::create()
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setContent('Lorem ipsum dolor sit amet.');
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultTileAvatar(): HtmlTag
  {
    return Tile::create()
      ->setAvatar(Image::create('https://i.pravatar.cc/30'))
      ->setTitle('This is a tile')
      ->setLabel('Hello World');
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultTileAvatarContent(): HtmlTag
  {
    return Tile::create()
      ->setAvatar(Avatar::image('https://i.pravatar.cc/60'))
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setDescription("Lorem ipsum dolor sit amet.");
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultTiles(): HtmlTag
  {
    $tiles = Tiles::create();

    $tiles->addTile(Tile::create()->setTitle('This is a tile'));
    $tiles->addTile(Tile::create()->setTitle('This is a tile'));

    return $tiles;
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultTilesGrid(): HtmlTag
  {
    $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID);

    $tiles->addTile(Tile::create()->setTitle('This is a tile'));
    $tiles->addTile(Tile::create()->setTitle('This is a tile'));
    $tiles->addTile(Tile::create()->setTitle('This is a tile'));

    return $tiles;
  }

  /**
   * Example of the Tile with Action
   *
   * @return array
   */
  final public function DefaultTileWithAction(): array
  {
    $tiles = [];

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))));

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))));

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))));

    return $tiles;
  }

  /**
   * Example of the Tile with Color
   *
   * @return array
   */
  final public function DefaultTileWithColor(): array
  {
    $tiles = [];

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->setColor(Color::GREEN);

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->setColor(Color::RED);

    $tiles[] = Tile::create()->setTitle('This is a tile')
      ->setColor(Color::BLUE);

    return $tiles;
  }

  /**
   * Tile with Properties
   *
   * @return Tile
   */
  final public function TileWithProperty(): Tile
  {
    return Tile::create()->setTitle("Properties")
      ->addProperty('Label', 'Value');
  }

}
