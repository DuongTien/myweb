<?php
/**
 * Created by PhpStorm.
 * User: Duong Tien
 * Date: 8/26/14
 * Time: 8:51 AM
 */
if (!defined('GROUP_ADMIN')) { define('GROUP_ADMIN', 1); } // Default
if (!defined('GROUP_USER')) { define('GROUP_USER', 2); }
if (!defined('GROUP_MEMBER')) { define('GROUP_MEMBER', 3); }
if (!defined('SYSTEM_ID')) { define('SYSTEM_ID', 1); } // ID of Super Admin
if (!defined('MAX_IMAGE_SIZE')) { define('MAX_IMAGE_SIZE', 2097152); } // 2MB

//News
if(!defined('GROUP_NEWS')){define('GROUP_NEWS', 1);}
if(!defined('GROUP_HEATH')){define('GROUP_HEATH', 2);}
if(!defined('GROUP_ADVICE')){define('GROUP_ADVICE', 3);}
if(!defined('GROUP_INTRODUCE')){define('GROUP_INTRODUCE', 4);}

//ImageDir
if (!defined('BASE_UPLOAD_DIR')) {define('BASE_UPLOAD_DIR', WWW_ROOT.'img'.DS.'uploads'.DS);}

//image facebook link.
if (!defined('FACEBOOK_IMAGE_PREFIX')) {define('FACEBOOK_IMAGE_PREFIX', 'http://fbcdn-photos-g-a.akamaihd.net/hphotos-ak-xap1/');}

// upload file
if (!defined('UPLOAD_INVALID_TYPE')) {define('UPLOAD_INVALID_TYPE', 1);}
if (!defined('UPLOAD_INVALID_SIZE')) {define('UPLOAD_INVALID_SIZE', 2);}


$config['S']  = array(
    'News' => array(
        'group' => array(
            GROUP_NEWS => __('News'),
            GROUP_HEATH => __('Health'),
            GROUP_ADVICE => __('Advice')
        )
    ),
    'Users' => array(
        'group' => array(
            GROUP_ADMIN => __('Admin'),
            GROUP_USER => __('User'),
            GROUP_MEMBER => __('Member')
        )
    ),
    'uploadDir' => array(
    'User' => BASE_UPLOAD_DIR. 'users'.DS,
    'Location' => BASE_UPLOAD_DIR . 'locations'.DS,
    'Activity' => BASE_UPLOAD_DIR . 'activities'.DS,
    'Community' => BASE_UPLOAD_DIR . 'communities'.DS,
    'tmp'=>BASE_UPLOAD_DIR . 'tmp'.DS,
),
    'uploadUrl' => array
(
    'User' => 'uploads/users/',
    'Location' => 'uploads/locations/',
    'Activity' => 'uploads/activities/',
    'Community' => 'uploads/communities/',
),
    'cacheImageDir' => '/img/cache',
    'cacheImagePath' => WWW_ROOT . 'img/cache',
    'imageDir' => 'uploads/', /* => img/uploads/name.jpg */
    'imageProduct' => WWW_ROOT.'frontend'.DS.'images'.DS.'products'.DS,
    'imagePost' => WWW_ROOT.'frontend'.DS.'images'.DS.'posts'.DS
);