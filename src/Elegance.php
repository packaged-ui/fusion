<?php
namespace PackagedUi\Elegance;

use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\ResourceManager;
use PackagedUi\Elegance\Layout\TableInterface;

class Elegance implements DispatchableComponent, LayoutInterface, TypographyInterface, ButtonInferface, BadgeInterface,
                          TableInterface, ThemeInterface
{
  const FILE_BASE_CSS = 'css/base.min.css';

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
