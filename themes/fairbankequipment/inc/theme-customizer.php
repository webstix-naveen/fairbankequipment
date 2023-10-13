<?php
/**
 * Any new Theme Customizer settings, sections, or controls must be defined from within a customize_register action
 * Phone Number
 * Shedule a appointment
 */
if( !function_exists('theme_customizer') ):

    function theme_customizer( $wp_customize ) {
        $wp_customize->add_section( 'global_strings',
            array( 
                'title' => 'Settings',
                'description' => 'Basic Settings will go here.',
                'priority' => 35,
            )
        );
  
        //Phone
        $wp_customize->add_setting( 'top_rating',
            array(
                'default' => 'A top rated Family Business Since 1979 - Satisfaction Guaranteed',
            )
        );
  
        $wp_customize->add_control( 'top_rating',
            array(
                'label' => 'Ratings Text',
                'section' => 'global_strings',
                'type' => 'text',
            )
        );
  
        //Phone
        $wp_customize->add_setting( 'phone_number',
            array(
                'default' => '(608) 228-8899',
            )
        );
  
        $wp_customize->add_control( 'phone_number',
            array(
                'label' => 'Phone Number',
                'section' => 'global_strings',
                'type' => 'text',
            )
        );
  
        //Email
        $wp_customize->add_setting( 'btn_text',
            array(
                'default' => 'Schedule an Appointment',
            )
        );
  
        $wp_customize->add_control( 'btn_text',
            array(
                'label' => 'Button Name',
                'section' => 'global_strings',
                'type' => 'text',
            )
        );
        
    }
endif;

add_action( 'customize_register', 'theme_customizer' );