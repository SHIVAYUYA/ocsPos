// 商品追加ボタン
const storeAdd = document.getElementById('storeAdd_btn');

// Bボタン
const productAdd = document.getElementById('productAdd_btn');

// A画面
const productList = document.querySelector('.produtList--index');

// B画面
const storeForm = document.querySelector('.storeForm--index');

// C画面
const productForm = document.querySelector('.productForm--index')

storeAdd.addEventListener('click',function(){   // storeAddボタンをクリックした時
    storeAdd.classList.remove('active');        // 'buttonA' から 'active' が外される
    productAdd.classList.remove('active');        // 'buttonB' から 'active' が外される
    productList.classList.remove('active');        // 'screenA' から 'active' が外される
    storeForm.classList.remove('active');        // 'screenB' から 'active' が外される
});

productAdd.addEventListener('click',function(){   // Bボタンをクリックした時
    storeAdd.classList.add('active');           // 'buttonA' に 'active' が追加される
    productAdd.classList.add('active');           // 'buttonB' に 'active' が追加される
    productList.classList.add('active');           // 'screenA' に 'active' が追加される
    storeForm.classList.add('active');           // 'screenB' に 'active' が追加される
});
