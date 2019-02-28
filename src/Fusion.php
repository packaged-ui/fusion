<?php
namespace PackagedUi\Fusion;

use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\ResourceManager;
use PackagedUi\Fusion\Layout\TableInterface;

class Fusion implements DispatchableComponent, LayoutInterface, TypographyInterface, ButtonInferface, BadgeInterface,
                        TableInterface, ThemeInterface, ListInterface
{
  const FILE_BASE_CSS = 'css/base.min.css';
  const FILE_BASE_JS = 'js/base.min.js';

  public static function includeGoogleFont($family = 'Roboto')
  {
    ResourceManager::external()->requireCss(
      'https://fonts.googleapis.com/css?family=' . $family . ':300,300i,400,400i,500,500i,700,700i,900'
    );
  }

  public function getResourceDirectory()
  {
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'resources';
  }

}
