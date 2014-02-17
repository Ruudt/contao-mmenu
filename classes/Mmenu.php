<?php

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Mmenu;


/**
 * Class Mmenu
 */
class Mmenu extends \Frontend
{
	/**
	 * Replace the navigation module template (mod_navigation) when 
     * nav_ template meets specific requirements.
	 * @return string
	 */
	public function replaceNavigationModuleTemplate($objFrontendTemplate)
	{
		if (strpos($objFrontendTemplate->navigationTpl, 'nav_mmenu_') === 0)
        {
            $objFrontendTemplate->setName('mod' . substr($objFrontendTemplate->navigationTpl, 3));
        }
	}
}
