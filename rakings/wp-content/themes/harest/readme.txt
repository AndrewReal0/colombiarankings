== Think Up Themes ==

- By Think Up Themes, http://www.thinkupthemes.com/

Requires at least:	4.0.0
Tested up to:		4.7.2

Harest is the free version of the multi-purpose professional theme (Harest Pro) ideal for a business or blog website. The theme has a responsive layout, HD retina ready and comes with a powerful theme options panel with can be used to make awesome changes without touching any code. The theme also comes with a full width easy to use slider. Easily add a logo to your site and create a beautiful homepage using the built-in homepage layout.

-----------------------------------------------------------------------------
	Support
-----------------------------------------------------------------------------

- For support for Harest (free) please post a support ticket over at the https://wordpress.org/support/theme/harest.

-----------------------------------------------------------------------------
	Frequently Asked Questions
-----------------------------------------------------------------------------

- None Yet


-----------------------------------------------------------------------------
	Limitations
-----------------------------------------------------------------------------

- RTL support is yet to be added. This is planned for inclusion in v1.2.0


-----------------------------------------------------------------------------
	Copyright, Sources, Credits & Licenses
-----------------------------------------------------------------------------

Harest WordPress Theme, Copyright 2017 Think Up Themes Ltd
Harest is distributed under the terms of the GNU GPL

The following opensource projects, graphics, fonts, API's or other files as listed have been used in developing this theme. Thanks to the author for the creative work they made. All creative works are licensed as being GPL or GPL compatible.

    [1.01] Item:        Underscores (_s) starter theme - Copyright: Automattic, automattic.com
           Item URL:    http://underscores.me/
           Licence:     Licensed under GPLv2 or later
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.02] Item:        TRT Customizer Pro
           Item URL:    https://github.com/justintadlock/trt-customizer-pro
           Licence:     GPLv2 or later
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.03] Item:        PrettyPhoto
           Item URL:    http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
           Licence:     GPLv2
           Licence URL: http://www.gnu.org/licenses/gpl-2.0.html

    [1.05] Item:        ResponsiveSlides
           Item URL:    https://github.com/viljamis/ResponsiveSlides.js
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.06] Item:        ScrollUp
           Item URL:    https://github.com/markgoodyear/scrollup
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.07] Item:        Modernizr
           Item URL:    https://github.com/Modernizr/Modernizr
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.08] Item:        Font Awesome
           Item URL:    http://fortawesome.github.io/Font-Awesome/#license
           Licence:     SIL Open Font &  MIT
           Licence OFL: http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL
           Licence MIT: http://opensource.org/licenses/mit-license.html

    [1.09] Item:        Twitter Bootstrap (including images)
           Item URL:    https://github.com/twitter/bootstrap/wiki/License
           Licence:     Apache 2.0
           Licence URL: http://www.apache.org/licenses/LICENSE-2.0

    [1.10] Item:        transparent.png, slide_demo1.png, slide_demo2.png, slide_demo3.png, screenshot.png
           Item URL:    /images
           Licence:     CC0
           Licence URL: These items have been produced specifically for Bolder and are owned by Think Up Themes. Released under CC0.

    [1.11] Item:        Various images for use in theme options.
           Item URL:    /admin/main/assets/img & /admin/main/inc/controls/upgrade
           Licence:     CC0
           Licence URL: These items have been produced by Think Up Themes. Released under CC0.

-----------------------------------------------------------------------------
	Changelog
-----------------------------------------------------------------------------

Version 1.3.7
- Fixed:   Homepage image slider now correctly picks up user assigned images.

Version 1.3.6
- Updated: All 3rd party scripts appropriately anchored in function thinkup_frontscripts().

Version 1.3.5
- Updated: Price change reflected in latest update.

Version 1.3.4
- Fixed:   Documentation display fixed to ensure compatibilty with WordPress v4.8.
- Updated: Homepage (Featured) section customizer options display regardless of if switch is on or off.

Version 1.3.3
- Fixed:   html elements update to use ascii codes to ensure correct output for all users.

Version 1.3.2
- New:     Documentation link added to customizer.
- New:     Theme information page added under Appearance in admin area.
- Updated: Customizer upgrade section changed to button_link section.

Version 1.3.1
- Updated: Custom image size names now translation ready.
- Updated: Improved escaping of outputs in thinkup_input_breadcrumb() function in 00.theme-setup.php.

Version 1.3.0
-  New:    Page slider migrated to be easy to use image slider.

Version 1.2.4
- Updated: style-shortcodes.css updated.
- Removed: Unnecesary translation wrappers removed from string containins no text in function thinkup_title_select().

Version 1.2.3
- Updated: Function thinkup_check_ishome() updated to improve reliability with use of use wp_unslash.

Version 1.2.2
- Updated: Font Awesome updated to v4.7.0.

Version 1.2.1
- Updated: Sidebars now added using css class system instead of loading additional files.

Version 1.2.0
- Updated: Fully compatible with WordPress v4.7.

Version 1.1.3
- Updated: Filter hook in custom-header filter renamed to 'thinkup_custom_header' from 'custom-header' to ensure correct prefixing and naming convention.

Version 1.1.2
- Updated: Escaping removed from header_image() in header.php.
- Updated: Escaping removed from get_search_query() in searchform.php.
- Updated: Planned version number for RTL support updated in readme.txt.
- Updated: Demo content changed to show useful information to help user setup the theme.
- Updated: Filter callback for custom header renamed from $args to $thinkup_header_args.
- Removed: Function thinkup_var_cookie() as it's not used in the theme.
- Removed: Theme support removed for search-form, comment-list, comment-form as the functionality is already added in the theme files.

Version 1.1.1
- Updated: Minor styling updates.
- Updated: Carousel jQuery code updated in main-frontend.js.
- Updated: Custom css option removed from theme options panel. This is a core feature in WP v4.7+.

Version 1.1.0
- New:     Custom framework built entirely by extending the core customizer API.
- New:     Function thinkup_photon_exception() added to ensure theme theme bundled transparent.png image displays correctly when Jetpack Photon is activated.
- Fixed:   Various escaping issues fixed.
- Fixed:   Duplicate post title removed on single post pages.
- Fixed:   Unnecessary echo remmoved from function get_search_form().
- Fixed:   <!--more--> tag now works correctly with excerpt option for blog conntent.
- Updated: html5.js removed and support now added from core.
- Updated: Non minified version of ScrollUp script added.
- Updated: ImagedLoaded removed and enqueued directly from core.
- Updated: Preview panel in customizer now contracts as theme options expands.
- Updated: Closing end of file php tag removed in all files in /admin/main/options.
- Updated: Saved values retrieved directly in the function as opposed to setting a global variable for each option.
- Updated: Sidebar widget instructions when no sidebar content is added only shows for users with 'edit_theme_options' permission.
- Updated: index.php updated to match archive.php.
- Updated: License information added for all theme images. 
- Removed: Redux framework.
- Removed: Backward compatibility for title tag removed.
- Removed: Header text color option removed from custom header option.
- Removed: main-backend.js no longer required. All backend js enqueued from customizer options.
- Removed: style-backend.css no longer required. All backend styles enqueued from customizer options.
- Removed: Archive date variables removed from thinkup_input_breadcrumb() as they are not being used.
- Removed: Functions thinkup_adminscripts no longer required. All backend scripts enqueued from customizer options.

Version 1.0.1
- Fixed:   Escaped admin_url() with esc_url() on line 113 of class.redux_cdn.php.
- Fixed:   Escaped $v['img'] with esc_url() on line 181 of field_image_select.php.
- Fixed:   Escaped $img[0] with esc_url() on lines 66 and 67 of field_gallery.php.
- Fixed:   Escaped $this->value['url'] with esc_url() on line 189 of field_media.php.
- Fixed:   jquery.prettyPhoto.js updated to ensure compatibility with https:// servers.
- Fixed:   Escaped $this->value['thumbnail'] with esc_url() on line 190 of field_media.php.
- Fixed:   Escaped $slide_alt and $slide_image with esc_attr() on line 101 of 02.homepage.php.
- Fixed:   Escaped $this->value['background-image'] with esc_url() on line 305 of field_background.php.
- Fixed:   Escaped $this->value['media']['thumbnail'] with esc_url() on line 306 of field_background.php.
- Fixed:   Escaped $slide[ 'image' ] and $slide[ 'thumb' ] with esc_url() on lines 119 and 120 of field_slides.php.
- Fixed:   Escaped $section['icon'] and $sections[ $nextK ]['icon'] with esc_url() on lines 3774 and 3844 framework.php.
- Fixed:   Escaped $v['alt'],$v['class'], $style, $presets and $merge with esc_attr() on line 181 of field_image_select.php.
- Fixed:   Escaped all instances of this->_extension_url and $this->field['upgrade_url'] with esc_url() in file field_thinkup_upgrade.php.
- Fixed:   Custom Redux extensions now moved to folder main-extensions to ensure compatibility with Redux plugin. Ensures plugin and theme can be used without conflicting.
- Updated: style-shortcodes.css updated.
- Updated: Font Awesome icons updated to v4.6.3.
- Updated: Post code in content.php simplified to use less PHP.
- Updated: Search placeholder text can now be fully translated.
- Updated: Sanitization and escaping of unknown outputs improved.
- Updated: Commented code blocks removed from extension_customizer.php.
- Updated: Changed validation for slider title from esc_attr() to esc_html().
- Updated: Textdomain in options.php changes from "redux-framework" to match theme textdomain "harest".
- Updated: Scripts and stylesheets in function thinkup_adminscripts() now enenqueued directly.
- Updated: Function thinkup_adminscripts() now hooked into "customize_controls_enqueue_scripts" instead of "admin_enqueue_scripts".
- Updated: Theme tags updated to reflect new tags. Old rags will be removed once WP v4.6 is released and users can no longer filter with old tags.
- Updated: "ReduxFramework::$_url . 'assets/img/layout" changed to "trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout".

Version 1.0.0
- New:     Initial release.