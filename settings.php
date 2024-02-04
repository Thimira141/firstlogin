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

defined('MOODLE_INTERNAL') || die();

require_login();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_firstlogin', get_string('pluginname', 'local_firstlogin'));
    // create settings link
    $ADMIN->add('localplugins', $settings);
    
    // plugin page
    $settings->add(new admin_setting_heading(
        'heading',
        get_string('pluginname', 'local_firstlogin'),
        'plugin-description'
    ));
    // plugin enable checkbox
    $settings->add(new admin_setting_configcheckbox(
        'local_firstlogin/enable_plugin',
        get_string('plugin-enable', 'local_firstlogin'),
        get_string('plugin-enable-description', 'local_firstlogin'),
        true
    ));
    // select redirect url
    $default_urls = [
        'local/eveluation' => get_string('local-eveluation', 'local_firstlogin'),
        'my' => get_string('my', 'local_firstlogin')
    ];
    $settings->add(new admin_setting_configselect(
        'local_firstlogin/redirect_url',
        get_string('select-url', 'local_firstlogin'),
        get_string('select-url-description', 'local_firstlogin'),
        'local/eveluation',
        $default_urls
    ));
}