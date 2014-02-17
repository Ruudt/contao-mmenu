<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Mmenu;


/**
 * Class ModuleMmenuNavigation
 *
 * Front end module "mmenunavigation".
 */
class ModuleMmenuNavigation extends \ModuleNavigation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_mmenunavigation';


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		if ($this->cssID[0] == '') {
			$this->cssID = array('mmenu_'.substr(md5(microtime()), 26), $this->cssID[1]);
		}

		parent::compile();

		$GLOBALS['TL_CSS'][] = 'system/modules/mmenu/assets/css/jquery.mmenu.css|all and (max-width: 767px)|';
		if ($this->mmPosition || $this->mmZPosition) {
			$GLOBALS['TL_CSS'][] = 'system/modules/mmenu/assets/css/extensions/jquery.mmenu.positioning.css|all and (max-width: 767px)|';
		}
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/mmenu/assets/js/jquery.mmenu.js|static';
		$GLOBALS['TL_JQUERY'][] = '
<script>
$("#'.$this->cssID[0].'").mmenu({' . // options object
		($this->mmPosition ? 'position: "'.$this->mmPosition.'",' : '') .
		($this->mmZPosition ? 'position: "'.$this->mmZPosition.'",' : '') .
		($this->mmSlidingSubmenus ? '' : 'slidingSubmenus: true,') .
		($this->mmMoveBackground ? '' : 'moveBackground: true,') .
		($this->mmModal ? 'modal: true,' : '') .
'	}, {' . // configuration object
		($this->mmClone ? 'clone: true,' : '') .
		/*
		preventTabbing	true	Boolean	Whether or not to prevent the default behavior when pressing the tab key. If false, the user will be able to tab out of the menu and using some other way to prevent this (for example TABguard) is strongly recommended.
		panelClass	"Panel"	String	The classname on an element (for example a DIV) that should be considered to be a panel. Only applies if the "isMenu" option is set to false.
		listClass	"List"	String	The classname on an UL that should be styled as an app-like list. Automatically applied to all ULs if the "isMenu" option is set to true.
		selectedClass	"Selected"	String	The classname on the LI that should be displayed as selected.
		labelClass	"Label"	String	The classname on a LI that should be displayed as a label.
		counterClass	"Counter"	String	The classname on an EM that should be displayed as a counter. Only applies if the counters are not added automatically.
		pageNodetype	"div"	String	The node-type of the page.
		panelNodetype	"div, ul, ol"	String	The node-type of panels.
		pageSelector	"body > " + pageNodetype	String	jQuery selector for the page.
		*/
		($this->mmTransitionDuration ? 'transitionDuration: '.$this->mmTransitionDuration.',' : '') .
'		selectedClass: "active"
	});
</script>
';

		if ($this->mmTransitionDuration) {
			$transitionDuration = number_format($this->mmTransitionDuration/1000, 2, '.', '') . 's';
			$GLOBALS['TL_JQUERY'][] = '<style>
html.mm-opened .mm-page,
html.mm-opened #mm-blocker,
html.mm-opened .mm-fixed-top,
html.mm-opened .mm-fixed-bottom,
html.mm-opened .mm-menu.mm-horizontal > .mm-panel {
  -webkit-transition: none '.$transitionDuration.' ease;
  -moz-transition: none '.$transitionDuration.' ease;
  -ms-transition: none '.$transitionDuration.' ease;
  -o-transition: none '.$transitionDuration.' ease;
  transition: none '.$transitionDuration.' ease;
  -webkit-transition-property: top, right, bottom, left, border;
  -moz-transition-property: top, right, bottom, left, border;
  -ms-transition-property: top, right, bottom, left, border;
  -o-transition-property: top, right, bottom, left, border;
  transition-property: top, right, bottom, left, border; 
}'.($this->mmPosition || $this->mmZPosition ? '
.mm-menu.mm-front,
.mm-menu.mm-next {
  -webkit-transition: none '.$transitionDuration.' ease;
  -moz-transition: none '.$transitionDuration.' ease;
  -ms-transition: none '.$transitionDuration.' ease;
  -o-transition: none '.$transitionDuration.' ease;
  transition: none '.$transitionDuration.' ease;
  -webkit-transition-property: top, right, bottom, left, -webkit-transform;
  -moz-transition-property: top, right, bottom, left, -moz-transform;
  -ms-transition-property: top, right, bottom, left, -o-transform;
  -o-transition-property: top, right, bottom, left, -o-transform;
  transition-property: top, right, bottom, left, transform; }' : '').'
</style>
';
		}
	}
}
