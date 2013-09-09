<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * mutant_banjo theme with the underlying Bootstrap theme.
 *
 * @package    theme
 * @subpackage mutant_banjo
 * @copyright  &copy; 2013-onwards G J Barnard in respect to modifications of the Clean theme.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @author     Based on code originally written by Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function theme_mutant_banjo_process_css($css, $theme) {
    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_mutant_banjo_set_logo($css, $logo);

    // Set the fonts.
    if (!empty($theme->settings->fontbody)) {
        $fontcss = $theme->settings->fontbody;
    } else {
        $fontcss = null;
    }
    $css = theme_mutant_banjo_set_font($css, $fontcss, 'fontbody');
    if (!empty($theme->settings->fontheading)) {
        $fontcss = $theme->settings->fontheading;
    } else {
        $fontcss = null;
    }
    $css = theme_mutant_banjo_set_font($css, $fontcss, 'fontheading');

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_mutant_banjo_set_customcss($css, $customcss);

    return $css;
}

function theme_mutant_banjo_set_logo($css, $logo) {
    global $OUTPUT;
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function theme_mutant_banjo_set_font($css, $fontcss, $fontsetting) {
    global $CFG;
    $tag = '[[setting:'.$fontsetting.']]';
    $css = str_replace($tag, $fontcss, $css);
    $tag = '[[setting:fontwww]]';
    //$css = str_replace($tag, $CFG->wwwroot . '/theme/mutant_banjo/style/font/', $css);

    $syscontext = context_system::instance();
    $itemid = theme_get_revision();
    $url = moodle_url::make_file_url("$CFG->wwwroot/pluginfile.php", "/$syscontext->id/theme_mutant_banjo/font/$itemid/");
    // Now this is tricky because the we can not hard code http or https here, lets use the relative link.
    // Note: unfortunately moodle_url does not support //urls yet.
    $url = preg_replace('|^https?://|i', '//', $url->out(false));

    $css = str_replace($tag, $url, $css);
    return $css;
}

function theme_mutant_banjo_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function theme_mutant_banjo_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        if ($filearea === 'logo') {
           $theme = theme_config::load('mutant_banjo');
           return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } else if ($filearea === 'font') {
            global $CFG;
            if (!empty($CFG->themedir)) {
                $thefontpath = $CFG->themedir . '/mutant_banjo/style/font/';
            } else {
                $thefontpath = $CFG->dirroot . '/theme/mutant_banjo/style/font/';
            }

            //send_file($thefontpath.$args[1], $args[1]);  // Mime type detection not working?
            // Note: Third parameter is normally 'default' which is the 'lifetime' of the file.  Here set lower for development purposes.
            send_file($thefontpath.$args[1], $args[1], 20 , 0, false, false, 'font/opentype');
        } else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_mutant_banjo_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;

    $return->navbarclass = '';
    if (!empty($page->theme->settings->invert)) {
        $return->navbarclass .= ' navbar-inverse';
    }

    if (!empty($page->theme->settings->logo)) {
        $return->heading = html_writer::link($CFG->wwwroot, '', array('title' => get_string('home'), 'class' => 'logo'));
    } else {
        $return->heading = $output->page_heading();
    }

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">'.$page->theme->settings->footnote.'</div>';
    }

    return $return;
}
