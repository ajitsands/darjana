/**
 * App Chat
 */

'use strict';

document.addEventListener('DOMContentLoaded', function () {
  (function () {
    const chatContactsBody = document.querySelector('.app-chat-contacts .sidebar-body'),
      chatContactListItems = [].slice.call(
        document.querySelectorAll('.chat-contact-list-item:not(.chat-contact-list-item-title)')
      ),
      chatHistoryBody = document.querySelector('.chat-history-body'),
      chatSidebarLeftBody = document.querySelector('.app-chat-sidebar-left .sidebar-body'),
      chatSidebarRightBody = document.querySelector('.app-chat-sidebar-right .sidebar-body'),
      chatUserStatus = [].slice.call(document.querySelectorAll(".form-check-input[name='chat-user-status']")),
      chatSidebarLeftUserAbout = $('.chat-sidebar-left-user-about'),
      formSendMessage = document.querySelector('.form-send-message'),
      messageInput = document.querySelector('.message-input'),
      searchInput = document.querySelector('.chat-search-input'),
      speechToText = $('.speech-to-text'), // ! jQuery dependency for speech to text
      userStatusObj = {
        active: 'avatar-online',
        offline: 'avatar-offline',
        away: 'avatar-away',
        busy: 'avatar-busy'
      };
      
    
      

    // Initialize PerfectScrollbar
    // ------------------------------

    // Chat contacts scrollbar
    if (chatContactsBody) {
      new PerfectScrollbar(chatContactsBody, {
        wheelPropagation: false,
        suppressScrollX: true
      });
    }

    // Chat history scrollbar
    if (chatHistoryBody) {
      new PerfectScrollbar(chatHistoryBody, {
        wheelPropagation: false,
        suppressScrollX: true
      });
    }

    // Sidebar left scrollbar
    if (chatSidebarLeftBody) {
      new PerfectScrollbar(chatSidebarLeftBody, {
        wheelPropagation: false,
        suppressScrollX: true
      });
    }

    // Sidebar right scrollbar
    if (chatSidebarRightBody) {
      new PerfectScrollbar(chatSidebarRightBody, {
        wheelPropagation: false,
        suppressScrollX: true
      });
    }

    // Scroll to bottom function
    function scrollToBottom() {
      chatHistoryBody.scrollTo(0, chatHistoryBody.scrollHeight);
    }
    scrollToBottom();

    // User About Maxlength Init
    if (chatSidebarLeftUserAbout.length) {
      chatSidebarLeftUserAbout.maxlength({
        alwaysShow: true,
        warningClass: 'label label-success bg-success text-white',
        limitReachedClass: 'label label-danger',
        separator: '/',
        validate: true,
        threshold: 120
      });
    }

   
    // Update user status
    chatUserStatus.forEach(el => {
      el.addEventListener('click', e => {
        let chatLeftSidebarUserAvatar = document.querySelector('.chat-sidebar-left-user .avatar'),
          value = e.currentTarget.value;
        //Update status in left sidebar user avatar
        chatLeftSidebarUserAvatar.removeAttribute('class');
        Helpers._addClass(
          'avatar avatar-xl chat-sidebar-avatar ' + userStatusObj[value] + '',
          chatLeftSidebarUserAvatar
        );
        //Update status in contacts sidebar user avatar
        let chatContactsUserAvatar = document.querySelector('.app-chat-contacts .avatar');
        chatContactsUserAvatar.removeAttribute('class');
        Helpers._addClass('flex-shrink-0 avatar ' + userStatusObj[value] + ' me-3', chatContactsUserAvatar);
      });
    });

    // Select chat or contact
    chatContactListItems.forEach(chatContactListItem => {
      // Bind click event to each chat contact list item
      chatContactListItem.addEventListener('click', e => {
        // Remove active class from chat contact list item
        chatContactListItems.forEach(chatContactListItem => {
          chatContactListItem.classList.remove('active');
        });
        // Add active class to current chat contact list item
        e.currentTarget.classList.add('active');
      });
    });

    // Filter Chats
    if (searchInput) {
      searchInput.addEventListener('keyup', e => {
        let searchValue = e.currentTarget.value.toLowerCase(),
          searchChatListItemsCount = 0,
          searchContactListItemsCount = 0,
          chatListItem0 = document.querySelector('.chat-list-item-0'),
          contactListItem0 = document.querySelector('.contact-list-item-0'),
          searchChatListItems = [].slice.call(
            document.querySelectorAll('#chat-list li:not(.chat-contact-list-item-title)')
          ),
          searchContactListItems = [].slice.call(
            document.querySelectorAll('#contact-list li:not(.chat-contact-list-item-title)')
          );

        // Search in chats
        searchChatContacts(searchChatListItems, searchChatListItemsCount, searchValue, chatListItem0);
        // Search in contacts
        searchChatContacts(searchContactListItems, searchContactListItemsCount, searchValue, contactListItem0);
      });
    }

    // Search chat and contacts function
    function searchChatContacts(searchListItems, searchListItemsCount, searchValue, listItem0) {
      searchListItems.forEach(searchListItem => {
        let searchListItemText = searchListItem.textContent.toLowerCase();
        if (searchValue) {
          if (-1 < searchListItemText.indexOf(searchValue)) {
            searchListItem.classList.add('d-flex');
            searchListItem.classList.remove('d-none');
            searchListItemsCount++;
          } else {
            searchListItem.classList.add('d-none');
          }
        } else {
          searchListItem.classList.add('d-flex');
          searchListItem.classList.remove('d-none');
          searchListItemsCount++;
        }
      });
      // Display no search fount if searchListItemsCount == 0
      // this Ajit Commented Because On above of Contact List I remove Chat List 
    //   if (searchListItemsCount == 0) {
    //     listItem0.classList.remove('d-none');
    //   } else {
    //     listItem0.classList.add('d-none');
    //   }
    }

    // Send Message
    formSendMessage.addEventListener('submit', e => {
      e.preventDefault();
      if (messageInput.value) {
          var currentTimeInKolkata = moment.tz("Asia/Kolkata").format('DD-MMM-YY hh:mm A');
        // Create a div and add a class
        let renderMsg = document.createElement('div');
        //renderMsg.className = 'chat-message chat-message-text mt-2 chat-message-right';
        //renderMsg.innerHTML = '<p class="mb-0 text-break">' + messageInput.value + '</p>';
        renderMsg.innerHTML ='<li class="chat-message chat-message-right">'+
                            '<div class="d-flex overflow-hidden" style="padding-top:10px;">'+
                              '<div class="chat-message-wrapper flex-grow-1">'+
                                '<div class="chat-message-text">'+
                                  '<p class="mb-0">'+messageInput.value+'</p>'+
                                '</div>'+
                                '<div class="text-end text-muted mt-1">'+
                                  '<i class="ri-check-double-line ri-14px text-secondary me-1"></i>'+
                                  '<small style="font-size:11px;">'+currentTimeInKolkata+'</small>'+
                                '</div>'+
                              '</div>'+
                              '<div class="user-avatar flex-shrink-0 ms-4">'+
                                '<div class="avatar avatar-sm">'+
                                  '<img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</li>';
        //$('.chat-history').append(renderMsg);
        //document.querySelector('.chat-history').appendChild(renderMsg);
        document.querySelector('.chat-history').append(renderMsg);
        
        
        
        messageInput.value = '';
        scrollToBottom();
      }
    });

    // on click of chatHistoryHeaderMenu, Remove data-overlay attribute from chatSidebarLeftClose to resolve overlay overlapping issue for two sidebar
    let chatHistoryHeaderMenu = document.querySelector(".chat-history-header [data-target='#app-chat-contacts']"),
      chatSidebarLeftClose = document.querySelector('.app-chat-sidebar-left .close-sidebar');
    chatHistoryHeaderMenu.addEventListener('click', e => {
      chatSidebarLeftClose.removeAttribute('data-overlay');
    });
    // }

    // Speech To Text
    if (speechToText.length) {
      var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
      if (SpeechRecognition !== undefined && SpeechRecognition !== null) {
        var recognition = new SpeechRecognition(),
          listening = false;
        speechToText.on('click', function () {
          const $this = $(this);
          recognition.onspeechstart = function () {
            listening = true;
          };
          if (listening === false) {
            recognition.start();
          }
          recognition.onerror = function (event) {
            listening = false;
          };
          recognition.onresult = function (event) {
            $this.closest('.form-send-message').find('.message-input').val(event.results[0][0].transcript);
          };
          recognition.onspeechend = function (event) {
            listening = false;
            recognition.stop();
          };
        });
      }
    }
  })();
  
  $('#btn_useredit').hide();
  
//   ******************** open add customer modal**************************
  $('.ri-user-add-line').click(function() {
      $('#selectAddType').modal('show');
       $('#btn_useredit').hide();
  });
  
  
  
//  *********************** add contact ****************************************************
   $('#btn_userAdd').click(function() {
    
        var fname = $('#modalUserFirstName').val();
        var lname = $('#modalUserLastName').val();
        var description = $('#modalDescription').val();
        var email = $('#modalUserEmail').val();
        var phoneNo = $('#modalUserPhone').val();
       if(fname!="" && lname!="" && phoneNo!=""){
              $.post('ajaxAdduser',{action:'addContact',fname:fname,lname:lname,description:description,email:email,phoneNo:phoneNo}, function(res){
                 if(res=="present"){
                     alert("phone number already present");
                 }
                 clear_adduser();
            
            });
        }
     
      
  });
  
  function clear_adduser(){
        $('#modalUserFirstName').val("");
        $('#modalUserLastName').val("");
        $('#modalDescription').val("");
        $('#modalUserEmail').val("");
        $('#modalUserPhone').val("");
  }
  
//   ************************** append contact to the chat screen *******************************
  
    $.post('ajaxAdduser',{action:'listContact'}, function(res){
        //   contact-list     
        $('#contact-list').append(res);
            
    });
    
    
 //   ************************** append contact to the group *******************************   
     $.post('ajaxAdduser',{action:'select_groups'}, function(res){
        // alert(res);
        //   contact-list     
        $('#group-list-contact').append(res);
            
    });
    
    // ************************ open contact edit modal ***********************************
    
     $('#editContact').click(function() {
         
         var mobile_number = $('#user_mobile_on_click').html();
        
         $.post('ajaxAdduser',{action:'loadeditcontactdetails',phoneNo:mobile_number}, function(res){
                var res = JSON.parse(res);
                var contact_details = res.data[0];
                
                var v_contact_id = contact_details.id;
                var fname = contact_details.first_name;
                var lname = contact_details.last_name;
                var description = contact_details.description;
                var email = contact_details.email;
                var phone_number = contact_details.phone_number;
                $('#modaleditUserFirstName').val(fname);
                $('#modaleditUserLastName').val(lname);
                $('#modaleditDescription').val(description);
                $('#modaleditUserEmail').val(email);
                $('#modaleditUserPhone').val(phone_number);
                $('#modaleditUserid').val(v_contact_id);
                
                
                
            });
            $('#editUser').modal('show');
  });
    
    // ************************ btn edit contact details *********************************** 
     $('#btn_userEdit').click(function() {
              var fname =  $('#modaleditUserFirstName').val();
              var lname =  $('#modaleditUserLastName').val();
              var description =  $('#modaleditDescription').val();
              var email =  $('#modaleditUserEmail').val();
              var phone_number =  $('#modaleditUserPhone').val();
              var v_contact_id =  $('#modaleditUserid').val();
         
         if(fname!="" && lname!="" && description!="" && email!=""){
              $.post('ajaxAdduser',{action:'editContact',fname:fname,lname:lname,description:description,email:email,v_contact_id:v_contact_id}, function(res){
                 clear_edituser();
            
            });
        }
     });
      function clear_edituser()
      {
            $('#modaleditUserFirstName').val("");
            $('#modaleditUserLastName').val("");
            $('#modaleditDescription').val("");
            $('#modaleditUserEmail').val("");
            $('#modaleditUserPhone').val("");
            $('#modaleditUserid').val("");
      }
    
    
    
    //****************************** message sent from chat********************************
    
    //   $('.send-msg-btn').on('click',function () {
    //       var v_input_msg = $('.message-input').val();
    //     //   var replay_msg_id = $('#replay_msg_id').val();
    //     var customer_number = $('#user_mobile_on_click').html();
              
    //       $.post('ajaxMessages',{action:'message_sent_to_a_user_from_chat',customer_number:customer_number,v_input_msg:v_input_msg,from_number:'919995489008'}, function(res){
            
    //       });
          
    //   });
    
    
    
    $('.send-msg-btn').on('click', function () {
   
    var activeTabId = $('.nav-link.active').attr('id');
    
    var tabType = '';
    if (activeTabId === 'tab_contacts') {
        tabType = 'contacts';
    } else if (activeTabId === 'tab_groups') {
        tabType = 'groups';
    }
    var v_input_msg = $('.message-input').val();
   
    if(activeTabId=='tab_groups')
    {
      var customer_number =$('#user_group_on_click').val();
      alert(customer_number);
      
       $.post('ajaxMessages', {
            action: 'message_sent_to_a_group_from_chat',
            customer_number: customer_number,
            v_input_msg: v_input_msg,
            from_number: '919995489008',
            tab_type: tabType 
        }, function (res) {
           
        });
      
      
    }
    else
     {
      var customer_number = $('#user_mobile_on_click').html();   
          $.post('ajaxMessages', {
            action: 'message_sent_to_a_user_from_chat',
            customer_number: customer_number,
            v_input_msg: v_input_msg,
            from_number: '919995489008',
            tab_type: tabType 
        }, function (res) {
           
        });
      
     }
     
    
  });

    
      
      //****************************** create group from chat********************************
      
             $('#btn_creategroup').on('click',function () {
                 alert("in");
                        var modalGroupName = $('#modalGroupName').val();
                        var modalGroupCode = $('#modalGroupCode').val();
                        var modalcolour = $('#modalcolour').val();
                        
                        
                        console.log("name"+modalGroupName+" modalGroupCode "+modalGroupCode+" modalcolour"+modalcolour);
                        
                        
           if(modalGroupName!="" && modalGroupCode!="" && modalcolour!="")
            {
                  $.post('ajaxAdduser',{action:'create_group',modalGroupName:modalGroupName,modalGroupCode:modalGroupCode,modalcolour:modalcolour}, function(res){
                        if(res=="present"){
                             alert("Group Name already present");
                         }
                         
                        $('#modalGroupName').val("");
                        $('#modalGroupCode').val("");
                        $('#modalcolour').val(""); 
                         
                  });
            }
      });
    // ********************* group combo load ************************
    var DataTables_contact_names = $('#DataTables_contact_names').DataTable({searching: true, paging: false, info: false,"ordering": false});
    load_contact_function(0);
            function load_contact_function(group_id,v_check=0)
                 {
                    DataTables_contact_names.destroy();
                         
                     DataTables_contact_names = $('#DataTables_contact_names').DataTable( {
                            
                             "ajax": {
                                 'type': 'POST',
                                 'url': 'ajaxAdduser',
                                 'data': {
                                    action: 'list_contact',
                                    group_id:group_id,
                                    v_check:v_check
                                 },
                            //  },
                                        'dataSrc': function (json) {
                                            // Ensure count is reset to 0 initially
                                            let count = 0;
                            
                                            // Iterate over the data to count rows with group_match === 'yes'
                                            if (json.data && json.data.length > 0) {
                                                json.data.forEach(function (row) {
                                                    if (row.group_match === 'yes') {
                                                        count++;
                                                    }
                                                });
                                            }
                            
                                            // Display the count
                                            $('#group_contacts').html(count + " Found");
                            
                                            // Return the data to DataTables
                                            return json.data;
                                        }
                                    },
                             "language": {
                                 "zeroRecords": "No records available",
                                 "infoEmpty": "No records available",
                              },
                           
            				"bPaginate": true,
            				"bLengthChange": false,
            				"bFilter": false,
            				"bInfo": false,
            				"autoWidth": false,
            				
                            "columns": [
                              
                                
                                { "data": "id",
                                     render: function(data, type, row) {
                                         if(row['group_match']=='yes'){
                                             return '<div class="form-check form-switch mb-6"><input class="form-check-input select-row" type="checkbox" data-id="' + data + '" checked></div>';
                                         }
                                         else{
                                             return '<div class="form-check form-switch mb-6"><input class="form-check-input select-row" type="checkbox" data-id="' + data + '"></div>';
                                         }
                                        
                                    }
                                 },
                                 { "data": "first_name"},
                                 { "data": "phone_number"},
                                 { "data": "group_name",
                                      render: function(data, type, row) {
                                          var groups_items = data.split(',');
                                          if(groups_items[0]=='No Group')
                                          {
                                              return '<span class="avatar-initial rounded-circle"style="background-color:#AD1714; width:23px; height:23px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;color:#ffffff;"><strong>NO</strong></span>   '+groups_items[0];
                                          }
                                          else{
                                              return '<span class="avatar-initial rounded-circle" style="background-color:'+groups_items[2]+'; width:23px; height:23px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;color:#ffffff;"><strong>'+groups_items[1]+'</strong></span>   '+groups_items[0];
                                          }
                                          
                                      }
                                 }
                                 
                             ],
                             pageLength: 25,
            				 searching: true,
                            // responsive: true,
            				
                            
                            
                             "initComplete": function( settings, json ) {
                                    
                                        
                                            
                              },
                              "fnDrawCallback": function() {
                               
             
                             },
                             
                           
                          });  
                
                 }
  
  
//   **************************** asign contacts to groups ************************************


   $('#btn_asigngroup').click(function() {
           var selectedIds = [];
            // Use `table.rows().nodes()` to get the actual nodes
            DataTables_contact_names.rows().nodes().each(function(node, index, dt) {
                var checkbox = $(node).find('.select-row');
                if (checkbox.is(':checked')) {
                    selectedIds.push(checkbox.data('id'));
                }
            });
            var group_id=$("#select2Icons option:selected").val();
            // alert(group_id);
             var result = selectedIds.join(',');
            //  alert("result"+result);
              $.post('ajaxAdduser',{action:'add_to_group',contact_id:result,v_group_id:group_id}, function(res){
                       
                         setupDropdown('dropdownContent','success',svgSuccess+'Assigned to group successfully','click');
                  });
             

   }); 
 
 
// *********************** load contact list according to group combo change ***************
// 
             $('#select2Icons').change(function() {
                var group_id = $(this).val();
                load_contact_function(group_id);
                
            });
 
// ************************ checkbox check ****************************************

            $('#showAllCheck').change(function() {
                 var group_id=$("#select2Icons option:selected").val();
                if ($(this).is(':checked')) {
                    load_contact_function(group_id,1);
                } else {
                    load_contact_function(group_id);
                }
            });
   
//   ********************* csv upload ********************************************
   
  $('#btn_userAdd_multiple').click(function() { 
    var group_id = $('#select2Icons_csv option:selected').val();
    var formData = new FormData($('#dropzone-basic')[0]);
    formData.append('file_csv_group', $('input[type=file]')[0].files[0]);
    formData.append('group_id', group_id);  // Append the group ID to the formData

    $.ajax({
        url: 'ajaxAdduser',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false
    }).done(function(result) {
        //alert(result);
        if(result=='Data successfully imported!')
          {
            setupDropdown('dropdownContent','success',svgSuccess+'Files Uploaded successfully','click');
           // $('#app-chat-contacts').empty();
           // load_contact_function(0);
         }
         else
          {
            setupDropdown('dropdownContent','error',svgSuccess+'Something Went Wrong','click'); 
          }
        
        //alert("done");
    }).fail(function() {
        
        console.log("An error occurred, the files couldn't be sent!");
    });
});


  // checkbox selection
     // ------------------------------
       var flag;
        $('#sendToContact').change(function() {
            if (this.checked) {
                $('#sendToGroup').prop('checked', false);
                $('#div_select_group').hide();
               // $('#inputGroupFileAddon04').prop('disabled', false);
                flag=1;
            }
            else
            {
               //$('#inputGroupFileAddon04').prop('disabled', true); 
            }
        });

        $('#sendToGroup').change(function() {
            if (this.checked) {
                $('#sendToContact').prop('checked', false);
                $('#div_select_group').show();
                flag=0;
                //$('#inputGroupFileAddon04').prop('disabled', false);
            }
            else
             {
               $('#div_select_group').hide(); 
               //$('#inputGroupFileAddon04').prop('disabled', true); 
             }
        });
      


//Send CSV to Contact List
//******************************

$('#inputGroupFileAddon04').click(function() { 
   
    var group_id; 

    if (flag == 1) {
        group_id = 0;   
    } else if (flag == 0) {
        group_id = $('#select_group_for_templates option:selected').val();   
    }
    
    if (group_id === 'select' && flag !== undefined) {
        setupDropdown('dropdownContent', 'error', svgSuccess + 'Please Select Any Group', 'click');   
        return false;
    }
  
    var formData = new FormData($('#dropzone-basic-template')[0]);
    formData.append('inputGroupFile04', $('input[type=file]')[0].files[0]);
    formData.append('group_id', group_id);  

    if (flag !== undefined) {
        $.ajax({
            url: 'ajaxAdduser',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).done(function(result) {
           
            if (result === 'Data successfully imported!') {
                setupDropdown('dropdownContent', 'success', svgSuccess + 'Files Uploaded successfully', 'click');
            } else {
                setupDropdown('dropdownContent', 'error', svgSuccess + 'Something Went Wrong', 'click'); 
            }
           
        }).fail(function() {
            console.log("An error occurred, the files couldn't be sent!");
        });
    }
});







   
   
});
