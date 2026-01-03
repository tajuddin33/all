let cart = [];

function addToCart(name, price) {
  cart.push({ name, price });
  updateCart();
}

function updateCart() {
  let cartItems = document.getElementById("cart-items");
  let total = 0;
  cartItems.innerHTML = "";
  cart.forEach((item, index) => {
    total += item.price;
    cartItems.innerHTML += `<li>${item.name} - ₹${item.price} 
      <button onclick="removeFromCart(${index})">❌</button></li>`;
  });
  document.getElementById("cart-total").innerText = total;
  document.getElementById("cart-count").innerText = cart.length;
}

function removeFromCart(index) {
  cart.splice(index, 1);
  updateCart();
}

function toggleCart() {
  document.getElementById("cart").classList.toggle("open");
}

async function checkout() {
  const response = await fetch("http://127.0.0.1:5500/frontend/index.html", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ cart })
  });
  const session = await response.json();
  window.location.href = session.url; // Redirect to Stripe Checkout
}
