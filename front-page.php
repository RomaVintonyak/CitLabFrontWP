<?php get_header(); ?>
<!--main-->
  <main>
    <!--intro section-->
    <section id="intro" class="intro">
      <div class="intro__row">
        <div class="intro__content">
          <h1 class="main__title">
            <?php the_field("main_title"); ?>
          </h1>
          <h2>
            <?php the_field("main_suptitle"); ?>
          </h2>
        </div><!--./main__title-->
        <div class="intro__img">
          <img class="img" src="<?php the_field("main_picture"); ?>" alt="picture">
        </div><!--./intro__img-->
      </div><!--./intro__row-->
    </section><!--./intro-->
    <!--team section-->
    <section id="team" class="team mt-6">
      <div class="container">
        <div class="team__title ">
          <h2><?php the_field("team_title"); ?></h2>
          <div class="team__title--img">
              <img src="<?php the_field("team_picture"); ?>" alt="figure" class="img">
          </div>
        </div><!--./team__title-->
        <div class="team__posts mt-6">
          <div class="post__row">
          <!--header drop down list-->
          <?php
          $showList  = get_field("pereglyad_speczialistiv");
          $closeList = get_field("shovaty_spysok");
          ?>
            <?php
              $args = array(
                'post_type'      => 'process',
                'post_status'    => 'publish',
                'posts_per_page' => - 1,
              );
            $query = new WP_Query( $args );
            ?>
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>	
            <div class="post__coll">
              <div class="post__coll--title">
                <?php echo the_post_thumbnail( 'thumbnail' ); ?>
                <h3><?php the_title(); ?></h3>
              </div>
              <h6><?php the_content(); ?></h6>
              <hr>
              <div class="drop__down" id="postDropdowm">
                <div class="drop__down--header">
                  <div class="header__close">
                    <h5><?php echo $showList ?></h5>
                    <span>&rightarrow;</span>
                  </div>
                  <div class="header__open">
                    <h5><?php echo $closeList ?></h5>
                    <span>&leftarrow;</span>
                  </div>
                </div>
                <div class="drop__down--list">
                  <?php if( have_rows('administratyvnyj_proczes') ): ?>
                  <!--admin drop down-->
                    <?php while( have_rows('administratyvnyj_proczes') ): the_row(); ?>
                      <p>&ndash;<?php the_sub_field('novi_admin_speczialisty'); ?></p>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <?php if( have_rows('kryminalni_speczialisty') ): ?>
                    <!--cryminal drop down-->
                    <?php while( have_rows('kryminalni_speczialisty') ): the_row(); ?>
                      <p>&ndash;<?php the_sub_field('novyj_kryminalnyj_speczialist'); ?></p>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <?php if( have_rows('gospodarski_speczialisty') ): ?>
                    <!--gospodarski drop down-->
                    <?php while( have_rows('gospodarski_speczialisty') ): the_row(); ?>
                      <p>&ndash;<?php the_sub_field('novi_gospodarski_speczialisty'); ?></p>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <?php if( have_rows('speczialisty') ): ?>
                    <!--cyvil drop down-->
                    <?php while( have_rows('speczialisty') ): the_row(); ?>
                      <p>&ndash;<?php the_sub_field('novyj_speczialist'); ?></p>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div><!--/.post__coll-->
          <?php endwhile ?>
          <?php endif ?>
          <?php wp_reset_postdata();?>	
          </div><!--./post__row-->
        </div><!--./team__posts-->
      </div><!--./container-->
    </section><!--./team-->
    <!--news section-->
    <section id="news" class="mt-6 news">
      <div class="container">
        <div class="news__title ">
          <div class="news__title--img">
              <img src="<?php the_field("news-img"); ?>" alt="figure" class="img">
          </div>
          <h2><?php the_field("news-title"); ?></h2>
        </div><!--./news__title-->
        <div class="news__block mt-6">
          
          
          
          
          
          
          
          
          
          
          
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
          <div class="news__card">
            <img src="img/news/background_thumbnail.svg" alt="thumbnail" class="img">
            <div class="card__body">
              <p>
                Lorem ipsum dolor sit, amet, consectetur adipisicing elit. 
                Numquam quos deleniti expedita animi ...
              </p>
              <a href="#">Перейти до поста.</a>
            </div><!--./card__body-->
          </div><!--./news__card-->
        </div><!--./news__block-->
        <div class="btn__block text__center">
          <button type="button" class="news__btn" id="newsBtn">Завантажити ще</button>
        </div><!--./news__btn-->
      </div><!--./container-->
    </section><!--./news-->
  </main>
  <?php get_footer(); ?>
</body>
</html>
