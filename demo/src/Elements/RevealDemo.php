<?php

namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\HorizontalRule;
use Packaged\Glimpse\Tags\Text\Paragraph;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Layout\Flex;
use PackagedUi\Fusion\Layout\Reveal\Reveal;
use PackagedUi\FusionDemo\AbstractDemoPage;

class RevealDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Reveal';
  }

  protected function _getFaIcon()
  {
    return FaIcon::HIGHLIGHTER;
  }

  public function __construct()
  {
    ResourceManager::inline()->requireCss(
      '[reveal-launcher] > [close],
[reveal-launcher][reveal-open] > [open] {
  display: none;
}

[reveal-launcher][reveal-open] > [close] {
  display: block !important;
}'
    );
  }

  protected function _content(): array
  {
    $toggleReveal = Reveal::create('some content');
    $destructiveReveal = Reveal::create('some content')->destructive();
    return [
      $toggleReveal->applyLauncher(
        Flex::create(
          Button::create('toggle it'),
          Paragraph::create('OPEN')->setAttribute('open', true),
          Paragraph::create('CLOSE')->setAttribute('close', true)
        )
      ),
      $toggleReveal->applyLauncher(
        Flex::create(
          Button::create('toggle it'),
          Paragraph::create('OPEN')->setAttribute('open', true),
          Paragraph::create('CLOSE')->setAttribute('close', true)
        )
      ),
      $toggleReveal->applyLauncher(
        Flex::create(
          Button::create('toggle it'),
          Paragraph::create('OPEN')->setAttribute('open', true),
          Paragraph::create('CLOSE')->setAttribute('close', true)
        )
      ),
      $toggleReveal,
      HorizontalRule::create(),
      $destructiveReveal->applyLauncher(Button::create('show it')),
      $destructiveReveal,
      $destructiveReveal->applyLauncher(Button::create('show it again')),
      $toggleReveal->applyLauncher(
        Flex::create(
          Button::create('toggle it'),
          Paragraph::create('OPEN')->setAttribute('open', true),
          Paragraph::create('CLOSE')->setAttribute('close', true)
        )
      ),
    ];
  }
}
