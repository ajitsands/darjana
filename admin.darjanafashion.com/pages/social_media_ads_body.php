<div class="container-fluid flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5><i class="bi bi-megaphone me-2"></i>Social Media Ads Report</h5>
          <p class="text-muted mb-0">Track product performance across social media platforms and countries</p>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4 px-3">
          <div class="col-md-6">
            <div class="summary-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
              <h6>Total Clicks</h6>
              <h3 id="total_clicks">0</h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="summary-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
              <h6>Products Engaged</h6>
              <h3 id="total_products">0</h3>
            </div>
          </div>
        </div>

        <!-- Platform Performance Cards -->
        <div class="row mb-4 px-3">
          <div class="col-md-3">
            <div class="platform-card facebook-card" onclick="showPlatformProducts('facebook')">
              <div class="platform-icon"><i class="bi bi-facebook"></i></div>
              <h5>Facebook</h5>
              <div class="click-count" id="facebook_count">0</div>
              <small>Clicks</small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="platform-card instagram-card" onclick="showPlatformProducts('instagram')">
              <div class="platform-icon"><i class="bi bi-instagram"></i></div>
              <h5>Instagram</h5>
              <div class="click-count" id="instagram_count">0</div>
              <small>Clicks</small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="platform-card youtube-card" onclick="showPlatformProducts('youtube')">
              <div class="platform-icon"><i class="bi bi-youtube"></i></div>
              <h5>YouTube</h5>
              <div class="click-count" id="youtube_count">0</div>
              <small>Clicks</small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="platform-card tiktok-card" onclick="showPlatformProducts('tiktok')">
              <div class="platform-icon"><i class="bi bi-tiktok"></i></div>
              <h5>TikTok</h5>
              <div class="click-count" id="tiktok_count">0</div>
              <small>Clicks</small>
            </div>
          </div>
        </div>
        <h5 style = "padding-left:15px;"><i class="menu-icon tf-icons ri-global-line"></i>Country Wise Report</h5>
        <!-- Country Performance Cards -->
        <div class="row mb-4 px-3" id="countryCardsContainer"></div>

        <!-- Chart Section -->
        <div class="row mb-4 px-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h6 class="mb-3">Platform Distribution of Clicks</h6>
                <canvas id="platformChart" height="200"></canvas>
                <p class="text-muted text-center mt-2 small">Distribution of total clicks across platforms</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Filters -->
        <div class="card-body">
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
              <div class="input-group input-group-merge">
                <span class="input-group-text">From</span>
                <input type="date" class="form-control form-control-sm" id="startDate" style="width: 130px;">
              </div>
              <div class="input-group input-group-merge">
                <span class="input-group-text">To</span>
                <input type="date" class="form-control form-control-sm" id="endDate" style="width: 130px;">
              </div>
              <div class="input-group input-group-merge" style="width: 200px;">
                <select class="form-control form-control-sm" id="platform_filter">
                  <option value="">All Platforms</option>
                  <option value="facebook">Facebook</option>
                  <option value="instagram">Instagram</option>
                  <option value="youtube">YouTube</option>
                  <option value="tiktok">TikTok</option>
                </select>
              </div>
              <button class="btn btn-primary btn-sm" id="applyFilter" style="width:150px;">
                <i class="ri-filter-line me-1"></i> Apply
              </button>
              <button class="btn btn-outline-secondary btn-sm" id="resetFilters" style="width:150px;">
                <i class="ri-refresh-line me-1"></i> Reset
              </button>
              <button class="btn btn-success btn-sm" onclick="exportToExcel()" style="width:150px;">
                <i class="ri-file-excel-line me-1"></i> Excel
              </button>
            </div>
            <div class="input-group input-group-merge" style="width: 250px;">
              <span class="input-group-text"><i class="ri-search-line"></i></span>
              <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search products...">
            </div>
          </div>

          <div class="table-responsive" style="padding-bottom:10px;">
            <table class="table table-bordered table-striped" id="social_media_table">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Platform</th>
                  <th>Country</th>
                  <th>Date & Time</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Platform Products Modal -->
<div class="modal fade" id="platformProductsModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="platformProductsModalLabel">Product Performance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="platformProductsList"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Country Details Modal -->
<div class="modal fade" id="countryDetailsModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="countryModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="countryDetailsContent"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>