<?php

namespace PackagedUi\Fusion\Layout\XyGrid;

use PackagedUi\Fusion\Foundation\Breakpoints;

/**
 * Class XySize
 * @method static XySize MOBILE(int $size)
 * @method static XySize PHABLET(int $size)
 * @method static XySize TABLET(int $size)
 * @method static XySize DESKTOP(int $size)
 * @method static XySize HD(int $size)
 * @package PackagedUi\Fusion\Layout\XyGrid
 */
class XySize extends Breakpoints
{
  /** @var int */
  protected $_size;

  /**
   * XySize constructor.
   *
   * @param string $value
   * @param int         $size
   */
  public function __construct(string $value, int $size)
  {
    parent::__construct($value);
    $this->_size = $size;
  }

  /**
   * @return int
   */
  public function getSize(): int
  {
    return $this->_size;
  }

}
