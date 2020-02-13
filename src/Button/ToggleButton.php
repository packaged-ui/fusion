<?php

namespace PackagedUi\Fusion\Button;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;

class ToggleButton extends Button
{
  protected $_checkedContent;
  protected $_uncheckedContent;
  protected $_name;
  protected $_value;
  protected $_type = Input::TYPE_CHECKBOX;
  protected $_checked = false;

  public function __construct(...$content)
  {
    parent::__construct($content);
    $this->addClass('toggle-button');
    $this->setCheckedClass($this->getModifier(ButtonInterface::_BUTTON_MOD_SUCCESS));
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

  /**
   * @param string $type
   *
   * @return ToggleButton
   */
  public function setType($type)
  {
    $this->_type = $type;
    return $this;
  }

  /**
   * @param bool $checked
   *
   * @return ToggleButton
   */
  public function setChecked(bool $checked): ToggleButton
  {
    $this->_checked = $checked;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass('toggle-button');
    if($this->_checked)
    {
      $this->setAttribute('checked', true);
      if($this->hasAttribute('checked-class'))
      {
        $this->addClass($this->getAttribute('checked-class'));
      }
    }
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    $input = Input::create();
    $input->addClass($this->getElementName('toggle-button-checkbox'))
      ->setType($this->_type)->setValue($this->_value)->setName($this->_name);
    if($this->_checked)
    {
      $input->setAttribute('checked', true);
    }
    return [
      $input,
      $this->_checkedContent
        ? Span::create($this->_checkedContent)->addClass($this->getElementName('checked-content')) : null,
      $this->_uncheckedContent
        ? Span::create($this->_uncheckedContent)->addClass($this->getElementName('unchecked-content')) : null,
      parent::_getContentForRender(),
    ];
  }
}
