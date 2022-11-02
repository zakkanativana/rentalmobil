    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
		<?= $this->session->flashdata('pesan') ?>
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
							
                            <!-- Single Car Start -->
							<?php foreach($mobil as $item) : ?>
							
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
								<img src="<?= base_url('assets/upload/'. $item->gambar_mobil) ?>" alt="">
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#"> <?= $item->merk_mobil ?> </a></h2>
                                        <h5> Rp. <?= number_format($item->harga,0,',','.')   ?> / Hari  </h5>
                                      
                                        <ul class="car-info-list">
                                            <li> 
												<?php if($item->ac == "1") {
													 echo "<i class='fa fa-check-square'></i>";
												} else {
													echo "<i class='fa fa-times-circle'></i>";
												}
													
												?>
											AC
											</li>
                                            <li>
											<?php if($item->supir == "1") {
													 echo "<i class='fa fa-check-square'></i>";
												} else {
													echo "<i class='fa fa-times-circle'></i>";
												}
													
												?>
											supir
											</li>
                                            <li>
											<?php if($item->mp3_player == "1") {
													 echo "<i class='fa fa-check-square'></i>";
												} else {
													echo "<i class='fa fa-times-circle'></i>";
												}
													
												?>
											mp3_player
											</li>
											<li>
											<?php if($item->centra_lock == "1") {
													 echo "<i class='fa fa-check-square'></i>";
												} else {
													echo "<i class='fa fa-times-circle'></i>";
												}
													
												?>
											centra_lock
											</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                       <?php if($item->status_mobil == "1") {
												echo anchor('customer/rental/tambah_rental/'. $item->id_mobil,
												'<span class="rent-btn"> Rental </span>');
									   		} else {
												echo '<span class="rent-btn"> Tidak tersedia </span>';
											}   
										?>
                                        <a href="<?= base_url('customer/data_mobil/detail_mobil/'. $item->id_mobil) ?>" class="rent-btn"> Detail </a>
                                    </div>
                                </div>
                            </div>

							<?php endforeach; ?>
							
                            <!-- Single Car End -->

                        </div>
                    </div>

                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

    <!--== Footer Area Start ==-->
    <section id="footer-area">
        <!-- Footer Widget Start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>About Us</h2>
                            <div class="widget-body">
                                <img src="assets/img/logo.png" alt="JSOFT">
                                <p>Lorem ipsum dolored is a sit ameted consectetur adipisicing elit. Nobis magni assumenda distinctio debitis, eum fuga fugiat error reiciendis.</p>

                                <div class="newsletter-area">
                                    <form action="index.html">
                                        <input type="email" placeholder="Subscribe Our Newsletter">
                                        <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Recent Posts</h2>
                            <div class="widget-body">
                                <ul class="recent-post">
                                    <li>
                                        <a href="#">
                                           Hello Bangladesh! 
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                          Lorem ipsum dolor sit amet
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                           Hello Bangladesh! 
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            consectetur adipisicing elit?
                                           <i class="fa fa-long-arrow-right"></i>
                                       </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>get touch</h2>
                            <div class="widget-body">
                                <p>Lorem ipsum doloer sited amet, consectetur adipisicing elit. nibh auguea, scelerisque sed</p>

                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i> 800/8, Kazipara, Dhaka</li>
                                    <li><i class="fa fa-mobile"></i> +880 01 86 25 72 43</li>
                                    <li><i class="fa fa-envelope"></i> kazukamdu83@gmail.com</li>
                                </ul>
                                <a href="https://goo.gl/maps/b5mt45MCaPB2" class="map-show" target="_blank">Show Location</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->

     