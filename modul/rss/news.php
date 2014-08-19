<?php
header("Content-type: text/xml; charset=utf-8");
include '../../core/conf.php';
include '../../core/db.php';
include '../../core/core.php';

$res = $db -> select ( "SELECT * FROM ".DB_PREFIX."news where en=1 order by data desc limit 2" );

$firstDateK=date("r",strtotime($res[0]['data']));
$lastDateK=date("r",strtotime($res[1]['data']));


echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="'.$site_url.'/news/rss" rel="self" type="application/rss+xml" />
<title>Новости</title>
<link>'.$site_url.'/news/rss</link>
<description>Новости Ирина Горина</description>';
if($res[category]){echo '<category>Новости</category>';}
if($res[language]){echo '<language>ru</language>';}
if($res[copyright]){echo '<copyright>'.$site_url.'</copyright>';}
if($res[webMaster]){echo '<webMaster>'.$site_url.'</webMaster>';}
if($res[pubDate]) {echo '<pubDate>'.$firstDateK.'</pubDate>';}
if($res[lastBuildDate]){echo '<lastBuildDate>'.$lastDateK.'</lastBuildDate>';}

$xml = "";
$res1 = $db->select("SELECT  * FROM  ".DB_PREFIX."news where en=1   ORDER BY data DESC LIMIT 100 ");


foreach($res1 as $v)
{
    $DateZam=date("r",strtotime($v['date']));
    
	$xml.= "<item>";
		$xml.=  "<title>".$v['zag_ru']."</title>";
		$xml.=  "<link>".$site_url."/news/".$v[id]."</link>";
		$xml.=  "<description>".htmlspecialchars (str_smoll($v['text_ru'], 500) ) ."</description>";
		if($v['data'])
                    $xml.=  "<pubDate>".$DateZam."</pubDate>";
//		if($v[author])
                    $xml.=  "<author>".$site_url."</author>";
//		if($v[category])
                    $xml.=  "<category>Новости</category>";
		$xml.=  "<guid>news".$v[id]."</guid>";
	$xml.= "</item>";
}

echo $xml."</channel>
</rss>";
?>