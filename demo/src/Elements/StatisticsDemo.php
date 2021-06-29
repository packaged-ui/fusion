<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Layout\Grid\GridCell;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\Fusion\Statistics\Statistics;

class StatisticsDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Statistics';
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
  final public function DefaultStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales');
  }

  /**
   * Statistics Tile with Secondary.
   *
   * @return HtmlTag
   */
  final public function SecondaryStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%');
  }

  /**
   * Statistics Tile with Secondary.
   *
   * @return HtmlTag
   */
  final public function SecondaryCustomColorStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setIconColor(Color::GREEN());
  }

  /**
   * Statistics Tile with Secondary Positive.
   *
   * @return HtmlTag
   */
  final public function SecondaryPositiveStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setSecondaryColor(Color::GREEN());
  }

  /**
   * Statistics Tile with Secondary Negative.
   *
   * @return HtmlTag
   */
  final public function SecondaryNegativeStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setSecondaryColor(Color::RED());
  }

  /**
   * Statistics Tile with Secondary Negative.
   *
   * @return HtmlTag
   */
  final public function BackgroundColorStatistics(): HtmlTag
  {
    return Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales')
      ->setSecondary(FaIcon::create(FaIcon::ARROW_UP), '12%')
      ->setBackgroundColor(Color::RED())
      ->isWhite();
  }

  /**
   * Statistics Tile with Secondary Negative.
   */
  final public function StatisticsGridExample()
  {
    $statistics = Statistics::create()
      ->setIcon(FaIcon::create(FaIcon::SHOPPING_CART))
      ->setStat('20,000')
      ->setSub('Total Sales');

    return GridLayout::createWithInner(
      GridCell::create($statistics),
      GridCell::create($statistics),
      GridCell::create($statistics),
      GridCell::create($statistics)
    );
  }
}
