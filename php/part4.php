<?php
require 'basicHeadersAdd.php';header("content-type:application/json;charset=utf-8");$b=file_get_contents('php://input');$d=json_decode($b,true);$e=$d['pid'];$g=$d['device_id'];$h=$d['trace_id'];$i=$d['f'];$j=$d['n'];$k=$d['p'];$l=$d['a'];$m=$d['c'];$o=$d['user_agent'];$q=$d['referer'];$r="https://user.mypikpak.com/pzzl/verify";$s=http_build_query(array("pid"=>$e,"deviceid"=>$g,"traceid"=>$h,"f"=>$i,"n"=>$j,"p"=>$k,"a"=>$l,"c"=>$m));$t=array("Host: user.mypikpak.com","accept: application/json, text/plain, */*","user-agent: $o","referer: $q");$t=addHeaders2($t);$u=curl_init();curl_setopt($u,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($u,CURLOPT_SSL_VERIFYHOST,false);curl_setopt($u,CURLOPT_URL,$r.'?'.$s);curl_setopt($u,CURLOPT_HTTPHEADER,$t);curl_setopt($u,CURLOPT_RETURNTRANSFER,1);$v=curl_exec($u);if($v===false){echo "cURL Error: ".curl_error($u);}else{echo $v;}curl_close($u);?>
