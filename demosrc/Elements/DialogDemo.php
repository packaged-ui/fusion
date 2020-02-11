<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
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

    $warningDialog = Dialog::create("You can't do this!")->addButton(
      Dialog::makeCloser(Button::create('sorry!')->danger())
    );
    $return[] = $warningDialog;
    $warningLauncher = $warningDialog->applyLauncher(Link::create("#", "NO!"));

    $dialog = Dialog::create("This will reset your device to its default factory settings", $warningLauncher);
    $return[] = $dialog;
    $return[] = $dialog->applyLauncher(Link::create("#", "Default Dialog"));
    $return[] = LineBreak::create();

    $dialog = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?");
    $return[] = $dialog;
    $return[] = $dialog->applyLauncher(Link::create("#", "Dialog Title"));
    $return[] = LineBreak::create();

    $dialog = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?")
      ->addButton(Dialog::makeCloser(Button::create("Cancel")->flat()->primary()));
    $return[] = $dialog;
    $return[] = $dialog->applyLauncher(Link::create("#", "Dialog with Action"));
    $return[] = LineBreak::create();

    $dialog = Dialog::create("This will reset your device to its default factory settings")
      ->setTitle("Reset settings?")
      ->addButton(Dialog::makeCloser(Button::create("Cancel")->flat()->primary()))
      ->addButton(Button::create("Accept")->flat()->primary());
    $return[] = $dialog;
    $return[] = $dialog->applyLauncher(Link::create("#", "Dialog With Two Actions"));
    return $return;
  }
}
