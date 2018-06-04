<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/fonts/stylesheet.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <title>Svetaine</title>
  <?php wp_head(); ?>
</head>

<body>
    <main>
      <?php
        $home_bg = get_field( 'background_image', 22 );
        $home_bg = wp_get_attachment_image_src($home_bg, 'full')[0];
      ?>
      <section id="home" class="home" style="background-image: url(<?= $home_bg ?>)">
        <div class="intro">
          <div class="virsus">
            <div class="flex-container">
            <div class="logo">
              <?php
                $logo_image = get_field( 'logo_image', 22 );
                $logo_image = wp_get_attachment_image_src($logo_image, 'full')[0];
               ?>
              <img src="<?= $logo_image ?>">
              <h4>tajam</h4>
            </div>
            <div class="header-meniu" class="relative">
                <?php
                  wp_nav_menu( array(
                    'menu'   =>  'header-meniu',
                    'menu_class'   =>  'flex-container absolute',
                    'container_class' => 'meniu relative'
                  ) );
                ?>
              </div>
            </div>
          <div>
            <h3>We are aversome creative agency</h3>
            <div class="bruksnys"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et</p>
            <button type="button" name="button">LEARN MORE</button>
          </div>
        </div>
        </div>
      </section>

      <section id="ourstory">
        <div class="ourstory">
        <div class="container">
          <div class="image-arrow">
            <?php
              $ourstory_logo = get_field( 'ourstory_logo', 51 );
              $ourstory_logo = wp_get_attachment_image_src($ourstory_logo, 'full')[0];
             ?>
            <img src="<?= $ourstory_logo ?>">
          </div>
          <aside class="ourstory">
            <h4>OUR STORY</h4>
            <p>Sed consequat semper lectus vitae pellentesque. squeed consequat semper lectu  Sed consequat semper lectus vitae
              pellentesque. squeed consequat semper lectu  Sed consequat semper lectus vitae pellentesque. squeed consequat semper
              lectu  Sed consequat semper lectus vitae pellentesque. squeed consequat semper lectu  Sed consequat semper lectus vitae
              pellentesque. squeed consequat semper lectu  Sed consequat semper lectus vitae pellentesque. squeed consequat semper lectu  cu</p>
            <button type="button" name="button">LEARN MORE</button>
          </aside>
        </div>
        </div>
      </section>
      <?php
        $playbutton_background = get_field( 'playbutton_background', 58 );
        $playbutton_background = wp_get_attachment_image_src($playbutton_background, 'full')[0];
      ?>
      <section id="playbutton" class="playbutton" style="background-image: url(<?= $playbutton_background ?>)">

        <img><i class="far fa-play-circle"></i></img>
        <p>WATCH OUR STORY</p>
      </section>

      <section id="experience" class="experience">
        <?php
        $experienceQuery = new WP_Query( array(
          'post_type'               => 'experience',
          'orderby'                 => 'date',
          'order'                   => 'ASC',
          'posts_per_page'          => 6
        ));
        ?>
        <div class="container">
          <div>
            <h5>EXPERIENCE</h5>
            <p class="experience-intro">lorem impsum blas mbkem dvmedvbiem kmveiobmeo vemdove</p>
            <div class="line"></div>
          </div>
          <div>
            <ul class="flex-wrap">
              <?php
                while( $experienceQuery->have_posts() ) :
                  $experienceQuery->the_post();
                  ?>
              <li>
                <?php the_field( 'icon_code', get_the_ID() ); ?>
                <p class="title"><?php the_title(); ?></p>
                <p><?php the_field( 'experience_description', get_the_ID() ); ?></p>
              </li>
                <?php endwhile; ?>

            </ul>
          </div>
        </div>
      </section>

      <?php
        $amazing_team_background = get_field( 'amazing_team_background', 22 );
        $amazing_team_background = wp_get_attachment_image_src($amazing_team_background, 'full')[0];
      ?>
      <?php
        $teamQuery = new WP_Query( array(
          'post_type'          => 'team',
          'posts_per_page'     => 4,
          'orderby'            => 'date',
          'order'              => 'ASC'
        ) );
      ?>
      <section id="meet-team" class="meet-team" style="background-image: url(<?= $amazing_team_background ?>)">
        <div class="meet-our-team-background-container">
        <div class="container">
          <div class="team-header">
            <p>MEET OUR AMAZING TEAM</p>
            <p>Lorem pisum lifnri infidn indvirne dilvneil</p>
            <div class="line"></div>
          </div>
          <div>
            <ul class="flex-container">
              <?php
                if( $teamQuery->have_posts() ) :
                  while( $teamQuery->have_posts() ) :
                    $teamQuery->the_post();
                    $photo_id = get_field('profile_photo', get_the_ID());
                    $photo_url = wp_get_attachment_image_src($photo_id, 'full')[0];
                    ?>
              <li>
                <div class="profile1">
                  <img src="<?= $photo_url ?>" alt="" />
                   <p><?= the_field('name_lastname', get_the_ID()) ?></p>
                   <p><?= the_field('job_title', get_the_ID()) ?></p>
                </div>
              </li>

            <?php endwhile;endif; ?>

            </ul>

            <p class="join-us">Become a part of dream team, join us</p>
            <button type="button" name="button">WE ARE HIRING</button>
          </div>
          </div>
        </section>

        <section id="our-works" class="our-works">
          <?php
            $ourworksQuery = new WP_Query( array(
              'post_type'          => 'musu_darbai',
              'posts_per_page'     => 12,
              'orderby'            => 'date',
              'order'              => 'ASC'
            ) );
          ?>
          <div class="container">
            <div class="our-works-virsus">
              <p>OUR WORKS</p>
              <button type="button" name="button">see all project in dribble ></button>
            </div>
            <ul>
              <?php
                if( $ourworksQuery->have_posts() ) :
                  while( $ourworksQuery->have_posts() ) :
                    $ourworksQuery->the_post();
                    $photo_id = get_field('ourworks', get_the_ID());
                    $photo_url = wp_get_attachment_image_src($photo_id, 'full')[0];
                    ?>
              <li>
                  <img src="<?= $photo_url ?>" alt="" />
              </li>

            <?php endwhile;endif; ?>

            </ul>
            <button class="our-works-button-bottom"type="button" name="button">LOAD MORE</button>
          </div>
        </section>
          <?php
            $citata_background = get_field( 'citata_background', 22 );
            $citata_background = wp_get_attachment_image_src($citata_background, 'full')[0];
          ?>
          <section id="citata" class="citata" style="background-image: url(<?= $citata_background ?>)">
              <div class="citata-background-container">
          <div class="container">
            <i class="fas fa-quote-right"></i>
            <p class="p-main">This is photograpfy version of lorem Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum semper porta. Etiam justo lectus, facilisis ac tortor vitae, consectetur cursus ipsum. Pellentesque commodo dui venenatis leo maximus, nec convallis eros pellentesque. Maecenas ac tellus odio. Donec convallis, neque quis aliquam semper, magna est vehicula eros, eget hendrerit nunc purus luctus turpis. Donec lorem odio, fringilla et hendrerit vel,</p>
            <p class="jane">JANE GALADRIEL</p>
            <p class="ceo">CEO TENGKUREP</p>
            <script type="text/javascript"></script>
              </div>
        </div>
        </section>
      </body>

      <footer>
        <section id="give-us-good-news" class="give-us-good-news">
          <div class="container">
            <div class="left">
              <p>GIVE US A GOOD NEWS</p>
              <form action="/action_page.php">
                <br>
                <input type="text" name="firstname" value="Name"><br>
                <br>
                <input type="text" name="lastname" value="Email"><br>
                <br>
                <input type="text" name="lastname" value="Subject"><br>
                <br>
                <input type="text" name="lastname" value="Your Message"><br><br>
                <input type="submit" value="Submit">
              </form>
            </div>
            <div class="right">
              <?php
                $ourclientQuery = new WP_Query( array(
                  'post_type'          => 'our_happy_client',
                  'posts_per_page'     => 10,
                  'orderby'            => 'date',
                  'order'              => 'ASC'
                ) );
              ?>
              <p>OUR HAPPY CLIENT</p>
              <div class="">
              <ul class="logos-flex">
                <?php
                  if( $ourclientQuery->have_posts() ) :
                    while( $ourclientQuery->have_posts() ) :
                      $ourclientQuery->the_post();
                      $photo_id = get_field('logotipas', get_the_ID());
                      $photo_url = wp_get_attachment_image_src($photo_id, 'full')[0];
                      ?>
                <li>
                    <img src="<?= $photo_url ?>" alt="" />
                </li>

              <?php endwhile;endif; ?>

              </ul>
             </div>
            </div>
          </div>
        </section>
          <?php
            $footer_background = get_field( 'footer_background', 22 );
            $footer_background = wp_get_attachment_image_src($footer_background, 'full')[0];
          ?>
          <section id="last-section" class="last-section" style="background-image: url(<?= $footer_background ?>)">
            <div class="last-section-background-container">
          <div class="container" id="last-section-container">
            <div class="footer-left">
              <div class="footer-logo-div">
                <?php
                  $footer_logo_image = get_field( 'footer_logo_image', 22 );
                  $footer_logo_image = wp_get_attachment_image_src($footer_logo_image, 'full')[0];
                 ?>
                <img src="<?= $footer_logo_image ?>">
                <p class="lastlogo">Tajam</p>
              </div>
              <p class="paragrafas">Donec blandit tristique nunc vitae lobortis. Cras luctus, nisi sit amet accumsan hendrerit, est quam facilisis sem, sit amet lacinia.</p>
              <div class="lastmygtukai">
              <button type="button" name="button">HELP</button>
              <button type="button" name="button">TERMS & CONDISIONS</button>
              <button type="button" name="button">PRIVACY</button>
              </div>
            </div>
            <div class="footer-middle">
              <p>OUR STUDIO</p>
              <div class="location">
                <p><i class="fas fa-map-marker"></i>   Ruko curic, Ji radio, 12-38227 Indonesioa,<br> lmand inddinfrfsee </p>
              </div>
              <div class="phone-info">
                <p><i class="fas fa-phone-square"></i>   378-765-65443356</p>
              </div>
            </div>
            <div class="footer-right">
              <p class="stay-in-touch">STAY IN TOUCH</p>
              <?php
                $footer_mygtukas = get_field( 'footer_mygtukas', 22 );
                $footer_mygtukas = wp_get_attachment_image_src($footer_mygtukas, 'full')[0];
               ?>
              <form class="last-form" action="index.html" method="post">
                <input class="input-form" type="text" value="Subscribe to our newsletter" width="250" height="100">
                <input class="input-mygtukas" type="image" src="<?= $footer_mygtukas ?>" border="0" alt="Submit" />
              </form>
              <img src="" alt="">
              <div>
                <ul class="social-media-icons">
                  <li><i class="fab fa-facebook-f"></i></li>
                  <li><i class="fab fa-twitter"></i></li>
                  <li><i class="fas fa-globe"></i></li>
                  <li><i class="fab fa-instagram"></i></li>
                  <li><i class="fab fa-google-plus-g"></i></li>
                  <li><i class="fab fa-youtube"></i></li>
                </ul>
                  <p class="copyright">Copyright &copy; 2018 - Tajem creative</p>
                <!-- <?php
                  wp_footer_menu( array(
                    'meniu'   =>  'footer-meniu',
                    'meniu_class'   =>  'social-media-icons',
                    'container_class' => 'meniu relative'
                  ) );
                ?> -->
              </div>
            </div>
          </div>
            </div>
        </section>
        <?php wp_footer(); ?>
      </footer>
      </html>
