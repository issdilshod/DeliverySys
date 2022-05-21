<?php

namespace app\lib;

class IFunc{
	
    public function checkPostValues($post_array){
		$data=array();
		foreach ($post_array as $key => $value){
			if(isset($_POST[$key])){
				$el=trim($_POST[$key]);
				if($el!=''){
					$data[$key]=$el;
				}
			}
		}
		return $data;
	}

	public function copyPost($from, $post_array){
		foreach ($post_array as $key => $value){
			if(isset($from[$key])){
				$post_array[$key]=$from[$key];
			}
		}
		return $post_array;
	}

	public function sendReq($entity){
		$curl = curl_init($entity['base_url']);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($entity, '', '&'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result);
	}
}