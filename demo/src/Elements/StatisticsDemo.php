<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Layout\Grid\GridCell;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\Fusion\Statistics\Statistic;

class StatisticsDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Statistic';
  }

  protected function _getFaIcon()
  {
    return FaIcon::CHART_PIE;
  }

  /**
   * Example of the Default Statistic Tile.
   *
   * @return HtmlTag
   */
  final public function DefaultStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales');
  }

  /**
   * Statistic Tile with Secondary.
   *
   * @return HtmlTag
   */
  final public function SecondaryStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%');
  }

  /**
   * Statistic Tile with Secondary.
   *
   * @return HtmlTag
   */
  final public function SecondaryCustomColorStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setIconColor(Color::GREEN());
  }

  /**
   * Statistic Tile with Secondary Positive.
   *
   * @return HtmlTag
   */
  final public function SecondaryPositiveStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setSecondaryColor(Color::GREEN());
  }

  /**
   * Statistic Tile with Secondary Negative.
   *
   * @return HtmlTag
   */
  final public function SecondaryNegativeStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setSecondaryColor(Color::RED());
  }

  /**
   * Statistic Tile with Secondary Negative.
   *
   * @return HtmlTag
   */
  final public function BackgroundColorStatistic(): HtmlTag
  {
    return Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setBackgroundColor(Color::RED())
      ->setForegroundColor(Color::WHITE())
      ->setIconColor(Color::BLACK());
  }

  /**
   * Statistic Tile with Secondary Negative.
   */
  final public function StatisticGridExample()
  {
    $statistic = Statistic::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setValue('20,000')
      ->setTitle('Total Sales');

    return GridLayout::createWithInner(
      GridCell::create($statistic),
      GridCell::create($statistic),
      GridCell::create($statistic),
      GridCell::create($statistic)
    );
  }
}
