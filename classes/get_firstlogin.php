<?php
/**
 * first-login Plugin
 * 
 * @author      Thimira Dilshan
 * @package     first-login
 * @subpackage  wctheme
 * @copyright   WebComms Global (PVT) | Thimira Dilshan
 * @email       <webcommsglobal@gmail.com> | <thimirad865@gmail.com>
 * 
 * This Plugin comes with wctheme theme package.
 */

require_once __DIR__.'/../../../config.php';

final class local_firstlogin_get_firstlogin
{
    function __construct()
    {
        global $USER;

        $plugin_config = get_config('local_firstlogin');
        // check plugin status
        if ($plugin_config->enable_plugin && !(bool)$USER->core_welcome_message) {
            // redirect user
            $url = new moodle_url("/$plugin_config->redirect_url");
            header("location: $url");
        }

    }
}