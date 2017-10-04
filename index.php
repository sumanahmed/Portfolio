<?php include 'inc/header.php'; ?>
<?php
    use App\classes\About;
    use App\classes\Section;
    use App\classes\Progressbar;
    use App\classes\Portfolio;
    use App\classes\Service;
    use App\classes\Blog;
?>
<!-- slider-section -->
	<section class="slider-area" id="home">
		<div data-velocity="-.5" class="parallax-bg slider-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="slider-content text-center">
						<h2>I'M Suman Ahmed</h2>
                        <?php $about = About::getPersonalInformation(); ?>
						<p><?php echo $about['my_biodata']; ?></p>
						<button type="submit" class="btn btn-success">Hire Me</button>
					</div>
				</div>
			</div>
		</div>		
	</section>

<?php $sec = Section::getAllSectionsValues(); ?>
	<!-- about-me-section -->

	<section class="about-area section-padding" id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="about-content text-center">
						<h2 class="about-title"><?php echo $sec['about_title']; ?></h2>
						<p class="about-text"><?php echo $sec['about_content']; ?>.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="my-image">
						<img src="admin/<?php echo $about['about_image']; ?>" alt="" />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="personal-imformation">
						<h2>Personal Information</h2>
						<p>Name : <?php echo $about['name']; ?></p>
						<p>Email : <?php echo $about['email']; ?></p>
						<p>Present Address : <?php echo $about['present_address']; ?></p>
						<p>Permanent Address : <?php echo $about['permanent_address']; ?></p>
						<p>Phone : +88<?php echo $about['phone']; ?></p>
						<p>Nationality : <?php echo $about['nationality']; ?></p>
						<a target="_blank" href="resume/resume.pdf" class="btn btn-success">My Resume</a>
					</div>
				</div>
			</div>
		</div>		
	</section>

	<!-- skills-section -->
	<section class="skills_area section-padding" id="skills">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
					<div class="about-content text-center">
						<h2 class="about-title"><?php echo $sec['skill_title']; ?></h2>
						<p class="about-text"><?php echo $sec['skill_content']; ?>.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <?php
                    $progress = Progressbar::getAllProgress();
                    if($progress){
                        while($value = mysqli_fetch_assoc($progress)){
                    ?>
					<div class="progress">
		                <div class="progress-bar" style="width:<?php echo $value['progress_percent']; ?>%; background:#<?php echo $value['progress_color']; ?>;">
		                    <div class="progress-value"><?php echo $value['progress_percent']; ?>%</div>
		                    <div class="progressbar-title"><?php echo $value['progress_title']; ?></div>
		                </div>
		            </div>
		            <?php } } ?>
				</div>
			</div>
		</div>
	</section>

	<!-- portfolio-section -->

	<section class="portfolio-area section-padding" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
					<div class="about-content text-center">
						<h2 class="about-title"><?php echo $sec['portfolio_s_title']; ?></h2>
						<p class="about-text"><?php echo $sec['portfolio_s_content']; ?>.</p>
					</div>
				</div>
			</div>
	
			<div class="isotop-area">
				<div class="row">
					<div class="col-lg-12 col-md-12 cols-sm-12 col-xs-12">
						<div class="iso-nav">
							<ul>
								<li class="active" data-filter="*">ALL ITEMS</li>
                                <?php
                                $terms = Portfolio::getAllTerms();
                                if($terms){
                                while($value = mysqli_fetch_assoc($terms)){
                                ?>
                                <li data-filter=".<?php echo $value['term_class']; ?>"><?php echo $value['term_class']; ?></li>
                                <?php } } ?>
							</ul>
						</div>
						<div class="main-iso">
							<div class="row">
                            <?php
                            $portfolios = Portfolio::getAllPortfolio();
                            if($portfolios){
                            while($value = mysqli_fetch_assoc($portfolios)){
                            ?>
								<div class="col-lg-4 col-md-4 item <?php echo $value['term_class']; ?>">
									<div class="portfolio-img">
										<img src="admin/<?php echo $value['portfolio_image']; ?>" alt="">
										<div class="portfolio-overly text-center">
											<h2><?php echo $value['portfolio_title']; ?></h2>
											<a target="_blank" href="<?php echo $value['portfolio_link']; ?>" class="overlay-button">Live Preview</a>
										</div>
									</div>
								</div>
                            <?php } } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="about-area section-padding" id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
					<div class="about-content text-center">
						<h2 class="about-title"><?php echo $sec['service_title']; ?></h2>
						<p class="about-text"><?php echo $sec['service_content']; ?>.</p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php
                    $service = Service::getAllServices();
                    if($service){
                    while($value = mysqli_fetch_assoc($service)){
                ?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="service text-center">
						<h2><?php echo $value['service_title']; ?></h2>
						<p><?php echo $value['service_text']; ?></p>
						<a href="" class="read-more">Read More</a>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>		
	</section>

	<!-- our blog section -->
	<section class="blog-area section-padding" id="blog">		
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
					<div class="about-content text-center">
						<h2 class="about-title"><?php echo $sec['blog_title']; ?></h2>
						<p class="about-text"><?php echo $sec['blog_content']; ?>.</p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php
                    $posts = Blog::getAllBlogPost();
                    if($posts){
                    while($value = mysqli_fetch_assoc($posts)){
                ?>
				<div class="col-sm-6 col-md-4 col-xs-12">
					<div class="thumbnail blog-iteam wow bounceInLeft">
						<div class="blog-iteam-img">
							<a href="#"><img src="admin/<?php echo $value['post_image']; ?>" alt="blog-img-01" class="img-responsive" /></a>
							<div class="blog-figcaption">
								<a href="#"><i class="fa fa-picture-o"></i></a>
							</div>
						</div>
						<div class="caption blog-iteam-content">
							<div class="blog-content-inner">
								<h3><a href="#"><?php echo $value['post_title']; ?></a> </h3>
								<div class="blog-meta-menu">
									<ul class="nav nav-pills meta-menu-blog">
										<li><a href="#"><i class="fa fa-user"></i><?php echo $value['author_name']; ?></a></li>
										<li><a href="#"><i class="fa fa-comments"></i>12 Comments</a></li>
										<li><i class="fa fa-eye"></i>120</li>
									</ul>
								</div>
								<p><?php echo $value['post_description']; ?></p>
								<p><a href="single.php" class="btn btn-default" role="button">Read More</a></p>
							</div>
						</div>
					</div><!-- blog-iteam end -->
				</div><!-- col-md-4 end -->
                <?php } } ?>

			</div><!-- row end -->
		</div><!-- container end -->
	</section><!-- our blog end -->

	<section class="contact-area section-padding" id="contact">
		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    <div class="about-content text-center">
                        <h2 class="about-title"><?php echo $sec['contact_title']; ?></h2>
                        <p class="about-text"><?php echo $sec['contact_content']; ?>.</p>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-6 col-md-6 cols-sm-6 col-xs-12">
					<div class="google-map wow bounceInLeft" data-wow-duration=".9s" data-wow-delay=".8s">
						<div class="map">
					        <div class="map_area">
					      		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.597250507228!2d90.36757886444715!3d23.79735208456624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0cde100f01b%3A0x29e7248766755892!2sWest+Kazipara%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1505710436490" frameborder="0" style="border:0" allowfullscreen></iframe>
					        </div>
						</div> <!-- /map -->
					</div>
				</div>
		<?php
            use App\classes\Contact;
            if(isset($_POST['submit'])){
               $email = Contact::sendEmail($_POST);
            }
		?>
				<div class="col-lg-6 col-md-6 cols-sm-6 col-xs-12">
					<div class="contact-form wow bounceInRight" data-wow-duration=".9s" data-wow-delay=".8s">
						<div class="row">
							<form class="form-horizontal" action="" method="POST">
								<div class="form-group">
									<label for="name" class="col-md-2 col-sm-2">Name:</label>
									<div class="col-md-9 col-sm-10">
										<input class="form-control" type="text" name="name" id="name" placeholder="Enter your name..">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-2 col-sm-2">Email:</label>
									<div class="col-md-9 col-sm-10">
										<input class="form-control" type="text" name="email" id="email" placeholder="Enter your email..">
									</div>
								</div>
								<div class="form-group">
									<label for="message" class="col-md-2 col-sm-2">Message:</label>
									<div class="col-md-9 col-sm-10">
										<textarea class="form-control" rows="10" name="message" id="message" placeholder="Enter your query.." style="resize: vertical;" required></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-9 col-md-offset-2 cols-sm-12 col-xs-12">
										<input class="btn btn-block btn-success" type="submit" name="submit" value="SEND">
									</div>
								</div>
							</form>

                            <?php if(isset($email)){ echo $email; } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include 'inc/footer.php'; ?>