<?php
namespace PackagedUi\Fusion\Chip;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Chips extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_tag = "div";

  /** @var \PackagedUi\Fusion\Chip\Chip[] */
  protected $_chips;

  public function __construct()
  {
    parent::__construct();
    $this->_constructComponent();
  }

  /**
   * This is the root BEM class that all the other elements
   * and modifiers will use as a base
   *
   * @return string
   */
  public function getBlockName(): string
  {
    return 'chips';
  }

  /**
   * @param Chip ...$chips
   *
   * @return Chips
   */
  public function addChips(...$chips): Chips
  {
    foreach($chips as $chip)
    {
      $this->_chips[] = $chip;
    }
    return $this;
  }

  /**
   * @param Chip $chip
   *
   * @return Chips
   */
  public function addChip(Chip $chip): Chips
  {
    $this->_chips[] = $chip;
    return $this;
  }

  protected function _getContentForRender()
  {
    return $this->_chips;
  }
}
