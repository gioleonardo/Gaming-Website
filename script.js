// NAVIGATION LINK INTERACTIVITY
var nav = document.querySelector(".nav-list");
var menu = document.querySelector("#menu-bar");

// USED TO ADD FUNCTIONALITY TO HAMBURGER MENU IN SMALLER SCERREN SIZES
menu.addEventListener('click', () => {
    var visibility = nav.getAttribute('data-visible');
    // console.log(visibility) - TEST FOR  MENU BAR VISIBILITY.

    // IF THE CSS ATTR (DATA VISIBLE= WHICH ALLOWS THE ITEMS UNDER IT TO BE VISIBLE ) 
    // IS SET THEN LEAVE IT ELSE SET TO FALSE(TO HIDE THE ITEMS AS THE HAMBURGER IS CLICKED) 
    if (visibility === "false"){
        nav.setAttribute('data-visible', true);
        menu.setAttribute('aria-expanded', true);
        menu.setAttribute('class', "fa-solid fa-xmark");
    } else{
        nav.setAttribute('data-visible', false);
        menu.setAttribute('aria-expanded', false);
        menu.setAttribute('class', "fa-solid fa-bars-staggered");
    }
})
// REGISTER AND LOGIN INTERACTIVITY
// 
// SHOW PASSWORD WHEN CHECKBOX IS TICKED
function show_password(){
    document.querySelectorAll("#reg_pwd, #login_pwd, #conf_pwd").forEach(function(password){
        if(password.type === "password"){
            password.type = "text";
        } else{
            password.type = "password";
        }
    })
   
}

