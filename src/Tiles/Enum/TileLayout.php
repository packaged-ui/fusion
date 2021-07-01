<?php

namespace PackagedUi\Fusion\Tiles\Enum;

use Packaged\Enum\AbstractEnum;

/**
 * @method static TileLayout LAYOUT_LIST()
 * @method static TileLayout LAYOUT_GRID()
 */
class TileLayout extends AbstractEnum
{
  public const LAYOUT_LIST = 'list';
  public const LAYOUT_GRID = 'grid';
}
