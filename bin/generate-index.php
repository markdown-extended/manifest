#!/usr/bin/env php
<?php
#
# PHP-script to re-generate the index.html file
#

// PHP settings not required for template usage
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
$dtmz = @date_default_timezone_get();
@date_default_timezone_set($dtmz?:'Europe/Paris');

// lib
function settings($var, $val = null, $default = null)
{
    static $settings = array();
    if (!empty($val)) {
        $settings[$var] = $val;
    } else {
        return (array_key_exists($var, $settings) ? $settings[$var] : $default);
    }
}

function usage()
{
    $args                   = settings('argv');
    $html5_quick_template   = settings('html5_quick_template');
    $mde_console            = settings('mde_console');
    $mde_manifest           = settings('mde_manifest');
    echo <<<EOT

usage:  php  {$args[0]}  <manifest.md>  <html5-quick-template-path>  <mde-console-path>

defaults from DOCUMENT_ROOT:
    <manifest.md>                   : {$mde_manifest}
    <html5-quick-template-path>     : {$html5_quick_template}
    <mde-console-path>              : {$mde_console}


EOT;
}

function error($str)
{
    echo "ERROR > ".$str.PHP_EOL; usage(); exit();
}

function info($str)
{
    echo "OK > ".$str.PHP_EOL; exit();
}

// defaults
settings('argv', $argv);
settings('document_root', __DIR__.'/../');
settings('html5_quick_template', 'modules/html5-quick-template/html5-quick-template.html.php');
settings('mde_console', 'modules/markdown-extended/bin/markdown-extended');
settings('mde_manifest', 'mde-manifest.md');
settings('tmp_target_file', 'index.html.template');
settings('target_file', 'index.html');

// usage info
if (count($argv)>1 && in_array($argv[1], array('help', '-h', '--help'))) {
    usage(); exit();
}

// template file path
$html5_quick_template = (isset($argv[1]) ? $argv[1] : realpath(settings('document_root').settings('html5_quick_template')));
if (!file_exists($html5_quick_template)) {
    error("quick template app '$html5_quick_template' not found!");
}

// MDE binaries path
$mde_console = (isset($argv[2]) ? $argv[2] : realpath(settings('document_root').settings('mde_console')));
if (!file_exists($mde_console)) {
    error("Markdown Extended console '$mde_console' not found!");
}

// MDE version
$mde_version = exec('php '.$mde_console.' -qV');

// page last update
$update = '{% DATE %}';

// page title
$title = '';

// page content
$content = '{% BODY %}';

// page table of contents
//$toc = '{% TOC %}';

// content notes
//$notes = '{% NOTES %}';

// additional header meta tags
$metas = '{% META %}';

// MDE repository
$stamp_url = 'http://github.com/markdown-extended/manifest';
$stamp_title = 'See the Markdown Extended specifications sources';

// page notice
//$page_notice = 'Content rendered from a <a href="http://github.com/piwi/markdown-extended" title="github.com/piwi/markdown-extended">Markdown Extended</a> content&nbsp;&dash;&nbsp;<a href="?plain" title="See plain text version of this content">See raw content</a>';

// MathJax.js
//$scripts = array('http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML');

// options
$settings = array();
$settings['app_mode'] = 'dev';
$settings['charset'] = '{% CHARSET %}';
$settings['brand_icon'] = '<i class="fa fa-file-text"></i>';
$settings['brand_title'] = '{% TITLE %}';
$settings['menu_item_content_stamp'] = function() use (&$stamp_url, &$stamp_title) {
    $icon = hqt_safestring(hqt_setting('menu_item_content_stamp_icon'));
    return '<a title="'.hqt_safestring($stamp_title).'" href="'.hqt_safestring($stamp_url).'">'.$icon.'MDE</a>';
};
$settings['navbar_items'] = array(/*'toc',*/ 'top', 'bottom');
$settings['language_strings'] = array();
$settings['language_strings']['toc_block_header'] = '';
$settings['language_strings']['notes_block_header'] = '';
$settings['profiler_user_stack'] = array(
    'MDE' => $mde_version
);
$settings['app_name'] = $mde_version;
$settings['app_description'] = 'The new way of writing for the web';
$settings['app_infos'] = array(
    'license' => '<a href="http://opensource.org/licenses/BSD-3-Clause" title="See online">BSD-3-Clause open source license</a>',
    'maintainer' => '<a href="http://github.com/piwi" title="See online">@pierowbmstr</a>',
    'sources &amp; updates' => '<a href="http://github.com/piwi/markdown-extended" title="See online">http://github.com/piwi/markdown-extended</a>',
    'documentation' => '<a href="http://aboutmde.org/" title="See online">aboutmde.org</a>',
);
$settings['app_dependencies'] = array(
    array('name'=>'PHP Markdown Extended', 'version'=>'gamma', 'home'=>'http://github.com/piwi/markdown-extended', 'license'=>'BSD 3.0 license', 'license_url'=>'http://opensource.org/licenses/BSD-3-Clause'),
    array('name'=>'html5 quick template', 'version'=>'1.2.1', 'home'=>'http://github.com/piwi/html5-quick-template', 'license'=>'Apache 2.0 license', 'license_url'=>'http://www.apache.org/licenses/LICENSE-2.0.html'),
    array('name'=>'jQuery', 'version'=>'1.11.0', 'home'=>'http://jquery.com/', 'license'=>'MIT license', 'license_url'=>'http://github.com/jquery/jquery/blob/master/MIT-LICENSE.txt'),
    array('name'=>'Bootstrap', 'version'=>'3.1.1', 'home'=>'http://getbootstrap.com/', 'license'=>'Apache license v2.0', 'license_url'=>'http://www.apache.org/licenses/LICENSE-2.0'),
    array('name'=>'Font Awesome', 'version'=>'4.0.3', 'home'=>'http://fortawesome.github.io/Font-Awesome', 'license'=>'SIL OFL 1.1 license', 'license_url'=>'http://scripts.sil.org/OFL'),
    array('name'=>'HTML5shiv', 'version'=>'3.7.0', 'home'=>'http://code.google.com/p/html5shiv/', 'license'=>'MIT license', 'license_url'=>'http://www.opensource.org/licenses/mit-license.php'),
    array('name'=>'Respond.js', 'version'=>'1.4.2', 'home'=>'http://github.com/scottjehl/Respond', 'license'=>'MIT license', 'license_url'=>'http://www.opensource.org/licenses/mit-license.php'),
);
//$settings['app_about_notice'] = 'To follow sources updates, create a fork of the template or transmit a bug, please have a look at the GitHub repository at <a href="http://github.com/markdown-extended" title="See sources on GitHub">piwi/markdown-extended</a>.';
//$settings['app_manual_url'] = 'http://aboutmde.org';

// generate HTML template
ob_start();
require $html5_quick_template;
$_tpl = ob_get_contents();
ob_end_clean();

// write it in $target_file
$target_file        = settings('document_root').settings('target_file');
$tmp_target_file    = settings('document_root').settings('tmp_target_file');
$mde_manifest       = settings('mde_manifest', 'mde-manifest.md');
if ($ok = file_put_contents($tmp_target_file, $_tpl, LOCK_EX)) {
    info("template updated in file '$tmp_target_file' with string of length ".strlen($_tpl));
    if ($ok = exec('php '.$mde_console.' -t '.$tmp_target_file.' -o '.$tmp_target_file.' '.$mde_manifest)) {
        info("index updated in file '$target_file' parsing '$mde_manifest' with string of length ".strlen($_tpl));
    } else {
        error("an error occured while trying to write in file '$target_file'!");
    }
} else {
    error("an error occured while trying to write in file '$tmp_target_file'!");
}
