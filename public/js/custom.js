/* for register select jquery */
$(document).ready(function(){
    $('#user_type').on('change', function(){
    console.log('hello');
    var selectedTYPE = $(this).children("option:selected").attr("id");
    console.log(selectedTYPE);
    //alert("You have selected the country - " + selectedTYPE);
    if( selectedTYPE == "type1" || selectedTYPE == "type3")
    {
      document.getElementById("gender").style.display="flex"; 
      document.getElementById("webs").style.display="flex";

      document.getElementById("comweb").style.display="none";
      document.getElementById("company").style.display="none";
    }
    else if (selectedTYPE == "type2")   {
      document.getElementById("comweb").style.display="flex";
      document.getElementById("company").style.display="flex";

      document.getElementById("gender").style.display="none"; 
      document.getElementById("webs").style.display="none";
    }
    else {
        //will never go here
    }
});
})
