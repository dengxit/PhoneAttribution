<?php

namespace app;
use libs\HttpRequest;
use libs\DbConfig;

class MobileQuery{
	const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm';
	
	public static function queryPhone($phone){
		$ret = null;
		if(self::verifyPhone($phone)){
			$phone_prefix = substr($phone,0,7);
			$db = DbConfig::getIntance();
			$sql = "SELECT * FROM phonerecord where mts =  $phone_prefix";
			$result = $db->getAll($sql);
			$num_rows = count($result);
			if($num_rows >0){
				$ret = $result;
                $ret['msg'] = '这是数据库返回的数据';
			}else{
				$response = HttpRequest::request(self::TAOBAO_API,['tel' =>$phone]);
				$data = self::fomatData($response);
				if($data){
					$res = $db->insert('phonerecord',$data);
					$ret = $data;
                    $ret['msg'] = '这是API返回的数据';
				}
			}
		}
		return $ret;
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
			$ret = array_combine($res[1],$res[2]);
		}
		return $ret;
	}
}