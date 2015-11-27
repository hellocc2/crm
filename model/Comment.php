<?php
namespace Model;
/**
 * 导航菜单
 */
class Comment extends \Model\Base{
	private $db;
	const PAGENUM =20;

	public function __construct(){
		$this->db =\Lib\common\Db::get_db ();	
	}
	
	/**
	 * 插入学校评论
	 */ 
	public function insertSchoolComment($data){
		$output=false;
		if(!empty($data['school_id'])){
			$school_id=$data['school_id'];
			$memberid=$data['memberid'];
			$school_comment=$data['school_comment'];

			$gmt_create=time();
			
			$sql = "INSERT INTO `crm_school_comment`(`area_id`,`school_id`,`memberid`,`school_comment`,`gmt_create`)
			VALUES ('2','{$school_id}','{$memberid}','{$school_comment}','{$gmt_create}')";
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
	 * 选择评论内容
	 */ 
	public function selectSchoolComment($data){
		$result='';
		
		$where[]="WHERE c.school_comment_state=1";
		if(!empty($data)){
			if(!empty($data['school_id'])){
				$where[]="c.school_id=".$data['school_id'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT c.memberid,s.school_name,c.school_comment AS comcont,m.nickname,m.member_pic	
				FROM crm_school_comment c 
				LEFT JOIN crm_member m ON c.memberid=m.memberid
				LEFT JOIN crm_school s ON s.school_id=c.school_id
				{$where}";
		//echo $sql;exit;
		$query	= $this->db->Execute($sql);
		
		$pageSize=12;
		$page=1;
		if(!empty($data['pageSize'])){
			$pageSize=$data['pageSize'];
		}
		if(!empty($data['page'])){
			$page=$data['page'];
		}		
		$last_num= $pageSize* ($page-1);
		$num	= $query->MaxRecordCount($query);
		
		if($last_num>=$num) $last_num=(ceil( $num / $pageSize )-1) * $pageSize;
		$rs= $this->db->SelectLimit($sql,$pageSize,$last_num);
		$row = array ();
		$result = array ();
		if ($rs->RecordCount ()) {
			$roles=array();
			while ( ! $rs->EOF ) {
				$row = $rs -> fields;
			    $result['school'][]=$row;
				$rs->MoveNext ();
			}
		}
		$result['totalCount']=$num;
			
        return $result;			
	}
	
	
	
	
}