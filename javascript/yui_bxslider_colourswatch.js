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
 * YUI jQuery and customisations loader for the mutant_banjo theme.
 *
 * @package    theme.
 * @subpackage mutant_banjo.
 * @version    See the value of '$plugin->version' in version.php.
 * @copyright  &copy; 2013-onwards Gareth J Barnard - May 2013.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}.
 * @thanks     Thanks to Andrew Nicols for supplying the code skeleton - https://moodle.org/user/profile.php?id=268794 & http://jsfiddle.net/andrewnicols/WaFDA/.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */
/*                     fullpath: M.cfg.wwwroot + '/theme/mutant_banjo/javascript/jquery-1.8.2.min.js' */
YUI.applyConfig({
    groups: {
        'jquery': {
            async: false,
            combine: true,
            modules: {
                'jquery': {
                    fullpath: M.cfg.wwwroot + '/lib/jquery/jquery-1.10.2.min.js'
                },
                'jquery-bxslider': {
                    fullpath: M.cfg.wwwroot + '/theme/mutant_banjo/javascript/jquery.bxslider/jquery.bxslider.min.js',
                    requires: ['jquery']
                }
            }
        }
    }
});
YUI().use('jquery-bxslider', function(Y) {
    var wwwroot = $('div #mutant_banjocolourswatchwwwroot').attr('wwwroot');
    $('head').append('<link rel="stylesheet" href="'+wwwroot+'/theme/mutant_banjo/javascript/jquery.bxslider/jquery.bxslider.css" type="text/css" />');
    $('#admin-colourswatch .form-description').css('margin: 1.5em 0 0 14.25em;');
    $(document).ready(function(){
        var startslide = $('div #mutant_banjocolourswatchwwwroot').attr('startslide');
        var width = $('div #mutant_banjocolourswatchwwwroot').attr('width');
        $('#colourswatch-bxslider').bxSlider({
            onSlideAfter: function($slideElement, oldIndex, newIndex){
                var value = $('.mutant_banjocolourswatchimage-'+parseInt(newIndex)).attr('mutant_banjocolourswatch');  // When slide 0 in bxslider get '01' for newIndex when using right arrow in 4.0 - check for 4.1.
                $('.mutant_banjocolourswatchinput').attr('value', value);
            },
            startSlide: startslide,
            captions: true,
            slideWidth: width,
            slideMargin: 0
        });
    });
});