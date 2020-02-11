<?php
namespace PackagedUi\Fusion\Modal;

use Packaged\Glimpse\Tags\Div;
use Packaged\Helpers\Strings;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

abstract class Modal extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait
  {
    _constructComponent as _traitConstruct;
  }

  protected function _constructComponent()
  {
    if(empty($this->getId()))
    {
      $this->setId('modal-' . Strings::randomString(5));
    }
    $this->_traitConstruct();
    $this->addClass('modal');
  }

  public function applyLauncher(HtmlElement $ele)
  {
    if(empty($this->getId()))
    {
      throw new \RuntimeException("Trying to Modal::applyLauncher to a modal without an ID");
    }
    $ele->setAttribute('modal-launcher', $this->getId());
    return $ele;
  }

  public static function makeLauncher(HtmlElement $ele, string $modalId)
  {
    $ele->setAttribute('modal-launcher', $modalId);
    return $ele;
  }

  public static function makeCloser(HtmlElement $ele)
  {
    $ele->setAttribute('modal-closer', true);
    return $ele;
  }
}
