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
 * Settings for the mutant_banjo theme.
 *
 * @package    theme.
 * @subpackage mutant_banjo.
 * @version    See the value of '$plugin->version' in version.php.
 * @copyright  &copy; 2013-onwards Gareth J Barnard - May 2013.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */
class admin_setting_sliderselect extends admin_setting {

    /** @var array Array of choices value=>label */
    public $choices;
    private $noslidermode;
    private $javascriptfolder;
    private $imagewidth;
    private $imageheight;
    private $themename;
    private $settingname;
    private $imageprefix;

    /**
     * Constructor
     * @param string $name unique ascii name, either 'mysetting' for settings that in config, or 'myplugin/mysetting' for ones in config_plugins.
     * @param string $visiblename localised
     * @param string $description long localised info
     * @param string|int $defaultsetting The key value for the default setting.
     * @param array $choices array of $key=>$value (label) for each selection
     * @param boolean $noslidermode For when you want to use text instead for supportung mobiles and creating the images.
     * @param string $javascriptfolder Name of the 'javascript' folder within the theme.
     * @param int $imagewidth The width of the image.
     * @param int $imageheight The height of the image.
     * @param string $themename The name of the theme, e.g. 'mutant_banjo'.
     * @param string $settingname The name of the setting, e.g. 'colourswatch'.  This is used to prefix the image name in your 'pix' folder, e.g, 'colourswatch-choices array key' where 'choices array key' is the key you want the image associated with, i.e. 'a' for "'a' => get_string('blue', 'theme_moobile')".
     * @param string $imageprefix The prefix of the associated image file, useful for when using the same set of images in two settings.
     */
    public function __construct($name, $visiblename, $description, $defaultsetting, $choices, $noslidermode, $javascriptfolder, $imagewidth, $imageheight, $themename, $settingname, $imageprefix) {
        $this->choices = $choices;
        $this->noslidermode = $noslidermode;
        $this->javascriptfolder = $javascriptfolder;
        $this->imagewidth = $imagewidth;
        $this->imageheight = $imageheight;
        $this->themename = $themename;
        $this->settingname = $settingname;
        $this->imageprefix = $imageprefix;
        parent::__construct($name, $visiblename, $description, $defaultsetting);
    }

    /**
     * This function may be used in ancestors for lazy loading of choices
     *
     * Override this method if loading of choices is expensive, such
     * as when it requires multiple db requests.
     *
     * @return bool true if loaded, false if error
     */
    public function load_choices() {
        /*
          if (is_array($this->choices)) {
          return true;
          }
          .... load choices here
         */
        return true;
    }

    /**
     * Check if this is $query is related to a choice
     *
     * @param string $query
     * @return bool true if related, false if not
     */
    public function is_related($query) {
        if (parent::is_related($query)) {
            return true;
        }
        if (!$this->load_choices()) {
            return false;
        }
        foreach ($this->choices as $key => $value) {
            if (strpos(textlib::strtolower($key), $query) !== false) {
                return true;
            }
            if (strpos(textlib::strtolower($value), $query) !== false) {
                return true;
            }
        }
        return false;
    }

    /**
     * Return the setting
     *
     * @return mixed returns config if successful else null
     */
    public function get_setting() {
        return $this->config_read($this->name);
    }

    /**
     * Save a setting
     *
     * @param string $data
     * @return string empty of error string
     */
    public function write_setting($data) {
        if (!$this->load_choices() or empty($this->choices)) {
            return '';
        }
        if (!array_key_exists($data, $this->choices)) {
            return ''; // ignore it
        }

        return ($this->config_write($this->name, $data) ? '' : get_string('errorsetting', 'admin'));
    }

    /**
     * Returns XHTML select field
     *
     * Ensure the options are loaded, and generate the XHTML for the select
     * element and any warning message. Separating this out from output_html
     * makes it easier to subclass this class.
     *
     * @param string $data the option to show as selected.
     * @param string $current the currently selected option in the database, null if none.
     * @param string $default the default selected option.
     * @return array the HTML for the select element, and a warning message.
     */
    public function output_select_html($data, $current, $default, $extraname = '') {
        if (!$this->load_choices() or empty($this->choices)) {
            return array('', '');
        }

        $warning = '';
        if (is_null($current)) {
            // first run
        } else if (empty($current) and (array_key_exists('', $this->choices) or array_key_exists(0, $this->choices))) {
            // no warning
        } else if (!array_key_exists($current, $this->choices)) {
            $warning = get_string('warningcurrentsetting', 'admin', s($current));
            if (!is_null($default) and $data == $current) {
                $data = $default; // use default instead of first value when showing the form
            }
        }

        if ($this->noslidermode == true) {
            $selecthtml = '<select id="' . $this->get_id() . '" name="' . $this->get_full_name() . $extraname . '">';
            foreach ($this->choices as $key => $value) {
                // the string cast is needed because key may be integer - 0 is equal to most strings!
                $selecthtml .= '<option value="' . $key . '"' . ((string) $key == $data ? ' selected="selected"' : '') . '>' . $value . '</option>';
            }
            $selecthtml .= '</select>';
        } else {
            global $PAGE, $CFG;
            $PAGE->requires->js('/theme/' . $this->themename . '/' . $this->javascriptfolder . '/yui_bxslider_'. $this->settingname .'.js');

            $selecthtml = html_writer::start_tag('input', array('type' => 'text', 'style' => 'display:none;', 'id' => $this->get_id(), 'class' => $this->themename . $this->settingname . 'input', 'name' => $this->get_full_name(), 'value' => $data));
            $selecthtml .= html_writer::end_tag('input'); // Getting odd results with html_writer::empty_tag in terms of non-closure and tag then becoming a container for everything afterwards.
            $selecthtml .= html_writer::start_tag('div', array('class' => 'bxslider-container', 'style' => 'width: ' . $this->imagewidth . 'px; height: ' . ($this->imageheight + 20) . 'px; padding-bottom: 2em;')); // Padding to shove the default info underneath the controls
            $selecthtml .= html_writer::start_tag('ul', array('id' => $this->settingname . '-bxslider', 'style' => 'width: ' . $this->imagewidth . 'px; height: ' . $this->imageheight . 'px; padding: 0; margin: 0;'));
            $index = 0;
            $startslide = 0;
            foreach ($this->choices as $key => $value) {
                $selecthtml .= html_writer::start_tag('li');
                $selecthtml .= html_writer::start_tag('img', array('src' => $CFG->wwwroot . '/theme/' . $this->themename . '/pix/' . $this->imageprefix . '-' . $key . '.png', 'style' => 'width: ' . $this->imagewidth . 'px; height: ' . $this->imageheight . 'px', 'class' => $this->themename . $this->settingname . 'image-' . $index, $this->themename . $this->settingname => $key, 'title' => $value)); // Cannot use pix_url as theme might be different.
                $selecthtml .= html_writer::end_tag('img');
                $selecthtml .= html_writer::end_tag('li');
                // the string cast is needed because key may be integer - 0 is equal to most strings!
                if ((string) $key == $data) {
                    $startslide = $index;
                }
                $index = $index + 1;
            }
            $selecthtml .= html_writer::end_tag('ul');
            $selecthtml .= html_writer::end_tag('div');
            // Helper to get bxslider css:
            $selecthtml .= html_writer::start_tag('div', array('id' => $this->themename . $this->settingname . 'wwwroot', 'style' => 'display:none;', 'wwwroot' => $CFG->wwwroot, 'startslide' => $startslide, 'width' => $this->imagewidth));
            $selecthtml .= html_writer::end_tag('div');
        }
        return array($selecthtml, $warning);
    }

    /**
     * Returns XHTML select field and wrapping div(s)
     *
     * @see output_select_html()
     *
     * @param string $data the option to show as selected
     * @param string $query
     * @return string XHTML field and wrapping div
     */
    public function output_html($data, $query = '') {
        $default = $this->get_defaultsetting();
        $current = $this->get_setting();

        list($selecthtml, $warning) = $this->output_select_html($data, $current, $default);
        if (!$selecthtml) {
            return '';
        }

        if (!is_null($default) and array_key_exists($default, $this->choices) and ($this->noslidermode == true)) {
            $defaultinfo = $this->choices[$default];
        } else {
            $defaultinfo = NULL;
        }

        $return = html_writer::tag('div', $selecthtml, array('class' => 'form-select defaultsnext'));

        return format_admin_setting($this, $this->visiblename, $return, $this->description, true, $warning, $defaultinfo, $query);
    }
}