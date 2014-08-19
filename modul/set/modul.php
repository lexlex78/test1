<?php
$cash_mod='set';
$cash=cash_read ($cash_mod);
if (!$cash){
  
$set=$db->select("SELECT * FROM ".DB_PREFIX."set");
$set=$set[0];

cash_add ($cash_mod,120,  json_encode($set));
}
else $set=  json_decode ($cash);
unset($cash);