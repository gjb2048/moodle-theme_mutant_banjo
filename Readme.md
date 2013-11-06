Introduction
============
Mutant Banjo theme with swatch and font selection.

Required version of Moodle
==========================
This version works with Moodle version 2013051400.05 release 2.5 (Build: 20130614) and above until the next release.

Mutant Banjo is currently in 'BETA' so must NOT be used on a production server.  To progress to 'STABLE' I need feedback from
you that everything is ok.

Please ensure that your hardware and software complies with 'Requirements' in 'Installing Moodle' on
'docs.moodle.org/25/en/Installing_Moodle'.

Free Software
=============
Mutant Banjo is 'free' software under the terms of the GNU GPLv3 License, please see 'COPYING.txt'.

It can be obtained for free from:
https://github.com/gjb2048/moodle-theme_mutant_banjo/releases

You have all the rights granted to you by the GPLv3 license.  If you are unsure about anything, then the
FAQ - http://www.gnu.org/licenses/gpl-faq.html - is a good place to look.

If you reuse any of the code then I kindly ask that you make reference to me using the web and Moodle profiles
at the bottom.

If you make improvements or bug fixes then I would appreciate if you would send them back to me by forking from
https://github.com/gjb2048/moodle-theme_mutant_banjo and doing a 'Pull Request' so that the rest of the
Moodle community benefits.

Installation
============
 1. Ensure you have the version of Moodle as stated above in 'Required version of Moodle'.  This is essential as the
    theme relies on underlying core code that is out of my control.
 2. Login as an administrator and put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 3. Copy the extracted 'mutant_banjo' folder to the '/theme/' folder.
 4. Go to 'Site administration' -> 'Notifications' and follow standard the 'plugin' update notification.
 5. Select as the theme for the site.
 6. Put Moodle out of Maintenance Mode.

Upgrading
=========
 1. Ensure you have the version of Moodle as stated above in 'Required version of Moodle'.  This is essential as the
    theme relies on underlying core code that is out of my control.
 2. Login as an administrator and put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 3. Make a backup of your old 'mutant_banjo' folder in '/theme/' and then delete the folder.
 4. Copy the replacement extracted 'mutant_banjo' folder to the '/theme/' folder.
 5. Go to 'Site administration' -> 'Notifications' and follow standard the 'plugin' update notification.
 6. If automatic 'Purge all caches' appears not to work by lack of display etc. then perform a manual 'Purge all caches'
   under 'Home -> Site administration -> Development -> Purge all caches'.
 7. Put Moodle out of Maintenance Mode.

Uninstallation
==============
 1. Put Moodle in 'Maintenance Mode' so that there are no users using it bar you as the administrator.
 2. Change the theme to another theme of your choice.
 3. In '/theme/' remove the folder 'mutant_banjo'.
 4. Put Moodle out of Maintenance Mode.

Reporting Issues
================
Before reporting an issue, please ensure that you are running the latest version for your release of Moodle.  It is essential
that you are operating the required version of Moodle as stated at the top - this is because the theme relies on core
functionality that is out of its control.

I operate a policy that I will fix all genuine issues for free.  Improvements are at my discretion.  I am happy to make bespoke
customisations / improvements for a negotiated fee. 

When reporting an issue you can post in the theme's forum on Moodle.org (currently 'moodle.org/mod/forum/view.php?id=46')
or contact me direct (details at the bottom).

It is essential that you provide as much information as possible, the critical information being the contents of the format's 
version.php file.  Other version information such as specific Moodle version, theme name and version also helps.  A screen shot
can be really useful in visualising the issue along with any files you consider to be relevant.

Known Issues
============
1.  Because of the way the font setting jQuery in YUI code has to operate by using a YUI contained module and not the core jQuery
    incorporation mechanism (because it has to work in the settings when the theme is not the current and therefore the current
    theme may not be using jQuery) only standard theme location support is provided.  If you set '$CFG->themedir' in the
    'config.php' file then this will NOT work.  This is not a 'bug' as such because the theme is not broken, it's just that
    'feature' is unsupported.  It is my intent to at some point convert this code to a YUI Module with greater flexibility and use
    the 'pluginfile.php' file serving mechanism to dispatch the 'jquery.bxslider.css' file etc.  The actuall font serving code
    should already be '$CFG->themedir' ready.

Future Improvements
===================
1.  Convert slider setting jQuery in YUI code to YUI Modules and add a constructor so that the current set of files can be reduced
    down to one and remove the need for jQuery to extract initialisation information from the mark-up.
2.  Add more fonts.
3.  Have a footer block area as I'm currently experimenting with in the Shoelace theme.

Version Information
===================
6th November 2013 Version 2.6.0.1
  1.  Initial BETA code for Moodle 2.6.

9th September 2013 - Version 2.5.0.4 - Beta
  1.  Separated out font setting to be for one for headings and another body text.
  2.  Updated CSS in line with current Bootstrapbase 'less' changes.

26th August 2013 - Version 2.5.0.3 - Beta
  1.  Updated font serving, blocks, layout and renderer code from Shoelace.
  2.  Updated BX Slider to 4.1.1.

18th June 2013 - Version 2.5.0.2 - Beta
  1.  Implemented MDL-40137 to fix method names in 'lib.php'.

12th May 2013 - Version 2.5.0.1 - Beta
  1.  Initial version for Moodle 2.5beta.

Thanks
======
My thanks go to all the creators and participants of the Bootstrap theme:
Bas Brands, David Scotson, Stuart Lamour, Mark Aberdour, Paul Hibbitts and Mary Evans.

And again to Mary Evans for the 'Clean' theme.

Me
==
G J Barnard MSc. BSc(Hons)(Sndw). MBCS. CEng. CITP. PGCE.
Moodle profile: http://moodle.org/user/profile.php?id=442195.
Web profile   : http://about.me/gjbarnard
