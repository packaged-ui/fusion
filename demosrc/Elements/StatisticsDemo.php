<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Span;
use Packaged\Glimpse\Tags\Text\SmallText;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Card\Card;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Flex;
use PackagedUi\Fusion\Layout\FlexGrow;
use PackagedUi\Fusion\Layout\Grid\GridCell;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\FusionDemo\AbstractDemoPage;

class StatisticsDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Statistics';
  }

  protected function _getFaIcon()
  {
    return FaIcon::CHART_PIE;
  }

  protected function _content(): array
  {
    $stats = [];

    $stats[] = Card::create("GRAPH")
      ->setHeader("Revenue")
      ->setFooter(
        GridLayout::createWithInner(
          GridCell::collectionSized(["Target", "Current"], null, 4)
        )
      )
      ->disableContentContainer();

    $stats[] = Card::create("GRAPH")
      ->setHeader(
        Flex::create(
          FlexGrow::create("Revenue"),
          SmallText::create(FaIcon::create(FaIcon::ARROW_UP, "12%"))->addClass()
        )
      )
      ->setFooter(Span::create(34)->addClass(Fusion::TEXT_LARGE));

    return [GridLayout::createWithInner(GridCell::collectionSized($stats, 3, 3, 4, 12))];
  }
}
