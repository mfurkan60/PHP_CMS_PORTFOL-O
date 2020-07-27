<?php include "header.php"?>

<?php 
$header_settings = $db->prepare("SELECT * FROM header WHERE header_id=:id");
$header_settings->execute(["id" => 1]);
$row = $header_settings->fetch(PDO::FETCH_OBJ);

//aboout kısmından verileri çekme
$about = $db->prepare("SELECT * FROM about WHERE about_id =:id");
$about->execute(["id"=> 1]);
$about_row = $about->fetch(PDO::FETCH_OBJ);


//services  kısmından verileri çekme
$sevices = $db->prepare("SELECT * FROM services WHERE servis_id =:id");
$sevices->execute(["id"=> 1]);
$sevices_row = $sevices->fetch(PDO::FETCH_OBJ);

//portfolio kısmından verileri çekme
//$portfolio = $db->query("SELECT * FROM portfolio")->fetchAll(PDO::FETCH_OBJ);
$portfolio = $db->prepare("SELECT * FROM portfolio");
$portfolio->execute();
$portfolio_id = $portfolio->fetchAll(PDO::FETCH_OBJ);
 
//contact
$contact = $db->prepare("SELECT * FROM contact");
$contact->execute();
$contact_row = $contact->fetch(PDO::FETCH_OBJ);




?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">
                            <?php echo $row->header_baslık;  ?>
                        </h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5"><?php
                        echo $row->header_baslık
                        ?></p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about"><?php echo $row->header_buton ?></a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0"><?php  echo $about_row->about_baslik ?></h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4"><?php  echo $about_row->about_aciklama ?></p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services"><?php echo $about_row->about_buton ?></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->


        
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0"><?php echo $sevices_row->servis_baslik ?></h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Sturdy Themes</h3>
                            <p class="text-muted mb-0"><?php echo $sevices_row->servis_aciklama ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0"><?php echo $sevices_row->servis_aciklama ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0"><?php echo $sevices_row->servis_aciklama ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0"><?php echo $sevices_row->servis_aciklama ?></p>                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
        <h1 class="text-center">Portfolio</h1>

            <div class="container-fluid p-0">
                <div class="row no-gutters">
            <?php foreach($portfolio_id as $portfolio_row){  ?>
                      <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="upload/<?php echo $portfolio_row->protlolio_resim ?>">
                            <img class="img-fluid" src="upload/<?php echo $portfolio_row->protlolio_resim ?>" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><?php echo $portfolio_row->portfolio_kategory ?></div>
                                <div class="project-name"><?php echo $portfolio_row->portfolio_baslik ?></div>
                            </div>
                        </a>
                    </div>

                        <?php } ?>


                    
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4"><?php  echo "deneme" ?>!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0"><?= $contact_row->contact_baslik ?></h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5"><?= $contact_row->contact_aciklama ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div><?= $contact_row->contact_no?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="<?php $contact_row->contact_eposta ?>"><?= $contact_row->contact_eposta ?></a>
                    </div>
                </div>
            </div>
        </section>
   <?php include "footer.php" ?>