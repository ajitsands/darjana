    <div class="modal fade" id="addUser" tabindex="-1" data-select2-id="addUser" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg modal-simple modal-add-user">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0" data-select2-id="76">
                      <div class="text-center mb-6">
                        <h5 class="mb-2">Add Contacts</h5>
                        <!--<p class="mb-6">Updating user details will receive a privacy audit.</p>-->
                      </div>
                      <form id="UserForm" class="row g-5 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate" data-select2-id="editUserForm">
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="modalUserFirstName" name="modalUserFirstName" class="form-control" placeholder="First Name">
                            <label for="modalUserFirstName">First Name</label>
                          </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="modalUserLastName" name="modalUserLastName" class="form-control" placeholder="Last Name">
                            <label for="modalUserLastName">Last Name</label>
                          </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <div class="col-12 fv-plugins-icon-container">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="modalDescription" name="modalDescription" class="form-control" placeholder="Description">
                            <label for="modalDescription">Short Description</label>
                          </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="modalUserEmail" name="modalUserEmail" class="form-control" placeholder="Email">
                            <label for="modalUserEmail">Email</label>
                          </div>
                        </div>
                       
                        <div class="col-12 col-md-6">
                          <div class="input-group input-group-merge">
                            <!--<span class="input-group-text">US (+1)</span>-->
                            <div class="form-floating form-floating-outline">
                              <input type="text" id="modalUserPhone" name="modalUserPhone" class="form-control phone-number-mask" placeholder="Phone Number">
                              <label for="modalUserPhone">Phone Number</label>
                            </div>
                          </div>
                        </div>
                           
                        <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                          <button type="submit" id="btn_userAdd" class="btn btn-primary waves-effect waves-light">Add</button>
                          <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                          </button>
                        </div>
                      <input type="hidden"></form>
                    </div>
                  </div>
                </div>
              </div>
            
        