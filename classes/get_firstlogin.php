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

use core\exception\moodle_exception;

final class local_firstlogin_get_firstlogin
{
    protected string $cookieName = "MOODLE_LOCAL_FIRSTTIMELOGIN";
    function __construct()
    {
        global $USER;

        $plugin_config = get_config('local_firstlogin');
        // check plugin status
        if ($plugin_config->enable_plugin && $this->is_first_login($USER->id)) {
            // redirect user
            $url = new moodle_url("/$plugin_config->redirect_url");
            header("location: $url");
        }

    }

    /**
     * Summary of is_first_login
     * @param mixed $userID
     * @return bool
     * @author Thimira Dilshan <thimirad865@gmail.com>
     */
    public function is_first_login($userID)
    {
        // if course enroll == 0 then new user
        return !count(enrol_get_users_courses($userID, false, 'id')) > 0;
    }
}