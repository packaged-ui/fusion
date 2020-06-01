<?php
namespace PackagedUi\Fusion\Progress;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ProgressBar extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct()
  {
    parent::__construct();
    $this->_constructComponent();
    $this->_construct();
  }

  public function getBlockName(): string
  {
    return 'progress';
  }

  protected $_tag = 'div';
  protected $_percent = 0;

  public static function create(int $percent = 0)
  {
    /** @var static $ele */
    $ele = parent::create();
    $ele->setPercent($percent);
    return $ele;
  }

  /**
   * @return int
   */
  public function getPercent(): int
  {
    return $this->_percent;
  }

  /**
   * @param int $percent
   *
   * @return ProgressBar
   */
  public function setPercent(int $percent): ProgressBar
  {
    $this->_percent = min(100, max(0, $percent));
    return $this;
  }

  protected function _getContentForRender()
  {
    return Div::create()->addClass($this->getElementName('bar'))->setAttribute('style', "width: $this->_percent%");
  }

}
