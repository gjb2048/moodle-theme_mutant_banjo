Introduction
============
This folder contains the files needed to create the 'moodle.css' and
'editor.css' files in the 'style' folder for each 'swatch'.  It is useful when
you wish to do the following:

1. Update the CSS based upon the latest changes in the: 'bootstrapbase/less'
   folder.
2. Alter the look of the theme beyond adding CSS in the settings.

Prerequisites
=============
1. You must have 'recess' installed as per the instructions on:
   http://docs.moodle.org/dev/LESS
2. Be at a level where you are comfortable with using the command prompt.
3. All instructions will be relative to the '/theme' folder.

Before making changes
---------------------
1. Ensure you have made a backup of the 'bootstrapbase/less/variables.less'
   file.
2. Ensure you have a backup of both the 'moodle.css' and 'editor.css' files in
   the 'mutant_banjo/style' folder.
3. If you are going to change the values in 'mutant_banjo/less/variables-X.less'
   then a backup of that file too.

Regenerating the styles
=======================
1. If desired, change the values in 'mutant_banjo/less/variables-X.less'.
2. On Windows in a 'Node.js Command prompt' (I need to write a shell script for
   Linux and Mac) ensure you are in the 'mutant_banjo/less' folder.
3. Type 'make_shoe' and observe the output which should be similar to this:

F:\moodledev\moodle26\theme\mutant_banjo\less>make_mutant_banjo

F:\moodledev\moodle26\theme\mutant_banjo\less>call cd ../../bootstrapbase/less

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo\les
s\variables-a.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-a.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-a.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo\les
s\variables-b.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-b.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-b.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo/les
s\variables-c.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-c.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-c.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo/les
s\variables-d.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-d.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-d.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo/les
s\variables-e.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-e.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-e.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo/les
s\variables-f.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-f.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-f.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call copy "..\..\mutant_banjo/les
s\variables-g.less" "bootstrap/variables.less" /Y
        1 file(s) copied.

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/moodleall-mutant_banjo.less  1>../../mutant_banjo/style/
moodle-g.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call recess --compile --compress
../../mutant_banjo/less/editorall-mutant_banjo.less  1>../../mutant_banjo/style/
editor-g.css

F:\moodledev\moodle26\theme\bootstrapbase\less>call cd ../../mutant_banjo/less

F:\moodledev\moodle26\theme\mutant_banjo\less>

4. No errors should be produced.
5. In Moodle perform a 'Purge all caches' -> http://docs.moodle.org/en/Developer_tools
6. Refresh the page and you should see the changes in effect.