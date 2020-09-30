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
class XyCell extends Div implements Component
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
   * @param XySize[] $sizes
   *
   * @return $this
   */
  public function setSizes(XySize ...$sizes)
  {
    foreach($sizes as $size)
    {
      $this->setSize($size->getSize(), $size->getValue());
    }
    return $this;
  }

  /**
   * @param int    $size
   * @param string $deviceType
   *
   * @return $this
   */
  public function setSize(int $size, string $deviceType)
  {
    if($size !== null && $size >= 1 && $size <= 12)
    {
      $this->_sizes[$deviceType] = $size;
    }

    return $this;
  }

  /**
   * @param XySize[] $offsets
   *
   * @return $this
   */
  public function setOffsets(XySize ...$offsets)
  {
    foreach($offsets as $offset)
    {
      $this->setOffset($offset->getSize(), $offset->getValue());
    }
    return $this;
  }

  /**
   * @param int    $offset
   * @param string $deviceType
   *
   * @return $this
   */
  public function setOffset(int $offset, string $deviceType)
  {
    if($offset !== null && $offset >= 1 && $offset <= 12)
    {
      $this->_offsets[$deviceType] = $offset;
    }

    return $this;
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
