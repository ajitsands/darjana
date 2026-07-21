    <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 mb-1" >
                <label for="formFile" class="form-label" data-bs-toggle="tooltip" data-bs-content="This name will not be displayed to your users; it is for your reference." data-bs-placement="top"  aria-label="Template Name" data-bs-original-title="This name will not be displayed to your users; it is for your reference. Eg : Grand Sale 50% Promotion">Template Name <i class="ri-question-line"></i></label>
                <div class="input-group input-group-sm">
                        <input type="text" id="txt_template_name" class="form-control" placeholder="Template Name" aria-label="Template Name" aria-describedby="button-addon2">
                </div>
                
                
                
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 mb-1" >
                <label for="formFile" class="form-label" data-bs-toggle="tooltip" data-bs-content="This name will not be displayed to your users; it is for your reference." data-bs-placement="top"  aria-label="Template Name" data-bs-original-title="This name will not be displayed to your users; it is for your reference. Eg: grand_sales_50_promo">Template Ref Name <i class="ri-question-line"></i></label>
                <div class="input-group input-group-sm">
                        <input type="text" id="txt_template_name" class="form-control" placeholder="Template Name" aria-label="Template Name" aria-describedby="button-addon2">
                </div>
            </div>
    </div>
    <div>
        <h6 style="padding:0px;margin:0px;">Header <small style="font-size:12px;">Optional</small></h6>
        <small>Add a title or choose which type of media you'll use for this header.</small>
        
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12 mb-1">   
                <!--<label for="smallSelect" class="form-label">Small select</label>-->
                <select id="select_header_type" class="form-select form-select-sm">
                  <option value="none">None</option>
                  <option value="media">Media</option>
                  <option value="text">Text</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
                <div class="alert alert-secondary" role="alert" >
                    <h6 style="padding-bottom:0px;margin-bottom:5px;">Samples for header content</h6>
                    To help us review your content, provide examples of the variables or media in the header. Do not include any customer information. Cloud API hosted by Meta reviews templates and variable parameters to protect the security and integrity of our services. 
                  </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: none;" id="div_media">
       
        
        <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
             <ul class="nav nav-tabs nav-tabs-widget pb-1 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                        <li class="nav-item">
                          <a
                            href="javascript:void(0);"
                            class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-orders-id"
                            aria-controls="navs-orders-id"
                            aria-selected="false">
                            <div class="avatar avatar-sm">
                              <img src="../../assets/img/message_templates/images_icon1.png" alt="Image" />
                            </div>
                            <small>Image</small>
                          </a>
                          
                        </li>
                        <li class="nav-item">
                          <a
                            href="javascript:void(0);"
                            class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-sales-id"
                            aria-controls="navs-sales-id"
                            aria-selected="false">
                            <div class="avatar avatar-sm">
                              <img src="../../assets/img/message_templates/video_icon1.png" alt="Video" />
                            </div>
                            <small>Video</small>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a
                            href="javascript:void(0);"
                            class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-profit-id"
                            aria-controls="navs-profit-id"
                            aria-selected="false">
                            <div class="avatar avatar-sm">
                              <img src="../../assets/img/message_templates/document_icon.png" alt="Document" />
                            </div>
                            <small>Document</small>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a
                            href="javascript:void(0);"
                            class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-income-id"
                            aria-controls="navs-income-id"
                            aria-selected="false">
                            <div class="avatar avatar-sm">
                              <img src="../..//assets/img/message_templates/location_icon.png" alt="User" />
                            </div>
                            Location
                          </a>
                        </li>
                        
                      </ul>
        </div>
        
          <div class="col-md-12 col-lg-7 col-sm-12 mb-4">
            <label for="formFile" class="form-label">Select your file</label>
            <input class="form-control" type="file" id="formFile" style="font-size:11px;">
          </div>
 
    </div>
    
    <div class="row" style="display: none;" id="div_text">
       
        
        <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
            <label for="formFile" class="form-label">Enter your Header</label>
            <div class="input-group">
                <input type="text" id="txt_template_header" class="form-control" placeholder="Header" aria-label="Template Header" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary waves-effect" type="button" data-bs-toggle="tooltip" data-bs-content="You can have only one variable for header" data-bs-placement="top" title="Add Variables"  id="btn_add_variables"><i class="ri-code-s-slash-line"></i></button>
                <button class="btn btn-outline-primary" type="button" id="btn_clear_template_head"><i class="ri-eraser-line"></i></button>
          </div>
          <div class="input-group input-group-sm" style="display: none;pading-top:10px;" id="div_variable_value">
            <span class="input-group-text">{{1}}</span>
            <input type="text" class="form-control" placeholder="variable Value">
          </div>
        </div>
        
          
 
    </div>
    
    <div id="div_body">
        <h6 style="padding:0px;margin:0px;padding-bottom:10px;">Message Body <small style="font-size:12px;">Required</small></h6>
        <!--<small>Enter the text for your message .</small>-->
        <div class="form-floating form-floating-outline mb-1" >
            
                <textarea
                  id="txt_template_body"
                  class="form-control h-px-200 bootstrap-maxlength-example"
                  placeholder="Message Body"
                  rows="5"
                  maxlength="1024"></textarea>
                <label for="exampleFormControlTextarea1">Message Body (max characters: 1024)</label>
             
            
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
                <form class="form-repeater">
                    <div class="mb-0">
                          <!--<button class="btn btn-primary waves-effect waves-light" data-repeater-create="">-->
                          <!--  <i class="ri-add-line me-1"></i>-->
                          <!--  <span class="align-middle">Add</span>-->
                          <!--</button>-->
                          <button type="button" class="btn btn-xs btn-primary waves-effect waves-light" id="txt_add_body_variables" data-repeater-create=""><span class="tf-icons ri-code-s-slash-line ri-15px"></span>&nbsp; Add Variables</button>
                    </div>
                        <div data-repeater-list="group-a">
                          <div data-repeater-item="" id="repeater-list">
                              <!--  <div class="mb-0 mt-1 col-lg-12 col-xl-12 col-12 mb-0">-->
                              <!--      <div class="input-group">-->
                              <!--          <span class="input-group-text" data-body-parameter-count="1">{{1}}</span>-->
                              <!--          <input type="text" id="txt_template_body" class="form-control" placeholder="Header" aria-label="Body Variables" aria-describedby="button-addon2">-->
                              <!--          <button class="btn btn-outline-primary waves-effect" type="button" data-bs-toggle="tooltip" data-bs-content="You can have only one variable for header" data-bs-placement="top" title="Add Variables"  id="btn_add_variables"><i class="ri-code-s-slash-line"></i></button>-->
                              <!--          <button class="btn btn-outline-primary" type="button" id="btn_clear_template_body"><i class="ri-eraser-line"></i></button>-->
                              <!--          <button class="btn btn-outline-danger btn-xl waves-effect" data-repeater-delete="">-->
                              <!--            <i class="ri-delete-bin-6-line ri-15px me-1"></i>-->
                                          <!--<span class="align-middle">Delete</span>-->
                              <!--          </button>-->
                              <!--    </div>-->
                              <!--</div>-->
                             <hr class="mt-0">
                          </div>
                        </div>
                        
                      </form>
            </div>
        </div>
    </div>
    
    <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
                    <label for="footer" class="form-label">Footer <small style="font-size:12px;">Optional</small></label>
                    <small> ( Add a short line of text to the bottom of your message template.) </small>
                    <!--<div class="input-group">-->
                        <input type="text" id="txt_template_footer" maxlength="60" class="form-control" placeholder="Footer" aria-label="Template Footer" aria-describedby="button-addon2">
                        <label for="exampleFormControlTextarea1">Footer (max characters: <span id="charCount">60</span>)</label>
                    <!--</div>-->
                 
                </div>
        </div>
        
        
        
    <div class="row" >
            <div class="demo-inline-spacing">
                        
            
                <button class="btn btn-primary  btn-sm waves-effect" >
                  <i class="ri-chat-settings-line"></i> &nbsp;
                  <span class="align-middle">Create Template</span>
                </button>
            </div>
                 
        
        </div>
    
   