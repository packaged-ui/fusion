<?php

namespace PackagedUi\Fusion\Layout\Reveal;

use Packaged\Glimpse\Tags\Div;
use Packaged\Helpers\Strings;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Reveal extends Div implements Component
{

  use BemComponentTrait;
  use ComponentTrait
  {
    _constructComponent as _traitConstruct;
  }

  public function getBlockName(): string
  {
    return 'reveal';
  }

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  protected function _constructComponent()
  {
    if(empty($this->getId()))
    {
      $this->setId('reveal-' . Strings::randomString(5));
    }
    $this->_traitConstruct();
    $this->addClass('reveal__content');
  }

  public function destructive()
  {
    $this->setAttribute('reveal-destructive', true);
    return $this;
  }

  public function applyLauncher(HtmlElement $ele)
  {
    if(empty($this->getId()))
    {
      throw new \RuntimeException("Trying to Reveal::applyLauncher to a reveal container without an ID");
    }
    $ele->setAttribute('reveal-launcher', $this->getId());
    return $ele;
  }

  public static function makeLauncher(HtmlElement $ele, string $revealId)
  {
    $ele->setAttribute('reveal-launcher', $revealId);
    return $ele;
  }

  public static function makeCloser(HtmlElement $ele)
  {
    $ele->setAttribute('reveal-closer', true);
    return $ele;
  }
}
