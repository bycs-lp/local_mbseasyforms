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
 * Place to keep the defaultsettings.
 *
 * @package    local_mbseasyforms
 * @copyright  2025 Tobias Garske, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// phpcs:disable moodle.Files.LineLength.TooLong
// phpcs:disable moodle.Files.LineLength.MaxExceeded

define('DEFAULT_SETTING', <<<'EOT'
    {
        "page-course-edit":
            {
            "_comment": "Kurs erstellen",
            "default_disabled": false,
            "elements": ["fitem_id_category", "fitem_id_format", "fitem_id_", "fitem_id_numsections", "fitem_id_activitytype", "fitem_id_numdiscussions", "fitem_id_newsitems", "id_enablemultisection", "id_enablefiltering", "id_distractionfree", "fitem_id_backgrounddesign", "fitem_id_activityprofile", "fitem_id_tag_preview"]
        },
        "page-course-editsection":
            {
            "_comment": "Beschreibung von Abschnitten",
            "default_disabled": false,
            "elements": ["fitem_id_name", "id_name_value", "fitem_id_summary_editor"]
        },
        "page-user-editadvanced":
        {
            "_comment": "Nutzerprofil",
            "default_disabled": false,
            "elements": ["fitem_id_username", "fitem_id_passwordpolicyinfo", "fitem_id_email"]
        },
        "page-course-completion":
        {
            "_comment": "Kursabschluss",
            "default_disabled": false,
            "elements": ["fitem_id_overall_aggregation"]
        },
        "page-mod-choice-mod":
        {
            "_comment": "Abstimmung",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_allowupdate", "fitem_id_allowmultiple", "fitem_id_option_1", "fitem_id_option_2", "fitem_id_option_3", "fitem_id_option_4", "fitem_id_option_5", "fitem_id_option_6", "fitem_id_option_7", "fitem_id_option_8", "fitem_id_option_9", "fitem_id_option_10", "fitem_id_option_11", "fitem_id_option_12", "fitem_id_option_13", "fitem_id_option_14", "fitem_id_option_15", "fitem_id_completion", "id_completionview", "id_completionsubmit"]
        },
        "page-mod-assign-mod":
        {
            "_comment": "Aufgabe",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fgroup_id_submissionplugins", "fgroup_id_feedbackplugins", "fgroup_id_ggbturlinput", "fitem_id_usefile", "fitem_id_completion", "id_completionsubmit", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fitem_id_assignfeedback_aif_prompt", "fitem_id_assignfeedback_aif_expertmodebtn", "id_assignfeedback_aif_autogenerate", "fitem_id_assignfeedback_aif_aicontrolnotice", "fitem_id_assignfeedback_aif_datasharingnotice", "fitem_id_assignfeedback_aif_file"]
        },
        "page-mod-chat-mod":
        {
            "_comment": "Chat",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-data-mod":
        {
            "_comment": "Datenbank",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_approval", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionentriesgroup", "id_completionentries"]
        },
        "page-mod-lti-mod":
        {
            "_comment": "Externes Tool",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_typeid", "fitem_id_selectcontent", "fitem_id_toolurl",  "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade"]
        },
        "page-mod-lti-instructor_edit_tool_type":
        {
            "_comment": "Externes Tool - Tool anlegen",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-feedback-mod":
        {
            "_comment": "Feedback",
            "default_disabled": false,
            "elements": ["fitem_id_toolurl", "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_anonymous", "fitem_id_completion", "id_completionview", "id_completionsubmit"]
        },
        "page-mod-forum-mod":
        {
            "_comment": "Forum",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_type", "fitem_id_completion", "id_completionview", "fitem_id_completiongradeitemnumber", "id_completionpassgrade", "fgroup_id_completionpostsgroup", "id_completionposts", "fgroup_id_completiondiscussionsgroup", "id_completiondiscussions", "fgroup_id_completionrepliesgroup", "id_completionreplies"]
        },
        "page-mod-moodleoverflow-mod":
        {
            "_comment": "Moodleoverflow Forum",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_anonymous", "fitem_id_needsreview", "fitem_id_la_starttime", "fitem_id_la_endtime"]
        },
        "page-mod-workshop-mod":
        {
            "_comment": "Gegenseitige Beurteilung",
            "default_disabled": true,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_strategy", "fgroup_id_submissiongradegroup", "fitem_id_submissiongradepass", "fgroup_id_gradinggradegroup", "fitem_id_gradinggradepass", "fitem_id_instructauthorseditor",  "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade"]
        },
        "page-mod-workshop-editform":
        {
            "_comment": "Workshop - Beurteilungsbogen bearbeiten",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-workshop-allocation":
        {
            "_comment": "Workshop - Einreichungen zuordnen",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-geogebra-mod":
        {
            "_comment": "Geogebra",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_filetype", "fitem_id_geogebraurl", "fitem_id_geogebrafile", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade"]
        },
        "page-mod-glossary-mod":
        {
            "_comment": "Glossar",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_globalglossary", "fitem_id_displayformat", "fitem_id_defaultapproval", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionentriesgroup", "id_completionentries"]
        },
        "page-mod-hotpot-mod":
        {
            "_comment": "HotPot",
            "default_disabled": false,
            "elements": ["fgroup_id_name_elements", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionmingradegroup" ]
        },
        "page-mod-journal-mod":
        {
            "_comment": "Journal",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade"]
        },
        "page-mod-lesson-mod":
        {
            "_comment": "Lektion",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "id_completionendreached", "fgroup_id_completiontimespentgroup", "id_completiontimespent_number", "id_completiontimespent_timeunit"]
        },
        "page-mod-lesson-editpage":
        {
            "_comment": "Lektion - Inhalt hinzufügen",
            "default_disabled": true,
            "elements": ["fitem_id_contents_editor", "fitem_id_jumpto_0"]
        },
        "page-mod-scorm-mod":
        {
            "_comment": "Lernpaket",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_packagefile",  "fitem_id_completion", "id_completionview", "id_completionusegrade", "fgroup_id_completionscoregroup", "id_completionscorerequired", "id_completionstatusrequired_2", "id_completionstatusrequired_4",  "id_completionstatusallscos"]
        },
        "page-mod-game-hangman":
        {
            "_comment": "Galgenmännchen",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_glossaryid", "fitem_id_glossarycategoryid", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionpassgroup"]
        },
        "page-mod-game-cross":
        {
            "_comment": "Kreuzworträtsel",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_glossaryid", "fitem_id_glossarycategoryid", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_param1", "fitem_id_param4", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionpassgroup"]
        },
        "page-mod-game-millionaire":
        {
            "_comment": "Wer wird Millionär",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionpassgroup"]
        },
        "page-mod-quiz-mod":
        {
            "_comment": "Test",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_gradeboundarystatic1", "fitem_id_feedbacktext_0", "fitem_id_feedbackboundaries_0", "fitem_id_feedbacktext_1", "fitem_id_feedbackboundaries_1", "fitem_id_feedbacktext_2", "fitem_id_feedbackboundaries_2", "fitem_id_feedbacktext_3", "fitem_id_feedbackboundaries_3", "fitem_id_feedbacktext_4", "fitem_id_feedbackboundaries_4", "fitem_id_feedbacktext_5", "fitem_id_feedbackboundaries_5", "fitem_id_feedbacktext_6", "fitem_id_feedbackboundaries_6", "fitem_id_feedbacktext_7", "fitem_id_feedbackboundaries_7", "fitem_id_feedbacktext_8", "fitem_id_feedbackboundaries_8", "fitem_id_feedbacktext_9", "fitem_id_feedbackboundaries_9", "fitem_id_feedbacktext_10", "fitem_id_feedbackboundaries_10", "fitem_id_gradeboundarystatic2", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "id_completionattemptsexhausted", "fgroup_id_completionminattemptsgroup", "id_completionminattempts"]
        },
        "page-mod-quiz-report":
        {
            "_comment": "Test - Bewertung",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-wiki-mod":
        {
            "_comment": "Wiki",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_wikimode", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-wiki-view":
        {
            "_comment": "Wiki",
            "default_disabled": true,
            "elements": [ "fitem_id_config_enabledock"]
        },
        "page-mod-book-mod":
        {
            "_comment": "",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_numbering", "fitem_id_navstyle",  "fitem_id_completion", "id_completionview"]
        },
        "page-mod-resource-mod":
        {
            "_comment": "Datei",
            "default_disabled": false,
            "elements": [ "fitem_id_files",  "fitem_id_completion", "id_completionview"]
        },
        "page-mod-imscp-mod":
        {
            "_comment": "IMS-Content",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_package", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-lightboxgallery-mod":
        {
            "_comment": "Lightbox Galerie",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-url-mod":
        {
            "_comment": "Link",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-mediathek-mod":
        {
            "_comment": "Mediathek",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_display",  "fitem_id_completion", "fitem_id_completionview"]
        },
        "page-mod-pmediathek-mod":
        {
            "_comment": "Prüfungsarchiv",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_display", "fitem_id_completion", "fitem_id_completionview"]
        },
        "page-mod-label-mod":
        {
            "_comment": "Textfeld",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor","fitem_id_completion"]
        },
        "page-mod-page-mod":
        {
            "_comment": "Textseite",
            "default_disabled": false,
            "elements": [ "fitem_id_completion", "id_completionview"]
        },
        "page-mod-folder-mod":
        {
            "_comment": "Verzeichnis Einstellungen",
            "default_disabled": false,
            "elements": [ "fitem_id_name", "fitem_id_files", "fitem_id_display", "id_showexpanded", "id_studentedit", "id_showdownloadfolder",  "fitem_id_completion", "id_completionview"]
        },
        "page-mod-hvp-mod":
        {
            "_comment": "H5P",
            "default_disabled": false,
            "elements": [ "fitem_id_name", "fitem_id_introeditor", "fitem_id_showdescription", "fgroup_id_h5peditor", "fgroup_id_h5pactiongroup", "fitem_id_h5pfile", "fitem_id_showexpanded", "fitem_id_studentedit", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionpassgroup"]
        },
        "page-blocks-mbstpl-dupcrs":
        {
            "_comment": "Teachshare - Kurs kopieren",
            "default_disabled": true,
            "elements": []
        },
        "page-local-mbslicenseinfo-editlicenses":
        {
            "_comment": "Quellenangaben bearbeiten",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-aitext":
        {
            "_comment": "Fragensammlung - AI-Text",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-algebra":
        {
            "_comment": "Fragensammlung - Algebra",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-calculated":
        {
            "_comment": "Fragensammlung - Berechnet",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-calculatedmulti":
        {
            "_comment": "Fragensammlung - Berechnete Multiple-Choice-Frage",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-ddimageortext":
        {
            "_comment": "Drag-and-drop auf Bild",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-ddwtos":
        {
            "_comment": "Drag-and-drop auf Text",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-ddmarker":
        {
            "_comment": "Drag-and-drop auf Markierungen",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-ddmatch":
        {
            "_comment": "Drag-and-drop auf Markierungen",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-calculatedsimple":
        {
            "_comment": "Einfach berechnet",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-essay":
        {
            "_comment": "Freitextfrage",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-geogebra":
        {
            "_comment": "Geogebra",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-shortanswer":
        {
            "_comment": "Kurzantowrt",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-multianswer":
        {
            "_comment": "Lückentext Frage",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-gapselect":
        {
            "_comment": "Lückentextauswahl",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-multichoice":
        {
            "_comment": "Multiple Choice",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-numerical":
        {
            "_comment": "Numerisch",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-truefalse":
        {
            "_comment": "Wahr - Falsch",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-match":
        {
            "_comment": "Zuordnung",
            "default_disabled": true,
            "elements": []
        },
        "page-question-type-description":
        {
            "_comment": "Beschreibung",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-individualfeedback-mod":
        {
            "_comment": "Individuelles Feedback",
            "default_disabled": false,
            "elements": ["fitem_id_timeopen", "fitem_id_timeclose"]
        },
        "page-blocks-mbsteachshare-sendtemplate":
        {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
        },
        "page-blocks-mbsteachshare-coursefromtemplate":
        {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
        },
        "page-blocks-mbsteachshare-edittemplate":
        {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
        },
        "page-user-edit":
        {
            "_comment": "Profil Einstellungen",
            "default_disabled": true,
            "elements": []
        },
        "page-local-eportfolio-eportfolio_settings":
        {
            "_comment": "Eportfolio Einstellungen",
            "default_disabled": true,
            "elements": ["fitem_id_theme", "fitem_id_transition"]
        },
        "page-local-eportfolio-references":
        {
            "_comment": "Eportfolio Einstellungen",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-mootyper-mod":
        {
            "_comment": "Tastschreiben Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_completion", "id_completionview", "id_completiongradeitemnumber", "id_completionpassgrade"]
        },
        "page-enrol-editinstance":
        {
            "_comment": "Einsschreibemethoden globale Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_status", "fitem_id_roleid", "fitem_id_customint1", "fitem_id_customint4", "enrol_class_custom"]
        },
        "page-mod-learningmap-mod":
        {
            "_comment": "Lernlandkarten Einstellungen",
            "default_disabled": false,
            "elements": ["mod_learningmap_editor", "fitem_id_completion", "id_completionview", "fitem_id_completiontype", "id_showmaponcoursepage", "id_backlink"]
        },
        "page-mod-unilabel-edit_content":
        {
          "_comment": "Unilabel Content bearbeiten",
          "default_disabled": true,
          "elements": ["fitem_id_name", "fitem_id_completion", "id_completionview"]
        },
        "page-mod-unilabel-mod":
        {
          "_comment": "Unilabel Einstellungen",
          "default_disabled": false,
          "elements": ["fitem_id_name", "fitem_id_unilabeltype", "fitem_id_completion", "id_completionview"]
        },
        "page-blocks-mbsnewcourse-restore":
        {
            "_comment": "Kurswiederherstellung",
            "default_disabled": true,
            "elements": ["fitem_id_category", "fitem_id_backupfile", "fitem_id_errornocoursefile"]
        },
        "page-admin-auth-oidc-manageapplication":
        {
            "_comment": "Adminbereich Open IDC",
            "default_disabled": true,
            "elements": []
        },
        "page-admin-auth-oidc-manageapplication":
        {
            "_comment": "Adminbereich Open IDC",
            "default_disabled": true,
            "elements": []
        },
        "page-mod-kanban-mod":
        {
            "_comment": "Kanban Board Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_name", "id_history", "fitem_id_userboards", "fitem_id_completion", "id_completionview", "fitem_id_completioncreate", "fitem_id_completioncomplete"]
        },
        "page-mod-board-mod":
        {
            "_comment": "Board Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_name", "fitem_id_background_color", "fitem_id_background_image", "id_background_image_fieldset", "fitem_id_addrating", "fitem_id_sortby", "id_hideheaders", "fitem_id_singleusermode", "id_postbyenabled", "id_userscanedit", "id_enableblanktarget", "id_embed", "fitem_id_postby", "id_postby_day", "id_postby_month", "id_postby_year", "id_postby_hour", "id_postby_minute", "fitem_id_completion", "id_completionview", "fgroup_id_completionnotesgroup", "id_completionnotes"]
        },
        "page-mod-subcourse-mod":
        {
            "_comment": "Subcourse Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_name", "fitem_id_refcourse", "fitem_id_completion", "id_completionview", "id_completionusegrade", "id_completionpassgrade", "id_completioncourse"]
        },
        "page-mod-checklist-mod":
        {
            "_comment": "Checklist Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_name", "fitem_id_useritemsallowed", "fitem_id_autopopulate", "fitem_id_autoupdate", "fitem_id_completion", "id_completionusegrade", "id_completionpassgrade", "fgroup_id_completionpercentgroup", "id_completionpercenttype"]
        },
        "page-mod-ratingallocate-mod":
        {
            "_comment": "Ratingallocate Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_name", "fitem_id_strategy", "fitem_id_accesstimestart", "id_accesstimestart_day", "id_accesstimestart_month", "id_accesstimestart_year", "id_accesstimestart_hour", "id_accesstimestart_minute",
                                                               "fitem_id_accesstimestop", "id_accesstimestop_day", "id_accesstimestop_month", "id_accesstimestop_year", "id_accesstimestop_hour", "id_accesstimestop_minute", 
                                                               "fitem_id_publishdate", "id_publishdate_day", "id_publishdate_month", "id_publishdate_year", "id_publishdate_hour", "id_publishdate_minute", 
                                                               "fitem_id_strategyopt_strategy_yesno_maxcrossout", "fitem_id_strategyopt_strategy_yesno_0", "fitem_id_strategyopt_strategy_yesno_1",
                                                               "id_strategyopt_strategy_yesmaybeno_0", "id_strategyopt_strategy_yesmaybeno_3", "id_strategyopt_strategy_yesmaybeno_5",
                                                               "id_strategyopt_strategy_lickert_maxno", "id_strategyopt_strategy_lickert_countlickert", "id_strategyopt_strategy_lickert_0", "id_strategyopt_strategy_lickert_1", "id_strategyopt_strategy_lickert_2", "id_strategyopt_strategy_lickert_3", "id_strategyopt_strategy_lickert_4", 
                                                               "id_strategyopt_strategy_points_totalpoints", "id_strategyopt_strategy_points_maxperchoice",
                                                               "id_strategyopt_strategy_order_countoptions", "id_strategyopt_strategy_tickyes_1" ]
        },
        "page-mod-ratingallocate-view":
        {
            "_comment": "Ratingallocate give_rating",
            "default_disabled": true,
            "elements": []
        },
        "page-question-bank-importquestions-import":
        {
            "_comment": "Fragensammlung import",
            "default_disabled": false,
            "elements": ["fitem_id_submitbutton"]
        },
        "page-mod-survey-mod":
        {
            "_comment": "Umfrage",
            "default_disabled": false,
            "elements": ["fitem_id_completion", "id_completionview", "id_completionsubmit"]
        },
        "page-course-reset":
        {
            "_comment": "Kurs zurücksetzen",
            "default_disabled": false,
            "elements": ["id_reset_events", "id_reset_notes", "id_reset_roles_local", "id_reset_gradebook_grades", "id_reset_forum_all", "fitem_id_submitbutton"]
        },
        "page-local-ai_manager-quota_config":
        {
            "_comment": "KI Limitierungs-Einstellungen",
            "default_disabled": true,
            "elements": ["fitem_id_max_requests_period", "id_max_requests_period_number"]
        },
        "page-local-ai_manager-purpose_config":
        {
            "_comment": "KI Einsatzzwecke",
            "default_disabled": true,
            "elements": []
        },
        "page-course-format-tiles-editor-editimage":
        {
            "_comment": "Kachelformat Bild upload",
            "default_disabled": false,
            "elements": ["fitem_id_tileimagefile"]
        }
      }
    EOT
    );
