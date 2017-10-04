<section class="footer-area">
    <div class="container text-center">
        <?php
            use App\classes\Login;
            $value = Login::getCopyrightText();
        ?>
        <p><?php echo $value['copyright_text']; ?></p>
    </div>
</section>


<div id="stop" class="scrollTop">
    <span><a href=""><i class="fa fa-angle-up"></i></a></span>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/main.js"></script>

</body>
</html>