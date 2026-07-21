<div class="container-fluid flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h5>Upload Home Video</h5>
        </div>

        <div class="card-body">
          <div class="row g-3">

            <!-- Video Upload -->
            <div class="col-md-12">
              <div class="form-floating form-floating-outline">
                <input type="file" id="home_video" class="form-control form-control-sm" accept="video/*">
                <label>Select Video *</label>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-11 text-end">
              <button class="btn btn-primary btn-sm" type="button" id="btn_upload_video">
                <i class="ri-upload-line me-1"></i>
                <span class="align-middle">Upload</span>
              </button>
            </div>

            <!-- Clear Button -->
            <div class="col-1 text-end">
              <button class="btn btn-secondary btn-sm" type="button" id="btn_clear_video">
                <i class="ri-refresh-line me-1"></i>
                <span class="align-middle">Clear</span>
              </button>
            </div>
            <!-- Current Video Preview -->
            <div class="col-md-12 text-center mb-3">
                <video id="current_video" 
                    width="300" 
                    controls 
                    style="display: none; max-width: 100%; border-radius: 8px;">
                    <source id="video_source" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                
                <!-- Optional: Show message when no video is uploaded -->
                <div id="no_video_message" class="text-muted" style="display: none;">
                    No video uploaded yet
                </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
