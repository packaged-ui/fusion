<?php

namespace PackagedUi\Fusion\Inputs;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\ButtonInferface;

class ToggleButton extends Button
{
  protected $_checkedContent;
  protected $_uncheckedContent;
  protected $_name;
  protected $_value;

  public function __construct(...$content)
  {
    parent::__construct($content);
    $this->setCheckedClass(ButtonInferface::BUTTON_SUCCESS);
  }

  public function setCheckedClass(...$class)
  {
    $this->setAttribute('checked-class', implode(' ', $class));
    return $this;
  }

  /**
   * @param mixed $checkedContent
   *
   * @return static
   */
  public function setCheckedContent($checkedContent)
  {
    $this->_checkedContent = $checkedContent;
    return $this;
  }

  /**
   * @param mixed $uncheckedContent
   *
   * @return static
   */
  public function setUncheckedContent($uncheckedContent)
  {
    $this->_uncheckedContent = $uncheckedContent;
    return $this;
  }

  /**
   * @param string $name
   *
   * @return static
   */
  public function setName(string $name)
  {
    $this->_name = $name;
    return $this;
  }

  /**
   * @param string $value
   *
   * @return static
   */
  public function setValue(string $value)
  {
    $this->_value = $value;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass('toggle-button');
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    return [
      Input::create()->setType(Input::TYPE_CHECKBOX)->addClass('toggle-button-checkbox')
        ->setName($this->_name)->setValue($this->_value),
      $this->_checkedContent ? Span::create($this->_checkedContent)->addClass('checked-content') : null,
      $this->_uncheckedContent ? Span::create($this->_uncheckedContent)->addClass('unchecked-content') : null,
      parent::_getContentForRender(),
    ];
  }
}
