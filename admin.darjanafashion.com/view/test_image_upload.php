<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Upload Quality Test</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Cropper CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    
    <style>
        .img-container {
            max-height: 70vh;
            margin-bottom: 10px;
        }
        .img-container img {
            max-width: 100%;
        }
        .image-preview {
            width: 100%;
            border: 2px dashed #ccc;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .preview-img {
            max-width: 100%;
            max-height: 300px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .variant-box {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        .file-info {
            font-family: monospace;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Image Upload Quality Test</h1>
        <p class="lead">Test image cropping and compression quality with different settings</p>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Upload & Crop Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="imageInput" class="form-label">Select Image</label>
                            <input type="file" class="form-control" id="imageInput" accept="image/*">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Crop Settings</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="targetWidth" class="form-label">Target Width (px)</label>
                                    <input type="number" class="form-control" id="targetWidth" value="1200" min="100" max="4000">
                                </div>
                                <div class="col-md-6">
                                    <label for="targetHeight" class="form-label">Target Height (px)</label>
                                    <input type="number" class="form-control" id="targetHeight" value="1600" min="100" max="4000">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">JPEG Quality</label>
                            <select class="form-select" id="jpegQuality">
                                <option value="1.0">100% (Maximum Quality)</option>
                                <option value="0.95">95% (High Quality)</option>
                                <option value="0.9" selected>90% (Good Quality)</option>
                                <option value="0.85">85% (Standard)</option>
                                <option value="0.8">80% (Smaller File)</option>
                                <option value="0.7">70% (Web Quality)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Aspect Ratio</label>
                            <select class="form-select" id="aspectRatio">
                                <option value="3/4" selected>3:4 (Portrait - 450x600, 1200x1600)</option>
                                <option value="4/3">4:3 (Landscape)</option>
                                <option value="1">1:1 (Square)</option>
                                <option value="16/9">16:9 (Widescreen)</option>
                                <option value="custom">Custom (Free)</option>
                            </select>
                        </div>
                        
                        <button class="btn btn-primary" id="testUpload" disabled>Test Upload</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Original Image</h5>
                    </div>
                    <div class="card-body">
                        <div id="originalPreview" class="image-preview">
                            <p class="text-muted">No image selected</p>
                        </div>
                        <div id="originalInfo" class="file-info"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cropping Modal -->
        <div class="modal fade" id="cropModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <img id="imageToCrop" src="" alt="Image to crop">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="cropButton">Crop & Upload</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Results Section -->
        <div class="row mt-4" id="resultsSection" style="display: none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Upload Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="variant-box">
                                    <h6>Original Upload</h6>
                                    <img id="resultOriginal" class="preview-img" src="" alt="Original">
                                    <div id="originalUploadInfo" class="file-info small"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="variant-box">
                                    <h6>Large (2400x3200)</h6>
                                    <img id="resultLarge" class="preview-img" src="" alt="Large">
                                    <div id="largeInfo" class="file-info small"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="variant-box">
                                    <h6>Medium (1200x1600)</h6>
                                    <img id="resultMedium" class="preview-img" src="" alt="Medium">
                                    <div id="mediumInfo" class="file-info small"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="variant-box">
                                    <h6>Small (450x600)</h6>
                                    <img id="resultSmall" class="preview-img" src="" alt="Small">
                                    <div id="smallInfo" class="file-info small"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-warning" id="testAgain">Test Again</button>
                            <button class="btn btn-secondary" id="downloadAll">Download All Variants</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    
    <script>
    $(document).ready(function() {
        let cropper;
        let currentFile;
        let currentImageInput;
        
        // Handle file selection
        $('#imageInput').on('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            currentFile = file;
            currentImageInput = this;
            
            // Show original preview
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#originalPreview').html(`<img src="${e.target.result}" class="preview-img" alt="Original">`);
                
                // Show file info
                const fileSize = (file.size / 1024).toFixed(2);
                $('#originalInfo').html(`
                    <strong>Filename:</strong> ${file.name}<br>
                    <strong>Size:</strong> ${fileSize} KB (${(file.size / 1024 / 1024).toFixed(2)} MB)<br>
                    <strong>Type:</strong> ${file.type}<br>
                    <strong>Last Modified:</strong> ${new Date(file.lastModified).toLocaleString()}
                `);
                
                // Set image for cropping
                $('#imageToCrop').attr('src', e.target.result);
                
                // Enable upload button after modal is shown
                $('#testUpload').prop('disabled', false);
            };
            reader.readAsDataURL(file);
        });
        
        // Handle aspect ratio change
        $('#aspectRatio').on('change', function() {
            if ($(this).val() === 'custom') {
                $('#targetWidth, #targetHeight').prop('readonly', false);
            } else {
                $('#targetWidth, #targetHeight').prop('readonly', true);
                
                // Set example dimensions based on aspect ratio
                const ratio = eval($(this).val());
                const width = parseInt($('#targetWidth').val());
                $('#targetHeight').val(Math.round(width / ratio));
            }
        });
        
        // Open crop modal
        $('#testUpload').on('click', function() {
            $('#cropModal').modal('show');
        });
        
        // Initialize cropper when modal is shown
        $('#cropModal').on('shown.bs.modal', function() {
            const image = document.getElementById('imageToCrop');
            
            if (cropper) {
                cropper.destroy();
            }
            
            let aspectRatio = 3/4; // Default
            if ($('#aspectRatio').val() !== 'custom') {
                aspectRatio = eval($('#aspectRatio').val());
            }
            
            cropper = new Cropper(image, {
                aspectRatio: aspectRatio,
                viewMode: 1,
                autoCropArea: 0.8,
                responsive: true,
                guides: true,
                center: true,
                highlight: true,
                cropBoxMovable: true,
                cropBoxResizable: $('#aspectRatio').val() === 'custom'),
                toggleDragModeOnDblclick: false,
                ready: function() {
                    // Set initial crop box size
                    const containerData = cropper.getContainerData();
                    const targetWidth = parseInt($('#targetWidth').val());
                    const targetHeight = parseInt($('#targetHeight').val());
                    
                    // Scale to fit container
                    const scale = Math.min(
                        containerData.width / targetWidth,
                        containerData.height / targetHeight
                    ) * 0.8;
                    
                    const cropBoxWidth = Math.min(targetWidth * scale, containerData.width);
                    const cropBoxHeight = Math.min(targetHeight * scale, containerData.height);
                    
                    const left = (containerData.width - cropBoxWidth) / 2;
                    const top = (containerData.height - cropBoxHeight) / 2;
                    
                    cropper.setCropBoxData({
                        width: cropBoxWidth,
                        height: cropBoxHeight,
                        left: left,
                        top: top
                    });
                }
            });
        });
        
        // Handle crop button
        $('#cropButton').on('click', function() {
            if (!cropper) return;
            
            const targetWidth = parseInt($('#targetWidth').val());
            const targetHeight = parseInt($('#targetHeight').val());
            const quality = parseFloat($('#jpegQuality').val());
            
            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: targetWidth,
                height: targetHeight,
                minWidth: targetWidth,
                minHeight: targetHeight,
                maxWidth: targetWidth * 2,
                maxHeight: targetHeight * 2,
                fillColor: '#fff',
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            
            if (canvas) {
                // Show loading
                $('#cropButton').prop('disabled', true).text('Processing...');
                
                // Convert to blob and upload
                canvas.toBlob(function(blob) {
                    uploadImage(blob, targetWidth, targetHeight, quality);
                }, 'image/jpeg', quality);
            }
        });
        
        // Upload function
        function uploadImage(blob, targetWidth, targetHeight, quality) {
            const formData = new FormData();
            const fileName = 'test_' + Date.now() + '.jpg';
            
            // Create file from blob
            const file = new File([blob], fileName, {
                type: 'image/jpeg',
                lastModified: Date.now()
            });
            
            formData.append('test_image', file);
            formData.append('action', 'test_image_upload');
            formData.append('target_width', targetWidth);
            formData.append('target_height', targetHeight);
            formData.append('quality', quality);
            
            $.ajax({
                url: '../controller/add_product/test_image_upload_handler.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Response:', response);
                    try {
                        const result = JSON.parse(response);
                        if (result.success) {
                            displayResults(result);
                            $('#cropModal').modal('hide');
                        } else {
                            alert('Upload failed: ' + result.message);
                        }
                    } catch(e) {
                        alert('Error parsing response: ' + e.message);
                        console.error(response);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Upload error: ' + error);
                },
                complete: function() {
                    $('#cropButton').prop('disabled', false).text('Crop & Upload');
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                }
            });
        }
        
        // Display results
        function displayResults(result) {
            $('#resultsSection').show();
            
            // Original uploaded image
            $('#resultOriginal').attr('src', result.original_url);
            $('#originalUploadInfo').html(`
                Size: ${result.original_size} KB<br>
                Dimensions: ${result.original_width}x${result.original_height}
            `);
            
            // Large variant
            $('#resultLarge').attr('src', result.large_url);
            $('#largeInfo').html(`
                Size: ${result.large_size} KB<br>
                Dimensions: ${result.large_width}x${result.large_height}
            `);
            
            // Medium variant
            $('#resultMedium').attr('src', result.medium_url);
            $('#mediumInfo').html(`
                Size: ${result.medium_size} KB<br>
                Dimensions: ${result.medium_width}x${result.medium_height}
            `);
            
            // Small variant
            $('#resultSmall').attr('src', result.small_url);
            $('#smallInfo').html(`
                Size: ${result.small_size} KB<br>
                Dimensions: ${result.small_width}x${result.small_height}
            `);
        }
        
        // Test again
        $('#testAgain').on('click', function() {
            $('#resultsSection').hide();
            $('#imageInput').val('');
            $('#originalPreview').html('<p class="text-muted">No image selected</p>');
            $('#originalInfo').empty();
            $('#testUpload').prop('disabled', true);
        });
        
        // Download all variants
        $('#downloadAll').on('click', function() {
            // This would need server-side zip creation
            alert('Download functionality would create a zip file with all variants');
        });
    });
    </script>
</body>
</html>