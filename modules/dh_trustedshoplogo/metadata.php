<?php
/**
 * Modul cached das Trusted Shop Bewertungssiegel auf dem lokalen Server.
 *
 * Im Template einbinden:
 * [{oxid_include_widget cl="dh_trustedshoplogo" nocookie=1 noscript=1}]
 */


/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'dh_trustedshoplogo',
    'title'       => 'TRUSTED SHOPS Siegel Cache',
    'description' => 'Das Siegel wird lokal gecached auf dem Server <br>Im Template einbinden: [{oxid_include_widget cl="dh_trustedshoplogo" nocookie=1 noscript=1}]',
    'thumbnail'   => 'dh_logo.jpg',
    'version'     => '1.0.0',
    'author'      => 'Dennis Heidtmann',
    'url'         => 'http://www.koffer-direkt.de',
    'email'       => 'dennis.heidtmann@koffer-direkt.de',
    'extend'      => array(),
    'files'       => array(
        'dh_trustedshoplogo' => 'dh_trustedshoplogo/widget/dh_trustedshoplogo.php'
    ),
    'templates' => array(
        'dh_trustedshoplogo.tpl' => 'dh_trustedshoplogo/template/dh_trustedshoplogo.tpl'
    ),
    'settings' => array(
        array('group' => 'main', 'name' => 'dh_Trusted_Shops_ID', 'type' => 'str',  'value' => '')
    ),
);