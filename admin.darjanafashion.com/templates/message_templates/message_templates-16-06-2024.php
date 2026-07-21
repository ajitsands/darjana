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
                            data-bs-target="#template-type-image-id"
                            aria-controls="template-type-image-id"
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
                            data-bs-target="#template-type-video-id"
                            aria-controls="template-type-video-id"
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
                            data-bs-target="#template-type-doc-id"
                            aria-controls="template-type-doc-id"
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
                            data-bs-target="#template-type-location-id"
                            aria-controls="template-type-location-id"
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
            <label for="formFile" class="form-label" >Select your file <label for="formFile" class="form-label" data-bs-toggle="tooltip" data-bs-content="" data-bs-placement="top"  aria-label="Template Name" data-bs-original-title="For image best fit 1025x512 px "> <i class="ri-question-line"></i></label></label>
            <div class="input-group">
                <input class="form-control" type="file" id="formFile" style="font-size:11px;">
                <button class="btn btn-sm btn-primary waves-effect" type="button"><i class="ri-git-repository-commits-line"></i></button>
            </div>
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
                          
                          <button type="button" class="btn btn-xs btn-primary waves-effect waves-light" id="txt_add_body_variables" data-repeater-create=""><span class="tf-icons ri-code-s-slash-line ri-15px"></span>&nbsp; Add Variables</button>
                    </div>
                        <div data-repeater-list="group-a">
                          <div data-repeater-item="" id="repeater-list">
                              
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
                        <input type="text" class="form-control form-control-sm" id="txt_template_footer" maxlength="60" class="form-control" placeholder="Footer" aria-label="Template Footer" aria-describedby="button-addon2">
                        <label for="exampleFormControlTextarea1">Footer (max characters: <span id="charCount">60</span>)</label>
                    <!--</div>-->
                 
                </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 mb-1" >
                <label for="footer" class="form-label">Buttons <small style="font-size:12px;">Optional</small></label>
                    <small> ( Create buttons that let customers respond to your message or take action.) </small>
                    <hr class="dropdown-divider" />
                <div class="btn-group">
                      <button
                        class="btn btn-primary btn-sm dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Add a Button
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="link_call_on_whatsapp" href="javascript:void(0);">Call On WhatsApp</a></li>
                        <li><a class="dropdown-item" id="link_call_on_phone" href="javascript:void(0);">Call Phone Number</a></li>
                        <li><a class="dropdown-item" id="link_website_url" href="javascript:void(0);">Website Link</a></li>
                        <!--<li>-->
                        <!--  <hr class="dropdown-divider" />-->
                        <!--</li>-->
                        <!--<li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>-->
                      </ul>
                </div>
                
                <div class="col-md-6 col-xl-6 col-sm-12" id="div_whats_app_call" style="padding-top:0.5rem;display: none;">
                  <div class="card shadow-none bg-transparent border" >
                    <div class="card-body text-secondary" style="padding-top:0.2rem;padding-bottom:0.5rem;">
                        <label  class="form-label" style="margin-bottom: 0.2rem;">Whats App Call</label>
                        <div  class="input-group input-group-sm">
                            <input type="text"class="form-control form-control-sm"  id="txt_whatsapp_call" maxlength="60" class="form-control" placeholder="Display Text" aria-label="WhatsAppCall" aria-describedby="button-addon2">
                            <button type="button" id="btn_del_call_on_whatsapp" class="btn btn-outline-danger waves-effect btn-sm"><i class="ri-delete-bin-line"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-8 col-xl-8 col-sm-12" id="div_phone_call" style="padding-top:0.5rem;display: none;">
                  <div class="card shadow-none bg-transparent border" >
                    <div class="card-body text-secondary" style="padding-top:0.2rem;padding-bottom:0.5rem;">
                        <label  class="form-label" style="margin-bottom: 0.2rem;">Call on phone</label>
                        <div  class="input-group input-group-sm">
                            <input type="text"class="form-control form-control-sm"  id="txt_phone_call" maxlength="20" class="form-control" placeholder="Display Text" aria-label="WhatsAppCall" aria-describedby="button-addon2">
                            <input type="text"class="form-control form-control-sm"  id="txt_phone_call_country_code" maxlength="5" class="form-control" placeholder="Country Code" aria-label="PhoneCall" aria-describedby="button-addon2">
                            <input type="text"class="form-control form-control-sm"  id="txt_phone_number" maxlength="20" class="form-control" placeholder="Phone Number" aria-label="PhoneNumber" aria-describedby="button-addon2">
                            <button type="button" id="btn_del_call_on_phone" class="btn btn-outline-danger waves-effect btn-sm"><i class="ri-delete-bin-line"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-xl-12 col-sm-12" id="div_website_url" style="padding-top:0.5rem;display: none;">
                  <div class="card shadow-none bg-transparent border" >
                    <div class="card-body text-secondary" style="padding-top:0.2rem;padding-bottom:0.5rem;">
                        <label  class="form-label" style="margin-bottom: 0.2rem;">Website URL</label>
                        <div  class="input-group input-group-sm">
                            <input type="text"class="form-control form-control-sm" style="width: 20%" id="txt_website_url_text" maxlength="20" class="form-control" placeholder="Display Text" aria-label="WhatsAppCall" aria-describedby="button-addon2">
                            <input type="text"class="form-control form-control-sm" style="width: 70%" id="txt_website_url"  class="form-control" placeholder="URL" aria-label="URL" aria-describedby="button-addon2">
                            <button type="button" id="btn_del_website_url" class="btn btn-outline-danger waves-effect btn-sm"><i class="ri-delete-bin-line"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
                
                
                <!--<div id="div_whats_app_call" style="padding-top:20px;"> -->
                    
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
    
   