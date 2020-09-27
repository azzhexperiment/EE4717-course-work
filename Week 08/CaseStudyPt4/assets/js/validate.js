/**
 * Validate job application form for JavaJam Coffee House.
 *
 * Modify the 'Jobs' page so that the input data for name, email, start date
 * and experience are validated once the data is entered into each field.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.3
 */

'use strict'

// Form elements
const form = document.getElementById('apply-job')
const nameContent = document.getElementById('name')
const emailContent = document.getElementById('email')
const dateContent = document.getElementById('start-date')
const expContent = document.getElementById('experience')
const submitButton = document.getElementById('submit-btn')

// Error messages
const errorName = document.getElementById('error-name')
const errorEmail = document.getElementById('error-email')
const errorDate = document.getElementById('error-date')
const errorExp = document.getElementById('error-exp')
const errorForm = document.getElementById('error-form')

/**
 * Listens to the <name> field and show error message on blur, if applicable.
 */
nameContent.addEventListener('blur', (event) => {
  if (nameContent.value === '') {
    errorName.textContent = 'This field is compulsory!'
  } else if (isValidName(nameContent.value)) {
    errorName.textContent = ''
  } else {
    errorName.textContent = 'Enter characters and whitespaces only!'
  }
})

/**
 * Listens to the <email> field and show error message on blur, if applicable.
 */
emailContent.addEventListener('blur', (event) => {
  if (emailContent.value === '') {
    errorEmail.textContent = 'This field is compulsory!'
  } else if (isValidEmail(emailContent.value)) {
    errorEmail.textContent = ''
  } else {
    errorEmail.textContent = 'Your email contains invalid symbols!'
  }
})

/**
 * Listens to the <date> field and show error message on blur, if applicable.
 */
dateContent.addEventListener('blur', (event) => {
  if (isValidStartDate(dateContent.value)) {
    errorDate.textContent = ''
  } else {
    errorDate.textContent = 'You cannot start before today!'
  }
})

/**
 * Listens to the <experience> field and show error message on blur, if
 * applicable.
 */
expContent.addEventListener('blur', (event) => {
  if (expContent.value === '') {
    errorExp.textContent = 'This field is compulsory!'
  } else if (isValidExperience(expContent.value)) {
    errorExp.textContent = ''
  } else {
    errorExp.textContent = 'You need to indicate your work experience!'
  }
})

/**
 * Validate everything before submission just in case prof asks
 */
submitButton.addEventListener('click', (event) => {
  event.preventDefault()

  if (!isValidName(nameContent.value) ||
    !isValidEmail(emailContent.value) ||
    !isValidStartDate(dateContent.value) ||
    !isValidExperience(expContent.value)) {
    errorForm.textContent = 'Fields contain invalid data!'
  } else {
    nameContent.value = nameContent.value.trim()
    emailContent.value = emailContent.value.trim()
    expContent.value = expContent.value.trim()

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
 * @param {String} value - User input name
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
 * @param {String} value - User input email
 *
 * @constant {RegExp} rule - Regex rule for email validation
 *
 * @returns {Boolean}
 */
function isValidEmail (value) {
  const rule = /^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/

  value.trim()

  return (rule.test(value))
}

/**
 * Validates user 'date' field. Always return true for empty field.
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
 * @param {String} value - User input date
 *
 * @constant {Date} date - User input date parsed as Date object
 * @constant {Date} today - Current system datetime
 *
 * @returns {Boolean}
 */
function isValidStartDate (value) {
  if (value !== '') {
    const date = Date.parse(value)
    const today = new Date()

    return (date > today)
  } else {
    return true
  }
}

/**
 * Validates user 'experience' field.
 *
 * Experience cannot be empty.
 *
 * @param {String} value - User input experience
 *
 * @returns {Boolean}
 */
function isValidExperience (value) {
  return (value !== '')
}
