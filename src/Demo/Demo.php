<?php
namespace PackagedUi\Elegance\Demo;

use Cubex\Context\Context;
use Cubex\Context\ContextAware;
use Cubex\Context\ContextAwareTrait;
use Packaged\Dispatch\Dispatch;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use Packaged\Http\Response;
use PackagedUi\Elegance\Elegance;

class Demo implements ContextAware
{
  use ContextAwareTrait;

  public function __construct(Context $c)
  {
    $this->setContext($c);
  }

  public function render()
  {
    Elegance::includeGoogleFont();
    $rm = ResourceManager::component(new Elegance());
    $rm->requireCss(Elegance::FILE_BASE_CSS);
    $rendered = '';

    $elements = [];
    $elements['typography'] = new TypographyDemo();
    $elements['button'] = new ButtonDemo();
    $elements['badge'] = new BadgeDemo();
    $elements['grid'] = new GridDemo();
    $elements['table'] = new TableDemo();
    $elements['card'] = new CardDemo();
    $elements['progress'] = new ProgressDemo();

    $path = ltrim($this->getContext()->getRequest()->path(), '/');
    switch($path)
    {
      case "":
        foreach($elements as $class)
        {
          $rendered .= $class->produceSafeHTML()->getContent();
          $rendered .= '<br/>';
        }
        break;
      default:
        if(isset($elements[$path]))
        {
          $rendered .= $elements[$path]->produceSafeHTML()->getContent();
        }
        break;
    }

    $content = '<!doctype html> <html> <head> <meta charset="UTF-8"> '
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_CSS)
      . ' </head> <body class="demo-page" style="padding: 30px;"> '
      . $rendered
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_JS)
      . ' </body></html>';
    return Response::create($content);
  }
}
