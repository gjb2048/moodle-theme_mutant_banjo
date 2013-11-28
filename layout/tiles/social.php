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
 * Mutant Banjo theme with the underlying Bootstrap theme.
 *
 * @package    theme
 * @subpackage mutant_banjo
 * @copyright  &copy; 2013-onwards G J Barnard in respect to modifications of the Clean theme.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$nosociallinks    = (empty($PAGE->theme->settings->nosociallinks)) ? false : $PAGE->theme->settings->nosociallinks;
?>
<div class="row-fluid">
<?php
    // If there are social links then they are displayed.
    if ($nosociallinks) {
    ?>
    <div class="span12">
        <p id="socialheading"><?php echo get_string('socialnetworks', 'theme_mutant_banjo')?></p>
        <ul class="socialnetworks">
        <?php
            for ($i = 1; $i <= $nosociallinks; $i++) {
                $name = 'social'.$i;
                $value = get_config('theme_mutant_banjo', $name);
                $iconname = 'socialicon'.$i;
                $iconvalue = get_config('theme_mutant_banjo', $iconname);
                if (!empty($value)) { ?>
                    <li><a href="<?php echo $value; ?>" target="_blank" class="googleplus"><i class="fa fa-2x fa-<?php echo $iconvalue ?>"></i></a></li>
            <?php } ?>
        <?php } ?>
        </ul>
    </div>
    <?php 
    }
    ?>
</div>