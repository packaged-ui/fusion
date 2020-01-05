<?php
namespace PackagedUi\Fusion\Layout\Drawer;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Helpers\Strings;
use Packaged\SafeHtml\SafeHtml;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\LayoutInterface;

class Drawer extends AbstractContainerTag
{
  const STATE_CLOSED = '';
  const STATE_PERMANENT = 'permanent';
  const STATE_NARROW = 'narrow';

  const REVEAL_NONE = '';
  const REVEAL_PEEK = 'peek';
  const REVEAL_MODAL = 'modal';

  const POSITION_LEFT = 'left';
  const POSITION_RIGHT = 'right';

  protected $_tag = 'aside';

  protected $_state = self::STATE_CLOSED;
  protected $_minState = self::STATE_CLOSED;
  protected $_reveal = self::REVEAL_NONE;
  protected $_isOpen = false;
  protected $_header = [];
  protected $_footer = [];
  protected $_appContent = [];
  protected $_position = self::POSITION_LEFT;

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

  /**
   * @return string
   */
  public function getPosition(): string
  {
    return $this->_position;
  }

  /**
   * @param string $position
   *
   * @return Drawer
   */
  public function setPosition(string $position)
  {
    $this->_position = $position;
    return $this;
  }

  protected function _getContentForRender()
  {
    $content = [];

    if($this->_header)
    {
      $content[] = Div::create($this->_header)->addClass('drawer__header');
    }
    $content[] = Div::create(parent::_getContentForRender())->addClass('drawer__content');
    if($this->_footer)
    {
      $content[] = Div::create($this->_footer)->addClass('drawer__footer');
    }

    return $content;
  }

  public function setHeader(...$content)
  {
    $this->_header = $content;
    return $this;
  }

  public function setFooter(...$content)
  {
    $this->_footer = $content;
    return $this;
  }

  public function setAppContent(...$content)
  {
    $this->_appContent = $content;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $drawer = parent::_prepareForProduce()->addClass('drawer');
    if($this->_position)
    {
      $drawer->setAttribute('position', $this->_position);
    }
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

    return $drawer;
  }

  public function produceSafeHTML(): SafeHtml
  {
    $containerId = ($this->getId() ?: 'drawer-' . Strings::randomString(5)) . '-container';
    $drawerKey = 'drawer--open-' . $this->_position;
    return Div::create(
      new SafeHtml(
        "<script>localStorage.getItem('$drawerKey')==='1'&&document.querySelector('#$containerId').classList.add('drawer--open')</script>"
      ),
      parent::produceSafeHTML(),
      Div::create($this->_appContent)->addClass('drawer-app-content', LayoutInterface::FULL_HEIGHT_WITH_MIN)
    )
      ->setId($containerId)
      ->addClass(
        'drawer-container',
        LayoutInterface::FULL_HEIGHT_WITH_MIN,
        $this->_isOpen ? LayoutInterface::DRAWER_OPEN : ''
      )
      ->produceSafeHTML();
  }

}
