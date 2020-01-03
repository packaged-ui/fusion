<?php
namespace PackagedUi\Fusion\Layout\Tabs;

use Packaged\Glimpse\Core\AbstractContainerTag;

class Tab extends AbstractContainerTag
{
  protected $_label;
  protected $_tag = 'div';

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->addClass('tab');
  }

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
