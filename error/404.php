<!DOCTYPE html>
<html lang="en">

<head>
    <!-- fontawesome files pro-->
    <link rel="stylesheet" href="../libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="../libs/fontawesome//css/all_free.css">
    <script src="../libs/fontawesome/js/all.js"></script>
    <!-- bootstarp 5.2.3 files -->
    <!-- <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css"> -->
    <!-- <script defer src="../libs/bootstrap/js/bootstrap.bundle.js"></script> -->
    <!-- main styling file -->
    <link rel="stylesheet" href="../public/css/404.css">
    <!-- javascript main file -->
    <!-- <script defer src="./public/js/main.js"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/image/powershoes_logo.svg" type="image/x-icon">
    <title>404</title>
</head>

<body>
    <div id="CONTAINER">
        <video class="video__player" autoplay loop>
            <source src="../public/video/404.mp4" type="video/mp4">
        </video>
        <div class="flow">
            <div class="auto__redirect">
                <div class="wrp">
                <i class="fa-duotone fa-signs-post"></i>
                    <div class="progress_bar">
                        <div class="line">
                            <i class="person fa-duotone fa-person-skating"></i>
                        </div>
                    </div>
                    <i class="fa-light fa-house-chimney"></i>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.person').classList.add("fade")
            document.querySelector('.line').style.width = "500px";
        }, 3000)
        setTimeout(() => {
            document.querySelector('.auto__redirect').classList.add("scallin")
        }, 3500)
        setTimeout(() => {
            document.querySelector('.video__player').classList.add("scallout")
        }, 4000)
        setTimeout(() => {
            window.location.href = "../";
        }, 5000)
    </script>
</body>

</html>