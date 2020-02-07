<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Banner\Banner;
use PackagedUi\FusionDemo\AbstractDemoPage;

class BannerDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Banners';
  }

  protected function _getFaIcon()
  {
    return FaIcon::CHALKBOARD;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Banner::create("One line text string with one action");
    return $return;
  }
}
