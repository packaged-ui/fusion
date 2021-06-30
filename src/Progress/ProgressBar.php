<?php
namespace PackagedUi\Fusion\Progress;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ProgressBar extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_circle;
  protected $_tag = 'div';
  protected $_percent = 0;

  public function __construct()
  {
    parent::__construct();
    $this->_constructComponent();
  }

  public function getBlockName(): string
  {
    return 'progress';
  }

  public static function create(int $percent = 0)
  {
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

  public function circle()
  {
    $this->_circle = true;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if($this->_circle)
    {
      $this->setAttribute('data-progress', $this->_percent);
      $this->addModifier('circle');
    }
    else
    {
      $this->addModifier('default');
    }
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    if(!$this->_circle)
    {
      return Div::create()
        ->addClass($this->getElementName('bar'))
        ->setAttribute('style', "width: $this->_percent%");
    }

    return parent::_getContentForRender();
  }
}
