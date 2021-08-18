<?php

namespace PackagedUi\Fusion\HoverCard;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Helpers\Strings;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class HoverCard extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_tag = 'div';
  protected $_trigger;

  public function getBlockName(): string
  {
    return 'hover-card';
  }

  public function __construct()
  {
    parent::__construct();
    $this->setId('hover-' . Strings::randomString(5));
    $this->addClass($this->getBlockName());
  }

  public function createTrigger(HtmlElement $trigger)
  {
    $trigger->setAttribute('data-hover-id', $this->getId());
    $this->_trigger = $trigger; // Store a reference to the trigger in case we need it in future
    return $trigger;
  }

  public static function create($content = null)
  {
    $i = parent::create();
    $i->_content = $content;
    $i->addClass('hidden');
    $i->setAttribute('data-hover-card-id', $i->getId());
    return $i;
  }

  protected function _getContentForRender()
  {
    return $this->getContent();
  }

}
