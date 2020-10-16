<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Tooltip\Tooltip;
use PackagedUi\FusionDemo\AbstractDemoPage;

class TooltipDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Tooltip';
  }

  protected function _getFaIcon()
  {
    return FaIcon::TOOLBOX;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Tooltip::create(FaIcon::create(FaIcon::TABLET)->sizeX3())->setTooltip('This is your hosting domain, and bears no relation to your chosen domain at purchase. Your chosen domain still directs to your website as you expect, this hosting domain is simply the true, under-the-hood, address to your hosting.');

    return $return;
  }
}
