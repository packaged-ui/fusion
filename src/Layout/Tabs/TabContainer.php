<?php
namespace PackagedUi\Fusion\Layout\Tabs;

use Exception;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Link;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;
use Symfony\Component\HttpFoundation\Request;

class TabContainer extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'tabs';
  }

  /**
   * @var Tab[]
   */
  protected $_tabs;
  protected $_tag = 'div';
  protected $_activeTab;

  public function __construct($containerID)
  {
    parent::__construct();
    $this->_constructComponent();
    $this->_construct();
    $this->setId('f-tc-' . $containerID);
  }

  public static function create($containerID = 'dflt')
  {
    return new static($containerID);
  }

  public function addTab(string $id, Tab $tab, bool $active = false)
  {
    $this->_tabs[$id] = $tab;
    if($active)
    {
      $this->_activeTab = $id;
    }
    return $this;
  }

  public function setActiveTabByID($tabID)
  {
    if(!isset($this->_tabs[$tabID]))
    {
      throw new Exception("No tab exists with the ID " . $tabID);
    }

    $this->_activeTab = $tabID;
    return $this;
  }

  public function setActiveTabByRequest(Request $request)
  {
    $requestTab = $request->query->get($this->getId());
    if($requestTab)
    {
      try
      {
        $this->setActiveTabByID($requestTab);
      }
      catch(Exception $e)
      {
        error_log($e->getMessage());
      }
    }
    return $this;
  }

  protected function _getContentForRender()
  {
    $return = [];
    $activeTab = $this->_activeTab ?: array_key_first($this->_tabs);

    $tabMenu = $tabs = [];
    foreach($this->_tabs as $tid => $tab)
    {
      $isActive = $tid == $activeTab;
      $tid = 'f-tb-' . $tid;

      $tab->setId($tid)->toggleClass($tab->getModifier('active'), $isActive);
      $menuItem = Link::create('#' . $tid, $tab->getLabel())->addClass($tab->getElementName('label'))->setAttribute(
        'data-tab-id',
        $tid
      );
      $menuItem->toggleClass($tab->getModifier('active', 'label'), $isActive);
      $tabMenu[] = $menuItem;
    }
    $return[] = Div::create($tabMenu)->addClass($this->getElementName('menu'));
    $return[] = Div::create($this->_tabs)->addClass($this->getElementName('container'));

    return $return;
  }
}
