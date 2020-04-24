<?php
$this->load->view('parts/top');
$this->load->view('parts/navigation');
?>

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-after-navbar" id="home" style="background-image: url(assets/images/head1.jpg);">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>

        <div class="mbr-table-cell">

            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                        <h5 class="mbr-section-title display-1"><?php echo "tentang nama" ?></h5>
                        <p class="mbr-section-lead lead"><?php echo "tentang deskripsi" ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="5000" id="slider-c" style="background-image: url('<?php echo base_url() ?>/assets/images/bg.png'); margin-bottom: 90px;">
        <div>
            <div>
                <div>
                    <ol class="carousel-indicators">
                        <?php for($i=0;$i<3;$i++){ ?>
                        <li data-app-prevent-settings="" data-target="#slider-c" class="<?php if($i == 0) echo 'active' ?> " data-slide-to="<?php echo $i; ?>"></li>
                        <?php } ?>
	
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php for($i=0;$i<3;$i++){ ?>
                        <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full <?php if($i == 0) echo 'active' ?> " data-bg-video-slide="false" style="">
                            <div class="mbr-table-cell">
                                <div class="mbr-overlay"></div>
                                <div class="container-slide container">
                                    <div class="row" style="padding-top: 60px;padding-bottom: 60px;">
                                        <div class="col-md-5 text-xs-center">
                                            <img src="<?php echo base_url('assets/images/'.$i.'.jpg') ?>"  style="height: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-c">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-c">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="mbr-section mbr-parallax-background" id="content5-l" style="background-image: url(assets/images/head2.jpg); padding-top: 120px; padding-bottom: 120px;">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
        </div>
        <div class="container">
            <h3 class="mbr-section-title display-2"><?php echo "nama tentang"; ?></h3>
            <div class="lead">
                <p><?php echo "isi tentang" ?></p>
            </div>
        </div>

    </section>

    <section class="mbr-section" id="about" style="background-color: rgb(255, 255, 255); padding-top: 160px; padding-bottom: 160px;">
        <div class="container">
            <div class="row">
                <div class="mbr-table-md-up">
                    <div class="mbr-table-cell mbr-right-padding-md-up col-md-5 text-xs-center text-md-right">
                        <h3 class="mbr-section-title display-2">ABOUT</h3>
                        <div class="lead">
                            <p><?php echo "Isi About" ?></p>
                        </div>
                    </div>
                    <div class="mbr-table-cell mbr-valign-top col-md-7">
                        <div class="mbr-figure"><img src="<?php echo base_url() ?>assets/images/logo1.png">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

  <?php
  $this->load->view('parts/bottom');
  ?>