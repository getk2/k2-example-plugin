<?php
/**
 * @version		2.3
 * @package		Example K2 Plugin (K2 plugin)
 * @author		JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

/**
 * Example K2 Plugin to render YouTube URLs entered in backend K2 forms to video players in the frontend.
 */

// Load the K2 Plugin API
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.'/components/com_k2/lib/k2plugin.php');

// Initiate class to hold plugin events
class plgK2Example extends K2Plugin
{
    // Some params
    public $pluginName = 'example';
    public $pluginNameHumanReadable = 'Example K2 Plugin';

    public function __construct(&$subject, $params)
    {
        parent::__construct($subject, $params);
    }

    /**
     * Below we list all available FRONTEND events, to trigger K2 plugins.
     * Watch the different prefix "onK2" instead of just "on" as used in Joomla already.
     * Most functions are empty to showcase what is available to trigger and output. A few are used to actually output some code for example reasons.
     */

    public function onK2PrepareContent(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        //$item->text = 'It works! '.$item->text;
    }

    public function onK2AfterDisplay(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }

    public function onK2BeforeDisplay(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }

    public function onK2AfterDisplayTitle(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }

    public function onK2BeforeDisplayContent(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }

    // Event to display (in the frontend) the YouTube URL as entered in the item form
    public function onK2AfterDisplayContent(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();

        // Get the output of the K2 plugin fields (the data entered by your site maintainers)
        $plugins = new K2Parameter($item->plugins, '', $this->pluginName);
        
        $videoURL = $plugins->get('videoURL_item');

        // Check if we have a value entered
        if (empty($videoURL)) {
            return;
        }

        // Output
        preg_match('/youtube\.com\/watch\?v=([a-z0-9-_]+)/i', $videoURL, $matches);
        $video_id = $matches[1];

        $output = '
		<p>'.JText::_('Video rendered using the "Example K2 Plugin".').'</p>
		<iframe width="'.$this->params->get('width').'" height="'.$this->params->get('height').'" src="https://www.youtube.com/embed/'.$video_id.'?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		';
        return $output;
    }

    // Event to display (in the frontend) the YouTube URL as entered in the category form
    public function onK2CategoryDisplay(&$category, &$params, $limitstart)
    {
        $app = JFactory::getApplication();

        // Get the output of the K2 plugin fields (the data entered by your site maintainers)
        $plugins = new K2Parameter($category->plugins, '', $this->pluginName);

        $output = $plugins->get('videoURL_cat');
        return $output;
    }

    // Event to display (in the frontend) the YouTube URL as entered in the user form
    public function onK2UserDisplay(&$user, &$params, $limitstart)
    {
        $app = JFactory::getApplication();

        // Get the output of the K2 plugin fields (the data entered by your site maintainers)
        $plugins = new K2Parameter($user->plugins, '', $this->pluginName);

        $output = $plugins->get('videoURL_user');
        return $output;
    }
    
    // Events to replace default commenting system
    public function onK2CommentsCounter(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }
    
    public function onK2CommentsBlock(&$item, &$params, $limitstart)
    {
        $app = JFactory::getApplication();
        return '';
    }
} // END CLASS
