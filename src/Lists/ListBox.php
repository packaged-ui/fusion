<?php
namespace PackagedUi\Fusion\Lists;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;

class ListBox extends AbstractContainerTag
{
  protected $_tag = 'ul';

  protected function _prepareForProduce(): HtmlElement
  {
    return parent::_prepareForProduce()->addClass('list-box');
  }
}
