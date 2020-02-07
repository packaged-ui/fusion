<?php
namespace PackagedUi\Fusion\Layout\Tabs;

use Packaged\Glimpse\Core\AbstractContainerTag;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Tab extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'tab';
  }

  protected $_label;
  protected $_tag = 'div';

  public static function build($label, ...$content)
  {
    $tab = new static(...$content);
    $tab->setLabel($label);
    return $tab;
  }

  /**
   * @param mixed $label
   *
   * @return Tab
   */
  public function setLabel($label)
  {
    $this->_label = $label;
    return $this;
  }

  public function getLabel()
  {
    return $this->_label;
  }

}
