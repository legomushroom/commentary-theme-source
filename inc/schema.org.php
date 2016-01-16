<?php

/* -----------------------------------------------------------------------------
 * HTML Tag Schema
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_html_tag_schema' ) ) {
	function vw_html_tag_schema() {
		// Is single post
		if( is_single() ) {
			vw_itemtype( 'Article' );
		}

		// Is author page
		elseif( is_author() ) {
			vw_itemtype( 'ProfilePage' );
		}

		// Is search results page
		elseif( is_search() ) {
			vw_itemtype( 'SearchResultsPage' );
		}

		// Is archive
		elseif( is_archive() ) {
			vw_itemtype( 'CollectionPage' );
		}

		else {
			vw_itemtype( 'WebPage' );
		}

	}
}

if ( ! function_exists( 'vw_itemtype' ) ) {
	function vw_itemtype( $type ) {
		if ( empty( $type ) ) return;
		
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			echo ' itemscope itemtype="'.esc_url( 'http://schema.org/'.$type ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_itemprop' ) ) {
	function vw_itemprop( $prop ) {
		if ( empty( $prop ) ) return;
		
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			echo ' itemprop="'.esc_attr( $prop ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_itemprop_meta' ) ) {
	function vw_itemprop_meta( $prop, $content ) {
		if ( empty( $prop ) ) return;
		
		printf( '<meta itemprop="%s" content="%s"/>', $prop, $content );
	}
}

if ( ! function_exists( 'vw_get_itemtype' ) ) {
	function vw_get_itemtype( $type ) {
		if ( empty( $type ) ) return;
		
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			return ' itemscope itemtype="'.esc_url( 'http://schema.org/'.$type ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_get_itemprop' ) ) {
	function vw_get_itemprop( $prop ) {
		if ( empty( $prop ) ) return;
		
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			return ' itemprop="'.esc_attr( $prop ).'" ';
		}
	}
}