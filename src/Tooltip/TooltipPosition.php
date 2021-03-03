<?php

namespace PackagedUi\Fusion\Tooltip;

use Packaged\Enum\AbstractEnum;

/**
 * Class TooltipPosition
 *
 * @method static TooltipPosition TOP()
 * @method static TooltipPosition LEFT()
 * @method static TooltipPosition BOTTOM()
 * @method static TooltipPosition RIGHT()
 * @method static TooltipPosition AUTO()
 *
 * @package PackagedUi\Fusion\Tooltip
 */
class TooltipPosition extends AbstractEnum
{

  public const TOP = 'top';
  public const BOTTOM = 'bottom';
  public const LEFT = 'left';
  public const RIGHT = 'right';
  public const AUTO = 'auto';

}
