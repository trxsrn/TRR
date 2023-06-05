function displayValue()
{
   var lname = document.getElementById("lastname").value;
   var gname = document.getElementById("givenname").value;
   var mi = document.getElementById("middleinitial").value;
   var suff = document.getElementById("suffix").value;
   var bday = document.getElementById("birthdate").value;
   var num = document.getElementById("number").value;
   var un = document.getElementById("unit").value;
   var st = document.getElementById("street").value;
   var brgy = document.getElementById("barangay").value;
   var cty = document.getElementById("city").value;
   var prov = document.getElementById("province").value;
   var coun = document.getElementById("country");
   var con = coun.value;
   const checkedBoxes = document.querySelectorAll('.checkbox:checked');
   const checkedValues = [];
   checkedBoxes.forEach(function(checkbox) {
     const value = checkbox.value;
     checkedValues.push(value);
   });
   const outputElement = document.getElementById('disciplines');
   outputElement.innerHTML = checkedValues.join('; ');

   var quali = document.getElementById("qualification");
   var qua = quali.value;
   var qualispec = document.getElementById("specific_qualification");
   var desig = document.getElementById("designation");
   var designation = desig.value;
   var affiliationn = document.getElementById("affiliation");
   var aff= affiliationn.value;
   var emaill = document.getElementById("eemail").value;
   var usname = document.getElementById("username").value;


   document.getElementById("last_name").innerHTML = lname;
   document.getElementById("given_name").innerHTML = gname;
   document.getElementById("middle_initial").innerHTML = mi;
   document.getElementById("suffixx").innerHTML = suff;
   document.getElementById("bthday").innerHTML = bday;
   document.getElementById("no").innerHTML = num;
   document.getElementById("address").innerHTML = un + " " + st  + " " + brgy + " " + cty  + " " + prov + " " + con;
   document.getElementById("disciplines").innerHTML = checkedValues;
   document.getElementById("quali").innerHTML = qua + "-" + qualispec;
   document.getElementById("designa").innerHTML = designation;
   document.getElementById("afflia").innerHTML = aff;
   document.getElementById("email").innerHTML = emaill;
   document.getElementById("uname").innerHTML = usname;

}