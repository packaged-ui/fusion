<?php
namespace PackagedUi\FusionDemo;

use Cubex\Console\Commands\BuiltInWebServer;

class DemoServe extends BuiltInWebServer
{
  public $port = 7777;
  public $router = 'demosrc/_index.php';

  protected function configure()
  {
    $this->setName('serve');
    $this->setDescription("Launch the Fusion demo server");
  }
}
