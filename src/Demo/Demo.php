<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Dispatch\Dispatch;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use Packaged\Http\Response;
use PackagedUi\Elegance\Elegance;

class Demo
{
  public function render()
  {
    Elegance::includeGoogleFont();
    $rm = ResourceManager::component(new Elegance());
    $rm->requireCss(Elegance::FILE_BASE_CSS);
    $rendered = '';

    $rendered .= (new Typography())->produceSafeHTML()->getContent();
    $rendered .= (new Buttons())->produceSafeHTML()->getContent();

    $content = '<!doctype html> <html> <head> <meta charset="UTF-8"> '
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_CSS)
      . ' </head> <body style="padding: 30px;"> '
      . $rendered
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_JS)
      . ' </body></html>';
    return Response::create($content);
  }
}
