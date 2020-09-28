/**
 * Submit form to update drink prices in database.
 *
 * This does not perform any data validation but instead only refreshes the
 * page after form submission.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0
 */

'use strict'

const form = document.getElementById('update-prices')
const submit = document.getElementById('submit-btn')

submit.addEventListener('click', (event) => {
  event.preventDefault()

  form.submit()
  window.alert('Price updated!')
})
