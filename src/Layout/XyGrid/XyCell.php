<?php
namespace PackagedUi\Fusion\Layout\XyGrid;

use Exception;
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
   * @throws Exception
   */
  public function setSizes(XySize ...$sizes)
  {
    foreach($sizes as $size)
    {
      $getSize = $size->getSize();
      $offsetSize = $size->getOffset();

      if($getSize !== null && $getSize >= 1 && $getSize <= 12)
      {
        $this->_sizes[$size->getValue()] = $getSize;
      }

      if($offsetSize !== null && $offsetSize <= 12)
      {
        $this->_offsets[$size->getValue()] = $offsetSize;
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

  /**
   * @param array  $items
   * @param XySize ...$sizes
   *
   * @return array
   * @throws Exception
   */
  public static function sizedCollection(array $items = [], XySize ...$sizes)
  {
    $collection = self::collection($items);

    /** @var XyCell $item */
    foreach($collection as $item) {
      $item->setSizes(... $sizes);
    }

    return $collection;
  }

}
