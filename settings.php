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

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot . '/theme/mutant_banjo/admin_setting_sliderselect.php');

    $ADMIN->add('themes', new admin_category('theme_mutant_banjo', 'Mutant Banjo'));

    $generalsettings = new admin_settingpage('theme_mutant_banjo_general',  get_string('generalsettings', 'theme_mutant_banjo'));

    // Swatch slider...
    $noslidermode = false;
    $name = 'theme_mutant_banjo/colourswatch';
    $title = get_string('colourswatch', 'theme_mutant_banjo');
    $description = get_string('colourswatch_desc', 'theme_mutant_banjo');
    $default = 'a';
    $choices = array(
        'a' => get_string('blue', 'theme_mutant_banjo'),
        'b' => get_string('green', 'theme_mutant_banjo'),
        'c' => get_string('orange', 'theme_mutant_banjo'),
        'd' => get_string('pink', 'theme_mutant_banjo'),
        'e' => get_string('yellow', 'theme_mutant_banjo'),
        'f' => get_string('purple', 'theme_mutant_banjo'),
        'g' => get_string('red', 'theme_mutant_banjo')
    );
    $setting = new admin_setting_sliderselect($name, $title, $description, $default, $choices, $noslidermode,
                    'javascript', 460, 261, 'mutant_banjo', 'colourswatch', 'colourswatch');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Font slider...
    $noslidermode = false;
    $name = 'theme_mutant_banjo/fontbody';
    $title = get_string('fontbody', 'theme_mutant_banjo');
    $description = get_string('fontbody_desc', 'theme_mutant_banjo');
    $default = 'Cabin';
    $choices = array(// Note: Key must match filename without .otf.
        'Bellota' => get_string('bellota', 'theme_mutant_banjo'),
        'BPreplay' => get_string('bpreplay', 'theme_mutant_banjo'),
        'Cabin' => get_string('cabin', 'theme_mutant_banjo'),
        'CabinSketch' => get_string('cabinsketch', 'theme_mutant_banjo'),
        'HennyPenny' => get_string('hennypenny', 'theme_mutant_banjo'),
        'Quattrocento' => get_string('quattrocento', 'theme_mutant_banjo'),
        'QuattrocentoSans' => get_string('quattrocentosans', 'theme_mutant_banjo'),
        'QuicksandBook' => get_string('quicksandbook', 'theme_mutant_banjo'),
        'ShortStack' => get_string('shortstack', 'theme_mutant_banjo'),
        'SourceCodePro' => get_string('sourcecodepro', 'theme_mutant_banjo'),
        'VarelaRound' => get_string('varelaround', 'theme_mutant_banjo')
    );
    //$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting = new admin_setting_sliderselect($name, $title, $description, $default, $choices, $noslidermode,
                    'javascript', 500, 200, 'mutant_banjo', 'fontbody', 'font');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    $noslidermode = false;
    $name = 'theme_mutant_banjo/fontheading';
    $title = get_string('fontheading', 'theme_mutant_banjo');
    $description = get_string('fontheading_desc', 'theme_mutant_banjo');
    $default = 'VarelaRound';
    //$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting = new admin_setting_sliderselect($name, $title, $description, $default, $choices, $noslidermode,
                    'javascript', 500, 200, 'mutant_banjo', 'fontheading', 'font');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    // Invert Navbar to dark background.
    $name = 'theme_mutant_banjo/invert';
    $title = get_string('invert', 'theme_mutant_banjo');
    $description = get_string('invertdesc', 'theme_mutant_banjo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $generalsettings->add($setting);

    // Logo file setting.
    $name = 'theme_mutant_banjo/logo';
    $title = get_string('logo','theme_mutant_banjo');
    $description = get_string('logodesc', 'theme_mutant_banjo');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $generalsettings->add($setting);

    /* Number of social network links */
    $name = 'theme_mutant_banjo/nosociallinks';
    $title = get_string('nosociallinks', 'theme_mutant_banjo');
    $description = get_string('nosociallinks_desc', 'theme_mutant_banjo');
    $default = 2;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );
    $generalsettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    /* Number of carousel slides */
    $name = 'theme_mutant_banjo/noslides';
    $title = get_string('noslides', 'theme_mutant_banjo');
    $description = get_string('noslides_desc', 'theme_mutant_banjo');
    $default = 4;
    $choices = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16'
    );
    $generalsettings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    // Custom CSS file.
    $name = 'theme_mutant_banjo/customcss';
    $title = get_string('customcss', 'theme_mutant_banjo');
    $description = get_string('customcssdesc', 'theme_mutant_banjo');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $generalsettings->add($setting);

    // Footnote setting.
    $name = 'theme_mutant_banjo/footnote';
    $title = get_string('footnote', 'theme_mutant_banjo');
    $description = get_string('footnotedesc', 'theme_mutant_banjo');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $generalsettings->add($setting);

    $ADMIN->add('theme_mutant_banjo', $generalsettings);

    // Social links page....
    $socialsettings = new admin_settingpage('theme_mutant_banjo_social', get_string('socialheading', 'theme_mutant_banjo'));
    $socialsettings->add(new admin_setting_heading('theme_mutant_banjo_social', get_string('socialheadingsub', 'theme_mutant_banjo'),
            format_text(get_string('socialdesc' , 'theme_mutant_banjo'), FORMAT_MARKDOWN)));
    $nosociallinks = get_config('theme_mutant_banjo', 'nosociallinks');
    for ($i = 1; $i <= $nosociallinks; $i++) {
        // Social url setting.
        $name = 'theme_mutant_banjo/social'.$i;
        $title = get_string('socialnetworklink', 'theme_mutant_banjo').$i;
        $description = get_string('socialnetworklink_desc', 'theme_mutant_banjo').$i;
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $socialsettings->add($setting);

        // Social icon setting.
        $name = 'theme_mutant_banjo/socialicon'.$i;
        $title = get_string('socialnetworkicon', 'theme_mutant_banjo').$i;
        $description = get_string('socialnetworkicon_desc', 'theme_mutant_banjo').$i;
        $default = 'globe';
        $choices = array(
            'dropbox' => 'Dropbox',
            'facebook-square' => 'Facebook',
            'flickr' => 'Flickr',
            'github' => 'Github',
            'google-plus-square' => 'Google Plus',
            'instagram' => 'Instagram',
            'linkedin-square' => 'Linkedin',
            'pinterest-square' => 'Pinterest',
            'skype' => 'Skype',
            'tumblr-square' => 'Tumblr',
            'twitter-square' => 'Twitter',
            'users' => 'Unlisted',
            'vimeo-square' => 'Vimeo',
            'vk' => 'Vk',
            'globe' => 'Website',
            'youtube-square' => 'YouTube'
        );
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $socialsettings->add($setting);
    }
    $ADMIN->add('theme_mutant_banjo', $socialsettings);

    // Carousel....
    $slidesettings = new admin_settingpage('theme_mutant_banjo_slides', get_string('slidesheading', 'theme_mutant_banjo'));
    $slidesettings->add(new admin_setting_heading('theme_mutant_banjo_slides', get_string('slidesheadingsub', 'theme_mutant_banjo'),
            format_text(get_string('slidesdesc' , 'theme_mutant_banjo'), FORMAT_MARKDOWN)));
    $noslides = get_config('theme_mutant_banjo', 'noslides');
    for ($i = 1; $i <= $noslides; $i++) {
        // Title.
        $name = 'theme_mutant_banjo/slidetitle'.$i;
        $title = get_string('slidetitle', 'theme_mutant_banjo');
        $description = get_string('slidetitle_desc', 'theme_mutant_banjo');
        $setting = new admin_setting_configtext($name, $title, $description, '');
        $default = '';
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidesettings->add($setting);

        // Text.
        $name = 'theme_mutant_banjo/slidetext'.$i;
        $title = get_string('slidetext', 'theme_mutant_banjo');
        $description = get_string('slidetext_desc', 'theme_mutant_banjo');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $slidesettings->add($setting);

        // Image.
        $name = 'theme_mutant_banjo/slideimage'.$i;
        $title = get_string('slideimage', 'theme_mutant_banjo');
        $description = get_string('slideimage_desc', 'theme_mutant_banjo');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slideimage'.$i);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidesettings->add($setting);

        // Caption.
        $name = 'theme_mutant_banjo/slidecaption'.$i;
        $title = get_string('slidecaption', 'theme_mutant_banjo');
        $description = get_string('slidecaption_desc', 'theme_mutant_banjo');
        $setting = new admin_setting_configtextarea($name, $title, $description, '');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidesettings->add($setting);

        // URL.
        $name = 'theme_mutant_banjo/slideurl'.$i;
        $title = get_string('slideurl', 'theme_mutant_banjo');
        $description = get_string('slideurl_desc', 'theme_mutant_banjo');
        $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $slidesettings->add($setting);
    }
    $ADMIN->add('theme_mutant_banjo', $slidesettings);

}
