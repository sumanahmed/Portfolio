<?php
    include 'vendor/autoload.php';
    use App\classes\Login;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfolio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
</head>
<body oncontextmenu="return false";>
<!-- top area -->
<section class="top-area">
    <div class="top-area-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="gmail">
                        <i class="fa fa-envelope-o"></i><span> suman777333@gmail.com</span>
                    </div>
                    <div class="phone">
                        <i class="fa fa-phone"></i><span>+8801767778333</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="social-icon pull-right">
                        <?php
                        $value = Login::socialButtonLink();
                        ?>
                        <a target="_blank" href="<?php echo $value['fb_link']; ?>"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="<?php echo $value['tw_link']; ?>"><i class="fa fa-twitter"></i></i></a>
                        <a target="_blank" href="<?php echo $value['ln_link']; ?>"><i class="fa fa-linkedin"></i></i></a>
                        <a target="_blank" href="<?php echo $value['gp_link']; ?>"><i class="fa fa-google-plus"></i></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- navbar area -->
<section class="header-top-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="navbar-brand">
                    <a href="index.php">IMSUMAN</a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li class="active smooth-menu"><a href="#home">Home</a></li>
                            <li class="smooth-menu"><a href="#about">about</a></li>
                            <li class="smooth-menu"><a href="#skills">Skills</a></li>
                            <li class="smooth-menu"><a href="#portfolio">Portfolio</a></li>
                            <li class="smooth-menu"><a href="#blog">Blog</a></li>
                            <li class="smooth-menu"><a href="#contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>