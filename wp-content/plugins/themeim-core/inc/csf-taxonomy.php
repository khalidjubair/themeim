<?php
/**
 * Theme Taxonomy Options
 * @package Themeim
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( class_exists('CSF') ){

	$allowed_html = themeim_core()->kses_allowed_html(array('mark'));

	$prefix = 'themeim';

    /**
     * Service Category Options
     * @package themeim
     * @since 1.0.0
     */

	CSF::createTaxonomyOptions( $prefix .'_service_category', array(
		'taxonomy'  => 'service-cat',
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	) );

	// Create a section
	CSF::createSection( $prefix .'_service_category', array(
		'fields' => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','themeim'),
				'default' => 'flaticon-businessman'
			),
		)
	) );


    /**
     * Packages Category Options
     * @package themeim
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_packages_category', array(
        'taxonomy'  => 'packages-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_packages_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','themeim'),
                'default' => 'flaticon-statistics'
            ),
        )
    ) );


    /**
     * Deals Category Options
     * @package themeim
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_deals_category', array(
        'taxonomy'  => 'deals-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_deals_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','themeim'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );

    /**
     * Team Category Options
     * @package themeim
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_team_category', array(
        'taxonomy'  => 'team-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_team_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','themeim'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );

}//endif