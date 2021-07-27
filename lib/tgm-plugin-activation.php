<?php
add_action( 'tgmpa_register', 'my_plugin_activation' );
function my_plugin_activation() {
    $plugins = array(
            array(
                'name'      => 'My Shortcodes',
                'slug'      => 'my-shortcodes',
                'required'  => false,
            ),
            array(
                'name'      => 'Comment Images Reloaded',
                'slug'      => 'comment-images-reloaded',
                'required'  => false,
            ),
            array(
                'name'      => 'Async JavaScript',
                'slug'      => 'async-javascript',
                'required'  => false,
            ),
            array(
                'name'      => 'Autoptimize',
                'slug'      => 'autoptimize',
                'required'  => false,
            ),
            array(
                'name'      => 'Simple History',
                'slug'      => 'simple-history',
                'required'  => false,
            ),
            array(
                'name'      => 'Cool Timeline',
                'slug'      => 'cool-timeline',
                'required'  => false,
            ),
            array(
                'name'      => 'Toolset Types',
                'slug'      => 'types',
                'required'  => false,
            ),
            array(
                'name'      => 'P3 (Plugin Performance Profiler)',
                'slug'      => 'p3-profiler',
                'required'  => false,
            ),
            array(
                'name'      => 'WP Statistics',
                'slug'      => 'wp-statistics',
                'required'  => false,
            ),
            array(
                'name'      => 'kk Star Ratings',
                'slug'      => 'kk-star-ratings',
                'required'  => false,
            ),
            array(
                'name'      => 'NextScripts: Social Networks Auto-Poster',
                'slug'      => 'social-networks-auto-poster-facebook-twitter-g',
                'required'  => false,
            ),
            array(
                'name'      => 'WP Robots Txt',
                'slug'      => 'wp-robots-txt',
                'required'  => false,
            ),
            array(
                'name'      => 'Google XML Sitemaps',
                'slug'      => 'google-sitemap-generator',
                'required'  => false,
            ),
            array(
                'name'      => 'SiteOrigin Widgets Bundle',
                'slug'      => 'so-widgets-bundle',
                'required'  => false,
            ),
            array(
                'name'      => 'upPrev',
                'slug'      => 'upprev',
                'required'  => false,
            ),
            array(
                'name'      => 'WP Fastest Cache',
                'slug'      => 'wp-fastest-cache',
                'required'  => false,
            ),
            array(
                'name'      => 'Page Builder by SiteOrigin',
                'slug'      => 'siteorigin-panels',
                'required'  => false,
            ),
            array(
                'name'      => 'Slider',
                'slug'      => 'slider-image',
                'required'  => false,
            ),
            array(
                'name'      => 'WP Content Copy Protection & No Right Click',
                'slug'      => 'wp-content-copy-protector',
                'required'  => false,
            ),
            array(
                'name'      => 'Shortcodes Ultimate',
                'slug'      => 'shortcodes-ultimate',
                'required'  => false,
            ),
            array(
                'name'      => 'Akismet',
                'slug'      => 'akismet',
                'required'  => false,
            ),
            array(
                'name'      => 'Contact Form 7',
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => 'Contact Form DB',
                'slug'      => 'contact-form-7-to-database-extension',
                'required'  => false,
            ),
            array(
                'name'      => 'Contact Form 7 - Dynamic Text Extension',
                'slug'      => 'contact-form-7-dynamic-text-extension',
                'required'  => false,
            ),
            array(
                'name'      => 'Regenerate Thumbnails',
                'slug'      => 'regenerate-thumbnails',
                'required'  => false,
            ),
            array(
                'name'      => 'Add Linked Images To Gallery',
                'slug'      => 'add-linked-images-to-gallery-v01',
                'required'  => false,
            ),
            array(
                'name'      => 'Capability Manager Enhanced',
                'slug'      => 'capability-manager-enhanced',
                'required'  => false,
            ),
            array(
                'name'      => 'Disable Google Fonts',
                'slug'      => 'disable-google-fonts',
                'required'  => false,
            ),
            array(
                'name'      => 'Image Cleanup',
                'slug'      => 'image-cleanup',
                'required'  => false,
            ),
            array(
                'name'      => 'Optimize Database after Deleting Revisions',
                'slug'      => 'rvg-optimize-database',
                'required'  => false,
            ),
            array(
                'name'      => 'Peters Login Redirect',
                'slug'      => 'peters-login-redirect',
                'required'  => false,
            ),
            array(
                'name'      => 'Prevent Concurrent Logins',
                'slug'      => 'prevent-concurrent-logins',
                'required'  => false,
            ),
            array(
                'name'      => 'Similar post-title checker',
                'slug'      => 'similar-post-title-checker',
                'required'  => false,
            ),
            array(
                'name'      => 'Simple Local Avatars',
                'slug'      => 'simple-local-avatars',
                'required'  => false,
            ),
            array(
                'name'      => 'WP User Avatar',
                'slug'      => 'wp-user-avatar',
                'required'  => false,
            ),
            array(
                'name'      => 'User Switching',
                'slug'      => 'user-switching',
                'required'  => false,
            ),
            array(
                'name'      => 'WP SMTP',
                'slug'      => 'wp-smtp',
                'required'  => false,
            ),
			array(
                'name'      => 'Advanced Custom Fields',
                'slug'      => 'advanced-custom-fields',
                'required'  => false,
            ),
            array(
                'name'      => 'WP-UserOnline',
                'slug'      => 'wp-useronline',
                'required'  => false,
            ),
            array(
                'name'      => 'Custom Post Template',
                'slug'      => 'custom-post-template',
                'required'  => false,
            ),
            array(
                'name'               => 'Gravity Forms Infusionsoft Add-On',
                'slug'               => 'infusionsoft',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/infusionsoft.zip',
                'required'           => true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/infusionsoft.zip',
            ),
            array(
                'name'               => 'Styles & Layouts Gravity Forms',
                'slug'               => 'styles-and-layouts-for-gravity-forms',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/styles-and-layouts-for-gravity-forms.zip',
                'required'           => true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/styles-and-layouts-for-gravity-forms.zip',
            ),
            array(
                'name'               => 'WP Fastest Cache Premium',
                'slug'               => 'wp-fastest-cache-premium',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/wp-fastest-cache-premium.zip',
                'required'           => true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/wp-fastest-cache-premium.zip',
            ),
            array(
                'name'               => 'WP Rocket',
                'slug'               => 'wp-rocket',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/wp-rocket.zip',
                'required'           => true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/wp-rocket.zip',
            ),
            array(
                'name'               => 'BackupBuddy',
                'slug'               => 'backupbuddy',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/backupbuddy.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/backupbuddy.zip',
            ),
            array(
                'name'               => 'Hide My WP',
                'slug'               => 'hide_my_wp',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/hide_my_wp.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/hide_my_wp.zip',
            ),
            array(
                'name'               => 'Shortcodes Ultimate: Additional Skins',
                'slug'               => 'shortcodes-ultimate-skins',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/shortcodes-ultimate-skins.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/shortcodes-ultimate-skins.zip',
            ),
            array(
                'name'               => 'Hookr',
                'slug'               => 'hookr',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/hookr-1.0.0b.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/hookr-1.0.0b.zip',
            ),
            array(
                'name'               => 'Easy Social Share Buttons for WordPress',
                'slug'               => 'easy-social-share-buttons3',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/easy-social-share-buttons3.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/easy-social-share-buttons3.zip',
            ),
            array(
                'name'               => 'Thrive Visual Editor',
                'slug'               => 'thrive-visual-editor',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/thrive-visual-editor-1.200.10.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/thrive-visual-editor-1.200.10.zip',
            ),
            array(
                'name'               => 'Gravity Forms',
                'slug'               => 'gravityforms',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/gravityforms_2.0.7.6.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/gravityforms_2.0.7.6.zip',
            ),
            array(
                'name'               => 'Yoast SEO',
                'slug'               => 'wordpress-seo',
                'source'             => 'http://training.marnet.vn/framework-cam-xoa/wordpress-seo.3.5.zip',
                'required'           =>  true,
                'external_url'       => 'http://training.marnet.vn/framework-cam-xoa/wordpress-seo.3.5.zip',
            ),
        ); // end $plugins
    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    //
        'dismissable'  => false,                   // true
        'dismiss_msg'  => '',
        'is_automatic' => true,                   // Auto Active
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    ); // end $config
    tgmpa( $plugins, $config );
}
?>