<?php 

/**
 * @package Plugin user - multilanglog for Joomla! 3.x
 * @version $Id: user - multi language login  1.0.0 2016-11-17 23:26:33Z $
 * @author Kian William Nowrouzian
 * @copyright (C) 2015- Kian William Nowrouzian
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of user - multilanglog.
    user - multilanglog is free software: you can redistribute it and/or modify
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
class PlgUserMultilanglog extends JPlugin
{	
	public function OnUserLogin($user, $options=array())
	{
		$app = JFactory::getApplication();
		$app->setUserState('users.login.form.return',$options['return']);
	}
}
