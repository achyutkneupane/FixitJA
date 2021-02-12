/* for register select jquery */
$(document).ready(function(){
    $('#user_type').on('change', function(){
    console.log('hello');
    var selectedTYPE = $(this).children("option:selected").attr("id");
    console.log(selectedTYPE);
    //alert("You have selected the country - " + selectedTYPE);
    if( selectedTYPE == "type1" || selectedTYPE == "type3")
    {
      document.getElementById("genders").style.display="block";
      document.getElementById("webpersonal").style.display="block";

      document.getElementById("webcompany").style.display="none";
      document.getElementById("companyname").style.display="none";
    }
    else if (selectedTYPE == "type2")   {
      document.getElementById("webcompany").style.display="block";
      document.getElementById("companyname").style.display="block";

      document.getElementById("genders").style.display="none";
      document.getElementById("webpersonal").style.display="none";
    }
    else {
      document.getElementById("genders").style.display="none";
      document.getElementById("webpersonal").style.display="none";
      document.getElementById("webcompany").style.display="none";
      document.getElementById("companyname").style.display="none";

    }
});

  /* for password fields */
  $('#psw').on('keypress', function(){
    document.getElementById("passwordinfo").style.display = "block";
});

});
