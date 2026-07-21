/**
 * DataTables Advanced (jquery)
 */

'use strict';

$(function () {
  var dt_ajax_table = $('.datatables-ajax'),
    dt_filter_table = $('.dt-column-search'),
    dt_adv_filter_table = $('.dt-advanced-search'),
    dt_responsive_table = $('.dt-responsive'),
    startDateEle = $('.start_date'),
    endDateEle = $('.end_date');

  // Advanced Search Functions Starts
  // --------------------------------------------------------------------

  // Datepicker for advanced filter
  var rangePickr = $('.flatpickr-range'),
    dateFormat = 'MM/DD/YYYY';

  if (rangePickr.length) {
    rangePickr.flatpickr({
      mode: 'range',
      dateFormat: 'm/d/Y',
      orientation: isRtl ? 'auto right' : 'auto left',
      locale: {
        format: dateFormat
      },
      onClose: function (selectedDates, dateStr, instance) {
        var startDate = '',
          endDate = new Date();
        if (selectedDates[0] != undefined) {
          startDate = moment(selectedDates[0]).format('MM/DD/YYYY');
          startDateEle.val(startDate);
        }
        if (selectedDates[1] != undefined) {
          endDate = moment(selectedDates[1]).format('MM/DD/YYYY');
          endDateEle.val(endDate);
        }
        $(rangePickr).trigger('change').trigger('keyup');
      }
    });
  }

  // Filter column wise function
  function filterColumn(i, val) {
    if (i == 5) {
      var startDate = startDateEle.val(),
        endDate = endDateEle.val();
      if (startDate !== '' && endDate !== '') {
        $.fn.dataTableExt.afnFiltering.length = 0; // Reset datatable filter
        dt_adv_filter_table.dataTable().fnDraw(); // Draw table after filter
        filterByDate(i, startDate, endDate); // We call our filter function
      }
      dt_adv_filter_table.dataTable().fnDraw();
    } else {
      dt_adv_filter_table.DataTable().column(i).search(val, false, true).draw();
    }
  }

  // Advance filter function
  // We pass the column location, the start date, and the end date
  $.fn.dataTableExt.afnFiltering.length = 0;
  var filterByDate = function (column, startDate, endDate) {
    // Custom filter syntax requires pushing the new filter to the global filter array
    $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
      var rowDate = normalizeDate(aData[column]),
        start = normalizeDate(startDate),
        end = normalizeDate(endDate);

      // If our date from the row is between the start and end
      if (start <= rowDate && rowDate <= end) {
        return true;
      } else if (rowDate >= start && end === '' && start !== '') {
        return true;
      } else if (rowDate <= end && start === '' && end !== '') {
        return true;
      } else {
        return false;
      }
    });
  };

  // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
  var normalizeDate = function (dateString) {
    var date = new Date(dateString);
    var normalized =
      date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
    return normalized;
  };
  // Advanced Search Functions Ends

  // Ajax Sourced Server-side
  // --------------------------------------------------------------------

  if (dt_ajax_table.length) {
    var dt_ajax = dt_ajax_table.dataTable({
      processing: true,
      ajax: assetsPath + 'json/ajax.php',
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  // Column Search
  // --------------------------------------------------------------------

  if (dt_filter_table.length) {
    // Setup - add a text input to each footer cell
    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');
    $('.dt-column-search thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      var $input = $('<input type="text" class="form-control" placeholder="Search ' + title + '" />');

      // Add left and right border styles to the parent element
      $(this).css('border-left', 'none');
      if (i === $('.dt-column-search thead tr:eq(1) th').length - 1) {
        $(this).css('border-right', 'none');
      }

      $(this).html($input);

      $('input', this).on('keyup change', function () {
        if (dt_filter.column(i).search() !== this.value) {
          dt_filter.column(i).search(this.value).draw();
        }
      });
    });

    var dt_filter = dt_filter_table.DataTable({
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: 'full_name' },
        { data: 'email' },
        { data: 'post' },
        { data: 'city' },
        { data: 'start_date' },
        { data: 'salary' }
      ],
      orderCellsTop: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  // Advanced Search
  // --------------------------------------------------------------------

  // Advanced Filter table
  if (dt_adv_filter_table.length) {
    var dt_adv_filter = dt_adv_filter_table.DataTable({
      dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'p>>",
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: '' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'post' },
        { data: 'city' },
        { data: 'start_date' },
        { data: 'salary' }
      ],

      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        }
      ],
      orderCellsTop: true,
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  // on key up from input field
  $('input.dt-input').on('keyup', function () {
    filterColumn($(this).attr('data-column'), $(this).val());
  });

  // Responsive Table
  // --------------------------------------------------------------------
var actions = {
              '1': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Sent" data-bs-original-title="Sent"><i class="ri-send-plane-line ri-20px text-success me-1 "></i></span>';
              },
              '2': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delivered" data-bs-original-title="Delivered"><i class="ri-check-double-line ri-20px text-secondary me-1"></i></span>';
              },
             
              '3': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Read" data-bs-original-title="Read"><i class="ri-check-double-line ri-20px text-success me-1"></i></span>';
              },
              '4': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Failed" data-bs-original-title="Failed"><i class="ri-close-line ri-20px text-danger me-1"></i></span>';
              }
              ,
              '5': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Respond" data-bs-original-title="Respond"><i class="ri-chat-smile-line ri-20px text-info me-1"></i></span>';
              }
              ,
              '6': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Replied" data-bs-original-title="Replied"><i class="ri-question-answer-line  ri-20px text-warning me-1"></i></span>';
              },
              '7': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Resend" data-bs-original-title="Resend"><i class="ri-reply-line ri-20px text-warning me-1"></i></span>';
              },
              '8': function() {
                return '<span class="badge" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="No Status" data-bs-original-title="No Status"><i class="ri-chat-off-line ri-20px text-danger me-1"></i></span>';
              }
            };
  if (dt_responsive_table.length) {
    var dt_responsive = dt_responsive_table.DataTable({
      ajax: {
        //url: 'controller/messages.php',
        url: 'ajaxMessages',
        type: 'POST', // Use POST method
        data: function (d) {
            d.action = 'list_of_messages'
        }
    },
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'message_id',visible: false },
        { data: 'recipient_id', 
            render: function (data, type, full, meta) {
                var status = full['updated_status'];
                if(status=='Respond'){
                   return '<span class="badge rounded-pill bg-label-info recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='read'){
                   return '<span class="badge rounded-pill bg-label-success-read recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='Resend'){
                   return '<span class="badge rounded-pill bg-label-warning recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='delivered'){
                   return '<span class="badge rounded-pill bg-label-secondary recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='sent'){
                   return '<span class="badge rounded-pill bg-label-success recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='Replied'){
                   return '<span class="badge rounded-pill bg-label-warning recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else if(status=='failed'){
                   return '<span class="badge rounded-pill bg-label-danger recipent_number">'+data+'</span>'+full['recipient_name'];
              
                }
                else{
                    return '<span class="badge rounded-pill bg-label-danger recipent_number">'+data+'</span>'+full['recipient_name'];
                }
            }
        },
        { data: 'message_body',"className":'truncate-tooltip'},
        { data: 'phone_number',visible: false},
        { data: 'timestamp' },
        { data: 'updated_date' },
        { data: 'updated_status' }
      ],
      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          searchable: false,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
            "targets": 4, // Replace 0 with the index of the "customer_name" column
            "createdCell": function (td, cellData, rowData, row, col) {
              $(td).addClass('truncate-tooltip');
              $(td).attr('message-body', '<span style="font-size:10px">'+rowData['updated_date'] + '</span><hr style="margin:0;padding:0;"> ## '+rowData['message_body']);
            }
        },
        {
          // Label
          targets: -1,
          render: function (data, type, full, meta) {
            var $status_number = full['updated_status'];
            var $status = {
              1: { title: 'sent', class: 'bg-label-primary'},
              2: { title: 'delivered', class: 'bg-label-warning'},
              3: { title: 'read', class: 'bg-label-primary_read'},
              4: { title: 'failed', class: 'bg-label-danger'},
              5: { title: 'Respond', class: 'bg-label-danger'},
              6: { title: 'Replied', class: 'bg-label-primary_blue'},
              7: { title: 'Resend', class: 'bg-label-primary_resent'}
            };
            for (var key in $status) {
                if ($status[key].title === full['updated_status']) {
                    $status_number = key;
                    break;
                }
            }
            
            
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            
            
            var statusInfo = actions[$status_number] ? actions[$status_number]() : actions[8]();
            
            return statusInfo;
            // return (
          
            // //   '<span class="badge rounded-pill ' +
            // //   $status[$status_number].class +
            // //   '">' +
            // //   $status[$status_number].title +
            // //   '</span>'
              
            

            // );
            
            
          }
        }
      ],
      // scrollX: true,
      destroy: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }
     var customer_number='';
     var row_data='';
     var row;
     var rowDataNew;
     var $badge
     //var clicked_row_table = $('.dt-responsive tbody').DataTable(); // Replace with your table ID;
      $('.dt-responsive tbody').on('click', 'span.badge, span.recipent_number', function () {
        $badge = $(this);
        row_data = dt_responsive.row($badge.closest('tr')).data();
        
         row = dt_responsive.row($badge.closest('tr')); // Get the DataTable row object
         rowDataNew = row.data(); // Get the data for the clicked row
        
        
        var updated_status = row_data['updated_status'];
        console.log(updated_status);
        if (($.trim(updated_status)=== "read") || ($.trim(updated_status)=== "delivered") || ($.trim(updated_status)=== "Respond") || ($.trim(updated_status)=== "sent")) {
        
            var offcanvasElement = document.getElementById('offcanvasBackdrop');
            var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
            $('.offcanvas-title').html("Message With : "+row_data['recipient_id']);
            customer_number = row_data['recipient_id'];
            var replay_msg_id =   row_data['id'];
            $('#replay_msg_id').val(replay_msg_id);
            $('.chat-history').empty();
            $.post('ajaxAdduser',{action:'chatHistory',customerNumber: customer_number}, function(res){
                    //   contact-list     
                    $('.chat-history').append(res);
                        
            });
            
            
            
              
        }
        
        
          
      });
    
        // $('.dt-responsive tbody').on('click', 'span.badge, span.recipent_number', function () {
        //       var $badge = $(this);
        //       var row = dt_responsive.row($badge.closest('tr')); // Get the DataTable row object
        //       var rowData = row.data(); // Get the data for the clicked row
            
        //       // Update the data within the row object
        //       rowData.updated_status = 'New Value';
            
        //       // Update the DataTable with the modified data
        //       row.invalidate(); // Mark the row as changed
        //       dt_responsive.draw(); // Redraw the table to reflect the change
        // });
      $('.send-msg-btn').on('click',function () {
          var v_input_msg = $('#input_msg').val();
           var replay_msg_id = $('#replay_msg_id').val();
               //   alert(v_input_msg);
          $.post('ajaxMessages',{action:'message_sent_to_a_user',customer_number:customer_number,v_input_msg:v_input_msg,from_number:row_data['phone_number'],replay_msg_id:replay_msg_id}, function(res){
              //updateRowStatus(replay_msg_id);
             //console.log(rowDataNew.updated_status);
             rowDataNew.updated_status = rowDataNew.updated_status === 'Respond' ? 'Replied' : 'Resend';

            //  if(rowDataNew.updated_status=='Respond')
            //  {
            //       rowDataNew.updated_status = 'Replied';
            //  }
            //  else
            //  {
            //      rowDataNew.updated_status = 'Resend';
            //  }
              // Update the DataTable with the modified data
              row.invalidate(); // Mark the row as changed
              dt_responsive.draw(); // Redraw the table to reflect the change
          })
          
      });
  
     
     dt_responsive.on('draw.dt', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        boundary: document.body
      });
    });
  });
     
     
});
