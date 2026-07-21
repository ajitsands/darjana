<!DOCTYPE html>
<html>
<head>
    <title>Darjana Fashion Image Upload</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Croppie -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Croppie -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <style>
        body{
            background:#f5f7fb;
        }

        #croppie-container{
            width:400px;
            height:700px;
            margin:auto;
        }

        .upload-card{
            border-radius:12px;
            box-shadow:0 5px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card upload-card">

                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">Darjana Fashion Image Upload</h4>
                </div>

                <div class="card-body text-center">

                    <p class="text-muted mb-3">
                        Upload and crop product image (400 x 650)
                    </p>

                    <input type="file" id="upload_image" class="form-control mb-4">

                    <div id="croppie-container"></div>

                    <button id="crop_upload" class="btn btn-primary mt-4 w-100">
                        Crop & Upload Image
                    </button>

                </div>

            </div>

        </div>
    </div>

</div>

<script>

let croppieInstance;

// When image is selected
$('#upload_image').on('change', function(e){

    const file = e.target.files[0];
    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(event){

        // Destroy old instance
        if(croppieInstance) croppieInstance.destroy();

        croppieInstance = new Croppie(document.getElementById('croppie-container'),{

            viewport: { width:400, height:650 },

            boundary:{ width:400,  height:650 },

            showZoomer:true,
            enableOrientation:true

        });

        croppieInstance.bind({
            url:event.target.result
        });

    };

    reader.readAsDataURL(file);

});


// Crop and Upload
$('#crop_upload').on('click', function(){

    if(!croppieInstance){
        alert("Please select an image");
        return;
    }

    croppieInstance.result({

        type:'blob',
        size:{
            width:1600,
            height:2600
        },

        format:'jpeg',
        quality:1

    }).then(function(blob){

        const formData = new FormData();
        formData.append('image', blob);

        $.ajax({

            url:'upload.php',
            type:'POST',
            data:formData,
            processData:false,
            contentType:false,

            success:function(res){
                alert(res);
            }

        });

    });

});

</script>

</body>
</html>