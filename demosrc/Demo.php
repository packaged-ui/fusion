<?php
namespace PackagedUi\FusionDemo;

use Packaged\Context\ContextAware;
use Packaged\Context\ContextAwareTrait;
use Packaged\Dispatch\Dispatch;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\HeadingTwo;
use Packaged\Helpers\Strings;
use Packaged\Http\Response;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\Elements\BadgeDemo;
use PackagedUi\FusionDemo\Elements\ButtonDemo;
use PackagedUi\FusionDemo\Elements\CardDemo;
use PackagedUi\FusionDemo\Elements\ColorDemo;
use PackagedUi\FusionDemo\Elements\DrawerDemo;
use PackagedUi\FusionDemo\Elements\GridDemo;
use PackagedUi\FusionDemo\Elements\InputDemo;
use PackagedUi\FusionDemo\Elements\LayoutDemo;
use PackagedUi\FusionDemo\Elements\ListDemo;
use PackagedUi\FusionDemo\Elements\MenuDemo;
use PackagedUi\FusionDemo\Elements\ProgressDemo;
use PackagedUi\FusionDemo\Elements\StatisticsDemo;
use PackagedUi\FusionDemo\Elements\TableDemo;
use PackagedUi\FusionDemo\Elements\ThemeDemo;
use PackagedUi\FusionDemo\Elements\TileDemo;
use PackagedUi\FusionDemo\Elements\TypographyDemo;

class Demo implements ContextAware
{
  use ContextAwareTrait;

  protected function _elements()
  {
    $elements = [];
    $elements['typography'] = new TypographyDemo();
    $elements['color'] = new ColorDemo();
    $elements['layout'] = new LayoutDemo();
    $elements['theme'] = new ThemeDemo();
    $elements['button'] = new ButtonDemo();
    $elements['input'] = new InputDemo();
    $elements['badge'] = new BadgeDemo();
    $elements['grid'] = new GridDemo();
    $elements['table'] = new TableDemo();
    $elements['card'] = new CardDemo();
    $elements['progress'] = new ProgressDemo();
    $elements['drawer'] = new DrawerDemo();
    $elements['list'] = new ListDemo();
    $elements['menu'] = new MenuDemo();
    $elements['tile'] = new TileDemo();
    $elements['statistics'] = new StatisticsDemo();
    return $elements;
  }

  public function render()
  {
    Fusion::includeGoogleFont();
    Fusion::requireCss();
    Fusion::requireJs();
    ResourceManager::vendor('packaged-ui', 'fontawesome')->requireCss(FaIcon::CSS_PATH);

    $rendered = '';
    $elements = $this->_elements();

    $path = ltrim($this->getContext()->request()->path(1), '/');
    if($path)
    {
      $elements = [$path => $elements[$path]];
    }

    foreach($elements as $k => $class)
    {
      if(!($class instanceof DemoPage))
      {
        $rendered .= HeadingTwo::create(ucwords(Strings::splitOnCamelCase($k)))
          ->addClass(
            Fusion::TEXT_RIGHT,
            Fusion::PADDING_LARGE,
            Color::backgroundCss(Color::COLOR_GREY)
          );
        $rendered .= Div::create($class)
          ->addClass(Fusion::PADDING_LARGE);
      }
    }

    $content = '<!doctype html> <html> <head>'
      . '<meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> '
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_CSS)
      . ' </head> <body class="demo-page"> '
      . $rendered
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_JS)
      . ' </body></html>';
    return Response::create($content);
  }
}
