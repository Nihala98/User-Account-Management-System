<!DOCTYPE html>
<html>
    <head>
        <title>AMS home</title>
            <meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!---custom style---->
            <link rel="stylesheet" href="css/style.css">
    </head>
    <style>
       .top1{
             background-color:black;
       } 
    </style>
<body>
    <nav class="navbar  navbar-expand-lg top1">
    <div class="container">
        <a href="" class="text-decoration-none text-white"><h3>Administrator</h3></a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="<?php echo base_url()?>main/user_table" class="nav-link text-white">Manage users</a></li>
                <li class="nav-item"><a href="<?php echo base_url()?>main/" class="nav-link text-white">Reset Password</a></li>
                <li class="nav-item"><a href="<?php echo base_url()?>main/logout" class="nav-link text-white">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>