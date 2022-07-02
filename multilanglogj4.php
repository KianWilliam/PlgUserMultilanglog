
<?php
defined('_JEXEC') or die;
use Joomla\CMS\User\User;
use Joomla\CMS\User\UserHelper;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Factory;
class PlgUserMultilanglogj4 extends CMSPlugin
{		
	protected $autoloadLanguage = true;
		protected $app;


    public function onAfterInitialise()
	{
		
		$this->loadLanguage();
	}
		
	public function onUserAfterLogin($options=[])
	{
		
		
		if($this->app->isClient('site')):
		
		$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		
		
		$urls = $this->params->get("urlang");
		$urlsarr = explode('|' , $urls);
		
		
		foreach($urlsarr as $url)
		{
			
			if(preg_match('/'.$tag.'/', $url))
			{
				
				
				$urlcode = explode(" ", trim($url));
				
				$app->redirect($urlcode[0]);
				return true;
			}
		}
		return false;
		
		endif;
		return true;
		
	}


}