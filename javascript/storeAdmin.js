// 商品リストボタン
const product = document.getElementById('product_btn');

// 店舗追加ボタン
const storeAdd = document.getElementById('storeAdd_btn');

// 商品追加ボタン
const productAdd = document.getElementById('productAdd_btn');


// 商品リスト画面
const productList = document.querySelector('.produtList--index');

// 店舗追加画面
const storeForm = document.querySelector('.storeForm--index');

// 店舗画面
const productForm = document.querySelector('.productForm--index')

// 
// product.addEventListener('click',function(){   // storeAddボタンをクリックした時
//     storeAdd.classList.remove('active');        // 'buttonA' から 'active' が外される
//     productAdd.classList.remove('active');        // 'buttonB' から 'active' が外される
//     productList.classList.remove('active');        // 'screenA' から 'active' が外される
//     storeForm.classList.remove('active');        // 'screenB' から 'active' が外される
// });

// storeAdd.addEventListener('click',function(){   // Bボタンをクリックした時
//     storeAdd.classList.add('active');           // 'buttonA' に 'active' が追加される
//     productAdd.classList.add('active');           // 'buttonB' に 'active' が追加される
//     productList.classList.add('active');           // 'screenA' に 'active' が追加される
//     storeForm.classList.add('active');           // 'screenB' に 'active' が追加される
// });

// **すべてのボタンと画面の 'active' をリセット**
function resetActive() {
    product.classList.remove('active');
    storeAdd.classList.remove('active');
    productAdd.classList.remove('active');

    productList.classList.remove('active');
    storeForm.classList.remove('active');
    productForm.classList.remove('active');
}

// **商品リストボタンのクリック処理**
product.addEventListener('click', function () {
    resetActive();
    product.classList.add('active');
    productList.classList.add('active');
});

// **店舗追加ボタンのクリック処理**
storeAdd.addEventListener('click', function () {
    resetActive();
    storeAdd.classList.add('active');
    storeForm.classList.add('active');
});

// **商品追加ボタンのクリック処理**
productAdd.addEventListener('click', function () {
    resetActive();
    productAdd.classList.add('active');
    productForm.classList.add('active');
});
