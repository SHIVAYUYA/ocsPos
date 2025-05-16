const cart = {};
const discounts = {};
let selectedProduct = null;

function renderProducts() {
    const grid = document.getElementById('productGrid');
    grid.innerHTML = '';
    products.forEach(p => {
        const discounted = discounts[p.product_code] || 0;
        const discountedPrice = p.price - discounted;
        const card = document.createElement('div');
        card.className = 'product-item';
        card.dataset.id = p.id;
        card.dataset.name = p.name;
        card.dataset.price = p.price;
        card.onclick = () => addToCart(p);
        card.innerHTML = `
            <div class="product-name">${p.name}</div>
            <div class="product-price">
                ¥${p.price}${discounted > 0 ? ` → <span class="price discounted">¥${discountedPrice}</span>` : ''}
            </div>
        `;
        grid.appendChild(card);
    });
}

function addToCart(product) {
    const key = product.product_code;
    if (!cart[key]) {
        cart[key] = {
            product_code: key,
            name: product.name,
            price: product.price,
            class_name: product.class_name,
            quantity: 0
        };
    }
    cart[key].quantity++;
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
        const discount = discounts[item.product_code] || 0;
        const discountedPrice = item.price - discount;
        total += discountedPrice * item.quantity;
        count += item.quantity;

        cartDiv.innerHTML += `
            <div class="item-row">
                <span>${item.name}</span>
                <div class="quantity-controls">
                    <button onclick="changeItemQuantity('${item.product_code}', -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="changeItemQuantity('${item.product_code}', 1)">+</button>
                </div>
                <span>¥${discountedPrice * item.quantity}</span>
            </div>
        `;
    });

    itemCount.textContent = count;
    subtotal.textContent = total;
}

function changeItemQuantity(code, delta) {
    if (!cart[code]) return;
    cart[code].quantity = Math.max(1, cart[code].quantity + delta);
    renderCart();
}

function getCartItems() {
    return Object.values(cart).map(item => {
        const discount = discounts[item.product_code] || 0;
        return {
            product_code: item.product_code,
            class_name: item.class_name,
            quantity: item.quantity,
            price: item.price,
            discount: discount
        };
    });
}

function clearCart() {
    Object.keys(cart).forEach(key => delete cart[key]);
    renderCart();
}


function checkout() {
    const cartItems = getCartItems(); // カートからデータを取得する関数

    const logs = cartItems.map(item => ({
        class_name: item.class_name,
        product_code: item.product_code,
        count: item.quantity, // ここを修正：quantity を count として送信
        price: item.price,
        discount: item.discount || 0
    }));

    fetch('/user/resister', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        credentials: 'same-origin', // これを追加
        body: JSON.stringify({ logs })
    })
    .then(res => {
        if (!res.ok) {
            throw new Error('サーバーエラーが発生しました');
        }
        return res.json();
    })
    .then(data => {
        if (data.success) {
            alert('会計が完了しました');
            clearCart(); // カートをリセットする関数
        } else {
            alert('エラー: ' + (data.message || '保存に失敗しました'));
        }
    })
    .catch(error => {
        console.error('通信エラー', error);
        alert('サーバー通信に失敗しました');
    });
}


function submitCashLog() {
    const payload = Object.values(cart).map(item => ({
        product_code: item.product_code,
        class_name: item.class_name,
        count: item.quantity,
        trade_datetime: new Date().toISOString(),
        free: false
    }));

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch("/cash-log/store", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({ logs: payload })
    }).then(response => {
        if (response.ok) {
            alert("レジ情報を保存しました！");
            Object.keys(cart).forEach(id => delete cart[id]);
            renderCart();
        } else {
            alert("保存に失敗しました");
        }
    });
}

function toggleMenu() {
    const menu = document.getElementById('sideMenu');
    menu.style.display = (menu.style.display === 'flex' ? 'none' : 'flex');
}

function openDiscountModal() {
    const list = document.getElementById('discountProductList');
    list.innerHTML = '';
    products.forEach(p => {
        const discounted = discounts[p.product_code] || 0;
        const finalPrice = p.price - discounted;
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `
            <div>画像</div>
            <div>${p.name}</div>
            <div class="price">¥${p.price}${discounted > 0 ? ` → <span class="price discounted">¥${finalPrice}</span>` : ''}</div>
        `;
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
    const current = discounts[product.product_code] || 0;
    document.getElementById('selectedProductInfo').innerHTML = `
        <div class="product-card">
            <div>画像</div>
            <div>${product.name}</div>
            <div class="price">¥${product.price}</div>
        </div>
    `;
    document.getElementById('discountAmount').value = current;
    updateDiscountSummary();
}

function updateDiscountSummary() {
    if (!selectedProduct) return;
    const discountValue = parseInt(document.getElementById('discountAmount').value) || 0;
    const finalPrice = selectedProduct.price - discountValue;
    document.getElementById('discountSummary').innerHTML = `
        ¥${selectedProduct.price} − ¥${discountValue} = <span class="price discounted">¥${finalPrice}</span>
    `;
}

function applyDiscount() {
    const amount = parseInt(document.getElementById('discountAmount').value) || 0;
    if (selectedProduct) {
        discounts[selectedProduct.product_code] = amount;
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
