<?php
namespace PackagedUi\Fusion\Lists;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Core\HtmlTag;

class ListBox extends AbstractContainerTag
{
  protected $_tag = 'ul';

  protected function _prepareForProduce(): HtmlTag
  {
    return parent::_prepareForProduce()->addClass('list-box');
  }
}
