<?php

/* -----------------------------------------------------------------------------
 * HTML Tag Schema
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_html_tag_schema' ) ) {
	function vw_html_tag_schema() {
		// Is single post
		if( is_single() ) {
			$type = "Article";
		}

		// Is author page
		elseif( is_author() ) {
			$type = 'ProfilePage';
		}

		// Is search results page
		elseif( is_search() ) {
			$type = 'SearchResultsPage';
		}

		// Is archive
		elseif( is_archive() ) {
			$type = 'CollectionPage';
		}

		else {
			$type = 'WebPage';
		}

		vw_itemtype( $type );
	}
}

if ( ! function_exists( 'vw_itemtype' ) ) {
	function vw_itemtype( $type ) {
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			echo ' itemscope itemtype="'.esc_url( 'http://schema.org/'.$type ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_itemprop' ) ) {
	function vw_itemprop( $prop ) {
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			echo ' itemprop="'.esc_attr( $prop ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_get_itemtype' ) ) {
	function vw_get_itemtype( $type ) {
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			return ' itemscope itemtype="'.esc_url( 'http://schema.org/'.$type ).'" ';
		}
	}
}

if ( ! function_exists( 'vw_get_itemprop' ) ) {
	function vw_get_itemprop( $prop ) {
		if ( ! defined( 'VW_CONST_DISABLE_SCHEMA_ORG' ) ) {
			return ' itemprop="'.esc_attr( $prop ).'" ';
		}
	}
}