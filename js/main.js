$(document).ready(function() {


    var myVideo = document.getElementById("my-video")
    myVideo.controls = false;

    var scrollLink = $('.scroll');

    // Smooth scrolling
    scrollLink.click(function(e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });



})

function sendContactMail(){
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1)    {
                document.getElementById("name").value="";
                document.getElementById("email").value="";
                document.getElementById("phone").value="";
                document.getElementById("message").value="";
                document.getElementById("formError").innerHTML = "";
                
                $("#contactApproved").fadeIn("7000");
                document.getElementById("contactApproved").style.display = "block";
             $('body,html').animate({
        scrollTop: $('#contact').offset().top
    }, 1000);
            }
            else
                document.getElementById("formError").innerHTML = myObj.regError;
        }
    }

    request.open("POST", '../sendMail.php', true);
    request.setRequestHeader('Content-type', 'application/json');
  
    var user_data = {
        "name": document.getElementById("name").value,
        "email": document.getElementById("email").value,
        "phone": document.getElementById("phone").value,
        "message": document.getElementById("message").value,
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}

function dropdownMenu() {
    var x = document.getElementById("dropdownClick");
    if (x.className === "topnav") {
        x.className += " responsive";
        /*change topnav to topnav.responsive*/
    } else {
        x.className = "topnav";
    }
}

function moveToContact() {
    $('body,html').animate({
        scrollTop: $('#contact').offset().top
    }, 1000);
}

// ===== Scroll to Top ==== 
var visible = false;
//Check to see if the window is top if not then display button
$(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    if (!visible && scrollTop > 100) {
        $(".scrollToTop").fadeIn();
        visible = true;
    } else if (visible && scrollTop <= 100) {
        $(".scrollToTop").fadeOut();
        visible = false;
    }
});

//Click event to scroll to top
$(".scrollToTop").click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 800);
    return false;
});