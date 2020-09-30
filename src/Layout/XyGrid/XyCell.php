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
      $getSize = $size->getSize();
      if($getSize !== null && $getSize >= 1 && $getSize <= 12)
      {
        $this->_sizes[$size->getValue()] = $getSize;
      }
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
      $offsetSize = $offset->getSize();

      if($offsetSize !== null && $offsetSize >= 1 && $offsetSize <= 12)
      {
        $this->_offsets[$offset->getValue()] = $offsetSize;
      }
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
