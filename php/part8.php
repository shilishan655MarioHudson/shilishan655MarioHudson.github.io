<?php
require 'basicHeadersAdd.php';header("content-type:application/json;charset=utf-8");$a=file_get_contents('php://input');$b=json_decode($a,true);$c=$b['client_id'];$d=$b['verification_id'];$e=$b['verification_code'];$f=$b['device_id'];$g=$b['User_Agent'];$h="https://user.mypikpak.com/v1/auth/verification/verify";$i=http_build_query(array("client_id"=>$c));$j=array("client_id"=>$c,"verification_id"=>$d,"verification_code"=>$e);$k=array("X-Device-Id: $f","User-Agent: $g");$k=addHeaders1($k);$l=curl_init();curl_setopt($l,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($l,CURLOPT_SSL_VERIFYHOST,false);curl_setopt($l,CURLOPT_URL,$h.'?'.$i);curl_setopt($l,CURLOPT_HTTPHEADER,$k);curl_setopt($l,CURLOPT_POSTFIELDS,json_encode($j));curl_setopt($l,CURLOPT_RETURNTRANSFER,1);curl_setopt($l,CURLOPT_POST,1);$m=curl_exec($l);if($m===false){echo "cURL Error: ".curl_error($l);}else{echo $m;}curl_close($l);?>
