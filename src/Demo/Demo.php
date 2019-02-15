<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Dispatch\Dispatch;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use Packaged\Http\Response;

class Demo
{
  public function render()
  {
    ResourceManager::resources()->requireCss('css/base.css');
    $rendered = '';

    $section = new Typography();
    $rendered .= $section->produceSafeHTML()->getContent();

    $content = '<!doctype html> <html> <head> <meta charset="UTF-8"> '
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_CSS)
      . ' </head> <body> '
      . $rendered
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_JS)
      . ' </body></html>';
    return Response::create($content);
  }
}
