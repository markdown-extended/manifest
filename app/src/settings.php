<?php
#
# Global settings for builders
#

// PHP settings
ini_set('display_errors', 0);
set_error_handler('error_handler');
set_exception_handler('exception');

// required cli_library
if (file_exists($cli_library = __DIR__.'/../bin/cli-functions.php')) {
    require_once $cli_library;
} else {
    die("> ERROR !! - cli_library '$cli_library' not found!");
}

// defaults
settings('app_root',            realpath(__DIR__.'/..'));
settings('document_root',       realpath(settings('app_root').'/..'));
settings('app_vendor',          realpath(settings('app_root').'/vendor'));
settings('app_bin',             realpath(settings('app_root').'/bin'));
settings('html5_quick_template',realpath(settings('app_vendor').'/piwi/html5-quick-template/html5-quick-template.html.php'));
settings('mde_console',         realpath(settings('app_bin').'/markdown-extended'));
settings('mde_manifest',        realpath(settings('document_root').'/mde-manifest.md'));
settings('template_file',       settings('app_root').'/bin/mde-template.html');
settings('target_file',         settings('document_root').'/index.html');
settings('version_files',       array('mde_manifest'));
settings('php_bin',             'php');

// MDE source
$documentation = settings('mde_manifest');
if (!file_exists($documentation)) {
    error("original documentation file '$documentation' not found!");
}

// template file path
$html5_quick_template = settings('html5_quick_template');
if (!file_exists($html5_quick_template)) {
    error("quick template app '$html5_quick_template' not found!");
}

// MDE binaries path
$mde_console = settings('mde_console');
if (!file_exists($mde_console)) {
    error("Markdown Extended console '$mde_console' not found!");
}

// MDE version
$mde_version = exec(settings('php_bin').' '.$mde_console.' -qV');

// brand header link
$self = 'index.html';

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
//$metas = '{% META %}';

// MDE repository
$stamp_url = 'http://github.com/markdown-extended/manifest';
$stamp_title = 'See the MDE specifications sources on Github';

// page notice
$page_notice = 'Content rendered from a <a href="http://github.com/piwi/markdown-extended" title="github.com/piwi/markdown-extended">Markdown Extended</a> content&nbsp;&dash;&nbsp;<a href="mde-manifest.md" title="See plain text version of this content">See raw content</a>';

// page menu
$menu = array(
    array('url'=>'test-suite/', 'title'=>'See the full test suite of the specifications', 'content'=>'Test-Suite'),
);

// MathJax.js
//$scripts = array('http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML');

// options
$settings = array();
$settings['app_mode'] = 'dev';
$settings['charset'] = '{% CHARSET %}';
$settings['brand_icon'] = '<img src="modules/markdown-mark/png/32x20-solid.png" />';
$settings['brand_title'] = 'the MDE manifest';
$settings['menu_item_content_stamp'] = function() use (&$stamp_url, &$stamp_title) {
    $icon = hqt_safestring(hqt_setting('menu_item_content_stamp_icon'));
    return '<a title="'.hqt_safestring($stamp_title).'" href="'.hqt_safestring($stamp_url).'">'.$icon.'MDE</a>';
};
$settings['navbar_items'] = array('menu', 'toc', 'top', 'bottom');
$settings['language_strings'] = array();
$settings['language_strings']['toc_block_header'] = '';
$settings['language_strings']['notes_block_header'] = '';
$settings['profiler_user_stack'] = array(
    'MDE' => $mde_version
);
$settings['app_name'] = 'the MDE manifest';
$settings['app_description'] = 'The new way of writing for the web';
$settings['app_infos'] = array(
    'license' => '<a href="http://creativecommons.org/licenses/by/3.0/" title="See online">Creative Commons BY 3.0</a>',
    'maintainer' => '<a href="http://github.com/piwi" title="See online">@pierowbmstr</a>',
    'sources &amp; updates' => '<a href="http://github.com/markdown-extended/manifest" title="See online">http://github.com/markdown-extended/manifest</a>',
);
$settings['app_dependencies'] = array(
    array('name'=>$mde_version, 'home'=>'http://github.com/piwi/markdown-extended', 'license'=>'BSD 3.0 license', 'license_url'=>'http://opensource.org/licenses/BSD-3-Clause'),
    array('name'=>'html5 quick template', 'version'=>'1.2.1', 'home'=>'http://github.com/piwi/html5-quick-template', 'license'=>'Apache 2.0 license', 'license_url'=>'http://www.apache.org/licenses/LICENSE-2.0.html'),
    array('name'=>'jQuery', 'version'=>'1.11.0', 'home'=>'http://jquery.com/', 'license'=>'MIT license', 'license_url'=>'http://github.com/jquery/jquery/blob/master/MIT-LICENSE.txt'),
    array('name'=>'Bootstrap', 'version'=>'3.1.1', 'home'=>'http://getbootstrap.com/', 'license'=>'Apache license v2.0', 'license_url'=>'http://www.apache.org/licenses/LICENSE-2.0'),
    array('name'=>'Font Awesome', 'version'=>'4.0.3', 'home'=>'http://fortawesome.github.io/Font-Awesome', 'license'=>'SIL OFL 1.1 license', 'license_url'=>'http://scripts.sil.org/OFL'),
    array('name'=>'HTML5shiv', 'version'=>'3.7.0', 'home'=>'http://code.google.com/p/html5shiv/', 'license'=>'MIT license', 'license_url'=>'http://www.opensource.org/licenses/mit-license.php'),
    array('name'=>'Respond.js', 'version'=>'1.4.2', 'home'=>'http://github.com/scottjehl/Respond', 'license'=>'MIT license', 'license_url'=>'http://www.opensource.org/licenses/mit-license.php'),
);
$settings['app_about_notice'] = 'To follow specifications updates or transmit a bug, please have a look at the GitHub repository at <a href="http://github.com/markdown-extended/manifest" title="See sources on GitHub">markdown-extended/manifest</a>.';
$settings['app_manual_url'] = 'https://github.com/markdown-extended/manifest/tree/gh-pages';
$settings['profiler_stack'] = array(
    'profiler-request' => function() {
            return '<a id="' . hqt_internalid('profiler-request') . '" class="insert-request"></a>';
        },
    'profiler_apps' => function() { return HQT_NAME.' '.HQT_VERSION; },
    'profiler_date' => date('c') . ' (' . @date_default_timezone_get() . ')',
    'profiler-user-agent' => '',
);
