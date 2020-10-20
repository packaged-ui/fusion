<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\ToastNotification\ToastNotification;
use PackagedUi\Fusion\ToastNotification\ToastNotificationContainer;
use PackagedUi\Fusion\ToastNotification\ToastNotificationPosition;
use PackagedUi\FusionDemo\AbstractDemoPage;

class NotificationDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Notification';
  }

  protected function _getFaIcon()
  {
    return FaIcon::YOAST;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Random Thing')
          ->setDescription(
            'A good sermon should be like a woman’s skirt: short enough to rouse the interest, but long enough to cover the essentials.'
          )->setDisplayDuration(3000)->setColor(Color::YELLOW())
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Homer Quotes')
          ->setDescription('Marge, it takes two to lie. One to lie and one to listen.')
          ->setIcon(FaIcon::create(FaIcon::BOLD))
          ->removable()
      );

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Random Thing')
          ->setDescription(
            'A good sermon should be like a woman’s skirt: short enough to rouse the interest, but long enough to cover the essentials.'
          )
          ->setColor(Color::BLUE())
          ->setDelay(4000)
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Homer Quotes')
          ->setDescription('Marge, it takes two to lie. One to lie and one to listen.')
          ->setIcon(FaIcon::create(FaIcon::BOLD))
      )->setPosition(ToastNotificationPosition::BOTTOM_LEFT());

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Random Thing')
          ->setDescription(
            'A good sermon should be like a woman’s skirt: short enough to rouse the interest, but long enough to cover the essentials.'
          )
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Homer Quotes')
          ->setDescription('Marge, it takes two to lie. One to lie and one to listen.')
          ->setIcon(FaIcon::create(FaIcon::BOLD))
          ->setDisplayDuration(5000)
      )->setPosition(ToastNotificationPosition::BOTTOM_RIGHT());

    return $return;
  }
}
