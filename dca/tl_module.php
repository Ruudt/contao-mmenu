<?php

/**
 * Table tl_module
 */
// Palettes
//$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][''] = '';
$GLOBALS['TL_DCA']['tl_module']['palettes']['mmnavigation'] = str_replace('{protected_legend', '{mmenu_legend},mmOpenTitle;{mmenuoptions_legend},mmPosition,mmZPosition,mmSlidingSubmenus,mmMoveBackground,mmModal;{mmenuconfig_legend},mmClone,mmTransitionDuration;{protected_legend', $GLOBALS['TL_DCA']['tl_module']['palettes']['navigation']);
// 'navigation'                  => '{title_legend},name,headline,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{reference_legend:hide},defineRoot;{template_legend:hide},navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space',

// Subpalettes
//$GLOBALS['TL_DCA']['tl_module']['subpalettes'][''] = '';

// Fields
$GLOBALS['TL_DCA']['tl_module']['fields']['mmOpenTitle'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmOpenTitle'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'alnum', 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmPosition'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmPosition'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('', 'top', 'right', 'bottom', 'left'),
//	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmZPosition'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmZPosition'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('', 'back', 'front', 'next'),
//	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmSlidingSubmenus'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmSlidingSubmenus'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmMoveBackground'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmMoveBackground'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmModal'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmModal'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmClone'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmClone'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mmTransitionDuration'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['mmTransitionDuration'],
	'default'                 => 400,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '400'"
);


/**
 * Class tl_module_mmenu
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_mmenu extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

}
