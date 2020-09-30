<?php

namespace PackagedUi\Fusion\Layout\XyGrid;

use PackagedUi\Fusion\Foundation\Breakpoints;

/**
 * Class XySize
 * @method static XySize MOBILE(int $size, int $offset = null)
 * @method static XySize PHABLET(int $size, int $offset = null)
 * @method static XySize TABLET(int $size, int $offset = null)
 * @method static XySize DESKTOP(int $size, int $offset = null)
 * @method static XySize HD(int $size, int $offset = null)
 * @package PackagedUi\Fusion\Layout\XyGrid
 */
class XySize extends Breakpoints
{
  /** @var int */
  protected $_size;

  /** @var int */
  protected $_offset;

  /**
   * XySize constructor.
   *
   * @param string $value
   * @param int    $size
   * @param int    $offset
   */
  public function __construct(string $value, int $size, int $offset = null)
  {
    parent::__construct($value);
    $this->_size = $size;
    $this->_offset = $offset;
  }

  /**
   * @return int
   */
  public function getSize(): int
  {
    return $this->_size;
  }

  /**
   * @return null|int
   */
  public function getOffset(): ?int
  {
    return $this->_offset;
  }

}
