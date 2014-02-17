<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Mmenu
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Mmenu',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Mmenu\ModuleMmenuNavigation' => 'system/modules/mmenu/modules/ModuleMmenuNavigation.php',

	// Classes
	'Mmenu\Mmenu'                 => 'system/modules/mmenu/classes/Mmenu.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nav_mmenu_default'   => 'system/modules/mmenu/templates',
	'mod_mmenunavigation' => 'system/modules/mmenu/templates',
	'mod_mmenu_default'   => 'system/modules/mmenu/templates',
));
