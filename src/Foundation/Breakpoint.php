<?php
namespace PackagedUi\Fusion\Foundation;

use Packaged\Enum\AbstractEnum;

/**
 * @method static Breakpoint MOBILE()
 * @method static Breakpoint PHABLET()
 * @method static Breakpoint TABLET()
 * @method static Breakpoint DESKTOP()
 * @method static Breakpoint HD()
 */
class Breakpoint extends AbstractEnum
{
  const MOBILE = 'mobile';
  const PHABLET = 'phablet';
  const TABLET = 'tablet';
  const DESKTOP = 'desktop';
  const HD = 'hd';
}
