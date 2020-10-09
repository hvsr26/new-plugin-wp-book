<?php

/**
 * Creat Settings Menu
 */


    add_menu_page(

        __('Book Settings','wp-book'),
        __('Book Settings','wp-book'),
        'manage_options',
        'bookplugin-settings-page',
        'bookplugin_settings_template_callback',
        '',
        30
    );
/**
 * add sub menus pages
 */

 add_submenu_page(
    'bookplugin-settings-page',
    'General',
    'General',
    'manage_options',
    'bookplugin-settings-page',
    'bookplugin_settings_template_callback',
    ''
 );
/**
 * add reading sub menus page
 */

 add_submenu_page(

    'bookplugin-settings-page',
    'Reading',
    'Reading',

    'manage_options',
    'bookplugin-reading-settings-page',
    'bookplugin_reading_settings_template_callback',
    ''
 );

    /**
     * setings template page
     */
    function bookplugin_settings_template_callback(){

         ?>
         <div class="wrap">
        <h1> <?php echo esc_html(get_admin_page_title()); ?></h1>
         
         <?php settings_errors(); ?>
         <form action="options.php" method="post">
         <?php
         //security field
         settings_fields('bookplugin-settings-page');

         //output settings section here

         do_settings_sections('bookplugin-settings-page');

         //save settings button

         submit_button('Save Settings');
         ?>
         </div>
         <?php
    }
    /**
     * reading setings template page
     */
    function bookplugin_reading_settings_template_callback(){

         ?>
         <div class="wrap">
        <h1> <?php echo esc_html(get_admin_page_title()); ?></h1>
         
         <?php settings_errors(); ?>
         <form action="options.php" method="post">
         <?php
         //security field
         settings_fields('bookplugin-reading-settings-page');

         //output settings section here

         do_settings_sections('bookplugin-reading-settings-page');

         //save settings button

         submit_button('Save Settings');
         ?>
         </div>
         <?php
    }
    
    



     /**
      * settings template
      */
        
      

        //Setup Settings Section
        add_settings_section(
            'bookplugin_settings_section',
            'Book Settings Page',
            '',
            'bookplugin-settings-page'

        );
        add_settings_section(
            'bookplugin_reading_settings_section',
            'Book Reading Settings Page',
            '',
            'bookplugin-reading-settings-page'
        
        );

        // Register reading radio field
            register_setting(
            'bookplugin-reading-settings-page',
            'bookplugin_reading_settings_radio_field',
         array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'value1'
         )
        );

        // Add reading radio fields
        add_settings_field(
            'bookplugin_reading_settings_radio_field',
            __( ' Number of books displayed per page', 'wp-book' ),
            'bookplugin_reading_settings_radio_field_callback',
            'bookplugin-reading-settings-page',
            'bookplugin_reading_settings_section'
        );

        //Register Input Fields

        register_setting(
            'bookplugin-settings-page',
            'bookplugin_settings_input_field',
            array(
                'type'=> 'string',
                'sanitize_callback'=> 'sanitize_text_field',
                'default'=> ''
            )
        );

        //add input settings fields

        add_settings_field(
            'bookplugin_settings_input_field',
            __('Input Field','wp-book'),
            'bookplugin_settings_input_field_callback',
            'bookplugin-settings-page',
            'bookplugin_settings_section'
        );

       

    // Registe textarea field
    register_setting(
        'bookplugin-settings-page',
        'bookplugin_settings_textarea_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => ''
        )
    );

     // Add textarea fields
     add_settings_field(
        'bookplugin_settings_textarea_field',
        __( 'Textarea Field', 'wp-book' ),
        'bookplugin_settings_textarea_field_callback',
        'bookplugin-settings-page',
        'bookplugin_settings_section'
    );

    // Register select currency option field
    register_setting(
        'bookplugin-settings-page',
        'bookplugin_settings_select_currency',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'option1'
        )
    );

    // Add select fields
    add_settings_field(
        'bookplugin_settings_select_currency',
        __( 'Select Currency', 'wp-book' ),
        'bookplugin_settings_select_currency_callback',
        'bookplugin-settings-page',
        'bookplugin_settings_section'
    );

    // Register radio field
    register_setting(
        'bookplugin-settings-page',
        'bookplugin_settings_radio_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'value1'
        )
    );

    // Add radio fields
    add_settings_field(
        'bookplugin_settings_radio_field',
        __( 'Radio Field', 'wp-book' ),
        'bookplugin_settings_radio_field_callback',
        'bookplugin-settings-page',
        'bookplugin_settings_section'
    );


    /**
     * setings reading template page
     */
    function bookplugin_reading_settings_radio_field_callback(){
 
        $bookplugin_reading_radio_field = get_option( 'bookplugin_reading_settings_radio_field' );
        ?>
        <label for="value1">
            <input type="radio" name="bookplugin_reading_settings_radio_field" value="value1" <?php checked( 'value1', $bookplugin_reading_radio_field ); ?>/> 10 books
        </label>
        <label for="value2">
            <input type="radio" name="bookplugin_reading_settings_radio_field" value="value2" <?php checked( 'value2', $bookplugin_reading_radio_field ); ?>/> 20 books
        </label>
        <?php
     
        }



/**
 * settings input fields template
 */
function bookplugin_settings_input_field_callback(){

    $bookplugin_input_field = get_option('bookplugin_settings_input_field');
    ?>
    <input type="text" name="bookplugin_settings_input_field" class="regular-text" value="<?php echo isset($bookplugin_input_field) ? esc_attr($bookplugin_input_field) : ''; ?>"/>
    <?php
        }



/**
 * textarea template
 */
function bookplugin_settings_textarea_field_callback() {
    $bookplugin_textarea_field = get_option('bookplugin_settings_textarea_field');
    ?>
    <textarea name="bookplugin_settings_textarea_field" class="large-text" rows="10"><?php echo isset($bookplugin_textarea_field) ? esc_textarea( $bookplugin_textarea_field ) : ''; ?></textarea>
    <?php 
}

/**
 * select currency template
 */
function bookplugin_settings_select_currency_callback() {
    $bookplugin_select_currency = get_option('bookplugin_settings_select_currency');
    ?>
    <select name="bookplugin_settings_select_currency" class="regular-text">
        
        <option value="option1" <?php selected( 'option1', $bookplugin_select_currency ); ?> >INR</option>
        <option value="option2" <?php selected( 'option2', $bookplugin_select_currency ); ?>>USD</option>
    </select>
    <?php
}

/**
 * radio field tempalte
 */
function bookplugin_settings_radio_field_callback() {
    $bookplugin_radio_field = get_option( 'bookplugin_settings_radio_field' );
    ?>
    <label for="value1">
        <input type="radio" name="bookplugin_settings_radio_field" value="value1" <?php checked( 'value1', $bookplugin_radio_field ); ?>/> Value 1
    </label>
    <label for="value2">
        <input type="radio" name="bookplugin_settings_radio_field" value="value2" <?php checked( 'value2', $bookplugin_radio_field ); ?>/> Value 2
    </label>
    <?php
    
  /**
  *add action hooks in class-plugin-name.php file
  **/
    		//add action hook for creat custom settings menu
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'bookplugin_settings_menu' );
		
		//add action hook for setup settings section
		
		$this->loader->add_action( 'admin_init', $plugin_admin, 'bookplugin_settings_init' );
    

/**
 * Creat Settings Menu in class-plugin-name-admin.php file
 */
public function bookplugin_settings_menu(){

		ob_start();//started buffer
		
		//include setting page
		include_once(WP_BOOK_PLUGIN_PATH."includes/settings/settings.php");
		
		$template = ob_get_contents();//reading content
		
		ob_end_clean();//closing and cleaning

		echo $template;
	}

	

	public function bookplugin_settings_init(){

		ob_start();//started buffer
		
		//include setting page
		include_once(WP_BOOK_PLUGIN_PATH."includes/settings/settings.php");
		
		$template = ob_get_contents();//reading content
		
		ob_end_clean();//closing and cleaning

		echo $template;

	}


}



        



                
            

      


     
