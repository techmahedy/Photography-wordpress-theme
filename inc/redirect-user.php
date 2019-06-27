<?php
/* Redirect on theme activation */
add_action('admin_init', function(){
    global $pagenow;
    if ("themes.php" == $pagenow && is_admin() && isset($_GET['activated'])) {
        wp_redirect(esc_url_raw(add_query_arg('page', 'keenshot', admin_url('themes.php'))));
    }
});

function keenshot_register_settings()
{
    add_option('keenshot_option_name', 'This is my option value.');
    register_setting('keenshot_options_group', 'keenshot_option_name', 'keenshot_callback');
}

add_action('admin_init', 'keenshot_register_settings');
function keenshot_register_options_page()
{
    add_theme_page('Page Title', 'Keenshot', 'manage_options', 'keenshot', 'keenshot_options_page');
}

add_action('admin_menu', 'keenshot_register_options_page');
function keenshot_options_page()
{
?>
    <div style="text-align:center">       
        <h2 style="font-size:30px"><?php _e('Getting started with keenshot is pretty simple. Just follow this video ', 'keenshot'); ?></h2>
        <iframe width="600" height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe> <br>
        <a href="/wp-admin/customize.php" target="_blank" class="button button-primary">Go to theme customizer!</a>
    </div>
<?php
}