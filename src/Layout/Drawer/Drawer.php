<?php
namespace PackagedUi\Fusion\Layout\Drawer;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Fusion\LayoutInterface;

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
  protected $_minState = self::STATE_CLOSED;
  protected $_reveal = self::REVEAL_NONE;
  protected $_isOpen = false;
  protected $_header = [];
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
   * @return string
   */
  public function getMinState(): string
  {
    return $this->_minState;
  }

  /**
   * @param string $minState
   *
   * @return Drawer
   */
  public function setMinState(string $minState): Drawer
  {
    $this->_minState = $minState;
    return $this;
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
   * @param bool $isOpen
   *
   * @return Drawer
   */
  public function setOpen($isOpen = true): Drawer
  {
    $this->_isOpen = $isOpen;
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
    $content = [];

    if($this->_header)
    {
      $content[] = Div::create($this->_header)->addClass('drawer__header');
    }
    $content[] = Div::create(parent::_getContentForRender())->addClass('drawer__content');

    return $content;
  }

  public function setHeader(...$content)
  {
    $this->_header = $content;
    return $this;
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
    if($this->_minState)
    {
      $drawer->setAttribute('min-state', $this->_minState);
    }
    if($this->_reveal)
    {
      $drawer->setAttribute('reveal', $this->_reveal);
    }
    if($this->_isOpen)
    {
      $drawer->addClass(LayoutInterface::DRAWER_OPEN);
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
