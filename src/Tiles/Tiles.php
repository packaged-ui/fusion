<?php
namespace PackagedUi\Fusion\Tiles;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Tiles\Enum\TileLayout;

class Tiles extends HtmlTag
{
  protected $_tag = 'div';

  /** @var Tile[] */
  protected $_tiles = [];
  /** @var string */
  protected $_layout = TileLayout::LAYOUT_LIST;
  /** @var bool */
  protected $_stacked = false;

  public static function create(Tile ...$tile)
  {
    /** @var static $tiles */
    $tiles = parent::create();
    $tiles->addTiles($tile);
    return $tiles;
  }

  /**
   * @param Tile $tile
   *
   * @return $this
   */
  public function addTile(Tile $tile)
  {
    if($tile instanceof Tile)
    {
      $this->_tiles[] = $tile;
    }
    return $this;
  }

  /**
   * @param Tile $tile
   *
   * @return $this
   */
  public function prependTile(Tile $tile)
  {
    if($tile instanceof Tile)
    {
      array_unshift($this->_tiles, $tile);
    }
    return $this;
  }

  /**
   * @param Tile[] $tiles
   *
   * @return $this
   */
  public function addTiles(array $tiles)
  {
    foreach($tiles as $tile)
    {
      if($tile instanceof Tile)
      {
        $this->_tiles[] = $tile;
      }
    }
    return $this;
  }

  /**
   * @return Tile[]
   */
  public function getTiles()
  {
    return $this->_tiles;
  }

  /**
   * @param string $layout
   *
   * @return $this
   */
  public function setLayout($layout = TileLayout::LAYOUT_LIST)
  {
    $this->_layout = $layout;
    return $this;
  }

  /**
   * @param bool $value
   *
   * @return $this
   */
  public function stacked($value = true)
  {
    $this->_stacked = $value;
    return $this;
  }

  /**
   * @return Div
   */
  protected function _prepareForProduce(): HtmlElement
  {
    $tiles = Div::create()->addClass('ui-tiles');

    if($this->_tiles)
    {
      $minActionsCount = 0;
      $minPropertiesCount = 0;

      foreach($this->_tiles as $tile)
      {
        if($tile instanceof Tile)
        {
          /**
           * Define action count for all tiles in this collection.
           * This is required for consistent .actions column widths.
           */
          $actionsItems = count($tile->getActionTypes());
          $minActionsCount = (($actionsItems > $minActionsCount) ? $actionsItems : $minActionsCount);

          /**
           * Define property count for all tiles in this collection.
           * This is predominantly used as a tag for now.
           */
          $propertyCount = $tile->getPropertyCount();
          $minPropertiesCount = (($propertyCount > $minPropertiesCount) ? $propertyCount : $minPropertiesCount);

          $tiles->appendContent($tile);
        }
      }

      // set layout style
      $tiles->addClass($this->_layout);

      // additional attributes for potential styling
      $tiles->setAttribute('data-action-count', $minActionsCount);
      $tiles->setAttribute('data-property-count', $minPropertiesCount);

      if($this->_stacked)
      {
        $tiles->addClass('stacked');
      }
    }

    return $tiles;
  }

}
