<?php

namespace PackagedUi\Fusion\Color;

use Packaged\Enum\AbstractEnum;

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
}
