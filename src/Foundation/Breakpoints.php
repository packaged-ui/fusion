<?php

namespace PackagedUi\Fusion\Foundation;

use Packaged\Enum\AbstractEnum;

/**
 * Class Breakpoints
 * @method static Breakpoints MOBILE()
 * @method static Breakpoints PHABLET()
 * @method static Breakpoints TABLET()
 * @method static Breakpoints DESKTOP()
 * @method static Breakpoints HD()
 * @package PackagedUi\Fusion\Foundation
 */
class Breakpoints extends AbstractEnum
{
  public const MOBILE = 'mobile';
  public const PHABLET = 'phablet';
  public const TABLET = 'tablet';
  public const DESKTOP = 'desktop';
  public const HD = 'hd';

}
