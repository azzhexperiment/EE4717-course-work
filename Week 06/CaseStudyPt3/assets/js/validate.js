// Script - validate.js

// Detects that a field is active
// Standby event
// Call validation function
// On submit, run all validation again

/**
 * Function called when a form field loses focus
 * Validates the field, throws error message if non-compliant with rules
 *
 */

// Function called when the form is submitted.
// Function validates data and returns a Boolean value.
function validateField(selectedField) {
  'use strict'

  var field = selectedField

  // use a switch statement to run the corresponding validation
}

function validateEmail(email) {

}

function validateName(name) {

}

function validateDate(date) {

}

// Function called when the window has been loaded.
// Function needs to add an event listener to the form.
function init() {
  'use strict'

  // Confirm that document.getElementById() can be used
  if (document && document.getElementById) {
    var applyJob = document.getElementById('applyJob')
    var activeField = document.activeElement.id

    applyJob.onfocus = validateField(activeField)
  }
}

// Assign an event listener to the window's load event
window.onload = init
