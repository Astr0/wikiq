<?php
$wikiSubdomains["pool"] = array(
	"sitename" => "WikiQPool",
	"server" => "http://pool.wikiq.org",
	"db" => "wiki_pool",
	"language" => "en",
);

$wikiSubdomains["ua"] = array(
	"sitename" => "ВікіQ",
	"server" => "http://ua.wikiq.org",
	"db" => "wiki_ua",
	"language" => "uk"
);

$wikiSubdomains["ru"] = array(
	"sitename" => "ВикиQ",
	"server" => "http://ru.wikiq.org",
	"db" => "wiki_ru",
	"language" => "ru",
	# Sidebar settings
	"addThisSB" => array(
		array(
			'service' => 'compact',
		),
		array(
			'service' => 'vk',
		),
		array(
			'service' => 'odnoklassniki_ru',
		),		
		array(
			'service' => 'facebook',
		),
		array(
			'service' => 'google_plusone',
			'attribs' => 'g:plusone:count="false" style="margin-top:1px;"',
		),
	),
	# Toolbar settings
	"addThisH" => array(
		array(
			'service' => 'vk',
		),
		array(
			'service' => 'odnoklassniki_ru',
		),
		array(
			'service' => 'facebook',
		),
		array(
			'service' => 'twitter',
		),
		array(
			'service' => 'google_plusone',
			'attribs' => 'g:plusone:count="false" style="margin-top:1px;"',
		),
		array(
			'service' => 'mymailru',
		),	
		array(
			'service' => 'moemesto',
		),				
		array(
			'service' => 'email',
		),
	),	
);

$wikiSubdomains["en"] = array(
	"sitename" => "WikiQ",
	"server" => "http://en.wikiq.org",
	"db" => "wiki_en",
	"language" => "en",
);