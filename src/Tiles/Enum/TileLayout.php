<?php

namespace PackagedUi\Fusion\Tiles\Enum;

use Packaged\Enum\AbstractEnum;

/**
 * @method static TileLayout LAYOUT_LIST()
 * @method static TileLayout LAYOUT_GRID()
 * @method static TileLayout LAYOUT_GRID_FULLWIDTH()
 */
class TileLayout extends AbstractEnum
{
  const LAYOUT_LIST = 'list';
  const LAYOUT_GRID = 'grid';
  const LAYOUT_GRID_FULLWIDTH = 'grid fullwidth';
}
