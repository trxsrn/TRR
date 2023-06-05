$( document ).ready(function() {

    $( ".edit-info" ).click(function() {
        $(".PopOutForm").css("display", "block");

      });

    $( "#ClosePopUp" ).click(function() {
        $(".PopOutForm").css("display", "none");
        $(".ChooseCV").css("display", "none");
      });
        
    $(".UpdateCV div button").click(function() {
        $(".ChooseCV").css("display", "block");

    });

    $(".UpdateCV div button").click(function() {
        $(".ChooseCV").css("display", "block");
    });

    $(".SaveChanges button").click(function() {
      swal({
        title: "Save Changes?",
        text: "Save all the changes on the Database?",
        icon: "warning",
        buttons: ["Don't Save", "Save"],
        dangerMode: false,
      })
      .then((Proceed) => {
        if (Proceed) {
          // Back 
        } else {
          // Don't Code Here
          swal("No Changes Applied!",{icon:"warning"});

        }
      });
      
    });

    

    var ContainerSlide=0,stations=1;
    $(".Sub-Proceed").click(function(){
      // Article Selection
      if (ContainerSlide==0) {
        if ($('.Article-Form div select').val()=="None"){
          swal("Please Select an Article Type");
        }
        else{
          effects();
        }
      }
      //Uploading File Area
      else if (ContainerSlide==-100) {
        if ($(".tbody").length){
          effects();   
        }
        else{
          swal("Upload your file first!");

        }
        
      }
      else if (ContainerSlide==-200) {
        if ($(".Comment-Form textarea").val()==""){
          swal({
            title: "Proceed?",
            text: "Reviewer will not be able to receive any comments coming from you. ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((Proceed) => {
            if (Proceed) {
              effects();  

            } else {
                
                }
          });
        }
        else{

          effects(); 
        }

      }

      //Manuscript Selection
      else if (ContainerSlide==-300) {
        let fundings=$(".funding-container").children(".input-Field").children("textarea").val();
        let titles=$(".title-container").children(".input-Field").children("textarea").val();
        let abstract=$(".abstract-container").children(".input-Field").children("textarea").val();
        let author=$(".author-container").children(".input-Field").children("textarea").val();
        
        if (abstract=="" || fundings=="" || titles=="" || author==""){
          swal("Please fill in all the fields");
        }
        else{

          effects();
        }
      }
      
      else if (ContainerSlide==-400) {
        effects();
        
      }
      
          });


    // BACK BUTTON
    $(".Dont-Proceed").click(function(){
      ContainerSlide=ContainerSlide+100;
      $( ".proc-slider" ).animate({
        left: ContainerSlide+"%"}, 500, function() {
        // Animation complete.
        });
        
        $(".fan"+stations).css({"color":"grey","animation-name":"none"});
        stations-=1;
        $(".fan"+stations).css({"color":"grey","animation-name":"roll"});
        $(".fan"+stations).css("color","#265999");
        $(".filler"+stations).css("width", "0%");    

    });

    //For showing the dropdown arrows INCREASED
    $(".input-Field div .btn-nxt" ).click(function(){
      let field_container=$(this).parent().parent().parent();//grandma container
      let container=$(this).parent().parent();//mother container
      var drpdwn_con = $( field_container ).index();//get the index val of every dropdown container
      let area=$(".ad-f").eq(drpdwn_con);//assign the equivalent index to determine which dropdown was open
     
      if (($(container).children("textarea").val())==""){
        if (drpdwn_con==0){
          swal("Title field cannot be blank!");
        }
        else if (drpdwn_con==1){
          swal("Abstract field cannot be blank!");
        }
        else if (drpdwn_con==2){
          swal("Author field cannot be blank!");
        }
      }
      else{
        $(area).children(".input-Field").slideToggle(300);
        drpdwn_con+=1;
        area=$(".ad-f").eq(drpdwn_con);
        $(area).children(".input-Field").slideToggle(300);
      }      
     });

    //For showing the dropdown arrows DECREASED
    $(".input-Field div .btn-bck" ).click(function(){
      field_container=$(this).parent().parent().parent();//grandma container
      container=$(this).parent().parent();//mother container
      drpdwn_con = $( field_container ).index();//get the index val of every dropdown container
      area=$(".ad-f").eq(drpdwn_con);//assign the equivalent index to determine which dropdown was open
      $(area).children(".input-Field").slideToggle(300);
      drpdwn_con-=1;
      area=$(".ad-f").eq(drpdwn_con);
      $(area).children(".input-Field").slideToggle(300);
          
     });
    




    
    // TRAVEL EFFECTS
    function effects(){
      if (ContainerSlide==-400){
        swal({
          title: "Submit File?",
          text: "You are about to send this file to author!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((Proceed) => {
          if (Proceed) {
            swal("File Submitted!", "File Successfully Submitted!", "success")
            .then((value) => {
              window.location.href = "Submissions-Menu.php";
            });
            
            
          } else {
              
              }
        });
      }
      else{
        ContainerSlide=ContainerSlide-100;
      
        $( ".proc-slider" ).animate({
          left: ContainerSlide+"%"}, 500, function() {
          // Animation complete.
          });
          $(".filler"+stations).css("width", "100%");
          $(".fan"+stations).css({"animation-name":"none","color":"#265999"});
          stations+=1;
          $(".fan"+stations).css({"animation-name":"roll","color":"#265999"});
      }
     
}
    


});