/**
 * Script - validate.js
 *
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
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.2
 */

// Form elements
const form = document.getElementById('apply-job')
const nameContent = document.getElementById('name')
const emailContent = document.getElementById('email')
const dateContent = document.getElementById('start-date')
const submitButton = document.getElementById('submit-btn')

// Error messages
const errorName = document.getElementById('error-name')
const errorEmail = document.getElementById('error-email')
const errorDate = document.getElementById('error-date')

/**
 * Listens to the <name> field and assess validity
 */
nameContent.addEventListener('blur', (event) => {
  if (isValidName(nameContent.value)) {
    console.log(nameContent.value)
    console.log('Valid name format')

    errorName.textContext = ''
    nameContent.setCustomValidity('')
  } else {
    errorName.textContext = 'Enter characters and whitespaces only!'
    nameContent.setCustomValidity('INVALID name format!')
  }
})

/**
 * Listens to the <email> field and assess validity
 */
emailContent.addEventListener('blur', (event) => {
  if (isValidEmail(emailContent.value)) {
    console.log(emailContent.value)
    console.log('Valid email format')

    errorEmail.textContext = ''
    emailContent.setCustomValidity('')
  } else {
    errorEmail.textContext = 'Your email contains invalid symbols!'
    emailContent.setCustomValidity('INVALID email format!')
  }
})

/**
 * Listens to the <date> field and assess validity
 */
dateContent.addEventListener('blur', (event) => {
  if (isValidStartDate(dateContent.value)) {
    console.log(dateContent.value)
    console.log('Valid starting date')

    errorDate.textContext = ''
    dateContent.setCustomValidity('')
  } else {
    errorDate.textContext = 'You cannot start before today!'
    dateContent.setCustomValidity('INVALID starting date!')
  }
})

/**
 * Validate everything before submission just in case prof asks
 */
submitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidName(nameContent.value) ||
  !isValidEmail(emailContent.value) ||
  !isValidStartDate(dateContent.value)) {
    console.log('Fields contain invalid data!')
  } else {
    nameContent.value = nameContent.value.trim()
    emailContent.value = emailContent.value.trim()

    form.submit()
  }
})

/**
 * Validates user 'name' field.
 *
 * The name field contains alphabet characters and character spaces.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value - Name value from user input
 *
 * @constant {RegExp} rule - Regex rule for name validation
 *
 * @returns {Boolean}
 */
function isValidName (value) {
  const rule = /^[a-zA-Z ]+$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates user 'email' field.
 *
 * The email field contains a user name part follows by "@" and a domain name
 * part. The user name contains word characters including hyphen ("-") and
 * period (".").
 *
 * The domain name contains two to four address extensions. Each extension is
 * string of word characters and separated from the others by a period (".").
 * The last extension must have two to three characters.
 *
 * The rule required above is first constructed. User input is trimmed for
 * preceding and trailing whitespaces before being validated against the rule.
 *
 * @param {String} value - Email value from user input
 *
 * @constant {RegExp} rule - Regex rule for email validation
 *
 * @returns {Boolean}
 */
function isValidEmail (value) {
  const rule = /^[\w.-]+@([\w-]+\.){1,3}[a-zA-Z]{2,3}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates user 'date' field.
 *
 * The start date cannot be from today and the past.
 *
 * This function takes in the date value from user input and casts it into a
 * Date object. A new Date object for the current system is declared and the
 * two Date objects are compared.
 *
 * Note that the parsed date is assumed to be at 0000 hrs while the generated
 * date is accurate to the current time in milliseconds.
 *
 * @param {String} value - Date value from user input
 *
 * @constant {RegExp} date - Date value parsed as Date object
 * @constant {RegExp} today - Date object for current system datetime
 *
 * @returns {Boolean}
 */
function isValidStartDate (value) {
  const date = Date.parse(value)
  const today = new Date()

  return (date > today)
}
