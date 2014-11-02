#!/usr/bin/env php
<?php
#
# PHP-script to re-generate the MDE quick template
#

// required cli_library
if (file_exists($cli_library = __DIR__.'/../modules/php-cli-functions/cli-functions.php')) {
    require_once $cli_library;
} else {
    die("> ERROR !! - cli_library '$cli_library' not found!");
}

// required settings
if (file_exists($opts = __DIR__.'/settings.php')) {
    require_once $opts;
} else {
    die("> ERROR !! - settings '$opts' not found!");
}

// usage string & exit
function usage($status = 0) {
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
    exit($status);
}

// usage info if so
if (count($argv)>1 && in_array($argv[1], array('help', '-h', '--help')) && function_exists('usage')) {
    usage(); exit();
}

// debug info if so
if (count($argv)>1 && in_array($argv[1], array('-x', '--debug'))) {
    debug(settings());
    exit();
}

// generate HTML template
ob_start();
require $html5_quick_template;
$_tpl = ob_get_contents();
ob_end_clean();

// write it in $target_file
$target_file        = settings('document_root').settings('target_file');
$tmp_target_file    = settings('document_root').settings('template_file');
$mde_manifest       = settings('document_root').settings('mde_manifest');
if ($ok = file_put_contents($tmp_target_file, $_tpl, LOCK_EX)) {
    info("template updated in file '$tmp_target_file' with string of length ".strlen($_tpl));
    if ($ok = exec('php '.$mde_console.' -t='.$tmp_target_file.' -o='.$target_file.' '.$mde_manifest)) {
        info("index updated in file '$target_file' parsing '$mde_manifest'");
    } else {
        error("an error occurred while trying to write in file '$target_file'!");
    }
} else {
    error("an error occurred while trying to write in file '$tmp_target_file'!");
}
