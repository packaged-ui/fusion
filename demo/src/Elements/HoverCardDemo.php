<?php

namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Chip\Chip;
use PackagedUi\Fusion\HoverCard\HoverCard;

class HoverCardDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Hover Card';
  }

  protected function _getFaIcon()
  {
    return FaIcon::ADDRESS_CARD;
  }

  /**
   * Example of the default hoverCard
   *
   * @return array
   */
  final public function hoverCard(): array
  {
    $hoverCard = HoverCard::create('Hello, I\'m a hover card');
    $trigger = $hoverCard->createTrigger(Chip::create('Hello World, Im a chip'));
    $trigger2 = $hoverCard->createTrigger(Chip::create('Hello World, Im a chip and another trigger!'));
    return [
      $trigger,
      $hoverCard,
      $trigger2,
    ];
  }

  /**
   * Example of the another hoverCard
   *
   * @return array
   */
  final public function anotherHoverCard(): array
  {
    $hoverCard = HoverCard::create('Hello, I\'m a hover card');
    $trigger = $hoverCard->createTrigger(Chip::create('Hello World, Im a chip'));
    return [
      $trigger,
      $hoverCard,
    ];
  }
}
