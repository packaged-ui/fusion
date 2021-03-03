<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Text\BoldText;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Tooltip\Tooltip;
use PackagedUi\Fusion\Tooltip\TooltipPosition;
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

    $return[] = Tooltip::create(FaIcon::create(FaIcon::TABLET)->sizeX3())->setTooltip('This is a Tooltip');
    $return[] = LineBreak::create();
    $return[] = Tooltip::create(FaIcon::create(FaIcon::TABLET)->sizeX3())
      ->setTooltip(
        'This is a rather large tooltip which doesnt mean anything, nor insinuate anything nor make any sense at all. Who wrote this?'
      )
      ->setPosition(TooltipPosition::RIGHT());
    $return[] = Tooltip::create(FaIcon::create(FaIcon::TABLET)->sizeX3())
      ->setTooltip(
        BoldText::create('Testing HTML within')
      )
      ->setPosition(TooltipPosition::RIGHT());
    return $return;
  }
}
