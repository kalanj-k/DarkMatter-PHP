function formCheck(){
    var user = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var reUser = /^[a-z0-9]{4,20}$/;
    var reEmail = /^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
    var rePass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    var greske= 0;

    if (!reUser.test(user)) {
        $("#username").next().next().next().css("display", "block");
        $("#username").next().next().css("display", "none");
        greske++;
        }
    else {
        $("#username").next().next().css("display", "block");
        $("#username").next().next().next().css("display", "none");
    }

    if (!reEmail.test(email)) {
        $("#email").next().next().next().css("display", "block");
        $("#email").next().next().css("display", "none");
        greske++;
    }
    else {
        $("#email").next().next().css("display", "block");
        $("#email").next().next().next().css("display", "none");
    }

    if (!rePass.test(pass)) {
        $("#password").next().next().next().css("display", "block");
        $("#password").next().next().css("display", "none");
        greske++;
    }
    else {
        $("#password").next().next().css("display", "block");
        $("#password").next().next().next().css("display", "none");
    }
    if(greske>0){
        return false;
    }
    else{
        return true;
    }
}