<?php
namespace PackagedUi\Fusion\Progress;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;

class ProgressBar extends HtmlTag
{
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

  protected function _prepareForProduce(): HtmlTag
  {
    $this->addClass('progress');
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    return Div::create()->addClass('progress-bar')->setAttribute('style', "width: $this->_percent%");
  }

}
