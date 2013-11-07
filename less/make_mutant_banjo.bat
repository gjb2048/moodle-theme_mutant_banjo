call cd ../../bootstrapbase/less
call copy "..\..\mutant_banjo\less\variables-a.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-a.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-a.css

call copy "..\..\mutant_banjo\less\variables-b.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-b.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-b.css

call copy "..\..\mutant_banjo/less\variables-c.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-c.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-c.css

call copy "..\..\mutant_banjo/less\variables-d.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-d.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-d.css

call copy "..\..\mutant_banjo/less\variables-e.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-e.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-e.css

call copy "..\..\mutant_banjo/less\variables-f.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-f.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-f.css

call copy "..\..\mutant_banjo/less\variables-g.less" "bootstrap/variables.less" /Y
call recess --compile --compress ../../mutant_banjo/less/moodleall-mutant_banjo.less > ../../mutant_banjo/style/moodle-g.css
call recess --compile --compress ../../mutant_banjo/less/editorall-mutant_banjo.less > ../../mutant_banjo/style/editor-g.css
call cd ../../mutant_banjo/less
