function formCheck(){
    var ime = document.getElementById("ime").value;
    var reIme = /^[A-Z][a-z]{2,9}(\s[A-Z][a-z]{2,14})+$/;
    var email = document.getElementById("email").value;
    var reEmail = /^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
    var subject = document.getElementById("subject").value;
    var msg = document.getElementById("txtarea").value;
    var greske= 0;

    if (!reIme.test(ime)) {
        $("#ime").next().next().next().css("display", "block");
        $("#ime").next().next().css("display", "none");
        greske++;
        }
    else {
        $("#ime").next().next().css("display", "block");
        $("#ime").next().next().next().css("display", "none");
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

    if(subject==""){
        $("#subject").next().next().next().css("display", "block");
        $("#subject").next().next().css("display", "none");
        greske++;
    }
    else {
        $("#subject").next().next().css("display", "block");
        $("#subject").next().next().next().css("display", "none");
    }

    if(msg==""){
        $("#txtarea").next().next().next().css("display", "block");
        $("#txtarea").next().next().css("display", "none");
        greske++;
    }
    else {
        $("#txtarea").next().next().css("display", "block");
        $("#txtarea").next().next().next().css("display", "none");
    }

    if(greske>0){
        return false;
    }
    else{
        return true;
    }
}


