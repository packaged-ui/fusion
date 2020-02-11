<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Modal\Dialog\Dialog;
use PackagedUi\FusionDemo\AbstractDemoPage;

class DialogDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Dialogs';
  }

  protected function _getFaIcon()
  {
    return FaIcon::WINDOW_RESTORE;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Dialog::create("This will reset your device to its default factory settings");

    $return[] = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?");

    $return[] = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?")
      ->addButton(Button::create("Cancel")->flat()->primary());

    $return[] = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?")
      ->addButton(Button::create("Cancel")->flat()->primary())
      ->addButton(Button::create("Accept")->flat()->primary());
    return $return;
  }
}
