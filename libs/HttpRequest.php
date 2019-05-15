<?php
 
namespace libs;

class HttpRequest{
	public static function request($url , $para, $method = 'GET'){
		$response = null;
		if($url){
			$method = strtoupper($method);
			if($method == 'POST'){
				
			}else{
				if(is_array($para) and count($para)){
					if(strrpos($url, '?')){
						$url = $url . '&' . http_build_query($para);
					}else{
						$url = $url . '?' . http_build_query($para);
					}
//					var_dump($url);
//					$response = file_get_contents($url);
					$response = iconv("GBK", "UTF-8//IGNORE", file_get_contents($url));
				}
			}
		}
//		var_dump($response);
		return $response;
	}
}