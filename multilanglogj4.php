<?php 

/**
 * @package Plugin user - multilanglogj4 for Joomla! 3.x & j4.x
 * @version $Id: user - multi language login  1.0.0 2022-06-10 23:26:33Z $
 * @author KWProductions Co.
 * @copyright (C) 2020- KWProductions Co.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of user - multilanglogj4.
    user - multilanglogj4 is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    It is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with it.  If not, see <http://www.gnu.org/licenses/>.
 
**/


?>
<?php
defined('_JEXEC') or die;
use Joomla\CMS\User\User;
use Joomla\CMS\User\UserHelper;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

class PlgUserMultilanglogj4 extends CMSPlugin
{		
	protected $autoloadLanguage = true;
		protected $app;


    public function onAfterInitialise()
	{
		
		$this->loadLanguage();
	}
	public function onUserLoginFailure($credentials=[])
	{
		
			if($this->app->isClient('site') && $this->params->get("yesnob")==1):
     
		$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		$urls = $this->params->get("urlangb");
		
	
		
         if(($url=$this->redirectOnDemand($tag, $urls))!==null)
		{
         
			
			            $app->enqueueMessage(Text::_($url[1]), $url[2]);

			$app->redirect(Route::_($url[0]));
		

		}
		
		endif;
	}
		public function onUserAfterSave($user, $isNew, $success, $msg)
		{
			
			if($this->app->isClient('site') && $isNew && $this->params->get("yesnoc")==1){
				
		
		$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		$urls = $this->params->get("urlangc");
	
		
		
		if(($url=$this->redirectOnDemand($tag, $urls))!==null)
		{
		            $app->enqueueMessage(Text::_($url[1]), $url[2]);

			$app->redirect(Route::_($url[0]));
		

		}
		
			}
			else
				if($this->app->isClient('site') && $this->params->get("yesnoe")==1){
	
			
				$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		$urls = $this->params->get("urlange");
	
			if(($url=$this->redirectOnDemand($tag, $urls))!==null)
		{
			
			            $app->enqueueMessage(Text::_($url[1]), $url[2]);

			$app->redirect(Route::_($url[0]));
			
			
		}

			}
			
		}


	public function onUserAfterLogin($options=[])
	{
		
		
		if($this->app->isClient('site') && $this->params->get("yesnoa")==1):
		
		$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		
		
		$urls = $this->params->get("urlang");
	
			if(($url=$this->redirectOnDemand($tag, $urls))!==null)
		{
            $app->enqueueMessage(Text::_($url[1]), $url[2]);
			$app->redirect(Route::_($url[0]));
			return true;
			
		}
		else
		return false;
		
		endif;
		return true;
		
	}
	public function onUserLogout($credentials=[], $options=[])
	{
		
		
		if($this->app->isClient('site') && $this->params->get("yesnoa")==1):
		
		$app = Factory::getApplication();
		$tag = $app->getLanguage()->getTag();
		
		
		
		$urls = $this->params->get("urlangd");
	
		if(($url=$this->redirectOnDemand($tag, $urls))!==null)
		{
			            $app->enqueueMessage(Text::_($url[1]), $url[2]);

			$app->redirect(Route::_($url[0]));
			return true;

		}
		else
		return false;
		
		endif;
		return true;
		
	}
	protected function redirectOnDemand($tag, $urls)
	{
		$urlsarr=[];

				$urlsarr = explode('|' , $urls);
	$info=[];

		
		foreach($urlsarr as $url)
		{
			
		
			if(preg_match('/com_jshopping/', $url))
			{
						$tag = substr($tag, 0, 2);

			}
		
			
			if(preg_match('/'.$tag.'/', $url))
			{
				
				
				$urlcode = explode("@", trim($url));
				$info[0]=$urlcode[0];
				$info[1]=$urlcode[2];
				$info[2]=$urlcode[3];
				return $info;
				
			}
			
		}
		
		
	}
		



}