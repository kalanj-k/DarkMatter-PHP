window.onload = function () {
    $('#btnClear').click(clearCart);
    var products = load();
    checkCart(products);
    $('#btnRes').click(adjust);
}


function adjust() {
    const allRows = document.querySelectorAll('.cartRow')
    total = 0
    for (let i = 0; i < allRows.length; i++) {
        const currentRowPrice = document.querySelector(`.cartRow:nth-child(${i + 1}) .cartItemPrice`).textContent
        const currentRowParsed = parseFloat(currentRowPrice)
        const quantity = document.querySelector(`.cartRow:nth-child(${i + 1}) .qty`).value
        total += currentRowParsed * quantity
    }
    const totalDisplay = document.querySelector('#cartTotalPrice')
    totalDisplay.textContent = `${total.toFixed(2).toString()} €`
}

function cartSum(n) {
    let i = 0;
    return n.forEach(n => {
        i += parseFloat(n.price)
    }), i
}

function load() {
    return JSON.parse(localStorage.getItem("products"));
}

// back to top

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $('#backToTop').fadeIn();
        }
        else {
            $('#backToTop').fadeOut();
        }
    })

    $("#backToTop").click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    })
})

// anketa

function questionCheck(){
    let btns = document.getElementsByClassName("qbtn");
    var a=0;
    for(let i=0;i<btns.length;i++){
      if(btns[i].checked){
        a++;
      }
    }
    if(a<3){
        $("#nope").text("You have to answer all of our questions!");
        return false;
    }
    else{
        return true;
    }
}

// provera korpe

function checkCart(products) {
    if (products) {
        if (products.length) {
            loadFromCart();
        }
        else {
            showEmptyCart();
        }
    }
    else {
        showEmptyCart();
    }
}

// prikaz iz korpe

function loadFromCart() {
    let products = load();
    $.ajax({
        url: "allProducts.php",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data = data.filter(e => {
                for (let p of products) {
                    if (e.id == p.id) {
                        return true;
                    }
                }
            });
            printCart(data);
        }
    })
}

// print

function printCart(data) {
    let ispis = ``;
    data.forEach(e => {
        ispis += printRow(e);
    })
    ispis += `<tr>
    <td></td>
    <td></td>
    <th>TOTAL :</th>
    <td id="cartTotalPrice"></td>
    </tr>`

    $("#cart").html(ispis);
    const fixSum = cartSum(data).toFixed(2) + " €"
    $("#cartTotalPrice").text(fixSum);
}

// ispis jednog reda

function printRow(data) {
    console.log("printrow");
    
    return `
    <tr class="cartRow">
            <td valign="center">${data.name}</td>
            <td valign="center" class="cartItemPrice" value="${data.price}">${data.price} €</td>
            <td valign="center"><input type="number" value="1" id="quantity" class="qty" name="quantity" min="1"
                max="10"></td>
            <td valign="center"><button type="button" onclick="removeFromCart(${data.id})"class="btn btn-dark mt-2 cartRem">X</button>
        </td>
    </tr>
    `
}

function clearCart() {
    localStorage.removeItem("products");
    showEmptyCart();
}

// brisanje iz korpe

function removeFromCart(id) {
    let products = load();
    let filtered = products.filter(p => p.id != id);
    localStorage.setItem("products", JSON.stringify(filtered));
    checkCart(filtered)
}

// prikaz prazne korpe

function showEmptyCart() {
    $("#cart").html(`<tr class="cartRow">
    <th colspan="4" scope="row">Your cart is empty!</th></tr>`);
}
