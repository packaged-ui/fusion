<?php
namespace PackagedUi\Fusion\Tiles;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Packaged\Helpers\Strings;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;

class Tile extends HtmlTag
{
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
  protected $_color = Color::COLOR_DEFAULT;
  /** @var  null|string */
  protected $_label = null;
  /** @var  null|mixed */
  protected $_description = null;
  /** @var  null|mixed */
  protected $_avatar = null;
  /** @var  bool */
  protected $_isGridLayout = false;
  /** @var  bool */
  protected $_colorBackground = false;
  /** @var int */
  protected $_maxDescription = 512;

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
   * @param Avatar $avatar
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
      $property = Div::create()->addClass('property');

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
        $value = Paragraph::create($value)->addClass('value')->setAttribute('title', $value);
      }
      else
      {
        $value = Div::create($value)->addClass('value');
      }

      if(is_string($label))
      {
        $label = Paragraph::create($label)->addClass('label')->setAttribute('title', ucwords($label));
      }

      $property->prependContent([$value, $label]);

      $this->_properties[] = $property;
    }
    return $this;
  }

  public function addCustomProperty($property)
  {
    $this->_properties[] = Div::create($property)->addClass('property');
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
    if(is_string($icon) && FaIcon::isValid($icon))
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
  public function setColor($color = Color::COLOR_DEFAULT)
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
      $container->appendContent(Div::create($this->_icons)->addClass('icons'));
      $tile->addClass('has-icons');
    }

    return $tile;
  }

  /**
   * @return Div
   */
  protected function _prepareForProduce(): HtmlTag
  {
    // create container
    $container = Div::create()->addClass('ui-tile');

    // Avatar, Label, Title and Description
    $primary = Div::create()->addClass('primary');
    $container->appendContent($primary);

    $heading = Div::create()->addClass('ui-tile-head');
    $primary->appendContent($heading);

    //Avatar
    if($this->_avatar)
    {
      $avatar = Div::create($this->_avatar)->addClass('avatar');
      $heading->appendContent($avatar);

      $container->addClass('has-avatar');
    }
    else
    {
      $container->addClass('no-avatar');
    }

    // Title, Label, Description content
    $text = Div::create()->addClass('text');
    $heading->appendContent($text);

    // add icons to container
    $this->_applyIcons($text, $container);

    if($this->_label)
    {
      $label = Paragraph::create($this->getLabel())->addClass('label');
      $text->appendContent($label);

      $container->addClass('has-label');
    }
    else
    {
      $container->addClass('no-label');
    }

    if($this->_title)
    {
      $title = Div::create($this->getTitle())->addClass('title');
      $text->appendContent($title);

      $container->addClass('has-title');
    }

    if($this->_description)
    {
      $description = Div::create($this->_produceDescription())->addClass('description');
      $this->_setDescription($description, $primary, $heading, $text);

      $container->addClass('has-description');
    }
    else
    {
      $container->addClass('no-description');
    }

    // add border Color class
    if(Color::isValid($this->_color))
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
      $container->appendContent(Div::create($this->_properties)->addClass('properties'));
      $container->addClass('has-properties');
    }
    else
    {
      $container->addClass('no-properties');
    }

    // append actions
    if($this->_actions)
    {
      $container->appendContent(Div::create($this->_actions)->addClass('actions'));
      $container->addClass('has-actions');
    }
    else
    {
      $container->addClass('no-actions');
    }

    if($this->_colorBackground)
    {
      $container->addClass("Color-bg");
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
