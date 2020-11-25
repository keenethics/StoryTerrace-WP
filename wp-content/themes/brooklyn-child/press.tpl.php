<?php
/* Template Name: Press Page */ 
get_header();

?>

<style type="text/css">
  /***********************************************************/
/***********************************************************/
/*27-02-style*/
/***********************************************************/
/***********************************************************/


body.oh {
    overflow: hidden;
}



.pagecenter {
  max-width: 1290px;
  width: 100%;
  margin: 0 auto;
  padding: 0 15px;
}

.pressbanner_inner {
    padding: 39px 0 78px;
}

.pressbanner_inner h2 {
    margin: 0;
    font-size: 65px;
    text-align: center;
    color: #ee5243;
}

.pressinquiries {
  margin-bottom: 40px;
}

.pressinquiries__inner {
  background-color: #f5f5f5;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.pressinquiries__col {
    padding: 20px 26px;
}

.pressinquiries__col--left {
    width: 51.5%;
}

.pressinquiries__col--right {
  border-left: 1px solid #fdfdfd;
  width: 48.5%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.pressinquiries__inner h5 {
    margin: 0;
    font-size: 18px;
    line-height: 1.5;
    font-weight: 500;
    font-family: Gotham-Medium !important;
}

.pressinquiries__col--right ul {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.pressinquiries__col--right ul li:not(:last-child) {
    margin-right: 30px;
}

.pressinquiries__col--right ul li a {
    font-size: 14px;
    color: #A27F4F;
    font-weight: 500;
    font-family: Gotham-Medium !important;
}

.pressinquiries__col--right ul li a:hover {
  opacity: 0.9;
}

.pressinquiries__col--right ul li img {
    vertical-align: middle;
    margin-right: 3px;
}

.presspostbanner__image {
    position: relative;
}

.presspostbanner__image::after {
    content: "";
    padding-bottom: 42.382%;
    display: block;
}

.presspostbanner__image img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.presspostbanner__content {
  max-width: calc(100% - 120px);
  margin: 0 auto;
  margin-top: -101px;
  z-index: 9;
  position: relative;
  padding: 40px 50px;
  background: #fff;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.presspostbanner__contentleft {
    width: 50%;
}

.presspostbanner__contentleft h5 {
    font-size: 17px;
    color: #A27F4F;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    margin: 0 0 24px;
}

.presspostbanner__contentleft h2 {
    font-size: 41px;
    color: #120D11;
    margin: 0;
}

.presspostbanner__contentright {
  -webkit-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  text-align: right;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}

.presspostbanner__logo {
    margin-bottom: 20px;
}

.presspostbanner__contentright img {
    max-width: 255px;
    width: 100%;
}

.presspostbannerinfo {
    margin-top: auto;
}

.presspostbannerinfo p {
    margin: 0 0 9px;
    color: #808080 !important;
    font-size: 14px;
    font-weight: 500;
    font-family: Gotham-Medium !important;
}

.presspostbanner__time {
  color: #000000;
    font-size: 14px;
}

.pressblog {
    background: #fbfbfb;
    padding: 64px 0;
}

.pressblog__inner {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -26px;
}

.pressblog__col {
    width: calc(100% / 3);
    padding: 0 26px;
    margin-bottom: 30px;
}

.pressblog__cell {
  background-color: #fff;
  height: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}

.pressblog__image {
    position: relative;
}

.pressblog__image::after {
    content: "";
    padding-bottom: 68%;
    display: block;
}

.pressblog__image img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.pressblog__content {
  padding: 50px 48px;
}

.pressblog__content h6 {
    margin: 0 0 10px;
    color: #A27F4F;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 34px;
}

.pressblog__content h3 {
    margin: 0 0 10px;
    font-size: 24px;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    line-height: 1.35;
}

.pressblog__logo {
    margin-top: auto;
    padding: 0 48px 48px;
}

.pressblog__videoicon {
    position: absolute;
    width: 92px;
    height: 92px;
    border: 1px solid #fff;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);
    cursor: pointer;
    -webkit-transition: all ease 0.3s;
    -o-transition: all ease 0.3s;
    transition: all ease 0.3s;
}

.pressblog__videoicon:hover {
  background-color: rgba(255,255,255,0.2);
}

.pressblog__videoicon i {
    color: #fff;
    font-size: 30px;
    position: absolute;
    top: 50%;
    left: calc(50% + 3px);
    -webkit-transform: translate(-50% , -50%);
    -ms-transform: translate(-50% , -50%);
    transform: translate(-50% , -50%);
}


.pressquotes__slider.slick-slider {
    margin: 0;
    padding-bottom: 13px;
}

.pressquotes {
    max-width: 990px;
    width: 100%;
    margin: 0 auto;
    padding: 70px 0 10px;
}

.pressquotes__col {
    position: relative;
    padding-left: 70px;
}

.pressquotes__col::before {
    content: "";
    position: absolute;
    top: 9px;
    left: 0;
    width: 50px;
    height: 66px;
    background-image: url(https://woocommerce-380490-1201116.cloudwaysapps.com/wp-content/themes/brooklyn-child/images/quote.svg);
    background-position: top left;
    background-size: contain;
    background-repeat: no-repeat;
}

.pressquotes__col p {
    font-size: 24px;
    color: #000 !important;
    line-height: 154%;
    font-weight: 500;
    font-family: Gotham-Medium !important;
}

.pressquotes__logo {
    margin-top: 24px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  padding-right: 80px;
}

.pressquotes__slider .slick-dots {
    bottom: 0;
    text-align: left;
    padding-left: 84px;
}

.pressquotes__slider .slick-dots li {
    width: auto;
    height: auto;
}

.pressquotes__slider .slick-dots li button:before {
  display: none;
}

.pressquotes__slider .slick-dots button {
    padding: 0;
    margin: 0;
    width: 13px;
    height: 13px;
    background: #f5f5f5;
    border-radius: 50%;
    border: 1px solid #9b9b9b;
}


.pressquotes__slider .slick-dots .slick-active button {
    background: #9b9b9b;
}

.presspost {
    background-color: #f5f5f5;
    padding: 45px 0 69px;
}

.presspost__inner {
    background: #fff;
    padding-bottom: 258px;
}

.presspost__col {
  padding: 45px 63px 51px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.presspost__col + .presspost__col {
  border-top: 1px solid #f7f7f7;
}

.presspost__content h3 {
    font-size: 24px;
    margin: 0;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    line-height: 114.5%;
}

.presspost__content a:hover h3 {
  color: #ee5243;
}

.presspost__content {
    width: 65%;
}

.presspost__image {
  width: 18%;
  text-align: right;
  -webkit-filter: grayscale(1);
  filter: grayscale(1);
}

.presspost__date {
    color: #808080;
    letter-spacing: 0.02em;
    font-size: 12px;
    line-height: 15px;
    margin-top: 20px;
}

.presspost__loadmore {
    padding: 87px 0 0s;
}

.presspost__loadmore a {
    text-decoration: none;
    width: 180px;
    height: 35px;
    line-height: 35px;
    padding: 0 2px;
    border-radius: 0;
    border: 1px solid #808080;
    color: #808080;
    font-size: 11px;
    letter-spacing: 0.085em;
    font-weight: 500;
    font-family: Gotham-Medium !important;
}

.presspost__loadmore a:hover {
  background-color: #808080;
  color: #fff;
}

.presspost__top {
  margin-bottom: 55px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.presspost__topleft {
    padding-left: 63px;
}

.presspost__topleft ul {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.presspost__topleft ul li {
    margin-right: 25px;
}

.presspost__topleft ul li a {
    font-size: 11px;
    line-height: 15px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    color: #808080;
}

.presspost__topleft ul li.presspost__topactive a,
.presspost__topleft ul li a:hover {
  color: #ED5243;
}

.presspost__field {
    position: relative;
}

.presspost__field input {
    width: 270px;
    border: 0;
    background-color: transparent;
    border-bottom: 1px solid #000000;
    color: #000;
    font-size: 12px;
    line-height: 15px;
    letter-spacing: 0.02em;
    height: 28px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.presspost__field input[type="submit"] {
    border: 0;
    font-size: 0;
    width: 28px;
    height: 28px;
    position: absolute;
    top: 2px;
    right: 0;
    background-image: url(https://woocommerce-380490-1201116.cloudwaysapps.com/wp-content/themes/brooklyn-child/images/search.svg);
    background-position: right center;
    background-repeat: no-repeat;
    background-color: transparent;
    background-size: 14px;
}

.presspost__field ::-webkit-input-placeholder {
  color: #000;
  opacity: 1;
}

.presspost__field ::-moz-placeholder {
  color: #000;
  opacity: 1;
}

.presspost__field :-ms-input-placeholder {
  color: #000;
  opacity: 1;
}

.presspost__field :-moz-placeholder {
  color: #000;
  opacity: 1;
}

.presspopup {
  display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(245,245,245,0.9);
    z-index: 99999999999;
}

.presspopup__wrap {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 40px;
    overflow-y: auto;
}

.presspopup__inner {
  position: relative;
    max-width: 1160px;
    width: 100%;
    background: #fff;
    padding: 42px;
}

.presspopup__close {
    position: absolute;
    top: 35px;
    right: 35px;
    width: 16px;
    cursor: pointer;
    -webkit-transition: all ease 0.3s;
    -o-transition: all ease 0.3s;
    transition: all ease 0.3s;
}

.presspopup__close:hover {
  -webkit-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}

.presspopup__top {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.presspopup__topleft {
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    padding-right: 20px;
}

.presspopup__topleftinner {
    max-width: 520px;
    width: 100%;
}

.presspopup__topleft h5 {
    margin: 0;
    font-size: 20px;
    line-height: 1.3;
    font-weight: 500;
    font-family: Gotham-Medium !important;
    color: #120D11;
}

.presspopup__topright {
    width: 256px;
    padding-right: 20px;
}

.presspopup__topright p {
    font-size: 12px;
    line-height: 1.2;
    letter-spacing: 0.02em;
    color: #120D11 !important;
    margin-bottom: 8px;
}

.presspopup__topright h6 {
  font-weight: 500;
  font-family: Gotham-Medium !important;
  font-size: 14px;
  line-height: 114%;
  letter-spacing: 0.085em;
  text-transform: uppercase;
  color: #ED5243;
  margin: 0;
}

.presspopup__topright h6 a {
    border-bottom: 1px solid #ED5243;
    padding-bottom: 2px;
}

.presspopup__video {
    position: relative;
    margin-top: 40px;
}

.presspopup__video::after {
    content: "";
    padding-bottom: 56.25%;
    display: block;
    background-color: #f9f9f9;
}

.presspopup__video iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.presspopup__close {
    position: absolute;
    top: 35px;
    right: 35px;
}

.presspopup__close img {
  width: 35px;
}

.pressquotes__slider .slick-slide .pressquotes__logo img{
  max-width: 150px;
  width: 100%;
}


@media only screen and (max-width: 1220px) {
  .pressinquiries__inner h5 {
      font-size: 16px;
  }
  .pressinquiries__col--left {
      width: 47%;
  }
  .pressinquiries__col--right {
      width: 53%;
  }
  .pressinquiries__col {
      padding: 20px 16px;
  }
  .presspostbanner__contentleft h2 {
      font-size: 30px;
  }
  .presspostbanner__contentleft h5 {
      font-size: 13px;
      margin: 0 0 14px;
  }
}


@media only screen and (max-width: 1080px) {
  .pressbanner_inner {
      padding: 19px 0 58px;
  }
  .pressbanner_inner h2 {
      font-size: 45px;
  }
  .pressinquiries__col {
      padding: 15px;
  }
  .pressinquiries__col--left {
      width: 100%;
      text-align: center;
  }
  .pressinquiries__col--right {
      width: 100%;
      border: 0;
      border-top: 1px solid #fff;
  }
  .presspostbanner__content {
      padding: 30px 40px;
  }
  .presspostbanner__contentleft {
      width: 68%;
  }
  .pressblog__inner {
      margin: 0 -15px;
  }
  .pressblog__col {
      padding: 0 15px;
  }
  .pressblog__content {
      padding: 30px 30px 20px;
  }
  .pressblog__logo {
      padding-right: 30px;
      padding-left: 30px;
      padding-bottom: 30px;
  }
  .pressblog__content h6 {
      margin: 0 0 10px;
  }
  .pressblog__content h3 {
      font-size: 19px;
  }
  .pressquotes__col p {
      font-size: 24px;
  }
  .pressquotes {
      padding: 30px 0 10px;
  }
  .presspost__content h3 {
      font-size: 24px;
  }
  .presspost__topleft {
      padding-left: 40px;
  }
  .presspopup__wrap {
      padding: 20px;
  }
  .presspopup__inner {
      padding: 30px;
  }
  .presspopup__top {
      padding-right: 30px;
  }
  .presspopup__topleft {
      padding-right: 0;
  }
  .presspopup__topright {
      width: 100%;
      margin-top: 14px;
      padding: 0;
  }
  .presspopup__topleft h5 {
      font-size: 18px;
  }
  .presspopup__topright h6 {
      font-size: 12px;
  }
  .presspopup__video {
      margin-top: 20px;
  }
}


@media only screen and (max-width: 767px) {
  .pressbanner_inner {
      padding: 19px 0 38px;
  }
  .pressbanner_inner h2 {
      font-size: 35px;
  }
  .pressinquiries__col--right ul {
    margin-top: 10px;
    width: 100%;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
  }
  .pressinquiries__inner h5 {
      display: block;
      width: 100%;
      text-align: center;
  }
  .presspostbanner__image::after {
      padding-bottom: 60%;
  }
  .presspostbanner__contentleft {
      width: 100%;
      text-align: center;
  }
  .presspostbanner__contentright {
      text-align: center;
      margin-top: 19px;
  }
  .presspostbanner__logo {
      margin-bottom: 13px;
  }
  .presspostbanner__content {
      margin-top: -50px;
        max-width: calc(100% - 40px);
        padding: 30px 20px;
  }
  .presspostbanner__contentleft h2 {
      font-size: 24px;
  }
  .pressblog__col {
      width: 100%;
  }
  .pressblog__content h3 {
      font-size: 17px;
      line-height: 1.5;
  }
  .pressblog__logo img {
      max-width: 70%;
  }
  .pressblog__videoicon {
      width: 72px;
      height: 72px;
  }
  .pressblog__videoicon i {
      font-size: 22px;
  }
  .pressquotes {
      padding: 30px 0 10px;
  }
  .pressquotes__col p {
      font-size: 19px;
  }
  .pressquotes__col::before {
      width: 30px;
      height: 46px;
  }
  .pressquotes__col {
      padding-left: 40px;
  }
  .pressquotes__logo {
      padding: 0;
      margin-bottom: 20px;
  }
  .presspost__topleft {
    width: 100%;
    padding: 0;
    text-align: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
  }
  .presspost__topright {
      width: 100%;
      margin-top: 20px;
  }
  .presspost__topright form {
      max-width: 400px;
      margin: 0 auto;
      width: 100%;
  }
  .presspost__field input {
      width: 100%;
  }
  .presspost__topright {
      width: 100%;
      margin-top: 10px;
  }
  .presspost__topleft ul li {
      margin-bottom: 10px;
  }
  .presspost__col {
      padding: 25px;
  }
  .presspost__top {
    margin-bottom: 35px;
  }
  .presspost__content {
      width: 100%;
  }
  .presspost__image {
      width: 100%;
      margin-top: 20px;
      text-align: left;
  }
  .presspost__image img {
      max-width: 110px;
  }
  .presspost__inner {
      padding-bottom: 50px;
  }
  .presspost__content h3 {
      font-size: 17px;
  }
}


@media only screen and (max-width: 640px) {
  .pressinquiries__col--right ul li {
      width: 100%;
      margin: 0 !important;
  }
  .pressinquiries__col--right ul li + li {
      margin-top: 10px !important;
  }
  .pressquotes__col p {
      font-size: 17px;
  }
  

}
</style>
<?php
/*Inquiry Section*/
$text_inquiry = get_field('text_inquiry');
$email_inquiry = get_field('email_inquiry');
$press_materials = get_field('press_materials');
$fact_sheet = get_field('fact_sheet');
$press_materials_new = get_field('press_materials_new');
$logos = get_field('logos');
?>
<div class="pressbanner">
  <div class="pagecenter">
    <div class="pressbanner_inner">
      <h2><?php the_title(); ?></h2>
    </div>
  </div>
</div>


<div class="pressinquiries">
  <div class="pagecenter">
    <div class="pressinquiries__inner">
      <div class="pressinquiries__col pressinquiries__col--left">
        <?php if(!empty($text_inquiry)){ ?>
        <h5><?php echo $text_inquiry; ?> <?php echo '<a href="mailto:'.$email_inquiry.'">'.$email_inquiry.'</a>'; ?></h5>
          <?php } ?>
      </div>
      <div class="pressinquiries__col pressinquiries__col--right">
        <?php if($press_materials){ ?>
            <?php if($press_materials['open_link_in_new_window_press'] == 1){ ?>
              <h5><a href="<?php echo $press_materials['press_materials_url']; ?>" target="_blank"><?php echo $press_materials['press_materials_label']; ?></a></h5>
            <?php }else{ ?>
              <h5><a href="<?php echo $press_materials['press_materials_url']; ?>"><?php echo $press_materials['press_materials_label']; ?></a></h5>
            <?php } ?>
          <?php } ?>
        <ul>
          <?php if($fact_sheet){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($fact_sheet['open_link_in_new_window_fact'] == 1){ ?>
                <a href="<?php echo $fact_sheet['fact_sheet_url']; ?>" target="_blank"><?php echo $fact_sheet['fact_sheet_label']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $fact_sheet['fact_sheet_url']; ?>"><?php echo $fact_sheet['fact_sheet_label']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
          <?php if($press_materials_new){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($press_materials_new['open_link_in_new_window_press_new'] == 1){ ?>
                <a href="<?php echo $press_materials_new['press_materials_url_new']; ?>" target="_blank"><?php echo $press_materials_new['press_materials_label_new']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $press_materials_new['press_materials_url_new']; ?>"><?php echo $press_materials_new['press_materials_label_new']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
          <?php if($logos){ ?>
            <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donwload.svg" alt="">
              <?php if($logos['open_link_in_new_window_logo'] == 1){ ?>
                <a href="<?php echo $logos['logos_url']; ?>" target="_blank"><?php echo $logos['logos_label']; ?></a>
              <?php }else{ ?>
                <a href="<?php echo $logos['logos_url']; ?>"><?php echo $logos['logos_label']; ?></a>
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
$banner_image = get_field('banner_image');
$banner_title = get_field('banner_title');
$banner_category = get_field('banner_category');
$open_link_in_new_window_banner = get_field('open_link_in_new_window_banner');
$banner_link = get_field('banner_link');
$banner_logo = get_field('banner_logo');
$banner_author_name = get_field('banner_author_name');
$banner_time = get_field('banner_time');
?>
<div class="presspostbanner">
  <div class="pagecenter">
    <div class="presspostbanner__inner">
      <div class="presspostbanner__image">
        <?php if(!empty($banner_image)){ ?>
        <img src="<?php echo $banner_image; ?>" alt="<?php echo $banner_title; ?>">
         <?php } ?>
      </div>
      <div class="presspostbanner__content">
        <div class="presspostbanner__contentleft">
          <?php if(!empty($banner_category)){ ?>
               <h5><?php echo $banner_category; ?></h5>
              <?php } ?>
          <?php if(!empty($banner_title)){ ?>
            <?php if($open_link_in_new_window_banner == 1){ ?>
              <h2><a href="<?php echo $banner_link; ?>" target="_blank"><?php echo $banner_title; ?></a></h2>
            <?php }else{ ?>
              <h2><a href="<?php echo $banner_link; ?>"><?php echo $banner_title; ?></a></h2>
            <?php } ?>
          <?php } ?>   
        </div>
        <div class="presspostbanner__contentright">
          <div class="presspostbanner__logo">
            <?php if(!empty($banner_logo)){ ?>
              <img src="<?php echo $banner_logo; ?>" alt="<?php echo $banner_title; ?>">
            <?php } ?>  
          </div>
          <div class="presspostbannerinfo">
            <?php if(!empty($banner_author_name)){ ?>
                  <p><?php echo "by ".$banner_author_name; ?></p>
              <?php } ?>
              <?php if(!empty($banner_time)){ ?>
                  <div class="presspostbanner__time"><?php echo $banner_time; ?></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

?>
<div class="pressblog">
  <div class="pagecenter">
    <div class="pressblog__inner">
      <?php 

        $rows = get_field('featured_posts');
        if($rows)
        {
          foreach($rows as $row)
          { ?>
            <div class="pressblog__col">
              <div class="pressblog__cell">
                <div class="pressblog__image">
                  <img src="<?php echo $row['featured_posts_image']; ?>" alt="<?php echo $featured_posts_title; ?>">
                  <?php if($row['select_link_posts'] == 'video'){ ?>
                    <div class="pressblog__videoicon" customtext="<?php echo $row['custom_title_featured']; ?>" customlink="<?php echo $row['link_featured']; ?>" titleforpopup="<?php echo $row['featured_posts_title']; ?>" videolink="https://www.youtube.com/embed/<?php echo $row['featured_posts_video_link']; ?>?autoplay=1">
                      <i class="fa fa-play" aria-hidden="true"></i>
                    </div>
                  <?php } ?>  
                </div>
                <div class="pressblog__content">
                  <div class="pressblog__info">
                    <h6><?php echo $row['featured_posts_category']; ?></h6>
                    <h3>
                      <?php if($row['open_link_in_new_window_featured'] == 1){ ?>
                          <?php if($row['featured_posts_link']){ ?>
                            <a href="<?php echo $row['featured_posts_link']; ?>" target="_blank"><?php echo $row['featured_posts_title']; ?></a>
                          <?php }else{ ?>
                            <a href="<?php echo $row['link_featured']; ?>" target="_blank"><?php echo $row['featured_posts_title']; ?></a>
                          <?php } ?>
                      <?php }else{ ?>
                          <?php if($row['featured_posts_link']){ ?>
                            <a href="<?php echo $row['featured_posts_link']; ?>"><?php echo $row['featured_posts_title']; ?></a>
                          <?php }else{ ?>
                            <a href="<?php echo $row['link_featured']; ?>"><?php echo $row['featured_posts_title']; ?></a>
                          <?php } ?>
                      <?php } ?>
                    </h3>
                  </div>
                </div>
                <div class="pressblog__logo">
                  <img src="<?php echo $row['featured_posts_logo']; ?>" alt="<?php echo $row['$featured_posts_title']; ?>">
                </div>
              </div>
            </div>
            
          <?php }
        } ?>
    </div>

    <div class="pressquotes">
      <div class="pressquotes__slider">
        <?php 

        $rows = get_field('quotes');
        if($rows)
        {
          foreach($rows as $row)
          { ?>
            <div>
              <div class="pressquotes__col">
                <p><?php echo $row['quote_text']; ?></p>
                <div class="pressquotes__logo">
                  <img src="<?php echo $row['quote_logo']; ?>" alt="<?php echo $row['quote_text']; ?>">
                </div>
              </div>
            </div>
          <?php }
        } ?>
      </div>
    </div>
  </div>
</div>



<div class="presspost">
     <div class="pagecenter">
        <div class="presspost__top">
          <div class="presspost__topleft">
            <button onclick="FWP.reset()">View All</button>
            <?php echo do_shortcode('[facetwp facet="category_media_search"]'); ?>
            <!-- <ul>
              <li class="presspost__topactive"><a href="#">View All</a></li>
              <li><a href="#">TV</a></li>
              <li><a href="#">Radio</a></li>
              <li><a href="#">Podcast</a></li>
              <li><a href="#">Print</a></li>
            </ul> -->
          </div>
          <div class="presspost__topright">
            <?php echo do_shortcode('[facetwp facet="category_search_input_media"]'); ?>
            <!-- <form action="">
               <div class="presspost__field">
                <input type="text" placeholder="Search">
                <input type="submit" />
              </div>
            </form> -->
          </div>
        </div>
            
            <div class="presspost__inner">
              <div class="presspost__lists">
                <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
              'post_type'   => 'inthemedia',
              'post_status' => 'publish',
              'posts_per_page' => 10,
              'paged' => $paged,
              'order'   => 'DESC',
              'facetwp' => true,
             );
             
            $inthemedia = new WP_Query( $args );
            if( $inthemedia->have_posts() ) :
            ?>
            <div class="presspost__wrap">
                <?php
                  while( $inthemedia->have_posts() ) :
                    $inthemedia->the_post();
                    $inthemedia_custom_link = get_field( "inthemedia_custom_link",get_the_ID() );
                    $inthemedia_custom_date = get_field( "inthemedia_custom_date",get_the_ID() );
                    ?>
                    <div class="presspost__col">
                      <div class="presspost__content">
                        <a target="_blank" href="<?php echo $inthemedia_custom_link; ?>">
                           <h3><?php echo get_the_title(); ?></h3>
                         </a>
                        <div class="presspost__date">
                          <?php echo $inthemedia_custom_date; ?>                          
                        </div>
                      </div>
                      <div class="presspost__image">
                        <?php echo get_the_post_thumbnail(); ?>
                      </div>                        
                  </div> 
                    <?php
                  endwhile;
                ?>
               
            </div>
            <?php
            wp_reset_postdata();
            else :
              esc_html_e( 'No In The Media Found', 'text-domain' );
            endif;
            ?>
               <div style="display: none;" class="jscroll-next"><?php next_posts_link( 'Load More', $inthemedia->max_num_pages) ?></div>
           </div>
            </div>
             <div class="presspost__loadmore load-more-block">
                <div class="jscroll-nexts"><a href="#"><?php echo 'Load More'; ?></a></div>
            </div>
     </div>
</div>



<div class="presspopup">
  <div class="presspopup__wrap">
    <div class="presspopup__inner">
      <div class="presspopup__close">       
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cross.svg" alt=".">
      </div>
      <div class="presspopup__top">
        <div class="presspopup__topleft">
          <div class="presspopup__topleftinner">
            <h5>Brought To Book – Can Platform Tech Help Us All To <br>Tell Our Life Stories?</h5>
          </div>
        </div>
        <div class="presspopup__topright">
          <p>Check it at</p>
          <a class="customlinks" href="https://woocommerce-380490-1201116.cloudwaysapps.com/press/"><h6>New york times</h6></a>
        </div>
      </div>
      <div class="presspopup__video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/cpsa_a6iF6U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<?php //get_template_part( 'common', 'banner' ); ?>
  

<script>
  jQuery(document).ready(function() {
    jQuery(".pressquotes__slider").slick({
      arrows: false,
      dots: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });

    jQuery(".pressblog__videoicon").on("click" , function() {
      jQuery("body").addClass("oh");
      jQuery(".presspopup").fadeIn();
      var titleforpopup = jQuery(this).attr('titleforpopup');
      var videolink = jQuery(this).attr('videolink');
      var customtext = jQuery(this).attr('customtext');
      var customlink = jQuery(this).attr('customlink');
      jQuery('.presspopup__topleftinner h5').text(titleforpopup);
      jQuery('.presspopup__video iframe').attr('src',videolink);
      jQuery('.presspopup__topright h6').text(customtext);
      jQuery('.presspopup__topright .customlinks').attr('href',customlink);
    });

    jQuery(".presspopup__close").on("click" , function() {
      jQuery("body").removeClass("oh");
      jQuery(".presspopup").fadeOut();
      jQuery('.presspopup__video iframe').attr('src','');
    });

  });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
jQuery(document).ready(function() {
  jQuery('.presspost').jscroll({
      nextSelector: '.jscroll-next a',
      contentSelector: '.presspost__lists',
      autoTrigger: false,
      callback: neueFade,
  });
  $('.jscroll-nexts').click(function(event){
     event.preventDefault();
    $('.jscroll-next a')[0].click();
  });
  function neueFade() {
    var newadded = jQuery('.jscroll-added').html();
    jQuery('.presspost__inner').append(newadded);
    jQuery('.jscroll-added').remove();
  }
});
</script>

<?php  get_footer(); ?>