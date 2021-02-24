function bindSubCat(data){
    var toEl = document.getElementById('kt_tagify_custom');
     var  vals = data.map(function(a) { return A.val;});
     console.log(vals)
    
     
    var tagifyTo = new Tagify(toEl, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        
       
        whitelist: [
            {
               
               "value":"ashish", id:1

            },
            
        ],
        
        
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = ''; 

                    html += '<div class="tagify__dropdown__item">';
                    html += '   <div class="d-flex align-items-center">';
                    html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                    html += '           <span class="symbol-label" style="background-image: url(\'' + (tagData.pic ? tagData.pic : '') + '\')">' + (tagData.value ? tagData.value : '') + '</span>';
                    html += '       </span>';
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

$("#selected_catgeory").on('change', function (e) {
    e.preventDefault();
    var result;
    var category_id = $(this).val();
    var data = getSubCatData(category_id);
    console.log(data);
    
    
    bindSubCat(data);
});

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
