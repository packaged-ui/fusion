<?php
namespace PackagedUi\Fusion\Card;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;

class Card extends Div
{
  protected $_header;
  protected $_footer;
  protected $_withContentContainer = true;

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('card');
    return $ele;
  }

  public function disableContentContainer()
  {
    $this->_withContentContainer = false;
    return $this;
  }

  public function enableContentContainer()
  {
    $this->_withContentContainer = true;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getHeader()
  {
    return $this->_header;
  }

  /**
   * @param mixed $header
   *
   * @return Card
   */
  public function setHeader($header)
  {
    $this->_header = $header;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFooter()
  {
    return $this->_footer;
  }

  /**
   * @param mixed $footer
   *
   * @return Card
   */
  public function setFooter($footer)
  {
    $this->_footer = $footer;
    return $this;
  }

  protected function _getContentForRender()
  {
    $return = [];
    if($this->_header)
    {
      $return[] = Div::create($this->_header)->addClass('card-header');
    }
    if($this->_withContentContainer)
    {
      $return[] = Div::create(parent::_getContentForRender())->addClass('card-content');
    }
    else
    {
      $return[] = parent::_getContentForRender();
    }
    if($this->_footer)
    {
      $return[] = Div::create($this->_footer)->addClass('card-footer');
    }
    return $return;
  }

}
