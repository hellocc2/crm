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
		
		$sql = "SELECT c.memberid,c.school_comment AS comcont,m.nickname,m.member_pic	
				FROM crm_school_comment c LEFT JOIN crm_member m ON c.memberid=m.memberid
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