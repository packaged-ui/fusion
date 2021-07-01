<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Chip\Chip;
use PackagedUi\Fusion\Chip\Chips;
use PackagedUi\Fusion\Color\Color;

class ChipDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Chips';
  }

  protected function _getFaIcon()
  {
    return FaIcon::PILLS;
  }

  /**
   * @return HtmlTag
   */
  final public function DefaultChip(): HtmlTag
  {
    return Chip::create('Lorem Ipsum');
  }

  /**
   * @return HtmlTag
   */
  final public function CustomChipColor(): HtmlTag
  {
    return Chip::create('Lorem Ipsum')->setColor(Color::RED());
  }

  /**
   * @return HtmlTag
   */
  final public function ChipIcon(): HtmlTag
  {
    return Chip::create('Hello World')
      ->setIcon(FaIcon::create(FaIcon::MAP));
  }

  /**
   * @return HtmlTag
   */
  final public function ChipAction(): HtmlTag
  {
    return Chip::create('Hello World')
      ->setAction(Link::create('#', FaIcon::create(FaIcon::TIMES)));
  }

  /**
   * @return HtmlTag
   */
  final public function ChipNoBackgorund(): HtmlTag
  {
    return Chip::create('Hello World')
      ->removeBackground();
  }

  /**
   * @return HtmlTag
   */
  final public function ChipWithValue(): HtmlTag
  {
    return Chip::create('Hello World')
      ->setValue('1.15.2');
  }

  /**
   * @return HtmlTag
   */
  final public function ChipRounded(): HtmlTag
  {
    return Chip::create('Hello World')
      ->round();
  }

  /**
   * @return Chips
   */
  final public function ExampleChips(): Chips
  {
    $chips = [];

    $chips[] = Chip::create('Needs Improvement')
      ->setColor(Color::YELLOW())
      ->setAction(FaIcon::create(FaIcon::TIMES));

    $chips[] = Chip::create('Danger')
      ->setIcon(FaIcon::create(FaIcon::TRASH))
      ->setColor(Color::RED())
      ->setAction(FaIcon::create(FaIcon::TIMES));

    $chips[] = Chip::create('Article')
      ->setColor(Color::SKY())
      ->removeBackground()
      ->setAction(FaIcon::create(FaIcon::TIMES));

    $chips[] = Chip::create('Lorem Ipsum')
      ->setColor(Color::BLUE())
      ->round()
      ->setAction(FaIcon::create(FaIcon::TIMES));

    return Chips::create()->addChips(...$chips);
  }

}
