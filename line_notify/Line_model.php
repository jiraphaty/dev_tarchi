<?php

#######################################
#	 Script by Jiraphat Yuenying	  #
#######################################

Class Line_Notify{
	private $token;
	private $message;
	private $response;
	private $stickerPackageId;
	private $stickerId;
	private $img;
	private $api = "https://notify-api.line.me/api/notify";
	
	public function __construct(){
		$this->message 			= NULL;
		$this->response 		= NULL;
		$this->token 			= NULL;
		$this->stickerPackageId	= NULL;
		$this->stickerId		= NULL;
		$this->img				= NULL;
	}
	
	public function setToken($token){
		$this->token = $token;
	}
	
	public function setError($response){
		$this->response = array(
			"status" => $response['status'],
			"message" => $response['message']
		);
	}
	
	public function setMsg($msg){
		$this->message = "\n".$msg;
	}
	
	public function setSPId($spid){
		$this->stickerPackageId = $spid;
	}
	
	public function setSId($sid){
		$this->stickerId = $sid;
	}
	
	public function setImg($img){
		if($this->is_img($img)){
			$this->img = $img;
		}
	}
	
	public function addMsg($msg){
		$this->message .= "\n".$msg;
	}
	
	public function is_img($img){
		$headers = @get_headers($img, 1);
		if(isset($headers["Content-Type"])){
			if(strpos($headers['Content-Type'], 'image/') !== FALSE){
				return true;
			}
		}
	}
	
	public function getError(){
		return $this->response;
	}
	
	public function getData(){
		$data = array(
			"message" 			=> $this->message,
			"stickerPackageId"	=> $this->stickerPackageId,
			"stickerId"			=> $this->stickerId,
			"imageThumbnail" 	=> $this->img,
			"imageFullsize" 	=> $this->img
		);
		return $data;
	}
	
	public function getHeader(){
		$header = array(
			"Authorization: Bearer ".$this->token,
			"Cache-Control: no-cache",
			"Content-type: multipart/form-data"
		);
		return $header;
	}
	
	public function sendNotify(){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->api);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getData());
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeader());
		$response = curl_exec($curl);
		$error = curl_error($curl);
		if($error){
			$this->setError(array('status' => 700,'message' => $error));
			return false;
		}else{
			if(json_decode($response, true)['status']==200){
				return true;
			}else{
				$this->setError(json_decode($response, true));
				return false;
			}
		}
	}
}

?>