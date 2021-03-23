jQuery(document).ready(function () {
    var toEl = document.getElementById('kt_tagify_workingdays');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [
                {
                    value: 'Sunday',
                    
                   
                    class: 'tagify__tag--primary'
                },
                {
                    value: 'Monday',
                    
                   
                    class: 'tagify__tag--primary'
                }, {
                    value: 'Tuesday',
                    
                    
                    
                }, {
                    value: 'Wednesday',
                    
                   
                    
                }, {
                    value: 'Thursday',
                    
                  
                    
                }, {
                    value: 'Friday',
                
                   
                    
                },
                {
                    value: 'Saturday',
                    
                   
                    class: 'tagify__tag--primary'
                },
            
                ],
            templates: {
                dropdownItem: function (tagData) {
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                     
                        html += '       </span>';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="text-muted font-weight-bold">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) { }
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
});

