<?php

namespace app;
use libs\HttpRequest;

class MobileQuery{
	const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm';
	
	public static function queryPhone($phone){
//		var_dump(self::verifyPhone($phone));
		if(self::verifyPhone($phone)){
			$response = HttpRequest::request(self::TAOBAO_API,['tel' =>$phone]);
//			$res = json_decode($response, true);
//			var_dump($response);
			if(self::fomatData($response)){
				var_dump(self::fomatData($response));
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