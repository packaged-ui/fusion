<?php
namespace PackagedUi\Elegance\Layout\Drawer;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\SafeHtml\SafeHtml;

class Drawer extends AbstractContainerTag
{
  const STATE_CLOSED = '';
  const STATE_PERMANENT = 'permanent';
  const STATE_NARROW = 'narrow';

  const REVEAL_NONE = '';
  const REVEAL_PEEK = 'peek';
  const REVEAL_MODAL = 'modal';

  protected $_tag = 'aside';

  protected $_state = self::STATE_CLOSED;
  protected $_reveal = self::REVEAL_NONE;
  protected $_appContent = [];

  /**
   * @param string $state
   *
   * @return Drawer
   */
  public function setState(string $state): Drawer
  {
    $this->_state = $state;
    return $this;
  }

  /**
   * @return string
   */
  public function getState(): string
  {
    return $this->_state;
  }

  /**
   * @param string $reveal
   *
   * @return Drawer
   */
  public function setReveal(string $reveal): Drawer
  {
    $this->_reveal = $reveal;
    return $this;
  }

  /**
   * @return string
   */
  public function getReveal(): string
  {
    return $this->_reveal;
  }

  protected function _getContentForRender()
  {
    return Div::create(parent::_getContentForRender())->addClass('drawer__inner');
  }

  public function setAppContent(...$content)
  {
    $this->_appContent = $content;
    return $this;
  }

  protected function _prepareForProduce(): HtmlTag
  {
    $drawer = parent::_prepareForProduce()->addClass('drawer');
    if($this->_state)
    {
      $drawer->setAttribute('state', $this->_state);
    }
    if($this->_reveal)
    {
      $drawer->setAttribute('reveal', $this->_reveal);
    }

    return $drawer;
  }

  public function produceSafeHTML(): SafeHtml
  {
    return SafeHtml::escape(
      [
        parent::produceSafeHTML(),
        Div::create($this->_appContent)
          ->addClass('drawer-app-content')
          ->produceSafeHTML(),
      ]
    );
  }

}
