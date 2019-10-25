<?php

//Menambahkan Dashboard AffiliateWP Di Halaman My Account WooCommerce
//Tambah rewrite endpoint supaya tidak 404 di tab My Account baru

function tambah_aff_wp_endpoint() {
  add_rewrite_endpoint( 'aff-wc', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'tambah_aff_wp_endpoint' );


//------------------------------
// Tambah link Affiliate Area di menu "My Account"
// jika Affiliate WP enable dan user ini adalah seorang affiliate
//------------------------------
// Taruh logout link di paling bawah

function tambah_aff_wp_my_account( $items ) {
  if ( function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate() ) {
    $logout = array_pop( $items );
    $items['aff-wc'] = 'Affiliate Area';
    // $items[] = $logout;
    $items['customer-logout'] = $logout;
  }
  return $items;
}

add_filter( 'woocommerce_account_menu_items', 'tambah_aff_wp_my_account' );


//------------------------------
// munculkan isi AffiliateWP di tab baru jika plugin AffiliateWP enabled
function aff_wp_content() {
  if ( ! class_exists( 'Affiliate_WP_Shortcodes' ) ) {
    return;
  }
  $shortcode = new Affiliate_WP_Shortcodes;
  // echo $shortcode->affiliate_area();
  echo $shortcode->affiliate_area($content = null);
}

add_action( 'woocommerce_account_aff-wc_endpoint', 'aff_wp_content' );

//------------------------------
// pastikan tab Affiliate WP jalan lancar
function filter_tab_aff( $url, $page_id, $tab ) {
  return esc_url_raw( add_query_arg( 'tab', $tab ) );
}

add_filter( 'affwp_affiliate_area_page_url', 'filter_tab_aff', 10, 3 );