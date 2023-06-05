function getNavWidth(){
    const nav=document.querySelector('.navbar');
      var width=nav.getBoundingClientRect();
      document.getElementById("content").style.paddingLeft=width.width+"px";
      
      
    
     if ($(".PopOutCall").length){
      console.log("true");
      document.getElementById("PopOutCall").style.paddingLeft=width.width+"px";
     }
     else{
      console.log("false");

     }
    
  }
setInterval(getNavWidth,0);
  