$(document).ready(function () {
    
    $("#info").on("show.bs.modal", showInfo);

// back to top

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

    //reset filter

    $("#res").on("click", function() {
        console.log("A");
        window.location="shop.php";
    });

})

function showInfo(e){
    let id;
    id = $(e.relatedTarget).data("id");
    let that = $(this);
    $.ajax({
    url: "info.php?id=" + id,
    method: "GET",
    success: function(data) {
        $(that).find(".modal-content").html(data);

    },
    error: function(err) {
    console.error(err);
    }
 });

    
}

// storage

$(".btnCart1").on("click", eventBuy);

function eventBuy() {
    let id = $(this).data("id");console.log(id);
    addToCart(id);
   }
   function load() {
    return JSON.parse(localStorage.getItem("products"));
}

function addToCart(id) {
    var products = load();
    if (!products) {
        addFirstItem(id);
    }
    else {
        if (!doesExist(products, id)) {
            add(id);
        }
        else {
            alert("This item is already in your cart.");
        }
    }
}

// prvi item 

function addFirstItem(id) {
    var products = []
    products[0] = {
        id: id
    };
    localStorage.setItem("products", JSON.stringify(products));
}

// da li postoji u storage-u

function doesExist(products, id) {
    return products.find(p => p.id == id);
}

// popunjavanje

function add(id) {
    let products = JSON.parse(localStorage.getItem("products"))
    products.push({
        id: id
    })
    localStorage.setItem("products", JSON.stringify(products));
}