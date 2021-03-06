<?php
namespace PackagedUi\Fusion\Lists;

use Packaged\Glimpse\Core\AbstractContainerTag;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class ListBox extends AbstractContainerTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'list-box';
  }

  protected $_tag = 'ul';
}
