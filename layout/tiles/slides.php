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

$noslides    = (empty($PAGE->theme->settings->noslides)) ? false : $PAGE->theme->settings->noslides;
// If there are carousel slides links then they are shown.
if ($noslides) {
?>
    <div class="row-fluid">
        <div class="span12">
            <div id="myCarousel" class="carousel slide" data-interval="false" data-pause="hover">
                <ol class="carousel-indicators">
                <?php
                    $first = true;
                    for ($i = 1; $i <= $noslides; $i++) { ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if ($first) { echo 'class="active"'; $first = false; } ?>></li>
              <?php } ?>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                <?php
                    $first = true;
                    for ($i = 1; $i <= $noslides; $i++) {
                        $setting = 'slidetitle'.$i;
                        $title = get_config('theme_mutant_banjo', $setting);
                        $setting = 'slidetext'.$i;
                        $text = get_config('theme_mutant_banjo', $setting);
                        $setting = 'slideimage'.$i;
                        //$image = get_config('theme_mutant_banjo', $setting);
                        $imagesetting = get_config('theme_mutant_banjo', $setting);
                        if (!empty($imagesetting)) {
                            $image = $PAGE->theme->setting_file_url($setting, $setting);
                        } else {
                            $image = null;
                        }
                        $setting = 'slidecaption'.$i;
                        $caption = get_config('theme_mutant_banjo', $setting);
                        $setting = 'slideurl'.$i;
                        $url = get_config('theme_mutant_banjo', $setting);
                    ?>
                    <div class="<?php if ($first) { echo 'active '; $first = false; } ?> item">
                        <?php
                        if (!empty($url)) {
                            ?><a href="<?php echo $url; ?>">
                  <?php }
                        if (!empty($title)) {
                        ?>
                            <h1><?php echo $title; ?></h1>
                        <?php
                        }
                        if (!empty($text)) { ?>
                        <div class="row-fluid nolist carouseltext">
                            <div class="span10 offset1">
                                <?php echo $text; ?>
                            </div>
                        </div>
                        <?php
                        }
                        if (!empty($image)) { ?>
                        <div class="row-fluid nolist carouselimage">
                            <div class="span12">
                                <img src="<?php echo $image; ?>"></img>
                            </div>
                        </div>
                        <?php
                        }
                        if (!empty($caption)) { ?>
                        <div class="carousel-caption">
                            <h4><?php echo $caption; ?></h4>
                        </div>
                        <?php
                        }
                        if (!empty($url)) {
                            ?></a>
                        <?php }
                        ?>
                    </div>
                <?php } ?>
                </div>
            <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-circle-left"></i></a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
<?php 
}
?>
