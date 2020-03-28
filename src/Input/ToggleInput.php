<?php

namespace PackagedUi\Fusion\Input;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ToggleInput extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_checkedContent;
  protected $_name;
  protected $_value;
  protected $_type = Input::TYPE_CHECKBOX;
  protected $_checked = false;

  public function getBlockName(): string
  {
    return 'toggle-button';
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
  public function setCheckedContent(...$checkedContent)
  {
    $this->_checkedContent = $checkedContent;
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
   * @return ToggleInput
   */
  public function setType($type)
  {
    $this->_type = $type;
    return $this;
  }

  /**
   * @param bool $checked
   *
   * @return ToggleInput
   */
  public function setChecked(bool $checked): ToggleInput
  {
    $this->_checked = $checked;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    if($this->_checked)
    {
      $ele->setAttribute('checked', true);
      if($this->hasAttribute('checked-class'))
      {
        $ele->addClass(...$this->getAttribute('checked-class'));
      }
    }
    return $ele;
  }

  protected function _getContentForRender()
  {
    $input = Input::create();
    $input->addClass($this->getElementName('checkbox'))
      ->setType($this->_type)->setValue($this->_value)->setName($this->_name);
    if($this->_checked)
    {
      $input->setAttribute('checked', true);
    }

    $content = parent::_getContentForRender();
    if($this->_checkedContent)
    {
      $content = [
        Span::create($this->_checkedContent)->addClass($this->getElementName('checked-content')),
        Span::create($content)->addClass($this->getElementName('unchecked-content')),
      ];
    }

    return [
      $input,
      $content,
    ];
  }
}
