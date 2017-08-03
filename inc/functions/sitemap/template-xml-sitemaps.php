<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//XML
Header('Content-type: text/xml');

//Robots
Header("X-Robots-Tag: noindex", true);

function seopress_xml_sitemap_index() {
	$seopress_sitemaps ='<?xml version="1.0" encoding="UTF-8"?>';
	$seopress_sitemaps .='<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	
	//CPT
	if (seopress_xml_sitemap_post_types_list_option() !='') {
		foreach (seopress_xml_sitemap_post_types_list_option() as $cpt_key => $cpt_value) {
			foreach ($cpt_value as $_cpt_key => $_cpt_value) {
				if($_cpt_value =='1') {
					$seopress_sitemaps .= '<sitemap>';
					$seopress_sitemaps .= '<loc>';
					$seopress_sitemaps .= home_url().'/sitemaps/'.$cpt_key;
					$seopress_sitemaps .= '</loc>';
					$seopress_sitemaps .= '<lastmod>';

					$get_latest_post = new WP_Query(array('post_type' => $cpt_key, 'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'modified', 'order' => 'ASC'));
				    if($get_latest_post->have_posts()){
				        $seopress_sitemaps .= $get_latest_post->posts[0]->post_modified_gmt;
				    }
					
					$seopress_sitemaps .= '</lastmod>';
					$seopress_sitemaps .= '</sitemap>';
				}
			}
		}
	}

	//Taxonomies
	if (seopress_xml_sitemap_taxonomies_list_option() !='') {
		foreach (seopress_xml_sitemap_taxonomies_list_option() as $tax_key => $tax_value) {
			foreach ($tax_value as $_tax_key => $_tax_value) {
				if($_tax_value =='1') {
					$seopress_sitemaps .= '<sitemap>';
					$seopress_sitemaps .= '<loc>';
					$seopress_sitemaps .= home_url().'/sitemaps/'.$tax_key;
					$seopress_sitemaps .= '</loc>';
					$seopress_sitemaps .= '</sitemap>';
				}
			}
		}
	}
	$seopress_sitemaps .='</sitemapindex>';
	return $seopress_sitemaps;
} 
echo seopress_xml_sitemap_index();
?>