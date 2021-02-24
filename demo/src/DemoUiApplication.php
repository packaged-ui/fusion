<?php
namespace PackagedUi\FusionDemo;

use Cubex\Application\Application;
use Cubex\Cubex;
use Exception;
use Packaged\Context\Context;
use Packaged\Dispatch\Dispatch;
use Packaged\Helpers\Objects;
use Packaged\Routing\Handler\FuncHandler;
use Packaged\Routing\Handler\Handler;
use Symfony\Component\HttpFoundation\Response;

class DemoUiApplication extends Application
{
  const DISPATCH_PATH = '/_r';

  /**
   * DemoUiApplication constructor.
   *
   * @param Cubex $cubex
   *
   * @throws Exception
   */
  public function __construct(Cubex $cubex)
  {
    parent::__construct($cubex);
    $ctx = $cubex->getContext();

    $handler = Objects::create($ctx->config()->getItem("ui", "config_handler", ConfigHandler::class), []);

    if($handler instanceof ConfigHandler)
    {
      $handler->setContext($ctx);
      $cubex->share(ConfigHandler::class, $handler);
    }
    else
    {
      throw new Exception("Invalid config handler provided");
    }
  }

  protected function _generateRoutes()
  {
    yield self::_route(
      self::DISPATCH_PATH,
      new FuncHandler(function (Context $c): Response { return Dispatch::instance()->handleRequest($c->request()); })
    );
    return parent::_generateRoutes();
  }

  protected function _initialize()
  {
    parent::_initialize();
    Dispatch::bind(new Dispatch($this->getContext()->getProjectRoot(), self::DISPATCH_PATH));
  }

  protected function _defaultHandler(): Handler
  {
    return new DemoHandler();
  }
}
