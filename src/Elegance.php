<?php
namespace PackagedUi\Elegance;

use Packaged\Dispatch\Component\DispatchableComponent;

class Elegance implements DispatchableComponent, TypographyInterface
{
  const FILE_BASE_CSS = 'css/base.min.css';

  public function getResourceDirectory()
  {
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'resources';
  }

}
