/**
 * Modify order from menu for JavaJam Coffee House.
 *
 * The sub-total for each order should be displayed along the total amount
 * below the sub-totals. The sub-totals and total should be computed using
 * JavaScript function.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.1.2
 */

'use strict'

// Form elements
const orderForm = document.getElementById('order-form')
const submitBtn = document.getElementById('submit-btn')

// Radio elements
const endlessJustJava = document.getElementById('endless-just-java')

// Subtotals
const subJustJava = document.getElementById('sub-just-java')
const subCafeAuLait = document.getElementById('sub-cafe-au-lait')
const subIcedCappuccino = document.getElementById('sub-iced-cappuccino')

// Total
const totalCost = document.getElementById('total-cost')

/**
 * Calculate total & subtotals of drinks ordered on the fly.
 */
orderForm.addEventListener('change', (event) => {
  if (endlessJustJava.checked) {
    const priceEndlessJustJava = parseFloat(endlessJustJava.dataset.price)
    const qtyJustJava = parseInt(document.getElementById('qty-just-java').value)
    subJustJava.textContent = calcSubtotal(priceEndlessJustJava, qtyJustJava)
  }

  if (getSelectedCafeAuLaitPrice()) {
    const priceSelectedCafeAuLait = getSelectedCafeAuLaitPrice()
    const qtyCafeAuLait = parseInt(document.getElementById('qty-cafe-au-lait').value)
    subCafeAuLait.textContent = calcSubtotal(priceSelectedCafeAuLait, qtyCafeAuLait)
  }

  if (getSelectedIcedCappuccinoPrice()) {
    const priceSelectedIcedCappuccino = getSelectedIcedCappuccinoPrice()
    const qtyIcedCappuccino = parseInt(document.getElementById('qty-iced-cappuccino').value)
    subIcedCappuccino.textContent = calcSubtotal(priceSelectedIcedCappuccino, qtyIcedCappuccino)
  }

  totalCost.textContent = (
    parseFloat(subJustJava.textContent) +
    parseFloat(subCafeAuLait.textContent) +
    parseFloat(subIcedCappuccino.textContent)
  ).toFixed(2)
})

/**
 * Alert user on form submit.
 */
submitBtn.addEventListener('click', (event) => {
  event.preventDefault()

  orderForm.submit()

  window.alert('Order placed!')
})

/**
 * @returns {Number}
 */
function getSelectedCafeAuLaitPrice () {
  for (let i = 0; i < orderForm.cafe_au_lait.length; i++) {
    if (orderForm.cafe_au_lait[i].checked) {
      return (parseFloat(orderForm.cafe_au_lait[i].dataset.price))
    }
  }
}

/**
 * @returns {Number}
 */
function getSelectedIcedCappuccinoPrice () {
  for (let i = 0; i < orderForm.iced_cappuccino.length; i++) {
    if (orderForm.iced_cappuccino[i].checked) {
      return (parseFloat(orderForm.iced_cappuccino[i].dataset.price))
    }
  }
}

/**
 * Returns calculated subtotal given price and quantity of order.
 *
 * @param {Number} price - Price of selected option
 * @param {Number} qty - Quantity of drinks for order
 *
 * @returns {String}
 */
function calcSubtotal (price, qty) {
  return (price * qty).toFixed(2)
}
