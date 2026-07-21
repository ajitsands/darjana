 <div class="modal fade" id="addUserbyupload" tabindex="-1"  aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0" data-select2-id="76">
                      <!--<div class="text-center mb-6">-->
                        <!--<h4 class="mb-2">Add Contact</h4>-->
                        <!--<p class="mb-6">Updating user details will receive a privacy audit.</p>-->
                      <!--</div>-->
                      <!--<div class="container-xxl flex-grow-1 container-p-y">-->
              
                    	<!--<div class="row">-->
                    	<!-- Basic  -->
                    	    <!--<div class="col-12">-->
                              <div class="card mb-6">
                                <h5 class="card-header text-center">Add Contacts</h5>
                                <div class="card-body">
                               
                                   <div class="col-md-6 mb-6">
                                      <div class="form-floating form-floating-outline form-floating-select21" style="margin-bottom:20px;">
                                        <div class="position-relative" id="Group_load_csv">
                                                <?php include('templates/group_load_combo_csv.php')?>
                                        </div>
                                        <label for="select2Icons_csv">Select Group </label>
                                      </div>
                                  </div>
                                  <form class="" id="dropzone-basic" enctype="multipart/form-data">
                                
                                    <!--<div class="dz-message needsclick">
                                      Drop .csv file here or click to upload
                                     
                                    </div>
                                    <div class="fallback">
                                      <input type="file" id="file_csv_group" name="file_csv_group"/>
                                    </div>-->
                                    
                                     <div class="card shadow-none bg-transparent border mb-5">
                                            <div class="card-body text-secondary" style="padding-top:0.2rem;padding-bottom:0.5rem;">
                                                    <label for="formFile" class="form-label">Select your file</label>
                                                      <input class="form-control" type="file" id="file_csv_group" name="file_csv_group" style="font-size:11px;">
                                                       
                                            </div>
                                                
                                    </div> 
                                    
                                    
                                  </form>
                                </div>
                              </div>
                            <!--</div>-->
                    	<!-- /Basic  -->
                    	<!--</div>-->
                    <!--</div>	-->
                      
                      
                       <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4" style="padding-top:10px;padding-bottom:-10px">
                          <button type="submit" id="btn_userAdd_multiple" class="btn btn-primary waves-effect waves-light">Add</button>
                          <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                          </button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
           