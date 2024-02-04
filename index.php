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

require_once __DIR__.'/../../config.php';

redirect(new moodle_url('/my'), get_string('no-access', 'local_firstlogin'));
