<?php
/**
 * Drupal Camp Costa Rica 2021.
 *
 * Un plugin para mostrar funcionalidades comunes.
 *
 * @package DCCR2021
 * @author AleMadLei.Tech
 * @license GPL-2.0+
 */

/**
 * Plugin Name: Drupal Camp Costa Rica 2021.
 * Description: Un plugin para mostrar funcionalidades comunes.
 * Author: AleMadLei.Tech
 * Version: 1.0.0
 * Text Domain: dccr2021
 * License: GPL-2.0+
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

add_action( 'init', 'dccr2021_add_custom_paths' );
function dccr2021_add_custom_paths() {
  add_rewrite_rule( 'dccr2021/([a-z0-9\-]+)\/?$', 'index.php?dccr-page=$matches[1]', 'top' );
}

add_filter( 'query_vars', 'dccr2021_parse_query_vars' );
function dccr2021_parse_query_vars( $query_vars ) {
  $query_vars[] = 'dccr-page';
  return $query_vars;
}

add_action( 'template_include', 'dccr2021_template_include');
function dccr2021_template_include($original_template) {
  global $wp_query;
  if (!isset($wp_query->query_vars['dccr-page'])) {
    return $original_template;
  }

  // WP por defecto no usa plantillas en los plugins, si no que los busca en el tema.
  // WooCommerce define wc_get_template_part para plantillas.
  // @see https://deliciousbrains.com/wordpress-plugin-development-template-files/
  switch ($wp_query->query_vars['dccr-page']) {
    case 'demo-1':
      return get_query_template( 'demo-1' );
      break;

    case 'demo-2':
      // No checkeo de usuarios anonimos.
      //if (current_user_can('read')) {
      //  return get_query_template( 'demo-2' );
      //}
      return get_query_template( 'demo-2' );

      break;

    case 'demo-3':
      if (!current_user_can('read')) {
        http_response_code( 403 );
        status_header(403);
        return get_query_template('403');
      }
      return get_query_template( 'demo-3' );
      break;

    case 'demo-5':
      return get_query_template( 'demo-5' );
      break;
  }

  return $original_template;
}

add_action( 'admin_menu', 'dccr2021_admin_menu');
function dccr2021_admin_menu() {
  add_options_page( 'DCCR2021', 'DCCR2021', 'manage_options', 'dccr2021', 'dccr2021_settings_page');
}

function dccr2021_settings_page() {
  add_option( 'el_valor_textual', '255', '', 'yes' );
  print 'Disculpas, se los quedo debiendo . <a href="' . get_site_url(NULL, 'dccr2021/demo-5/asdsa') . '">Siguiente paso</a>';
}
