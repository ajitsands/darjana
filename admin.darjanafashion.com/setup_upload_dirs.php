<?php
// sandslab.com/setup_upload_dirs.php
session_start();
require_once('model/common/common_functions.php');

// Check if user is logged in
if (!isset($_SESSION['ids'])) {
    header('Location: /login.php');
    exit;
}

$commonModel = new CommonModel();

// Create upload directories
$directories = [
    '../../assets/uploads/products',
    '../../assets/uploads/categories',
    '../../assets/uploads/users'
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Setup Upload Directories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Creating Upload Directories</h2>
    
    <?php
    foreach ($directories as $dir) {
        if ($commonModel->createUploadDirectories($dir)) {
            echo "<div class='alert alert-success'>✓ Created directories in: $dir</div>";
        } else {
            echo "<div class='alert alert-danger'>✗ Failed to create directories in: $dir</div>";
        }
    }
    ?>
    
    <h3 class="mt-4">Directory Structure Created:</h3>
    <pre>
assets/uploads/
├── products/
│   ├── original/
│   ├── webp/
│   ├── thumb/
│   └── files/
├── categories/
│   ├── original/
│   ├── webp/
│   ├── thumb/
│   └── files/
└── users/
    ├── original/
    ├── webp/
    ├── thumb/
    └── files/
    </pre>
    
    <a href="/view/add_product_copy.php" class="btn btn-primary">Go to Product Management</a>
</body>
</html>