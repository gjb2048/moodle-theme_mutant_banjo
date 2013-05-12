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

    // Swatch slider...
    $noslidermode = true;
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
                    'javascript', 340, 360, 'mutant_banjo', 'colourswatch');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Font slider...
    $noslidermode = false;
    $name = 'theme_mutant_banjo/font';
    $title = get_string('font', 'theme_mutant_banjo');
    $description = get_string('font_desc', 'theme_mutant_banjo');
    $default = 'BPrelay';
    $choices = array(// Note: Key must match filename without .otf.
        'BPrelay' => get_string('bprelay', 'theme_mutant_banjo'),
        'Cabin' => get_string('cabin', 'theme_mutant_banjo'),
        'CabinSketch' => get_string('cabinsketch', 'theme_mutant_banjo'),
        'Quattrocento' => get_string('quattrocento', 'theme_mutant_banjo'),
        'QuattrocentoSans' => get_string('quattrocentosans', 'theme_mutant_banjo'),
        'QuicksandBook' => get_string('quicksandbook', 'theme_mutant_banjo'),
        'ShortStack' => get_string('shortstack', 'theme_mutant_banjo'),
        'SourceCodePro' => get_string('sourcecodepro', 'theme_mutant_banjo')
    );
    //$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting = new admin_setting_sliderselect($name, $title, $description, $default, $choices, $noslidermode,
                    'javascript', 500, 200, 'mutant_banjo', 'font');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Invert Navbar to dark background.
    $name = 'theme_mutant_banjo/invert';
    $title = get_string('invert', 'theme_mutant_banjo');
    $description = get_string('invertdesc', 'theme_mutant_banjo');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $settings->add($setting);

    // Logo file setting.
    $name = 'theme_mutant_banjo/logo';
    $title = get_string('logo','theme_mutant_banjo');
    $description = get_string('logodesc', 'theme_mutant_banjo');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_mutant_banjo/customcss';
    $title = get_string('customcss', 'theme_mutant_banjo');
    $description = get_string('customcssdesc', 'theme_mutant_banjo');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_mutant_banjo/footnote';
    $title = get_string('footnote', 'theme_mutant_banjo');
    $description = get_string('footnotedesc', 'theme_mutant_banjo');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);
}
