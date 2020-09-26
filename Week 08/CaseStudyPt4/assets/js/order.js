/**
 * Modify order from menu for JavaJam Coffee House.
 *
 * The sub-total for each order should be displayed along the total amount
 * below the sub-totals. The sub-totals and total should be computed using
 * JavaScript function.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0
 */

// Form
const orderForm = document.getElementById('order-form')

// Radio elements
const endlessJustJava = document.getElementById('endless-just-java')

// Quantities
const qtyJustJava = document.getElementById('qty-just-java')
const qtyCafeAuLait = document.getElementById('qty-cafe-au-lait')
const qtyIcedCappuccino = document.getElementById('qty-iced-cappuccino')

// Subtotals
const subJustJava = document.getElementById('sub-just-java')
const subCafeAuLait = document.getElementById('sub-cafe-au-lait')
const subIcedCappuccino = document.getElementById('sub-iced-cappuccino')

// Total
const totalCost = document.getElementById('total-cost')

/**
 * Calculate total & subtotals of drinks ordered on the fly.
 */
orderForm.addEventListener('change', () => {
  if (endlessJustJava.checked) {
    const priceEndlessJustJava = parseFloat(endlessJustJava.value)
    const qtyOrderedJustJava = parseInt(qtyJustJava.value)
    subJustJava.textContent = calcSubtotal(priceEndlessJustJava, qtyOrderedJustJava)
  }

  if (getSelectedCafeAuLaitPrice()) {
    const priceSelectedCafeAuLait = getSelectedCafeAuLaitPrice()
    const qtyOrderedCafeAuLait = parseInt(qtyCafeAuLait.value)
    subCafeAuLait.textContent = calcSubtotal(priceSelectedCafeAuLait, qtyOrderedCafeAuLait)
  }

  if (getSelectedIcedCappuccinoPrice()) {
    const priceSelectedIcedCappuccino = getSelectedIcedCappuccinoPrice()
    const qtyOrderedIcedCappuccino = parseInt(qtyIcedCappuccino.value)
    subIcedCappuccino.textContent = calcSubtotal(priceSelectedIcedCappuccino, qtyOrderedIcedCappuccino)
  }

  totalCost.textContent = parseFloat(subJustJava.textContent) +
    parseFloat(subCafeAuLait.textContent) +
    parseFloat(subIcedCappuccino.textContent)
})

/**
 * @returns {Number}
 */
function getSelectedCafeAuLaitPrice () {
  for (let i = 0; i < orderForm.cafeAuLait.length; i++) {
    if (orderForm.cafeAuLait[i].checked) {
      return (parseFloat(orderForm.cafeAuLait[i].value))
    }
  }
}

/**
 * @returns {Number}
 */
function getSelectedIcedCappuccinoPrice () {
  for (let i = 0; i < orderForm.icedCappuccino.length; i++) {
    if (orderForm.icedCappuccino[i].checked) {
      return (parseFloat(orderForm.icedCappuccino[i].value))
    }
  }
}

/**
 * @param {Number} price - Price of selected option
 * @param {Number} qty - Quantity of drinks for order
 *
 * @returns {Number}
 */
function calcSubtotal (price, qty) {
  return (price * qty)
}
