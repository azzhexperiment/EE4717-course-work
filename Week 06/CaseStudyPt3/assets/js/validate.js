/**
 * Script - validate.js
 *
 * @author Zhu Zihao <zhuz0010@ntu.edu.sg>
 * @version 1.0
 *
 * @TODO: change event listeners to detect onblur rather than on input
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
const nameContent = document.getElementById('name')
const emailContent = document.getElementById('email')
const dateContent = document.getElementById('date')
const submitButton = document.getElementById('submit')

/**
 * Listens to the <name> field and assess validity
 */
nameContent.addEventListener('input', (event) => {
  if (isValidName(nameContent.value)) {
    nameContent.setCustomValidity('Invalid format')
  } else {
    nameContent.setCustomValidity('')
  }
})

/**
 * Listens to the <email> field and assess validity
 */
emailContent.addEventListener('input', (event) => {
  if (isValidEmail(emailContent.value)) {
    emailContent.setCustomValidity('Invalid format')
  } else {
    emailContent.setCustomValidity('')
  }
})

/**
 * Listens to the <date> field and assess validity
 */
dateContent.addEventListener('input', (event) => {
  if (isValidDate(dateContent.value)) {
    dateContent.setCustomValidity('Invalid format')
  } else {
    dateContent.setCustomValidity('')
  }
})

/**
 * Validate everything before submission just in case prof asks
 */
submitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidName(nameContent.value)
  || !isValidEmail(emailContent.value)
  || !isValidDate(dateContent)) {
    alert("Fields contain invalid data!")
  } else {
    form.submit()
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
 * @param {String} value
 * @returns {Boolean}
 */
function isValidDate (value) {
  let date = Date.parse(value)
  let today = new Date()

  value.trim()

  (date > today) ? true : false
}
