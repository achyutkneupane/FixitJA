/*const { result } = require("lodash");*/

/* for register select jquery */
$(document).ready(function () {
    $('#user_type').on('change', function () {
        console.log('hello');
        var selectedTYPE = $(this).children("option:selected").attr("id");
        console.log(selectedTYPE);
        //alert("You have selected the country - " + selectedTYPE);
        if (selectedTYPE == "type1" || selectedTYPE == "type3") {
            document.getElementById("genders").style.display = "block";
            document.getElementById("webpersonal").style.display = "block";

            document.getElementById("webcompany").style.display = "none";
            document.getElementById("companyname").style.display = "none";
        } else if (selectedTYPE == "type2") {
            document.getElementById("webcompany").style.display = "block";
            document.getElementById("companyname").style.display = "block";

            document.getElementById("genders").style.display = "none";
            document.getElementById("webpersonal").style.display = "none";
        } else {
            document.getElementById("genders").style.display = "none";
            document.getElementById("webpersonal").style.display = "none";
            document.getElementById("webcompany").style.display = "none";
            document.getElementById("companyname").style.display = "none";

        }
    });

    /* for password fields */
    /*$('#psw').on('keypress', function(){
    document.getElementById("passwordinfo").style.display = "block";
});*/

    /* for Profile wizard step 2 */

    $("#selected_catgeory").on('change', function (e) {

        var category_id = $(this).val();
        $('.card-title').attr("category_id");


    });

    /* for dymanic accordance */

    $('#add_btn').click(function () {

        var intialcount = 0;
        var maxcount = 3;

        if('#add_btn')


        
        
        document.getElementById("card_two").style.display = "block";
        document.getElementById("card_three").style.display = "block";
        document.getElementById("add_btn").style.display = "none";
        document.getElementById("remove1").style.display = "none";


    });
     $('#remove1').click(function () {
         $('#card_one').empty();
    });
    $('#remove').click(function () {
         $('#card_two').empty();
    });
     $('#remove3').click(function () {
         $('#card_three').empty();
    });

    $('#selected_catgeory1').on('change', function (e) {

        e.preventDefault();
        var data = $(this).children("option:selected").text();
        $("#cat1").html('<p>You  select'  +  data     + ' category</p>')
       
    }),
    $('#selected_catgeory2').on('change', function (e) {

        e.preventDefault();
        
        var data = $(this).children("option:selected").text();
        $("#cat2  ").html('<p>You  select'  +  data     + ' category</p>')
    }),
    $('#selected_catgeory3').on('change', function (e) {

       e.preventDefault();
        var data = $(this).children("option:selected").text();
        $("#cat3").html('<p>You  select'  +  data     + ' category</p>')
    }),

    function getCatgeory(categoryId) {
        var subcategory = new Array();
        $.ajax({
            type: "GET",
            url: 'profile/',
            dataType: 'json',
            data: data,
            success: function (data) {

                data = JSON.parse(data);
                console.log(data)
                $('#choosencategory').val(data.name);


            }
        });

    }

    /* for calandar validation */


    var dateControler = {
        currentDate: null
    }

    $('#selectstartdate').on("change", function(e) {
        var now = new Date();
        var selectedDate = new Date($(this).val());
        console.log(selectedDate);


        if (selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }


    })

    $('#selectenddate').on("change", function (e) {

        var now = new Date();
        var selectedDate = new Date($(this).val());
        console.log(selectedDate);


        if (selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }


    });


    /*  for  Range slider */

    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function () {
        output.innerHTML = this.value;
    }












});
