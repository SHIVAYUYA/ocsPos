// 商品リストボタン
const product = document.getElementById('product_btn');

// 店舗追加ボタン
const storeAdd = document.getElementById('storeAdd_btn');

// 商品追加ボタン
const productAdd = document.getElementById('productAdd_btn');


// 商品リスト画面
const productList = document.querySelector('.productList--index');

// 店舗追加画面
const storeForm = document.querySelector('.storeForm--index');

// 店舗画面
const productForm = document.querySelector('.productForm--index')


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


// 以下、店舗追加コード
document.addEventListener("DOMContentLoaded", function () {
    // -------------------------------
    // 店舗の行追加
    // -------------------------------
    const addRowButton = document.querySelector(".store_btn--styleBox");
    const tableBody = document.querySelector(".storeForm--input tbody");

    addRowButton.addEventListener("click", function (event) {
        event.preventDefault();

        const newRow = document.createElement("tr");

        const classCell = document.createElement("td");
        classCell.innerHTML = `
            <select name="class">
                <option value="R4A">R4A</option>
                <option value="R4B">R4B</option>
                <option value="R4C">R4C</option>
                <option value="R3A">R3A</option>
                <option value="R3B">R3B</option>
                <option value="R3C">R3C</option>
                <option value="R2A">R2A</option>
                <option value="R2B">R2B</option>
                <option value="R2C">R2C</option>
                <option value="R1A">R1A</option>
                <option value="R1B">R1B</option>
                <option value="R1C">R1C</option>
            </select>
        `;

        const nameCell = document.createElement("td");
        nameCell.innerHTML = `<input type="text" name="custom2" placeholder="自由入力">`;

        const typeCell = document.createElement("td");
        typeCell.innerHTML = `
            <select name="type">
                <option value="飲食">飲食</option>
                <option value="アトラクション">アトラクション</option>
            </select>
        `;

        const roomCell = document.createElement("td");
        roomCell.innerHTML = `
            <select name="classNo">
                <option value="605">605</option>
                <option value="604">604</option>
                <option value="603">603</option>
                <option value="602">602</option>
                <option value="601">601</option>
                <option value="501">501</option>
                <option value="401">401</option>
                <option value="301">301</option>
                <option value="201">201</option>
                <option value="101">101</option>
            </select>
        `;

        newRow.appendChild(classCell);
        newRow.appendChild(nameCell);
        newRow.appendChild(typeCell);
        newRow.appendChild(roomCell);

        tableBody.insertBefore(newRow, tableBody.lastElementChild);
    });

    // -------------------------------
    // 商品の行追加
    // -------------------------------
    const productAddButton = document.querySelector(".productForm--index .product_btn--styleBox");
    const productTableBody = document.querySelector(".productForm--index .storeForm--input tbody");

    productAddButton.addEventListener("click", function (event) {
        event.preventDefault();

        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td></td>
            <td>
                <input type="text" name="productName" placeholder="自由入力">
            </td>
            <td class="picture-box">
                <input
                    type="file"
                    class="pictureInput"
                    multiple
                    accept="image/*"
                    style="display:none" />
                <button type="button" class="pictureSelectBtn">画像を選択</button>            
            </td>
            <td>
                <input type="text" name="price" placeholder="円">
            </td>
        `;

        productTableBody.insertBefore(newRow, productTableBody.lastElementChild);

        // 新しく追加した画像選択ボタンにもイベントを付与
        setupPictureButtons();
    });

    // -------------------------------
    // 画像選択ボタンイベント設定（複数対応）
    // -------------------------------
    function setupPictureButtons() {
        const buttons = document.querySelectorAll(".pictureSelectBtn");
        buttons.forEach(button => {
            button.removeEventListener("click", handlePictureClick); // 重複防止
            button.addEventListener("click", handlePictureClick);
        });
    }

    function handlePictureClick(event) {
        const button = event.currentTarget;
        const input = button.closest("td").querySelector(".pictureInput");

        if (input) {
            input.click();

            input.addEventListener("change", function () {
                if (input.files.length > 0) {
                    const names = Array.from(input.files).map(file => file.name).join(", ");
                    button.textContent = names;
                } else {
                    button.textContent = "画像を選択";
                }
            }, { once: true }); // 1回だけ変更監視（不要なイベントの累積防止）
        }
    }

    // 初期行に対して画像ボタンイベント設定
    setupPictureButtons();

});
