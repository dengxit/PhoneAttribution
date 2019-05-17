<?php

namespace app;
use libs\HttpRequest;
use libs\DbConfig;

class MobileQuery{
	const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm';
	const CACHE_KEY = 'PHONE:INFO';
	
	public static function queryPhone($phone){
//		var_dump($phone_prefix);
//		var_dump(self::verifyPhone($phone));
		if(self::verifyPhone($phone)){
			$phone_prefix = substr($phone,0,7);
			$db = DbConfig::getIntance();
			$sql = "SELECT * FROM phonerecord where mts =  $phone_prefix";
			$result = $db->query($sql);
			$num_rows = mysqli_num_rows($result);
			var_dump($num_rows);
			if($num_rows >0){
				echo "数据库";
			}else{
						$response = HttpRequest::request(self::TAOBAO_API,['tel' =>$phone]);
	//			$res = json_decode($response, true);
	//			var_dump($response);
				$data = self::fomatData($response);
				if($data){
	//				var_dump($data);
	//				$json = json_decode($data);
//					$db = DbConfig::getIntance();
					$res = $db->insert('phonerecord',$data);
					echo "API";
//					var_dump($data);
				}
			}
		}
	}
	
	
	public static function test(){
//		var_dump("test:this is MobileQuery's test");
	}
	
	//校验手机号码合法性
	public static function verifyPhone($phone = null){
		$ret = false;
		if($phone){
			if (preg_match('/^1[34578]{1}\d{9}$/', $phone)){
				$ret = true;
			}
		}
		return $ret;
	}
	
	//格式化请求回来的数据
	public static function fomatData($data = null){
		$ret = false;
		if($data){
			preg_match_all("/(\w+):'([^']+)/",$data,$res);
//			var_dump($res);
			$ret = array_combine($res[1],$res[2]);
		}
		return $ret;
	}
}