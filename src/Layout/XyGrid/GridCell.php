<?php
namespace PackagedUi\Fusion\Layout\XyGrid;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

/**
 * Class GridCell
 * @package PackagedUi\Fusion\Layout\XyGrid
 */
class GridCell extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var string */
  public const DEVICE_DESKTOP = 'large';
  /** @var string */
  public const DEVICE_TABLET = 'medium';
  /** @var string */
  public const DEVICE_PHONE = 'small';

  /** @var array */
  protected $_sizes = [];
  /** @var array */
  protected $_offsets = [];

  /**
   * GridCell constructor.
   *
   * @param mixed ...$content
   */
  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  /**
   * @return string
   */
  public function getBlockName(): string
  {
    return 'cell';
  }

  /**
   * @param int $desktop
   * @param int $tablet
   * @param int $phone
   *
   * @return $this
   */
  public function setSizes(int $desktop, int $tablet = 0, int $phone = 0): self
  {
    $this->setDesktopSize($desktop);
    $this->setTabletSize($tablet);
    $this->setPhoneSize($phone);
    return $this;
  }

  /**
   * @param int $size
   *
   * @return $this
   */
  public function setDesktopSize(int $size = 0): self
  {
    return $this->setSize($size, self::DEVICE_DESKTOP);
  }

  /**
   * @param int    $size
   * @param string $deviceType
   *
   * @return $this
   */
  public function setSize(int $size, string $deviceType): self
  {
    if($size !== null && $size >= 1 && $size <= 12)
    {
      $this->_sizes[$deviceType ?? ''] = $size;
    }

    return $this;
  }

  /**
   * @param int $size
   *
   * @return $this
   */
  public function setTabletSize(int $size = 0): self
  {
    return $this->setSize($size, self::DEVICE_TABLET);
  }

  /**
   * @param int $size
   *
   * @return $this
   */
  public function setPhoneSize(int $size = 0): self
  {
    return $this->setSize($size, self::DEVICE_PHONE);
  }

  /**
   * @param int $desktop
   * @param int $tablet
   * @param int $phone
   *
   * @return $this
   */
  public function setOffsets(int $desktop, int $tablet = 0, int $phone = 0): self
  {
    $this->setDesktopOffset($desktop);
    $this->setTabletOffset($tablet);
    $this->setPhoneOffset($phone);
    return $this;
  }

  /**
   * @param int $offset
   *
   * @return $this
   */
  public function setDesktopOffset(int $offset = 0): self
  {
    return $this->setOffset($offset, self::DEVICE_DESKTOP);
  }

  /**
   * @param int    $offset
   * @param string $deviceType
   *
   * @return $this
   */
  public function setOffset(int $offset, string $deviceType): self
  {
    if($offset !== null && $offset >= 1 && $offset <= 12)
    {
      $this->_offsets[$deviceType ?? ''] = $offset;
    }

    return $this;
  }

  /**
   * @param int $offset
   *
   * @return $this
   */
  public function setTabletOffset(int $offset = 0): self
  {
    return $this->setOffset($offset, self::DEVICE_TABLET);
  }

  /**
   * @param int $offset
   *
   * @return $this
   */
  public function setPhoneOffset(int $offset = 0): self
  {
    return $this->setOffset($offset, self::DEVICE_PHONE);
  }

  /**
   * @return HtmlElement
   */
  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    foreach($this->_sizes as $device => $offset)
    {
      $ele->addClass($device . '-' . $offset);
    }

    foreach($this->_offsets as $device => $offset)
    {
      $ele->addClass($device . '-offset-' . $offset);
    }
    return $ele;
  }

}
