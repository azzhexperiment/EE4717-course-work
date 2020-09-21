/**
 * Script - validate.js
 *
 * @author Zhu Zihao <zhuz0010@ntu.edu.sg>
 * @version 1.0
 */

/**
 * Modify the “Jobs” page so that
 * the input data for name, email, start date and experience
 * are validated once the data is entered into each field.
 *
 * Modify the “Menu” page to include order quantity
 * and options for single or double shots.
 *
 * The sub-total for each order should be displayed
 * along the total amount below the sub-totals.
 * The sub-totals and total should be computed using JavaScript function.
 */

const form = document.getElementById('applyJob')
const name = document.getElementById('name')
const email = document.getElementById('email')
const date = document.getElementById('date')

/**
 * Listens to the <name> field and assess validity
 */
name.addEventListener('input', (event) => {
  if (isValidName(name.value)) {
    name.setCustomValidity('Invalid format')
  } else {
    name.setCustomValidity('')
  }
})

/**
 * Listens to the <email> field and assess validity
 */
email.addEventListener('input', (event) => {
  if (isValidName(email.value)) {
    email.setCustomValidity('Invalid format')
  } else {
    email.setCustomValidity('')
  }
})

/**
 * Listens to the <date> field and assess validity
 */
date.addEventListener('input', (event) => {
  if (isValidName(date.value)) {
    date.setCustomValidity('Invalid format')
  } else {
    date.setCustomValidity('')
  }
})

/**
 * Validate everything before submission just in case prof asks
 */
form.addEventListener('submit', (event) => {
  const test = email.value.length === 0 || emailRegExp.test(email.value);

  if (!test) {
    email.className = "invalid";
    error.innerHTML = "I expect an e-mail, darling!";
    error.className = "error active";

    // Some legacy browsers do not support the event.preventDefault() method
    return false;
  } else {
    email.className = "valid";
    error.innerHTML = "";
    error.className = "error";
  }
});

/**
 * The email field contains a user name part
 * follows by “@” and a domain name part.
 * The user name contains word characters
 * including hyphen (“-”) and period (“.”).
 *
 * The domain name contains two to four address extensions.
 * Each extension is string of word characters and
 * separated from the others by a period (“.”).
 * The last extension must have two to three characters.
 *
 * @param {String} value
 * @returns {Boolean}
 */
function isValidEmail (value) {
  var rule = /^[\w.-]+@([\w-]+\.){1,3}[a-zA-Z]{2,3}$/

  value.trim()

  value.test(rule) ? true : false

}

/**
 * The name field contains alphabet characters and character spaces.
 *
 * @param {String} value
 * @returns {Boolean}
 */
function isValidName (value) {
  var rule = /[a-zA-Z ]/

  value.trim()

  value.test(rule) ? true : false
}

/**
 * The start date cannot be from today and the past.
 *
 * @param {Date} value
 * @returns {Boolean}
 */
function isValidDate (value) {
  var rule = /[a-zA-Z ]/

  value.trim()

  value.test(rule) ? true : false

}
