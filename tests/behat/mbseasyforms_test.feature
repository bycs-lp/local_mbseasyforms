@local @local_mbseasyforms @javascript

#Note that this test is currently NOT running.
#After making the "Kurs erstellen" feature available again, we must check again
#whether this test works:
#See: http://pm.mebis.alp.dillingen.de/?controller=TaskViewController&action=show&task_id=3196&project_id=2

Feature: Shortened create course menu
  As User it is nicer not to be blown away by options

  Scenario: Check course create Menu collapsed hidden with mbseasyforms
    Given I log in as "admin"
    When I navigate to "Courses > Add a new course" in site administration
    Then I should see "Add a new course"
    And I should see "All Settings"
    And "Course full name" "field" should be visible
    And I click on ".easy" "css_element" in the ".mbseasytoggle" "css_element"
    And "fieldset#id_general > div > div > h3" "css_element" should not be visible

  Scenario: Check course create Menu collapsed with mbseasyforms
    Given I log in as "admin"
    When I navigate to "Courses > Add a new course" in site administration
    Then I should see "Add a new course"
    And I should see "All Settings"
    And I click on ".easy" "css_element" in the ".mbseasytoggle" "css_element"
    And "fieldset#id_general > div > div > h3" "css_element" should not be visible
    And I click on ".full" "css_element" in the ".mbseasytoggle" "css_element"
    And "fieldset#id_general > div > div > h3" "css_element" should be visible
    And "Course ID number" "field" should be visible
    And "fieldset#id_appearancehdr > div > div > h3" "css_element" should be visible
    And "fieldset#id_filehdr > div > div > h3" "css_element" should be visible
    And I click on ".easy" "css_element" in the ".mbseasytoggle" "css_element"
    And "fieldset#id_general > div > div > h3" "css_element" should not be visible

  Scenario: Check course create Menu collapse all with mbseasyforms
    Given I log in as "admin"
    When I navigate to "Courses > Add a new course" in site administration
    Then I should see "Add a new course"
    And I click on ".easy" "css_element" in the ".mbseasytoggle" "css_element"
    And I click on ".full" "css_element" in the ".mbseasytoggle" "css_element"
    And I should see "All Settings"
    And I click on ".collapsemenu" "css_element" in the ".collapsible-actions" "css_element"
    And "Course ID number" "field" should be visible
    And "Hidden sections" "field" should be visible
    And "fieldset#id_appearancehdr > div > div > h3" "css_element" should be visible
    And "fieldset#id_filehdr > div > div > h3" "css_element" should be visible
    And I click on ".collapsemenu" "css_element" in the ".collapsible-actions" "css_element"
    And "Course ID number" "field" should not be visible

#  Scenario: Check mbseasyforms hide option
#    Given I log in as "admin"
#    And I navigate to "Plugins > Local plugins > mbsEasyforms" in site administration
#    And I should see "Configuration"
#    When I set the field "id_s_local_mbseasyforms_easyformsconfig" to "{'page-course-edit':{'default_disabled': false,'elements': ['fitem_id_idnumber']  }}"
#    And I press "Save changes"
#    Then I should see "Changes saved"
#    And I should see "{'page-course-edit':{'default_disabled': false,'elements': ['fitem_id_idnumber']  }}"
#    And I navigate to "Courses > Add a new course" in site administration
#    And I should see "Add a new course"
#    And I should see "All Settings"
#    And "Course ID number" "field" should be visible

  Scenario: Edit course settings with mbseasyforms enabled
    Given the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
    And I log in as "admin"
    And I am on "Course 1" course homepage
    And I navigate to "Settings" in current page administration
    Then I should see "Course full name"
