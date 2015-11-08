<?php
/**
 * Config-file for Anax. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();


/**
 * Define swe paths.
 *
 */
define('SWE_INSTALL_PATH', __DIR__ . '/../swe');
define('SWE_THEME_PATH', SWE_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(SWE_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Create the swe variable.
 *
 */
$swe = array();


/**
 * Site wide settings.
 *
 */
$swe['lang']         = 'sv';
$swe['title_append'] = ' | oophp';

$swe['header'] = <<<EOD
<img class='sitelogo' src='img/SWE.png' alt='swe Logo'/>
<span class='sitetitle'>Me oophp</span>
EOD;

$swe['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Andreas Giannoudis | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

$swe['byline'] = <<<EOD
<footer class="byline">
<figure class="right top opacity radius"><img id="byline" src="img/me.jpg" alt="Andreas bild" ></figure>
<p>Utvecklaren heter Andreas Giannoudis och han läser webbprogrammering första året på BTH.</p>
</footer>
EOD;



/**
 * The navbar
 *
 */
//$swe['navbar'] = null; // To skip the navbar
$swe['navbar'] = array(
  'class' => 'nb-plain',
  'items' => array(
    'hem'         => array('text'=>'Hem',         'url'=>'me.php',          'title' => 'Min presentation om mig själv'),
    'redovisning' => array('text'=>'Redovisning', 'url'=>'redovisning.php', 'title' => 'Redovisningar för kursmomenten'),
    'dump()'      => array('text'=>'Testa dump()', 'url'=>'dump.php',       'title' => 'Testa dump()'),
    'kallkod'     => array('text'=>'Källkod',     'url'=>'source.php',      'title' => 'Se källkoden'),
  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);



/**
 * Theme related settings.
 *
 */
//$swe['stylesheet'] = 'css/style.css';
$swe['stylesheets'] = array('css/style.css');
$swe['favicon']    = 'favicon.ico';



/**
 * Settings for JavaScript.
 *
 */
$swe['modernizr']  = 'js/modernizr.js';
//$swe['jquery']     = null; // To disable jQuery
$swe['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$swe['jquery_src'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$swe['javascript_include'] = array();
//$swe['javascript_include'] = array('js/main.js'); // To add extra javascript files



/**
 * Google analytics.
 *
 */
$swe['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
