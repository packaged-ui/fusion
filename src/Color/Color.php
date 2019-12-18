<?php

namespace PackagedUi\Fusion\Color;

use Packaged\Enum\AbstractEnum;

/**
 * @method static Color COLOR_RED()
 * @method static Color COLOR_ORANGE()
 * @method static Color COLOR_YELLOW()
 * @method static Color COLOR_GREEN()
 * @method static Color COLOR_SKY()
 * @method static Color COLOR_BLUE()
 * @method static Color COLOR_INDIGO()
 * @method static Color COLOR_PINK()
 * @method static Color COLOR_GREY()
 * @method static Color COLOR_BLACK()
 */
class Color extends AbstractEnum
{
  const COLOR_RED = 'red';
  const COLOR_ORANGE = 'orange';
  const COLOR_YELLOW = 'yellow';
  const COLOR_GREEN = 'green';
  const COLOR_SKY = 'sky';
  const COLOR_BLUE = 'blue';
  const COLOR_INDIGO = 'indigo';
  const COLOR_PINK = 'pink';
  const COLOR_GREY = 'grey';
  const COLOR_BLACK = 'black';

  public static function foregroundCss($color)
  {
    return 'c-' . $color;
  }

  public static function backgroundCss($color, bool $solid = false)
  {
    return 'bgc-' . ($solid ? 'sld-' : '') . $color;
  }

  public function foreground()
  {
    return 'c-' . $this->getValue();
  }

  public function background(bool $solid = false)
  {
    return 'bgc-' . ($solid ? 'sld-' : '') . $this->getValue();
  }
}
