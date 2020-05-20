<?php
namespace PackagedUi\Fusion\Modal\Lightbox;

use PackagedUi\Fusion\Modal\Modal;

class Lightbox extends Modal
{
  public function getBlockName(): string
  {
    return 'lightbox';
  }

  public function autoLaunch()
  {
    $this->addModifier('auto-launch');
    return $this;
  }
}
