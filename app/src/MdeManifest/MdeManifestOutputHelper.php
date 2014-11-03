<?php

namespace AboutMde;

use MarkdownExtended\MarkdownExtended;
use MarkdownExtended\API\ContentInterface;
use MarkdownExtended\API\OutputFormatInterface;
use MarkdownExtended\API\OutputFormatHelperInterface;
use MarkdownExtended\Helper as MDE_Helper;
use MarkdownExtended\Exception as MDE_Exception;
use MarkdownExtended\OutputFormat\HTMLHelper;

use AboutMde\AboutMdeOutput;

/**
 * DocBook output Helper
 *
 * All '$_defaults' entries can be overwritten in config.
 */
class AboutMdeOutputHelper extends HTMLHelper implements OutputFormatHelperInterface
{

    protected static $_defaults = array(
        'toc_max_level'     => '6',
        'toc_title'         => 'Table of contents',
        'toc_title_level'   => '4',
        'toc_id'            => 'toc',
        'toc_class'         => 'toc-menu',
        'toc_item_title'    => 'Reach this section',
        'permalink_mask_title' => 'Copy this link URL to get this title permanent link: %%',
        'permalink_title_separator' => ' - ',
        'toc_backlink_title'    => 'Click to go back to table of contents',
//        'backlink_onclick_mask' => "document.location.hash='%%'; return false;",
        'backlink_onclick_mask' => "return scrollToAnchor('#%%');",
        
    );

    public static function getConfigOrDefault($var)
    {
        $cfg_val = MarkdownExtended::getConfig($var);
        if (empty($cfg_val)) $cfg_val = self::$_defaults[$var];
        return $cfg_val;
    }

    /**
     * Build a hierarchical menu
     *
     * @param object $content \MarkdownExtended\API\ContentInterface
     * @param object $formater \MarkdownExtended\OutputFormatInterface
     *
     * @return string
     */
    public function getToc(ContentInterface $md_content, OutputFormatInterface $formater, array $attributes = null)
    {
        $cfg_toc_max_level = $this->getConfigOrDefault('toc_max_level');
        $cfg_toc_title = $this->getConfigOrDefault('toc_title');
        $cfg_toc_title_level = $this->getConfigOrDefault('toc_title_level');
        $cfg_toc_id = $this->getConfigOrDefault('toc_id');
        $cfg_toc_class = $this->getConfigOrDefault('toc_class');
        $cfg_toc_item_title = $this->getConfigOrDefault('toc_item_title');

        $menu = $md_content->getMenu();
        $content = $list_content = '';
        $max_level = isset($attributes['max_level']) ? $attributes['max_level'] : $cfg_toc_max_level;
        if (!empty($menu)) {
            $depth = 0;
            $current_level = null;
            foreach ($menu as $item_id=>$menu_item) {
                if (isset($max_level) && $menu_item['level']>$max_level) {
                    continue;
                }
                $diff = $menu_item['level']-(is_null($current_level) ? $menu_item['level'] : $current_level);
                if ($diff > 0) {
                    $list_content .= str_repeat('<ul><li>', $diff);
                } elseif ($diff < 0) {
                    $list_content .= str_repeat('</li></ul></li>', -$diff);
                    $list_content .= '<li>';
                } else {
                    if (!is_null($current_level)) $list_content .= '</li>';
                    $list_content .= '<li>';
                }
                $depth += $diff;
                $list_content .= $formater->buildTag('link', $menu_item['text'], array(
                    'href'=>'#'.$item_id,
                    'title'=>isset($attributes['toc_item_title']) ? $attributes['toc_item_title'] : $cfg_toc_item_title,
                ));
                $current_level = $menu_item['level'];
            }
            if ($depth!=0) {
                $list_content .= str_repeat('</ul></li>', $depth);
            }
            $content .= $formater->buildTag('title', $cfg_toc_title, array(
                'level'=>isset($attributes['toc_title_level']) ? $attributes['toc_title_level'] : $cfg_toc_title_level,
                'id'=>isset($attributes['toc_id']) ? $attributes['toc_id'] : $cfg_toc_id,
                'no-addon'=>true
            ));
            $content .= $formater->buildTag('unordered_list', $list_content, array(
                'class'=>isset($attributes['class']) ? $attributes['class'] : $cfg_toc_class,
            ));
        }
        return $content;
    }

}

// Endfile
