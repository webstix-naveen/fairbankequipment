<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div class="clsContainer">
                <div class="clsTopcommon">
                    <div class="clsLeft">
                        <div class="clsLogo">
                            <a href="<?php echo esc_url( home_url("/") ); ?>">
                                <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) );?>" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="clsCenter">
                        <div class="clsSearchOuter">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <div class="clsRight">
                        <div class="clsMyaccount">
                            <a href="#">SignIn</a>
                        </div>
                        <div class="clsMycart">
                            <a href="#">Cart</a>
                        </div>
                    </div>
                </div>
                <div class="clsBtmcommon">
                    <?php wp_nav_menu(["theme_location" => "menu-1"]); ?>
                </div>
            </div>
        </header>