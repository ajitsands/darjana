     <div class="modal fade" id="addContactGroup" tabindex="-1" data-select2-id="addContactGroup" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg modal-simple modal-add-user">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0" data-select2-id="76" style="padding: 20px;">
                      <div class="text-center mb-6">
                        <h5 class="mb-2">Group Management</h5>
                        <!--<p class="mb-6">Updating user details will receive a privacy audit.</p>-->
                      </div>
                      
                            <div class="accordion mt-4" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                                      Create Group
                                    </button>
                                  </h2>
            
                                  <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                            <!--********************* create group body ******************************-->
                                            
                                                    <form id="createGroup" class="row g-5 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate" data-select2-id="createGroup">-->
                                                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                                                          <div class="form-floating form-floating-outline">
                                                            <input type="text" id="modalGroupName" name="group_name" class="form-control" placeholder="Group Name">
                                                            <label for="modalGroupName">Group Name</label>
                                                          </div>
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                                        <div class="col-12 col-md-2 fv-plugins-icon-container">
                                                          <div class="form-floating form-floating-outline">
                                                            <input type="text" id="modalGroupCode" name="icon_code" class="form-control" placeholder="Two Letters Only" oninput="this.value = this.value.toUpperCase()">
                                                            <label for="modalGroupCode">Group Code</label>
                                                          </div>
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                                        <div class="col-12 col-md-2 fv-plugins-icon-container">
                                                          <div class="form-floating form-floating-outline">
                                                            <input type="color" id="modalcolour" name="color_code" class="form-control">
                                                            <label for="modalcolour">Color</label>
                                                          </div>
                                                        </div>
                                                       
                                                        
                                                           
                                                        <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                                                          <button type="submit" id="btn_creategroup" class="btn btn-primary waves-effect waves-light">Create Group</button>
                                                          
                                                        </div>
                                                      <input type="hidden"></form>
                                            
                                            <!--************************* / create group****************************-->
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                      Asign Contacts to Groups
                                    </button>
                                  </h2>
                                  <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                            <!--********************** body **************************-->
                                            <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-floating form-floating-outline">
                                                         <?php include('templates/groups_load_comb.php')?>
                                                        <label for="multicol-country">Group</label>
                                                        <span id="group_contacts">Found</span>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check mt-4">
                                                          <input class="form-check-input" type="checkbox" value="" id="showAllCheck">
                                                          <label class="form-check-label" for="showAllCheck"> Show All </label>
                                                        </div>
                                                    </div>
                                            </div>        
                                            <!--************************** /body ************************-->
                                            <!-- ************************** datatable*************-->
                                                    <table class="dt-responsive table table-bordered dataTable " id="DataTables_contact_names" aria-describedby="DataTables_Table_3_info" style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                              <th ></th>
                                                              <th  style="align:center">Name</th>
                                                              <th style="align:center">Contact No</th>
                                                              <th style="align:center">Group Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                       
                                                      </table>
                                            <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                                                <button type="submit" id="btn_asigngroup" class="btn btn-primary waves-effect waves-light">Asign to Group</button>
                                              
                                            </div>
                                    </div>
                                           
                                  </div>
                                            
                                </div>
                                            
                              </div>
                                          
                      <!--<form id="UserForm" class="row g-5 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate" data-select2-id="editUserForm">-->
                      <!--  <div class="col-12 col-md-6 fv-plugins-icon-container">-->
                      <!--    <div class="form-floating form-floating-outline">-->
                      <!--      <input type="text" id="modalUserFirstName" name="modalUserFirstName" class="form-control" placeholder="Group Name">-->
                      <!--      <label for="modalUserFirstName">Group Name</label>-->
                      <!--    </div>-->
                      <!--  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>-->
                      <!--  <div class="col-12 col-md-3 fv-plugins-icon-container">-->
                      <!--    <div class="form-floating form-floating-outline">-->
                      <!--      <input type="text" id="modalUserLastName" name="modalUserLastName" class="form-control" placeholder="Two Letters Only">-->
                      <!--      <label for="modalUserLastName">Group Code</label>-->
                      <!--    </div>-->
                      <!--  <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>-->
                      <!--  <div class="col-12 col-md-3 fv-plugins-icon-container">-->
                      <!--    <div class="form-floating form-floating-outline">-->
                      <!--      <input type="color" id="modalDescription" name="modalDescription" class="form-control" placeholder="Description">-->
                      <!--      <label for="modalDescription">Color</label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                       
                        
                           
                      <!--  <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">-->
                      <!--    <button type="submit" id="btn_userAdd" class="btn btn-primary waves-effect waves-light">Create Group</button>-->
                      <!--    <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">-->
                      <!--      Cancel-->
                      <!--    </button>-->
                      <!--  </div>-->
                      <!--<input type="hidden"></form>-->
                    </div>
                    <div style="padding-top:20px;">
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close" style="width:100px;">
                                Cancel
                        </button>
                        
                    </div>
                         
                  </div>
                  
                </div>
              </div>
            
        