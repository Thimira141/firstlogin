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
        if ($plugin_config->enable_plugin && !$this->cookie_stat()) {
            // redirect user
            $url = new moodle_url("/$plugin_config->redirect_url");
            header("location: $url");
        }

    }

    // check the cookie is exists
    protected function cookie_stat()
    {
        if (!isset($_COOKIE['local_first_time_login'])) {
            // no cookie -> set cookie in web browser
            setcookie('local_first_time_login', 'true');
            return false;
        } else {
            return true;
        }
    }
}