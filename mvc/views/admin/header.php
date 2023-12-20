<?php require_once dirname(dirname(dirname(__DIR__))) . "/config/app.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./userProfile.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/admin.css' ?>">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://res.cloudinary.com/dfdcuhbhd/image/upload/v1702678780/Pretty%20G%E1%BB%89ls/qrosmjphqdoyamdcnnyi.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                <b style="color: white;">ADMIN</b>
            </a>
            <div class="search-container">
                <form action="">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <a href="#"><i class="fa-solid fa-circle-user fa-xl" style="color: black;"></i></a>
                </form>
            </div>
        </div>
    </nav>