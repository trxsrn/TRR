let navlinks=document.querySelectorAll(".navbar-for-users");
let Body_Link=document.querySelector("body").id;

for (let link of navlinks ){
    if (link.dataset.active==Body_Link){
        link.classList.add("active-nav");
    }
}