<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
</head>
<style>
 .container {
    margin-top: 100px;
    text-align: center; 
}

.container img {
    display: block; 
    margin: 0 auto;
}

@media (max-width: 767px) {
    .container img {
        width: 100%; 
        max-width: 100%;
    }
}

</style>
<body>
    <div class="container">
        <img src="<?= base_url() ?>404/Opps.png" class="text-center"alt="">
        <a href="<?= base_url() ?>"><h4>Klik untuk kembali</h4></a>
    </div>
</body>
</html>