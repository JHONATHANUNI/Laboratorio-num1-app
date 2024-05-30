document.addEventListener('DOMContentLoaded', () => {
  const checkboxes = document.querySelectorAll('input[name="productos[]"]');
  const cantidades = document.querySelectorAll('input[name="cantidades[]"]');
  const precios = document.querySelectorAll('.price');
  const totalElement = document.getElementById('total');

  const calculateTotal = () => {
    let total = 0;
    
    checkboxes.forEach((checkbox, index) => {
      if (checkbox.checked) {
        const quantity = parseInt(cantidades[index].value);
        const priceText = precios[index].textContent;
        const price = parsePrice(priceText);
        
        if (!isNaN(price)) {
          total += price * quantity;
        } else {
          console.error(`Precio no válido: ${priceText}`);
        }
      }
    });
    
    totalElement.textContent = formatCurrency(total);
  }

  const parsePrice = (priceText) => {
    const extractedPrice = priceText.replace('$', '');
    return parseFloat(extractedPrice);
  }

  const formatCurrency = (amount) => {
    return `$${amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')}`;
  }

  checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener('change', calculateTotal);
    cantidades[index].addEventListener('input', calculateTotal);
  });

  calculateTotal();
});

  