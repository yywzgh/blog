<?php
if (is_active_sidebar('fmr_footer')) {
?><!-- footer -->
<footer>
    <div class="container">
        <div class="row">

            <?php @dynamic_sidebar('fmr_footer'); ?>
        </div>
    </div>
</footer>
<?php } ?>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <p class="copyright_p">&copy; <?php the_date('Y'); ?></p>
                <ul class="copyright_list">
                    <li>
                        <?php

                        $vk = get_theme_mod('fmr_social_networks_control_VK');
                        if (isset($vk{1})): ?>
                            <a href="<?php echo esc_url($vk); ?>">
                                <i class="fa fa-vk"></i>
                            </a>

                        <?php endif; ?>
                    </li>
                    <?php
                    $mail_ru = get_theme_mod('fmr_social_networks_control_mail_ru');

                    if (isset($mail_ru{5})): ?>
                        <li>

                            <a href="<?php echo esc_url($mail_ru); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/mail.jpg"
                                ></a>
                        </li> <?php endif; ?>
                    <li>

                        <?php
                        $twitter = get_theme_mod('fmr_social_networks_control_twitter');
                        if (isset($twitter{5})): ?>

                            <a href="<?php echo esc_url($twitter); ?>">
                                <i class="fa fa-tumblr-square"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php
                    $google = get_theme_mod('fmr_social_networks_control_google');
                    if (isset($google{5})): ?>
                        <li>
                            <a href="<?php echo esc_url($google); ?>">
                                <i class="fa fa-google-plus"></i>
                            </a>

                        </li>
                    <?php endif; ?>
                    <?php
                    $youtube = get_theme_mod('fmr_social_networks_control_youtube');

                    if (isset($youtube{5})): ?>
                        <li>
                            <a href="<?php echo esc_url($youtube); ?>">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php
                    $blogger = get_theme_mod('fmr_social_networks_control_blogger');
                    if (isset($blogger{5})): ?>

                        <li>
                            <a href="<?php echo esc_url($blogger); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Bloger.jpg"
                                ></a>
                        </li>

                    <?php endif; ?>

                    <?php
                    $facebook = get_theme_mod('fmr_social_networks_control_facebook');
                    if (isset($facebook{5})): ?>
                        <li>
                            <a href="<?php echo esc_url($facebook); ?>">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php
                    $ok = get_theme_mod('fmr_social_networks_control_ok');
                    if (isset($ok{5})): ?>

                        <li>
                            <a href="<?php echo esc_url($ok); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/odnoklassniki.jpg"
                                ></a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $dribbble = get_theme_mod('fmr_social_networks_control_dribbble');

                    if (isset($dribbble{5})): ?>

                        <li>
                            <a href="<?php echo esc_url($dribbble); ?>">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                    $rutube = get_theme_mod('fmr_social_networks_control_rutube');

                    if (isset($rutube{5})): ?>

                        <li>
                            <a href="<?php echo esc_url($rutube); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rutube.jpg"
                                     alt=""></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>