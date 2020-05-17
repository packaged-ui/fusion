<?php
namespace PackagedUi\FusionDemo;

interface UiPage
{
  public function getID(): string;

  public function getName(): string;

  public function getIcon();
}
