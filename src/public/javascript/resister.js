const cart = {};
const discounts = {};
let selectedProduct = null;

function renderProducts() {
    const grid = document.getElementById('productGrid');
    grid.innerHTML = '';
    products.forEach(p => {
        const discounted = discounts[p.id] || 0;
        const discountedPrice = p.price - discounted;
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `<div>画像</div><div>${p.name}</div>` +
            (discounted > 0
                ? `<div class="price">¥${p.price} → <span class="price discounted">¥${discountedPrice}</span></div>`
                : `<div class="price">¥${p.price}</div>`);
        card.onclick = () => addToCart(p);
        grid.appendChild(card);
    });
}

function addToCart(product) {
    if (!cart[product.id]) cart[product.id] = { ...product, quantity: 0 };
    cart[product.id].quantity++;
    renderCart();
}

function renderCart() {
    const cartDiv = document.getElementById('cart');
    const itemCount = document.getElementById('item-count');
    const subtotal = document.getElementById('subtotal');
    cartDiv.innerHTML = '';
    let total = 0;
    let count = 0;

    Object.values(cart).forEach(item => {
        const discount = discounts[item.id] || 0;
        const discountedPrice = item.price - discount;
        total += discountedPrice * item.quantity;
        count += item.quantity;
        cartDiv.innerHTML += `
        <div class="item-row">
            <span>${item.name}</span>
            <div class="quantity-controls">
                <button onclick="changeItemQuantity(${item.id}, -1)">-</button>
                <span>${item.quantity}</span>
                <button onclick="changeItemQuantity(${item.id}, 1)">+</button>
            </div>
            <span>¥${discountedPrice * item.quantity}</span>
        </div>`;
    });

    itemCount.textContent = count;
    subtotal.textContent = total;
}

function changeItemQuantity(id, delta) {
    cart[id].quantity = Math.max(1, cart[id].quantity + delta);
    renderCart();
}

function checkout() {
    const items = Object.values(cart).map(i => `${i.name}×${i.quantity}`).join(', ');
    const total = Object.values(cart).reduce((sum, i) => {
        const d = discounts[i.id] || 0;
        return sum + (i.price - d) * i.quantity;
    }, 0);
    const date = new Date().toLocaleString();
    document.getElementById('historyLog').innerHTML += `<div>${date}：${items} → 合計 ¥${total}</div>`;
    Object.keys(cart).forEach(id => delete cart[id]);
    renderCart();
    toggleMenu();
}

function toggleMenu() {
    const menu = document.getElementById('sideMenu');
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

function openDiscountModal() {
    const list = document.getElementById('discountProductList');
    list.innerHTML = '';
    products.forEach(p => {
        const discounted = discounts[p.id] || 0;
        const finalPrice = p.price - discounted;
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `<div>画像</div><div>${p.name}</div><div class="price">¥${p.price}` +
            (discounted > 0 ? ` → <span class="price discounted">¥${finalPrice}</span>` : '') + `</div>`;
        card.onclick = () => selectProductForDiscount(p);
        list.appendChild(card);
    });
    document.getElementById('selectedProductInfo').innerHTML = '';
    document.getElementById('discountSummary').innerHTML = '';
    document.getElementById('discountAmount').value = '';
    document.getElementById('discountModal').style.display = 'flex';
    document.getElementById('overlay').style.display = 'block';
}

function selectProductForDiscount(product) {
    selectedProduct = product;
    const current = discounts[product.id] || 0;
    document.getElementById('selectedProductInfo').innerHTML =
        `<div class="product-card"><div>画像</div><div>${product.name}</div><div class="price">¥${product.price}</div></div>`;
    document.getElementById('discountAmount').value = current;
    updateDiscountSummary();
}

function updateDiscountSummary() {
    if (!selectedProduct) return;
    const discountValue = parseInt(document.getElementById('discountAmount').value) || 0;
    const finalPrice = selectedProduct.price - discountValue;
    document.getElementById('discountSummary').innerHTML = `¥${selectedProduct.price} − ¥${discountValue} = <span class="price discounted">¥${finalPrice}</span>`;
}

function applyDiscount() {
    const amount = parseInt(document.getElementById('discountAmount').value) || 0;
    if (selectedProduct) {
        discounts[selectedProduct.id] = amount;
        renderProducts();
        renderCart();
    }
    document.getElementById('discountModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

document.getElementById('overlay').addEventListener('click', () => {
    document.getElementById('discountModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

document.addEventListener('DOMContentLoaded', () => {
    renderProducts();
});
