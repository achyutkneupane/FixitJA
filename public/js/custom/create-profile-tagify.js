function bindSubCat(data){
    var toEl = document.getElementById('kt_tagify_subcategory');

     
    
     
    var tagifyTo = new Tagify(toEl, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        
       
       whitelist: [
                {
                    value: 'Monday',
                    initials: '',
                    initialsState: '',
                    class: 'tagify__tag--primary'
                }, {
                    value: 'Tuesday',
                    
                    initials: '',
                    initialsState: '',
                    
                }, {
                    value: 'Wesneday',
                    
                    initials: '',
                    initialsState: '',
                   
                }, {
                    value: 'Thursday',
                    
                    initials: '',
                    initialsState: '',
                    
                }, {
                    value: 'Friday',
                
                    initials: '',
                    initialsState: '',
                
                }
            
                ],
        
        
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = ''; 

                     html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                        html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="text-muted font-weight-bold">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';


                    return html;
                } catch (err) {}
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        }
    });

}

$("#selected_catgeory1").on('change', function (e) {
    e.preventDefault();
    var result;
    var category_id = $(this).val();
    console.log(category_id);
    var data = getSubCatData(category_id);
    console.log(data);
      bindSubCat(data);
    
    
   
});


/*function getSubCatData(categoryId){
var subcategory = new Array();
$.ajax({
            type: "GET",
            url: '/profile/init' + categoryId,
            dataType: 'json',
            success: function (result) {
                $.each(result, function (i, item) {
                    //console.log(item.name);
                    subcategory.push(item);
                });
               
  
                console.log(subcategory);
            }
        });
       
return subcategory;*/

/* category 2*/

jQuery(document).ready(function () {
    var toE2 = document.getElementById('kt_tagify_subcategory2');
     
    
     
    var tagifyTo = new Tagify(toE2, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        
       
       whitelist: [
                {
                    value: 'Monday',
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_11.jpg',
                    class: 'tagify__tag--primary'
                }, {
                    value: 'Tuesday',
                    
                    initials: 'SS',
                    initialsState: 'warning',
                    pic: ''
                }, {
                    value: 'Wesneday',
                    
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_6.jpg'
                }, {
                    value: 'Thursday',
                    
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_8.jpg'
                }, {
                    value: 'Friday',
                
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_9.jpg'
                }
            
                ],
        
        
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = ''; 

                     html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                        html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="text-muted font-weight-bold">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';


                    return html;
                } catch (err) {}
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        }
    });

},

$("#selected_catgeory2").on('change', function (e) {
    e.preventDefault();
    var result;
    var category_id = $(this).val();
    console.log(category_id);
    var data = getSubCatData(category_id);
     
    
    
   
}));
function getSubCatData(categoryId){
var subcategory = new Array();
$.ajax({
            type: "GET",
            url: '/profile/' + categoryId,
            dataType: 'json',
            success: function (result) {
                $.each(result, function (i, item) {
                    //console.log(item.name);
                    subcategory.push(item);
                });
               
  
                console.log(subcategory);
            }
        });
       
return subcategory;
}

/* Category 3*/
jQuery(document).ready(function () {
    var toE3 = document.getElementById('kt_tagify_subcategory3');
     
    
     
    var tagifyTo = new Tagify(toE3, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        
       
       whitelist: [
                {
                    value: 'Monday',
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_11.jpg',
                    class: 'tagify__tag--primary'
                }, {
                    value: 'Tuesday',
                    
                    initials: 'SS',
                    initialsState: 'warning',
                    pic: ''
                }, {
                    value: 'Wesneday',
                    
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_6.jpg'
                }, {
                    value: 'Thursday',
                    
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_8.jpg'
                }, {
                    value: 'Friday',
                
                    initials: '',
                    initialsState: '',
                    pic: './assets/media/users/100_9.jpg'
                }
            
                ],
        
        
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = ''; 

                     html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                        html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="text-muted font-weight-bold">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';


                    return html;
                } catch (err) {}
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        }
    });

},

$("#selected_catgeory3").on('change', function (e) {
    e.preventDefault();
    var result;
    var category_id = $(this).val();
    var data = getSubCatData(category_id);
    console.log(data);
    
    
   
}));


