$( document ).ready(function() {

    var usertype = "";
    //For Switching User Login Form from Author to Researcher 
    $( ".btn-left" ).click(function() {
      $("#swiper").css("left","0%");
      usertype="Author";
    });

    $( ".btn-right" ).click(function() {
        $("#swiper").css("left","50%");
        usertype="Reviewer";
      });
    //Backend programmer can use this 'usertype' variable 
    //to determine the if user is researcher/reviewer. -Ced:)
});

