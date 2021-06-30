<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Avatar\Avatar;
use PackagedUi\Fusion\Color\Color;

class AvatarDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Avatar';
  }

  protected function _getFaIcon()
  {
    return FaIcon::USER;
  }

  /**
   * Example of the Image Avatar.
   *
   * @return HtmlTag
   */
  final public function ImageAvatar(): HtmlTag
  {
    return Avatar::image('https://media.giphy.com/media/26DN81TqLPIzBlksw/giphy.gif');
  }

  /**
   * Image Avatar with background colors.
   *
   * @return HtmlTag
   */
  final public function ColorImageAvatar(): HtmlTag
  {
    return Avatar::image('https://media.giphy.com/media/xUOwFXS9fm76vBcuTC/giphy.gif')->setColor(Color::RED());
  }

  /**
   * Example of the Text Avatar.
   *
   * @return HtmlTag
   */
  final public function TextAvatar(): HtmlTag
  {
    return Avatar::text('Hello World');
  }

  /**
   * Text Avatar with background colors.
   *
   * @return HtmlTag
   */
  final public function ColoredTextAvatar(): HtmlTag
  {
    return Avatar::text('Jane Doe')->setColor(Color::GREEN());
  }

  /**
   * Small Text Avatar with background colors.
   *
   * @return array
   */
  final public function SmallTextAvatar(): array
  {
    $return = [];

    $return[] = Avatar::text('Jane Doe')->setColor(Color::GREEN())->small();
    $return[] = Avatar::text('Jon')->setColor(Color::RED())->small();
    $return[] = Avatar::text('Something')->setColor(Color::ORANGE())->small();

    return $return;
  }

  /**
   * Medium Text Avatar with background colors.
   *
   * @return array
   */
  final public function MediumTextAvatar(): array
  {
    $return = [];

    $return[] = Avatar::text('Jane Doe')->setColor(Color::GREEN())->medium();
    $return[] = Avatar::text('Jon')->setColor(Color::RED())->medium();
    $return[] = Avatar::text('Something')->setColor(Color::ORANGE())->medium();

    return $return;
  }

  /**
   * Default Text Avatar with background colors.
   *
   * @return array
   */
  final public function DefaultTextAvatar(): array
  {
    $return = [];

    $return[] = Avatar::text('Jane Doe')->setColor(Color::GREEN());
    $return[] = Avatar::text('Jon')->setColor(Color::RED());
    $return[] = Avatar::text('Something')->setColor(Color::ORANGE());

    return $return;
  }

  /**
   * Large Text Avatar with background colors.
   *
   * @return array
   */
  final public function LargeTextAvatar(): array
  {
    $return = [];

    $return[] = Avatar::text('Jane Doe')->setColor(Color::GREEN())->large();
    $return[] = Avatar::text('Jon')->setColor(Color::RED())->large();
    $return[] = Avatar::text('Something')->setColor(Color::ORANGE())->large();

    return $return;
  }
}
