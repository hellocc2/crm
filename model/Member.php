<?php
namespace Model;
/**
 * 导航菜单
 */
class Member extends \Model\Base{
	private $db;
	const PAGENUM =20;

	public function __construct(){
		$this->db =\Lib\common\Db::get_db ();	
	}
	
	/**
	 * 会员注册
	 */ 
	public function memberReg($data){
		$output=false;
		if(!empty($data['member_email'])){
			$member_email=$data['member_email'];
			$password=$data['password'];
			$logintime=$data['logintime'];
			$member_ip=$data['member_ip'];
			$gmt_create=time();
			
			$sql = "INSERT INTO `crm_member`(`member_email`,`password`,`logintime`,`member_ip`,`gmt_create`)
			VALUES ('{$member_email}','{$password}','{$logintime}','{$member_ip}','{$gmt_create}')";
			//echo $sql;exit;
			$sth = $this->db->Prepare ( $sql );
			$res = $this->db->Execute ( $sth );
			if($res!==false){
				$output=true;
			}
		}		
		return $output;					
	}
	
	/**
	 * 会员登录
	 */ 
	public function memberLogin($data){
		$output=false;
		if(!empty($data['member_email'])){
			$member_email=$data['member_email'];
			$password=$data['password'];
			$logintime=$data['logintime'];
			$member_ip=$data['member_ip'];
			$gmt_create=time();
			
			$sql = "SELECT memberid FROM crm_member WHERE member_email='{$member_email}' AND password='{$password}'";
			$res = $this->db->GetOne( $sql );
			//var_dump($res);exit;
			if($res!==false){
				$output=true;
			}
		}		
		return $output;					
	}
	
	
	
}