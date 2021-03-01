function bindSubCat1(data, subcat) {
    console.log(subcat);
    var toEl = document.getElementById(subcat);
        var tagifyTo = new Tagify(toEl, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        whitelist: data,
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                        // html += '           <span class="symbol-label" style="background-image: url(\'' + (tagData.pic ? tagData.pic : '') + '\')">' + (tagData.initials ? tagData.initials : '') + '</span>';
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
    console.log($(this).attr("subcatid"));
    
    var category_id = $(this).val();
    console.log(category_id);
    getSubCatData(category_id, this.getAttribute('subcatid'));
});
$("#selected_catgeory2").on('change', function (e) {
    e.preventDefault();
    var result;
    console.log($(this).attr("subcatid"));
    
    var category_id = $(this).val();
    console.log(category_id);
    getSubCatData(category_id, this.getAttribute('subcatid'));
});
$("#selected_catgeory3").on('change', function (e) {
    e.preventDefault();
    var result;
    console.log($(this).attr("subcatid"));
    
    var category_id = $(this).val();
    console.log(category_id);
    getSubCatData(category_id, this.getAttribute('subcatid'));
});

function getSubCatData(categoryId, subcatid) {
    var subcategory = new Array();
    $.ajax({
        type: "GET",
        url: '/profile/' + categoryId,
        dataType: 'json',
        success: function (result) {
            console.log(result);
            $.each(result, function (index, item) {
                var itemObj = {};
                itemObj.value = item.name;
                itemObj.initials = '',
                itemObj.initialsState = '',
                itemObj.class = 'tagify__tag--primary'
                subcategory.push(itemObj);
            });
             bindSubCat1(subcategory, subcatid);
        }
    });
}


