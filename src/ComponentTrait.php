<?php
namespace PackagedUi\Fusion;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\Bem;
use PackagedUi\BemComponent\BemComponent;

trait ComponentTrait
{
  public function __construct()
  {
    parent::__construct(...func_get_args());
    $this->_constructComponent();
  }

  public static function bem(): Bem
  {
    return Bem::block((new static())->getBlockName());
  }

  protected function _constructComponent()
  {
    if($this instanceof HtmlElement && $this instanceof BemComponent)
    {
      $this->addClass($this->getBlockName());
    }
  }

  protected function addModifier(string $modifier, string ...$elements)
  {
    $this->addClass($this->getModifier($modifier, ...$elements));
    return $this;
  }
}
