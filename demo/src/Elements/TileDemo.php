<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Media\Image;
use Packaged\Glimpse\Tags\Text\StrongText;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Avatar\Avatar;
use PackagedUi\Fusion\Chip\Chip;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Layout\FlexGrow;
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
  final public function Tile(): HtmlTag
  {
    return Tile::create()->setTitle('This is a tile');
  }

  /**
   * @return HtmlTag
   */
  final public function TileLabel(): HtmlTag
  {
    return Tile::create()
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setDescription('Lorem ipsum dolor sit amet.');
  }

  /**
   * @return HtmlTag
   */
  final public function TileAction(): HtmlTag
  {
    return Tile::create()
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setDescription('Lorem ipsum dolor sit amet.')
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))));
  }

  /**
   * @return HtmlTag
   */
  final public function TileHoverAction(): HtmlTag
  {
    return Tile::create()
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setDescription('Lorem ipsum dolor sit amet.')
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->hoverActions();
  }

  /**
   * @return HtmlTag
   */
  final public function TileHoverActionWithIcons(): HtmlTag
  {
    return Tile::create()
      ->setTitle('This is a tile')
      ->setLabel('Hello World')
      ->setDescription('Lorem ipsum dolor sit amet.')
      ->addIcon(FaIcon::create(FaIcon::THUMBS_UP))
      ->addIcon(FaIcon::create(FaIcon::THUMBS_DOWN))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
      ->hoverActions();
  }

  /**
   * @return HtmlTag
   */
  final public function TileAvatar(): HtmlTag
  {
    return Tile::create()
      ->setAvatar(Image::create('https://i.pravatar.cc/30'))
      ->setTitle('This is a tile')
      ->setLabel('Hello World');
  }

  /**
   * @return HtmlTag
   */
  final public function TileAvatarContent(): HtmlTag
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
  final public function Tiles(): HtmlTag
  {
    $tiles = Tiles::create();

    $tiles->addTile(Tile::create()->setTitle('This is a tile'));
    $tiles->addTile(Tile::create()->setTitle('This is a tile'));

    return $tiles;
  }

  /**
   * @return HtmlTag
   */
  final public function TilesGrid(): HtmlTag
  {
    $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID);

    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
    );
    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->hoverActions()
    );
    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
    );

    return $tiles;
  }

  /**
   * @return HtmlTag
   */
  final public function TilesFullWidthGrid(): HtmlTag
  {
    $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID_FULLWIDTH);

    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
    );
    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
    );
    $tiles->addTile(
      Tile::create()->setTitle('This is a tile')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addProperty('Label', 'Value')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
    );

    return $tiles;
  }

  /**
   * Example of the Tile with Action
   *
   * @return array
   */
  final public function TileWithAction(): array
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
  final public function TileWithColor(): array
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

  /**
   * @return Tile
   */
  final public function TileWithFooter(): Tile
  {
    return Tile::create()->setTitle("Properties")
      ->setFooter(FlexGrow::create('Hello World'));
  }

  /**
   * @return Tile
   */
  final public function TileTask(): Tile
  {
    return Tile::create()->setTitle([StrongText::create("#1234"), " ", Link::create("#", "Create Tiles")])
      ->setFooter(Avatar::text("John Smith")->small())
      ->setColor(Color::BLUE)
      ->addChips(Chip::create("FEATURE REQUEST")->setColor(Color::BLUE(), false));
  }

  protected function _getFullDemoTile()
  {
    return Tile::create()
      ->setLabel('Senior PHP Developer')
      ->setTitle('John Doe')
      ->setDescription('Programming since the dawn of time')
      ->setAvatar(Avatar::image('https://i.pravatar.cc/60'))
      ->setColor(Color::ORANGE())
      ->addIcon(FaIcon::create(FaIcon::THUMBS_UP))
      ->addIcon(FaIcon::create(FaIcon::STAR))
      ->hoverActions(rand(0,1))
      ->addAction(
        TileAction::create()
          ->setIcon(FaIcon::create(FaIcon::CHECK))
          ->setLink(Link::create('', 'link'))
          ->setTooltip('Awesome')
      )
      ->addAction(
        TileAction::create()
          ->setIcon(FaIcon::create(FaIcon::TRASH))
          ->setLink(Link::create('', 'remove'))
          ->setTooltip('Remove')
          ->setColor(Color::RED())
      )
      ->addProperty('Role', 'Developer')
      ->addProperty('Email Address', 'John.Doe@fusion.io')
      ->addProperty('Hobbies', 'None')
      ->addChip(Chip::create('Amazing')->setColor(Color::RED()))
      ->addChip(Chip::create('Awesome')->setColor(Color::BLUE()))
      ->setFooter(Avatar::text('Hello World')->small());
  }

  final public function FullTileDemo(): Tile
  {
    return $this->_getFullDemoTile();
  }

  final public function FullTilesDemo(): Tiles
  {
    $tiles = [];

    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();

    return Tiles::create()->addTiles($tiles)->setLayout(TileLayout::LAYOUT_GRID());
  }

  final public function TilesDemoGridFull(): Tiles
  {
    $tiles = [];

    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();
    $tiles[] = $this->_getFullDemoTile();

    return Tiles::create()->addTiles($tiles)->setLayout(TileLayout::LAYOUT_GRID_FULLWIDTH());
  }
}
