function isExistedInCart(newItem, arrCart) {
    let myIndex = -1;
    arrCart.forEach((itemCart, index) => {
        if (newItem.id == itemCart.id && newItem.size == itemCart.size)
            myIndex = index;
    });
    return myIndex;
}
function loadShopingCart(id, name, price, img, size, quantity) {
    let updatedCart = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : []; //Chua cac mat hang hien co cua gio hang

    if (typeof Storage !== undefined) {
        let newItem =
        {
            id: id,
            name: name,
            price: price,
            image: img,
            size: size,
            quantity: quantity
        };

        if (JSON.parse(localStorage.getItem('cartItems')) === null || JSON.parse(localStorage.getItem('cartItems')).length == 0) {
            updatedCart.push(newItem);
            localStorage.setItem('cartItems', JSON.stringify(updatedCart));
            window.location.reload();
        } else {
            const updatedCart1 = JSON.parse(localStorage.getItem('cartItems'));
            if ((index = isExistedInCart(newItem, updatedCart1)) >= 0) {
                if (quantity > 1)
                    updatedCart[index].quantity = updatedCart[index].quantity + quantity;
                else
                    updatedCart[index].quantity++
            } else {
                updatedCart.push(newItem);
            }
        }
        localStorage.setItem('cartItems', JSON.stringify(updatedCart));
        window.location.reload();
    } else {
        alert('Local storage is not working on your browser');
    }
}
// console.log(JSON.parse(localStorage.getItem('cartItems')))


function showCart() {
    if (localStorage.cartItems == undefined) {
        swal({
            title: "Giỏ hàng của bạn đang trống",
            text: "Nhấn vào nút back để trở lại trang sản phẩm",
            icon: "error",
            button: "Back",
        });
        document.addEventListener('click', () => {
            location.href = "../php/index.php";
        })
    } else {
        let custommerCart = JSON.parse(localStorage.getItem('cartItems'));

        const tblHead = document.getElementsByTagName('thead')[0];
        const tblBody = document.getElementsByTagName('tbody')[0];
        const tblHFoot = document.getElementsByTagName('tfoot')[0];

        let headColumns = bodyRows = footColumns = '';

        headColumns += ` <tr>
                            <th class="container__table__title__item">Sản phẩm</th>
                            <th class="container__table__title__item">Số lượng</th>
                            <th class="container__table__title__item">Tổng tiền</th>
                            <th class="container__table__title__item">Xóa</th>
                        </tr>`;

        tblHead.innerHTML = headColumns;

        vat = total = amountPaid = 0;


        if (custommerCart[0] === null) {

            bodyRows += '<tr><td colspan="5">No items found</td></tr>'

        } else {

            custommerCart.forEach(item => {

                total += (Number(item.quantity) * Number(item.price.replace(/[^0-9]/g, "")));
                bodyRows +=
                    `<tr class="row-product">
                        <td>
                            <div class="container__table__product__info ps-3 py-3">
                                <img src="../admin/upload/${item.image}" alt="" class="container__table__product__info__img">
                                <div class="container__table__product__info__info">
                                    <div class="container__table__product__info__info__p productId"> 
                                        ${item.id}
                                    </div>
                                    <div class="container__table__product__info__info__p"> 
                                        ${item.name}
                                    </div>
                                    <div class="container__table__product__info__info__p productSize">
                                        ${item.size}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="container__table__product__quantity">
                                <p class="container__table__product__price__p">
                                    ${item.quantity}
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="container__table__product__price">
                                <p class="container__table__product__price__p">
                            ${(Number(item.quantity) * Number(item.price.replace(/[^0-9]/g, "")))}
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="container__table__product__delete">
                                <i onclick=deleteCart(${item.id}) class="bx bx-x-circle delete-icon"></i>
                            </div>
                        </td>
                    </tr>`
            });
        }
        tblBody.innerHTML = bodyRows;
        footColumns += `<tr> 
                            <td colspan="3">Total:</td> 
                            <td> ${formatCurrency(total)}</td> 
                        </tr>`;
        footColumns += `<tr> 
                            <td colspan="3">VAT (10%):</td> 
                            <td> ${formatCurrency(Math.floor(total * 0.1))} </td> 
                        </tr>`;
        footColumns += `<tr> 
                            <td colspan="3">Amount paid:</td> 
                            <td> ${formatCurrency(Math.floor(1.1 * total))} </td> 
                        </tr>`;
        tblHFoot.innerHTML = footColumns;
    }
}
// const row_product = document.querySelectorAll(".row-product");
// console.log(row_product);
// row_product.forEach((item) => {
//     console.log(item);
//     item.querySelectorAll(".delete-icon").addEventListener("click", () => {
//         const productId = item.querySelectorAll(".product-id").innerText;
//         const productSize = item.querySelectorAll(".product-size").innerText;
//         deleteCart(productId, productSize);
//     })
// })
function deleteCart(id) {
    let updatedCart = [];
    let custommerCart = JSON.parse(localStorage.getItem('cartItems'));
    custommerCart.forEach(item => {
        if (item.id != id) {
            updatedCart.push(item);
        }
    });
    localStorage.setItem('cartItems', JSON.stringify(updatedCart));
    window.location.reload();
};

const formatCurrency = (amount, locale = "vi-VN") => {
    return new Intl.NumberFormat(locale,
        {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        }).format(amount);
};
