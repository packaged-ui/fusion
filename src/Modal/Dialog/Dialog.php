<?php
namespace PackagedUi\Fusion\Modal\Dialog;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Modal\Modal;

class Dialog extends Modal
{
  protected $_title;
  protected $_buttons;

  public function getBlockName(): string
  {
    return 'dialog';
  }

  public function setTitle($text)
  {
    $this->_title = $text;
    return $this;
  }

  public function addButton(Button ...$btns)
  {
    foreach($btns as $btn)
    {
      $this->_buttons[] = $btn;
    }
    return $this;
  }

  protected function _getContentForRender()
  {
    return [
      $this->_title ? HeadingSix::create($this->_title)->addClass($this->getElementName("title")) : '',
      Div::create($this->_content)->addClass(Fusion::BODY1, $this->getElementName("content")),
      Div::create($this->_buttons ?: $this->_defaultButton())
        ->addClass($this->getElementName("buttons")),
    ];
  }

  protected function _defaultButton()
  {
    return Modal::makeCloser(Button::create("OK")->flat()->primary());
  }

}
