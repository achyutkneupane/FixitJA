'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      columns: [
        {
          field: 'ID',
          type: 'number',
          width: 50
        },
        {
          field: 'Name',
          type: 'string',
          width: 220,
          autoHide: false,
        }, {
          field: 'Status',
          title: 'Status',
          width: 80,
          // callback function support for column rendering
          template: function template(row) {
          var status = {
            completed: {
              'title': 'Completed',
              'class': ' label-light-success'
            },
            new: {
              'title': 'New',
              'class': ' label label-info label-inline mr-2'
            },
            pending: {
              'title': 'Pending',
              'class': ' label-light-danger'
            },
            assigned: {
              'title': 'Assigned',
              'class': ' label-light-warning'
            }
          };
            return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
          },
        }, {
        field: 'Type',
        title: 'Type',
        width: '80',
        // callback function support for column rendering
        template: function template(row) {
          var status = {
            'N/A': {
              'title': 'N/A',
              'state': 'danger'
            },
            'ready to hire': {
              'title': 'Ready To Hire',
              'state': 'success'
            },
            'planning': {
              'title': 'Planning',
              'state': 'warning'
            },
            'budgeting': {
              'title': 'Budgeting',
              'state': 'info'
            }
          };
          return '<span class=\"label label-' + status[row.Type].state + ' label-dot mr-2\"></span><span class=\"font-weight-bold text-' + status[row.Type].state + '\">' + status[row.Type].title + '</span>';
        }
      }, {
        field: 'Created For',
        type: 'string',
        width: 75,
      }, {
        field: 'Address',
        type: 'string',
        width: 75,
      }, {
        field: 'Category',
        type: 'string',
        width: 75,
      }, {
        field: 'Date',
        type: 'string',
        width: 100,
      },{
        field: "Actions",
        title: "Actions",
        width: 80,
      }],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});
