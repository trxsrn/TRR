$(document).ready(function() {
    $(".paper__btn").click( function(){
        $(this).addClass("--active__link");
        $(this).children().eq(0).css("color", "#000000");
        $(".sub__paper__btn").slideToggle();
        $("#drp--dwn").toggleClass("rotateUp ");
    });

    $(".submission__btn").click( function(){
        $(this).addClass("--active__link");
        $(this).children().eq(0).css("color", "#000000");
        $(".sub__submission__btn").slideToggle();
        $("#drp--dwn").toggleClass("rotateUp ");
    });

    $(".nav__content span i").click( function(){
        $(".nav__bar").css("left", "-100vw");
        $(".header__box").children().eq(0).css({"gap":"1em","transition-delay":"none"});
    });
    
    $(".header__box div .menu").click( function(){
        $(".nav__bar").css("left", "0px");
        $(".header__box").children().eq(0).css("gap",$(".nav__bar").width()+"px");
    });

    $(".bell").click( function(){
        $(this).toggleClass("show");
        $(".Notification__block").toggle();
        $(".Settings__block").css("display","none");
        $(".settings").removeClass("show");
    });


    $(".settings").click( function(){
        $(".bell").removeClass("show");
        $(this).toggleClass("show");
        $(".Settings__block").toggle();
        $(".Notification__block").css("display","none");
    });


    function updateClock() {
        var My_Months=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var clockElement = $("#clock");
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var meridiem = "AM";
      
        // Convert to 12-hour format
        if (hours > 12) {
          hours = hours - 12;
          meridiem = "PM";
        }
      
        // Add leading zeros
        if (hours < 10) {
          hours = "0" + hours;
        }
        if (minutes < 10) {
          minutes = "0" + minutes;
        }
        if (seconds < 10) {
          seconds = "0" + seconds;
        }
      
        // Update the clock and Date
        $("#date").text(My_Months[currentTime.getMonth()] +" "+ currentTime.getDay()+", "+currentTime.getFullYear());
        clockElement.text(hours + ":" + minutes + ":" + seconds + " " + meridiem);
        //
        $(".DashBoard").css("padding-top", $(".header__nav").height()+"px");
      }
      updateClock(); // Call once to initialize
      setInterval(updateClock, 1000); // Call every second

  
  });