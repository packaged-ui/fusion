<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Progress\ProgressBar;
use PackagedUi\FusionDemo\AbstractDemoPage;

class ProgressDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Progress';
  }

  protected function _getFaIcon()
  {
    return FaIcon::SPINNER;
  }

  protected function _content(): array
  {
    $return = [];
    $return[] = ProgressBar::create(50);
    return $return;
  }
}
