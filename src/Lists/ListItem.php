<?php
namespace PackagedUi\Fusion\Lists;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use PackagedUi\Fusion\Fusion;

class ListItem extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'list__item';
  }

  protected $_tag = 'li';

  protected $_primary;
  protected $_secondary;
  protected $_leading;
  protected $_trailing;

  public function __construct($primary = null)
  {
    parent::__construct();
    $this->_constructComponent();
    $this->setPrimary($primary);
  }

  public static function create($primary = '')
  {
    return new static($primary);
  }

  /**
   * @return string
   */
  public function getTag(): string
  {
    return $this->_tag;
  }

  /**
   * @param string $tag
   *
   * @return static
   */
  public function setTag(string $tag)
  {
    $this->_tag = $tag;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPrimary()
  {
    return $this->_primary;
  }

  /**
   * @param mixed $primary
   *
   * @return static
   */
  public function setPrimary($primary)
  {
    $this->_primary = $primary;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSecondary()
  {
    return $this->_secondary;
  }

  /**
   * @param mixed $secondary
   *
   * @return static
   */
  public function setSecondary($secondary)
  {
    $this->_secondary = $secondary;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLeading()
  {
    return $this->_leading;
  }

  /**
   * @param mixed $leading
   *
   * @return static
   */
  public function setLeading($leading)
  {
    $this->_leading = $leading;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getTrailing()
  {
    return $this->_trailing;
  }

  /**
   * @param mixed $trailing
   *
   * @return static
   */
  public function setTrailing($trailing)
  {
    $this->_trailing = $trailing;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    if($ele instanceof HtmlTag)
    {
      if($this->_leading)
      {
        $ele->appendContent(Div::create($this->_leading)->addClass($this->getElementName('leading')));
      }
      $text = Div::create()->addClass($this->getElementName('text'));
      $text->appendContent(Div::create($this->_primary)->addClass(Fusion::TEXT_HIGH_EMPHASIS));
      if($this->_secondary)
      {
        $text->appendContent(
          Div::create($this->_secondary)->addClass($this->getElementName('secondary'), Fusion::TEXT_MEDIUM_EMPHASIS)
        );
        $ele->addClass($this->getModifier('multi'));
      }
      $ele->appendContent($text);
      if($this->_trailing)
      {
        $ele->appendContent(Div::create($this->_trailing)->addClass($this->getElementName('trailing')));
      }
    }
    return $ele;
  }
}
