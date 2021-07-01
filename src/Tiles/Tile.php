<?php
namespace PackagedUi\Fusion\Tiles;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Packaged\Helpers\Strings;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\FontAwesome\FaIcons;
use PackagedUi\Fusion\Chip\Chip;
use PackagedUi\Fusion\Chip\Chips;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Tile extends HtmlTag implements Component
{
  use BemComponentTrait;

  use ComponentTrait;

  protected $_tag = 'div';

  /** @var  mixed */
  protected $_title;
  /** @var  array */
  protected $_actions = [];
  /** @var  array */
  protected $_properties = [];
  /** @var  array */
  protected $_icons = [];
  /** @var  string */
  protected $_color;
  /** @var  null|string */
  protected $_label = null;
  /** @var  null|mixed */
  protected $_description = null;
  /** @var  null|mixed */
  protected $_avatar = null;
  /** @var  bool */
  protected $_colorBackground = false;
  /** @var int */
  protected $_maxDescription = 512;
  /** @var \PackagedUi\Fusion\Chip\Chip[] */
  protected $_chips = [];
  /** @var array */
  protected $_footer = [];
  /** @var bool */
  protected $_hoverAction = false;

  public function __construct()
  {
    parent::__construct();
    $this->_constructComponent();
    $this->_construct();
  }

  /**
   * @param Chip $chip
   *
   * @return Tile
   */
  public function addChip(Chip $chip): Tile
  {
    $this->_chips[] = $chip;
    return $this;
  }

  /**
   * @param Chip[] $chips
   *
   * @return Tile
   */
  public function addChips(...$chips): Tile
  {
    foreach($chips as $chip)
    {
      $this->_chips[] = $chip;
    }
    return $this;
  }

  /**
   * @param ...$footer
   *
   * @return Tile
   */
  public function setFooter(...$footer)
  {
    $this->_footer = $footer;
    return $this;
  }

  /**
   * @param $footer
   *
   * @return Tile
   */
  public function appendFooter($footer)
  {
    $this->_footer[] = $footer;
    return $this;
  }

  public function getBlockName(): string
  {
    return 'tile';
  }

  /**
   * @param $content
   *
   * @return $this
   */
  public function setTitle($content)
  {
    $this->_title = $content;
    return $this;
  }

  public function hoverActions()
  {
    $this->_hoverAction = true;
    return $this;
  }

  /**
   * @param string $text
   *
   * @return $this
   */
  public function setLabel($text)
  {
    $this->_label = $text;
    return $this;
  }

  /**
   * @param $content
   *
   * @return $this
   */
  public function setDescription($content)
  {
    $this->_description = $content;
    return $this;
  }

  /**
   * @param $avatar
   *
   * @return $this
   */
  public function setAvatar($avatar)
  {
    $this->_avatar = $avatar;
    return $this;
  }

  /**
   * $copyValue is functionality to copy string to clipboard on click of property object.
   * If $copyValue is_string, $copyValue content will be stored in clipboard on click.
   * If $copyValue is false OR options exist, click/copy functionality is disabled.
   * $copyValue is false (off) by default.
   *
   * @param             $label
   * @param             $value
   * @param bool|string $copyValue
   * @param array       $options
   *
   * @return $this
   */
  public function addProperty($label, $value, $copyValue = false, array $options = [])
  {
    if($value !== null && $value !== '')
    {
      $property = Div::create()->addClass($this->getElementName('property'));

      // stuff for copy-to-clipboard
      if(($copyValue !== false) && ($copyValue !== null) && !$options)
      {
        if($copyValue === true)
        {
          $copyValue = $value;
        }

        if(is_string($copyValue))
        {
          $property->setAttribute('data-copy', $copyValue);
          $property->appendContent(
            FaIcon::create(FaIcon::COPY)->styleRegular()->fixedWidth()->addClass('copy')
          );
        }
      }

      if(is_string($value))
      {
        $value = Paragraph::create($value)->addClass($this->getElementName('value'))
          ->setAttribute('title', $value);
      }
      else
      {
        $value = Div::create($value)->addClass($this->getElementName('value'));
      }

      if(is_string($label))
      {
        $label = Paragraph::create($label)->addClass($this->getElementName('label'))
          ->setAttribute('title', ucwords($label));
      }

      $property->prependContent([$value, $label]);

      $this->_properties[] = $property;
    }
    return $this;
  }

  public function addCustomProperty($property)
  {
    $this->_properties[] = Div::create($property)->addClass($this->getElementName('property'));
    return $this;
  }

  /**
   * @param TileAction $action
   *
   * @return $this
   */
  public function addAction(TileAction $action)
  {
    if($action instanceof TileAction)
    {
      // Define min/max value of custom sort order.
      // This is to ensure an element consistency for the most part.
      $this->_actions[] = $action;
    }
    return $this;
  }

  /**
   * @param $icon
   *
   * @return $this
   */
  public function addIcon($icon)
  {
    if(is_string($icon) && FaIcons::isValid($icon))
    {
      $icon = FaIcon::create($icon);
    }
    $this->_icons[] = $icon;
    return $this;
  }

  /**
   * @param string $color
   *
   * @return $this
   */
  public function setColor($color)
  {
    $this->_color = $color;
    return $this;
  }

  /**
   * @return string
   */
  public function getColor()
  {
    return $this->_color;
  }

  /**
   * @return bool
   */
  public function hasColorBackground()
  {
    return $this->_colorBackground;
  }

  /**
   * @param bool $colorBackground
   *
   * @return Tile
   */
  public function setColorBackground($colorBackground)
  {
    $this->_colorBackground = $colorBackground;
    return $this;
  }

  /**
   * @return array
   */
  public function getActionTypes()
  {
    return array_keys($this->_actions);
  }

  /**
   * @return int
   */
  public function getPropertyCount()
  {
    return count($this->_properties);
  }

  /**
   * @param HtmlTag $container
   * @param HtmlTag $tile
   *
   * @return HtmlTag
   */
  protected function _applyIcons(HtmlTag $container, HtmlTag $tile)
  {
    if($this->_icons)
    {
      $container->appendContent(Div::create($this->_icons)->addClass($this->getElementName('icons')));
      $tile->addClass($this->getModifier('has-icons'));
    }

    return $tile;
  }

  /**
   * @return Div
   */
  protected function _prepareForProduce(): HtmlElement
  {
    // create container
    $container = Div::create()->addClass($this->getBlockName());

    // Avatar, Label, Title and Description
    $primary = Div::create()->addClass($this->getElementName('primary'));
    $container->appendContent($primary);

    $heading = Div::create()->addClass($this->getElementName('head'));
    $primary->appendContent($heading);

    //Avatar
    if($this->_avatar)
    {
      $avatar = Div::create($this->_avatar)->addClass($this->getElementName('avatar'));
      $heading->appendContent($avatar);

      $container->addClass($this->getModifier('has-avatar'));
    }
    else
    {
      $container->addClass($this->getModifier('no-avatar'));
    }

    // Title, Label, Description content
    $text = Div::create()->addClass($this->getElementName('text'));
    $heading->appendContent($text);

    // add icons to container
    $this->_applyIcons($heading, $container);

    if($this->_label)
    {
      $label = Paragraph::create($this->getLabel())->addClass($this->getElementName('label'));
      $text->appendContent($label);

      $container->addClass($this->getModifier('has-label'));
    }
    else
    {
      $container->addClass($this->getModifier('no-label'));
    }

    if($this->_title)
    {
      $title = Div::create($this->getTitle())->addClass($this->getElementName('title'));
      $text->appendContent($title);

      $container->addClass($this->getModifier('has-title'));
    }

    if($this->_description)
    {
      $description = Div::create($this->_produceDescription())->addClass($this->getElementName('description'));
      $this->_setDescription($description, $primary, $heading, $text);

      $container->addClass($this->getModifier('has-description'));
    }
    else
    {
      $container->addClass($this->getModifier('no-description'));
    }

    $footer = $this->_footer;

    if(!empty($this->_chips))
    {
      array_unshift($footer, Chips::create()->addChips(...$this->_chips)->addClass($this->getElementName('chips')));
    }

    if(!empty($footer))
    {
      $primary->appendContent(Div::create($footer)->addClass($this->getElementName('footer')));
    }

    $container->addClass($this->getModifier((!empty($footer) ? 'no' : 'has') . '-footer'));

    // add border Color class
    if($this->_color === null)
    {
      $container->addClass($this->getModifier('default'));
    }
    else if(Color::isValid($this->_color))
    {
      $container->addClass($this->_color);
    }
    else
    {
      $container->setAttribute('style', '--tile-color: ' . $this->_color . ';');
    }

    // append properties
    if($this->_properties)
    {
      // Properties
      $container->appendContent(Div::create($this->_properties)->addClass($this->getElementName('properties')));
      $container->addClass($this->getModifier('has-properties'));
    }
    else
    {
      $container->addClass($this->getModifier('no-properties'));
    }

    // append actions
    if($this->_actions)
    {
      if($this->_hoverAction)
      {
        $primary->appendContent(Div::create($this->_actions)->addClass($this->getElementName('actions')));
        $container->addClass($this->getModifier('hover-actions'));
      }

      $container->appendContent(Div::create($this->_actions)->addClass($this->getElementName('actions')));
      $container->addClass($this->getModifier('has-actions'));
    }
    else
    {
      $container->addClass($this->getModifier('no-actions'));
    }

    if($this->_colorBackground)
    {
      $container->addClass($this->getModifier("color-bg"));
    }

    return $container;
  }

  protected function _setDescription(HtmlTag $description, HtmlTag $primary, HtmlTag $heading, HtmlTag $text)
  {
    $text->appendContent($description);
    return $this;
  }

  /**
   * @return mixed
   */
  public function getTitle()
  {
    return $this->_title;
  }

  /**
   * @return null|string
   */
  public function getLabel()
  {
    return $this->_label;
  }

  /**
   * @return mixed|null
   */
  public function getDescription()
  {
    return $this->_description;
  }

  protected function _produceDescription()
  {
    if(is_string($this->getDescription()))
    {
      return Strings::excerpt($this->getDescription(), $this->_maxDescription);
    }
    return $this->getDescription();
  }
}
