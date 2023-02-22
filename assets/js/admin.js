window.onload = function () {
    
    //messages
        //remove
    
    $(".msgRem").click(function(){

    let id = $(this).data('id');
    $.ajax({
        url: "./deleteMsg.php",
        method: "POST",
        dataType: "json",
        data: {
            id:id
        },
        success: function(data){
            $("#msgDel").html("Message deleted!");
            $('[data-rowid="'+id+'"]').remove();
        },
        error: function(xhr, status, error){
        var msg ="";
        switch(xhr.status){
        case 404: msg = "Page not found";
        break;
        case 409: msg = "Username or email already exists";
        break;
        case 422: msg = "Data not entered in a valid format";
        break;
        case 500: msg = "Error";
        break;
        }
    }
    });
    })

    //users
        //remove
        $(".useRem").click(function(){

            let id = $(this).data('id');
            $.ajax({
                url: "./deleteUser.php",
                method: "POST",
                dataType: "json",
                data: {
                    id:id
                },
                success: function(data){
                    $("#useDel").html("User deleted!");
                    $('[data-rowid="'+id+'"]').remove();
                },
                error: function(xhr, status, error){
                var msg ="";
                switch(xhr.status){
                case 404: msg = "Page not found";
                break;
                case 409: msg = "Username or email already exists";
                break;
                case 422: msg = "Data not entered in a valid format";
                break;
                case 500: msg = "Error";
                break;
                }
            }
        });
    })
    

    // regex

    var reUser = /^[a-z0-9]{4,20}$/;
    var reEmail = /^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
    var rePass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    $("#proUp").hide();
    // update product
    $(".proEdit").click(function(){
        $("#proUp").show();
        var id_update = $(this).data("id");
        //////////////////////////////////////////////////////////////////////DOHVATI OSTALE VREDNOSTI
        $('#idUpdate').val(id_update);
//        document.getElementById("idUpdate").value = id_update;
    })
    $("#hideProUp").click(function(){
        $("#proUp").hide();
    })

    $("#btnFormUpdate").click(function(){
        var id = $('#idUpdate').val();
        var name = $('#nameUpdate').val();
        var price = $('#priceUpdate').val();
        var recommended = $('#recUpdate').val();
        var instock = parseInt($('#stockUpdate').val());
        // regex
        var reName = /^[A-Za-z0-9\&\s\-_,\.;:()]+$/;
        var rePrice = /^\d+\.?\d{2}$/;
        var greska=false;

        if (!reName.test(name)) {
            $("#nameUpdate").next().next().next().css("display", "block");
            $("#nameUpdate").next().next().css("display", "none");
            greska=true;
            }
        else {
            $("#nameUpdate").next().next().css("display", "block");
            $("#nameUpdate").next().next().next().css("display", "none");
        }
        if (!rePrice.test(price)) {
            $("#priceUpdate").next().next().next().css("display", "block");
            $("#priceUpdate").next().next().css("display", "none");
            greska=true;
            }
        else {
            $("#priceUpdate").next().next().css("display", "block");
            $("#priceUpdate").next().next().next().css("display", "none");
        }
        if(!greska){
            $.ajax({
                url: "updateProduct.php",
                method: "post",
                dateType: "json",
                data: {
                    id: id,
                    name: name,
                    price: price,
                    recommended: recommended,
                    instock: instock
                },
                success: function(data, textStatus, xhr){
                    console.log(data);
                    if(xhr.status == 200){
                        alert(data.message)
                    }
                },
                error: function (err) {
                console.log(err);
                }
                })
        }

    })
    // add user

    $("#addBtnForm").click(function(){
        var id = $(this).data("addid");
        console.log(id);
        var username = $('#usernameAdd').val();
        var email = $('#emailAdd').val();
        var password = $('#passwordAdd').val();
        var role = parseInt($('#roleAdd').val());
        console.log(role);
        var greska=false;

        if (!reUser.test(username)) {
            $("#usernameAdd").next().next().next().css("display", "block");
            $("#usernameAdd").next().next().css("display", "none");
            greska=true;
            }
        else {
            $("#usernameAdd").next().next().css("display", "block");
            $("#usernameAdd").next().next().next().css("display", "none");
        }
        if (!reEmail.test(email)) {
            $("#emailAdd").next().next().next().css("display", "block");
            $("#emailAdd").next().next().css("display", "none");
            greska=true;
            }
        else {
            $("#emailAdd").next().next().css("display", "block");
            $("#emailAdd").next().next().next().css("display", "none");
        }
        if (!rePass.test(password)) {
            $("#passwordAdd").next().next().next().css("display", "block");
            $("#passwordAdd").next().next().css("display", "none");
            greska=true;
            }
        else {
            $("#passwordAdd").next().next().css("display", "block");
            $("#passwordAdd").next().next().next().css("display", "none");
        }
        if(role==0){
            $("#roleAdd").css("border", "2px solid red");
            greska=true;
        }
        else{
            $("#roleAdd").css("border", "2px solid green");
        }
        
        if(!greska){
            $.ajax({
                url: "addUser.php",
                method: "post",
                dateType: "json",
                data: {
                id: id,
                username: username,
                email: email,
                password: password,
                role: role
                },
                success: function(data, textStatus, xhr){
                console.log(data);
                $("#useAdd").html("A user has been added  to the database!");
                if(xhr.status == 200){
                alert(data.message)
                }
                },
                error: function (err) {
                console.log(err);
                }
                })
        }
        
    })

    
    $("#userAdd").hide();
    $("#btnAddShow").click(function(){
        $("#userAdd").show();
    })
    $("#hideUserAdd").click(function(){
        $("#userAdd").hide();
    })

   
    
    
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

