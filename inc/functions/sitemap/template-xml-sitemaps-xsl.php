<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//XML
Header('Content-type: text/xml');

//Robots
Header("X-Robots-Tag: noindex", true);

function seopress_xml_sitemap_index_xsl() {
	$seopress_sitemaps_xsl ='<?xml version="1.0" encoding="UTF-8"?>';
	$seopress_sitemaps_xsl .='
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">';
	
	$seopress_sitemaps_xsl .='<html>';
	$seopress_sitemaps_xsl .='<head>';
	$seopress_sitemaps_xsl .='<title>XML Sitemaps</title>';
	$seopress_sitemaps_xsl .='<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	body {
		background: #F7F7F7;
		font-size: 14px;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
	}
	h1 {
		color: #23282d;
		font-weight:bold;
		font-size:20px;
		margin: 20px 0;
	}
	p {
		margin: 0 0 15px 0;
	}
	p a {
		color: rgb(0, 135, 190);
	}
	p.footer {
		padding: 15px;
	    background: rgb(250, 251, 252) none repeat scroll 0% 0%;
	    margin: 10px 0px 0px;
	    display: inline-block;
	    width: 100%;
	    color: rgb(68, 68, 68);
	    font-size: 13px;
	    border-top: 1px solid rgb(224, 224, 224);
	}
	#main {
		margin: 0 auto;
		max-width: 45rem;
		padding: 1.5rem;
		width: 100%;
	}
	#sitemaps {
		width: 100%;
		box-shadow: 0 0 0 1px rgba(224, 224, 224, 0.5),0 1px 2px #a8a8a8;
		background: #fff;
		margin-top: 20px;
		display: inline-block;
	}
	#sitemaps .loc, #sitemaps .lastmod {
	    font-weight: bold;
	    display: inline-block;
	    border-bottom: 1px solid rgba(224, 224, 224, 1);
	    padding: 15px;
	}
	#sitemaps .loc {
		width: 70%;
	}
	#sitemaps .lastmod {
		width: 30%;
		padding-left: 0;
	}
	#sitemaps ul {
	    margin: 10px 0;
	    padding: 0;
	}
	#sitemaps li {
	    list-style: none;
	    padding: 10px 15px;
	}
	#sitemaps li a {
	    color: rgb(0, 135, 190);
	    text-decoration: none;
	}
	#sitemaps li:hover{
		background:#F3F6F8;
	}
	#sitemaps .item-loc {
	    width: 70%;
	    display: inline-block;
	}
	#sitemaps .item-lastmod {
		width: 30%;
	    display: inline-block;
		padding: 0 10px;
	}
	</style>';
	$seopress_sitemaps_xsl .='</head>';
	$seopress_sitemaps_xsl .='<body>';
	$seopress_sitemaps_xsl .='<div id="main">';
	$seopress_sitemaps_xsl .='<h1>SEOPress XML Sitemaps</h1>';
	$seopress_sitemaps_xsl .='<p><a href="'.get_home_url().'/sitemaps">Index sitemaps</a></p>';
	$seopress_sitemaps_xsl .='<div id="sitemaps">';
	$seopress_sitemaps_xsl .='<div class="loc">';
	$seopress_sitemaps_xsl .='URL';
	$seopress_sitemaps_xsl .='</div>';	
	$seopress_sitemaps_xsl .='<div class="lastmod">';
	$seopress_sitemaps_xsl .='Last update';
	$seopress_sitemaps_xsl .='</div>';
	$seopress_sitemaps_xsl .='<ul>';
	$seopress_sitemaps_xsl .='<xsl:for-each select="sitemapindex/sitemap">';
    $seopress_sitemaps_xsl .='<li>';
    $seopress_sitemaps_xsl .='<xsl:variable name="sitemap_loc"><xsl:value-of select="loc"/></xsl:variable>';
    $seopress_sitemaps_xsl .='<span class="item-loc"><a href="{$sitemap_loc}"><xsl:value-of select="loc" /></a></span>';
    $seopress_sitemaps_xsl .='<span class="item-lastmod"><xsl:value-of select="lastmod" /></span>';
    $seopress_sitemaps_xsl .='</li>';
    $seopress_sitemaps_xsl .='</xsl:for-each>';
    $seopress_sitemaps_xsl .='</ul>';

    $seopress_sitemaps_xsl .='<ul>';
	$seopress_sitemaps_xsl .='<xsl:for-each select="urlset/url">';
    $seopress_sitemaps_xsl .='<li>';
    $seopress_sitemaps_xsl .='<xsl:variable name="url_loc"><xsl:value-of select="loc"/></xsl:variable>';
    $seopress_sitemaps_xsl .='<span class="item-loc"><a href="{$url_loc}"><xsl:value-of select="loc" /></a></span>';
    $seopress_sitemaps_xsl .='<span class="item-lastmod"><xsl:value-of select="lastmod" /></span>';
    $seopress_sitemaps_xsl .='</li>';
    $seopress_sitemaps_xsl .='</xsl:for-each>';
    $seopress_sitemaps_xsl .='</ul>';

    $seopress_sitemaps_xsl .='<p class="footer">';
    $seopress_sitemaps_xsl .='XML sitemap generated by <a href="http://seopress.org" target="_blank">SEOPress</a>, SEO plugin for WordPress';
    $seopress_sitemaps_xsl .='</p>';
    $seopress_sitemaps_xsl .='</div>';
    $seopress_sitemaps_xsl .='</div>';
	$seopress_sitemaps_xsl .='</body>';
	$seopress_sitemaps_xsl .='</html>';

	$seopress_sitemaps_xsl .='</xsl:template>';

	$seopress_sitemaps_xsl .='</xsl:stylesheet>';

	return $seopress_sitemaps_xsl;
} 
echo seopress_xml_sitemap_index_xsl();
?>