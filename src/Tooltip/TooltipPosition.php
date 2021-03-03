<?php

namespace PackagedUi\Fusion\Tooltip;

use Packaged\Enum\AbstractEnum;

/**
 * Class TooltipPosition
 *
 * @method static TooltipPosition TOP()
 * @method static TooltipPosition TOP_LEFT()
 * @method static TooltipPosition TOP_RIGHT()
 * @method static TooltipPosition LEFT()
 * @method static TooltipPosition BOTTOM()
 * @method static TooltipPosition BOTTOM_LEFT()
 * @method static TooltipPosition BOTTOM_RIGHT()
 * @method static TooltipPosition RIGHT()
 *
 * @package PackagedUi\Fusion\Tooltip
 */
class TooltipPosition extends AbstractEnum
{

  public const TOP = 'top';
  public const TOP_LEFT = 'top-left';
  public const TOP_RIGHT = 'top-right';
  public const BOTTOM = 'bottom';
  public const BOTTOM_LEFT = 'bottom-left';
  public const BOTTOM_RIGHT = 'bottom-right';
  public const LEFT = 'left';
  public const RIGHT = 'right';

}
