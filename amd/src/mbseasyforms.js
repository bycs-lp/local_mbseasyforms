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
 * Module for mbseasyforms.
 *
 * @module     local_mbseasyforms/mbseasyforms
 * @copyright  2022 ISB Bayern
 * @author     Tobias Garske
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* eslint-disable */
/* TODO fix linting */

import Pending from 'core/pending';
import Templates from 'core/templates';

let css_hide = "easyhide";

const actionContainerSelectors = [
    '#fgroup_id_buttonar',
    '#sticky-footer [data-groupname="buttonar"]',
    '.stickyfooter [data-groupname="buttonar"]',
];

/**
 * Initialize mbseasyforms.
 * @method init
 * @param {Array} params Configuration values.
 */
export const init = (params) => {

    const pendingPromise = new Pending('local_mbs/mbseasyforms');

    mbseasyforms(params);

    pendingPromise.resolve();
};

const mbseasyforms = async (params) => {

    // Show hidden forms after loading is complete.
    document.querySelectorAll('form.mform').forEach(form => form.classList.add('show'));
    const mform = document.querySelector('#page form.mform');

    const body_id = document.querySelector('body').id;
    // exceptions to .collapsible-actions
    const exceptions = ['page-enrol-editinstance'];

    // Since Moodle 4.3 you can pass the URL parameter "showonly=..." to an edit form to only show a specific section of the form.
    // In this case we do not want easyforms to hide anything, because the user already specified what he wants to see.
    const isShowOnlyPage = (new URL(document.location)).searchParams.has('showonly');

    // Check if there is a form with collapsible-actions on the page.
    const collapsible = document.querySelector('.collapsible-actions');
    if (mform !== null && (collapsible !== null || exceptions.includes(body_id)) && !isShowOnlyPage) {
        /*variables*/
        /**********/
        var tmp = params.split('#!#');
        var theme = tmp[0];
        var showallstring = tmp[1];
        var showlessstring = tmp[2];
        var collapsestring = tmp[3];
        var user_setting = tmp[4];
        var collapseallalign = tmp[5] || 'left';
        var easyconf = document.getElementById("mbseasyforms_config").textContent;
        try {
            var config = JSON.parse(easyconf);
        } catch (e) {
            console.log("EasyForm-Plugin: Error in JSON-Config: " + e);
            var config = JSON.parse('{}');
        }
        var default_disabled = false;
        var has_config = false;
        var id_arr = [];
        // Read config.
        if (config[body_id]) {
            default_disabled = config[body_id].default_disabled;
            if (config[body_id].elements) {
                id_arr = config[body_id].elements;
                has_config = true;
            }
        }
        // Disable for behat testing.
        if (Object.keys(config).length === 0) {
            default_disabled = true;
        }
        // Hard exit if no config set.
        if (!has_config) {
            return;
        }

        /*hide things*/
        /************/
        // Hide and mark header.
        document.querySelectorAll('.ftoggler').forEach((element) => {
            element.classList.add(css_hide, 'mbstoggle');
        });
        // Hide Input rows.
        document.querySelectorAll('.fitem').forEach((element) => {
            // If not required or submit buttons.
            let isSubmit = isSubmitArea(element);
            if (element.querySelectorAll('.fa-circle-exclamation').length !== 1 && !isSubmit) {
                // If not in specified elements.
                if (has_config) {
                    var hide = true;
                    for (var i = 0, len = id_arr.length; i < len; i++) {
                        // Dont hide if in config.
                        if (element.matches('#' + id_arr[i])) {
                            hide = false;
                        }
                        // Check if element has no id, and check childelements for specified elements.
                        else if (!element.id) {
                            // Check for elements, that are not fitem_id_elements.
                            if (id_arr[i].lastIndexOf('item_id_') === -1 && element.querySelector('#' + id_arr[i])) {
                                    hide = false;
                            }
                        }
                    }

                    // Show nested fitems (e.g. date_time_selector sub-rows) if their parent fitem is shown.
                    if (hide && element.closest('.fitem.easyShow') !== null) {
                        hide = false;
                    }

                    if (hide) {
                        element.classList.add(css_hide, 'mbstoggle');
                    } else {
                        // Make sure it is visible.
                        element.closest('.fcontainer')?.classList.remove('collapse');
                        // Mark element as to show.
                        element.classList.add('easyShow');
                    }
                } else {
                    element.classList.add(css_hide, 'mbstoggle');
                }
            } else {
                // Mark element as to show.
                element.classList.add('easyShow');
            }
        });
        // Show easyforms option in user profile.
        if (body_id == 'page-user-editadvanced' || body_id == 'page-user-edit') {
            const container = document.getElementById('id_category_1container');
            container.closest('.fcontainer').classList.remove('collapse');
            container.classList.remove('collapse');
            container.querySelectorAll(':scope > *').forEach(child => {
                child.classList.remove('easyhide', 'mbstoggle');
            });
        }
        // Show invalid options.
        document.querySelectorAll('.invalid-feedback[style*="display: block"]').forEach(element => {
            element.closest('.fitem').classList.remove('easyhide', 'mbstoggle');
        });
        // Add class to remove used space of hidden elements.
        document.querySelectorAll('fieldset.collapsible').forEach(element => {
            element.classList.add('easyAdapt', 'toggleAdapt');
        });
        // Adapt action buttons.
        const actionButtonContainer = getActionButtonContainer();
        if (actionButtonContainer) {
            actionButtonContainer.classList.add('easyon');
        }

        /*Create toggle and collapse all*/
        /*******************/
        const collapseConfig = {
            showallstring: showallstring,
            showlessstring: showlessstring,
            collapsestring: collapsestring,
            alignright: collapseallalign === 'right',
        };
        const {html, js} = await Templates.renderForPromise('local_mbseasyforms/collapseswitch', collapseConfig);
        Templates.replaceNodeContents('.collapsible-actions', html, js);

        // Create bottom toggle link.
        const buttonGroup = getActionButtonContainer();
        if (buttonGroup) {
            if (isStickyFooterActionContainer(buttonGroup)) {
                const stickyButtonRow = buttonGroup.querySelector(':scope > span > .d-flex.flex-wrap.align-items-center');
                if (stickyButtonRow) {
                    stickyButtonRow.insertAdjacentHTML('beforeend',
                        `<div class='mb-3 fitem mbseasytoggle link stickyfooterlink'>
                            <a href='#' id='scrolltop' role='button' class='easyform bottom ${theme} btn btn-link p-1'>
                                <span>${showallstring}</span>
                            </a>
                        </div>`
                    );
                }
            } else {
                buttonGroup.insertAdjacentHTML('afterbegin',
                    `<div class='col-md-9 offset-md-3 mbseasytoggle link'>
                        <a href='#' id='scrolltop' role='button' class='easyform bottom ${theme} btn btn-link p-1'>
                            <span>${showallstring}</span>
                        </a>
                    </div>`
                );
            }
        }

        // Set toggle, easyforms enabled?
        if (default_disabled || user_setting === "0") {
            addClassToElements('.mbseasytoggle .full', 'active');
            addClassToElements('.mbseasytoggle .easy', 'inactive');
        } else {
            addClassToElements('.mbseasytoggle .easy', 'active');
            addClassToElements('.mbseasytoggle .full', 'inactive');
        }
        // If easyform disabled through conf or user setting.
        if (default_disabled || user_setting === "0") {
            easyformsdisable();
        }
        // Click on enable easyforms.
        document.querySelectorAll(".mbseasytoggle .easy").forEach(element => {
            element.addEventListener("click", function() {
                if (!this.classList.contains("active")) {
                    // Reflect change to button.
                    this.classList.add("active");
                    this.classList.remove("inactive");

                    document.querySelectorAll(".mbseasytoggle .full").forEach(fullElement => {
                        fullElement.classList.add("inactive");
                        fullElement.classList.remove("active");
                    });

                    // Hide all elements not required or defined.
                    easyformsenable();

                    // Matomo tracking.
                    if (typeof _paq !== 'undefined') {
                        _paq.push(['trackEvent', 'Easyforms', 'Click enable easyforms', 'Enable']);
                    }
                }
            });
        });
        // Click disable easyforms.
        document.querySelectorAll(".mbseasytoggle .full").forEach(element => {
            element.addEventListener("click", function() {
                if (!this.classList.contains("active")) {
                    // Reflect change to button.
                    this.classList.add("active");
                    this.classList.remove("inactive");

                    document.querySelectorAll(".mbseasytoggle .easy").forEach(easyElement => {
                        easyElement.classList.remove("active");
                        easyElement.classList.add("inactive");
                    });

                    // Show hidden elements.
                    easyformsdisable();

                    // Matomo tracking.
                    if (typeof _paq !== 'undefined') {
                        if (this.id === 'scrolltop') {
                            _paq.push(['trackEvent', 'Easyforms', 'Click disable bottom link', 'Bottom link disable']);
                        } else {
                            _paq.push(['trackEvent', 'Easyforms', 'Click disable easyforms', 'Disable']);
                        }
                    }
                }
            });
        });
        // Click disable easyforms - bottom link.
        document.querySelectorAll(".mbseasytoggle .bottom").forEach(element => {
            element.addEventListener("click", function(e) {
                // Prevent default scroll to top section by href="#" after click on link.
                e.preventDefault();
                if (!document.querySelector(".mbseasytoggle .full").classList.contains("active")) {
                    // Reflect change to button.
                    document.querySelectorAll(".mbseasytoggle .full").forEach(fullElement => {
                        fullElement.classList.add("active");
                        fullElement.classList.remove("inactive");
                    });

                    document.querySelectorAll(".mbseasytoggle .easy").forEach(easyElement => {
                        easyElement.classList.add("inactive");
                        easyElement.classList.remove("active");
                    });

                    // Show hidden elements.
                    easyformsdisable();

                    // Keep the clicked element in view after layout shift.
                    this.scrollIntoView({block: 'nearest', behavior: 'instant'});
                }
            });
        });

        // Add Collapse all compatibility.
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.collapseexpand').forEach(element => {
                element.addEventListener('click', () => {
                    document.querySelectorAll('.mbstoggle').forEach(toggleElement => {
                        toggleElement.classList.remove(css_hide);
                    });
                    document.querySelectorAll('.toggleAdapt').forEach(adaptElement => {
                        adaptElement.classList.remove("easyAdapt");
                    });
                });
            });
        });
        // Matomo tracking.
        if (typeof _paq !== 'undefined') {
            _paq.push(['trackEvent', 'Easyforms', 'Load page', 'Form loaded']);
        }
    }
};

function easyformsenable() {
    // Hide elements.
    document.querySelectorAll('.mbstoggle').forEach(element => {
        element.classList.add(css_hide);
    });
    // Adapt css.
    document.querySelectorAll('.toggleAdapt').forEach(element => {
        element.classList.add("easyAdapt");
    });
    // Adapt actionbuttons.
    const actionButtonContainer = getActionButtonContainer();
    if (actionButtonContainer) {
        actionButtonContainer.classList.add("easyon");
    }
    // Fix if collapse all was clicked before showall, all would be hidden.
    document.querySelectorAll('.easyShow').forEach(element => {
        const collapseable = element.closest('.collapseable');
        if (collapseable) {
            collapseable.classList.add("collapse");
        }
    });
    // Open .collapseable, should them be closed before.
    document.querySelectorAll('.collapsible.easyAdapt .collapseable').forEach(element => {
        if (element.classList.contains('collapse')) {
            element.classList.remove('collapse');
        }
    });
    // Hide custom collapse all button.
    document.querySelectorAll('.mbseasycollapseall').forEach(element => {
        element.classList.add(css_hide);
    });
    // Show bottom show all link.
    document.querySelectorAll('.mbseasytoggle.link').forEach(element => {
        element.classList.remove(css_hide);
    });
}

function easyformsdisable() {
    // Show elements.
    document.querySelectorAll('.mbstoggle').forEach(element => {
        element.classList.remove(css_hide);
    });
    // Adapt css.
    document.querySelectorAll('.toggleAdapt').forEach(element => {
        element.classList.remove("easyAdapt");
    });
    // Adapt actionbuttons.
    const actionButtonContainer = getActionButtonContainer();
    if (actionButtonContainer) {
        actionButtonContainer.classList.remove("easyon");
    }
    // Show custom collapse all button.
    document.querySelectorAll('.mbseasycollapseall').forEach(element => {
        element.classList.remove(css_hide);
    });
    // Close .collapseable child that should be collapsed when showall is clicked.
    document.querySelectorAll('.collapsible.collapsed .collapseable').forEach(element => {
        if (!element.classList.contains('collapse')) {
            element.classList.add('collapse');
        }
    });
    // Hide bottom show all link.
    document.querySelectorAll('.mbseasytoggle.link').forEach(element => {
        element.classList.add(css_hide);
    });
}

const addClassToElements = (selector, className) => {
    document.querySelectorAll(selector).forEach(element => {
        element.classList.add(className);
    });
};

const getActionButtonContainer = () => {
    for (const selector of actionContainerSelectors) {
        const container = document.querySelector(selector);
        if (container) {
            return container;
        }
    }
    return null;
};

const isSubmitArea = (element) => {
    if (!element) {
        return false;
    }
    return element.id === 'fgroup_id_buttonar'
        || element.closest('#fgroup_id_buttonar') !== null
        || element.matches('[data-groupname="buttonar"]')
        || element.closest('[data-groupname="buttonar"]') !== null;
};

const isStickyFooterActionContainer = (element) => {
    return !!element && element.closest('#sticky-footer, .stickyfooter') !== null;
};
