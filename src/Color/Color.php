<?php

namespace PackagedUi\Fusion\Color;

use Packaged\Enum\AbstractEnum;

/**
 * @method static Color RED()
 * @method static Color ORANGE()
 * @method static Color YELLOW()
 * @method static Color GREEN()
 * @method static Color SKY()
 * @method static Color BLUE()
 * @method static Color INDIGO()
 * @method static Color PURPLE()
 * @method static Color PINK()
 * @method static Color GREY()
 * @method static Color DARK_GREY()
 * @method static Color BLACK()
 * @method static Color WHITE()
 * @method static Color CHECKERED()
 */
class Color extends AbstractEnum
{
  const RED = 'red';
  const ORANGE = 'orange';
  const YELLOW = 'yellow';
  const GREEN = 'green';
  const SKY = 'sky';
  const BLUE = 'blue';
  const INDIGO = 'indigo';
  const PURPLE = 'purple';
  const PINK = 'pink';
  const GREY = 'grey';
  const DARK_GREY = 'dark-grey';
  const BLACK = 'black';
  const WHITE = 'white';
  const CHECKERED = 'checkered';

  public static function foregroundCss($color)
  {
    return 'c-' . $color;
  }

  public static function backgroundCss($color, bool $solid = false)
  {
    return 'bgc-' . ($solid ? 'sld-' : '') . $color;
  }

  public static function borderCss($color, bool $solid = false)
  {
    return 'brdrc-' . ($solid ? 'sld-' : '') . $color;
  }

  public function foreground()
  {
    return 'c-' . $this->getValue();
  }

  public function background(bool $solid = false)
  {
    return 'bgc-' . ($solid ? 'sld-' : '') . $this->getValue();
  }

  public function border(bool $solid = false)
  {
    return 'brdrc-' . ($solid ? 'sld-' : '') . $this->getValue();
  }
}
