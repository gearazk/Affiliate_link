<?php

function format_str($str, $vars, $char = '%')
{
  $tmp = array();
  foreach($vars as $key => $value)
  {
      $tmp[$char . $key . $char] = $value;
  }
  return str_replace(array_keys($tmp), array_values($tmp), $str);
}

function extract_domain($url)
{
	$domain = "";

	$domain = parse_url($url, PHP_URL_HOST);
	$domain = str_replace("www.", "", $domain);
	$domain = str_replace("deal.", "", $domain);
	$domain = str_replace("deals.", "", $domain);

	return $domain;
}

function str_replace_first($from, $to, $subject)
{
  $from = '/'.preg_quote($from, '/').'/';
  return preg_replace($from, $to, $subject, 1);
}

/**
* Base class for affiliate url factory.
*/

class BaseAffiliateURLFactory
{
	public static $factory_id = "base_affiliate_factory";

	public static $URL_TEMP = "";

	public static $OFFER_KEY 	= array('adayroi.com'=> 'adayroi',
														'lazada.vn'=> 'lazada',
													 	'tiki.vn'=> 'tiki',
													 	'mytour.vn'=> 'mytour',
													 	'vienthonga.vn'=> 'vienthonga',
													 	'lingo.vn'=> 'lingo',
													 	'cdiscount.vn'=> 'cdiscount',
													 	'zalora.vn'=> 'zalora',
													 	'zanado.com'=> 'zanado',
													 	'juno.vn'=> 'juno',
													 	'nguyenkim.com'=> 'nguyenkim',
													 	'vatgia.com'=> 'vatgia',
													 	'ebay.vn'=> 'ebayvn',
													 	'hcenter.com.vn'=> 'hcenter');

	public static $PUB_KEYS 		= array('accesstrade'=> 'ABC',
											'masoffer'=> 'kepgiay');

	public static $UTM_PARAMS 	= array('campaign_source'=> 'kepgiay_com',
										'medium'=> 'post',
										'campaign_name'=> 'review_posts',
										'campaign_content'=> 'post');

	function affiliate_url()
	{
		return "";
	}

	function repair_affiliate_url($url = "")
	{
		if ($url == "") {
			return $url;
		}

		//Case double utm_source

		$mo_utm_source = "%26utm_source%3Dmasoffer";
		$count = substr_count($url, $mo_utm_source);
		$v0_pos = strpos($url, "http://go.masoffer.net/v0");
		$v1_pos = strpos($url, "http://go.masoffer.net/v1");
		if (($count > 0 && $v0_pos !== false)
						|| ($count > 1 && $v1_pos !== false)) {
			$url = str_replace_first($mo_utm_source, "", $url);
		}
		
		$mo_utm_source = "%3Futm_source%3Dmasoffer";
		$pos = strpos($url, $mo_utm_source);
		if ($pos !== false && $v0_pos !== false) {
			$url = str_replace_first($mo_utm_source, "", $url);
		}

		return $url;
	}

}

class AccesstradeAffiliateURLFactory extends BaseAffiliateURLFactory
{

	public static $factory_id = "accesstrade_affiliate_factory";

}

class MasofferAffiliateURLFactory extends BaseAffiliateURLFactory
{

	public static $factory_id = "masoffer_affiliate_factory";
	public static $URL_TEMP = "http://go.masoffer.net/v0/%offer_key%/%pub_key%/?aff_sub1=%campaign_source%&aff_sub2=%medium%&aff_sub3=%campaign_name%&aff_sub4=%campaign_content%s&go=%go%";

	function affiliate_url($url)
	{
		$domain = extract_domain($url);

		$offer_key = BaseAffiliateURLFactory::$OFFER_KEY[$domain];

		if (!$offer_key) { // Doesn't support
			return BaseAffiliateURLFactory::repair_affiliate_url($url);;
		}

		$url_params = BaseAffiliateURLFactory::$UTM_PARAMS;

		$url_params['offer_key'] = $offer_key;
		$url_params['pub_key'] = "kepgiay";
		$url_params['go'] = urlencode($url);

		$affiliate_url = format_str($this::$URL_TEMP, $url_params);

		return BaseAffiliateURLFactory::repair_affiliate_url($affiliate_url);
	}

}

function affiliate_factory($key = BaseAffiliateURLFactory::factory_id)
{

	$base = new BaseAffiliateURLFactory;
	$mo = new MasofferAffiliateURLFactory;
	$at = new AccesstradeAffiliateURLFactory;
	$AFFILIATE_FACTORIES = array($base, $mo, $at);

	foreach ($AFFILIATE_FACTORIES as $factory) {
		if ($factory::$factory_id == $key) {
			return $factory;
		}
	}
	return $AFFILIATE_FACTORIES[0];
}

function default_affiliate_factory()
{
	return affiliate_factory("masoffer_affiliate_factory");
}

function affiliate_url($url = "")
{
	$factory = default_affiliate_factory();
	
	$affiliate_url = $factory->affiliate_url($url);

	if ($affiliate_url == "") {
		$affiliate_url = "";
	}

	return $affiliate_url;
}

?>