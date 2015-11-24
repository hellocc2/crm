<?php
namespace Model;
/**
 * 导航菜单
 */
class School extends \Model\Base{
	private $db;
	const PAGENUM =20;

	public function __construct(){
		$this->db =\Lib\common\Db::get_db ();	
	}
	
	/**
	 * 插入学校投票分数
	 */ 
	public function insertSchoolScore($data){
		$output=false;
		if(!empty($data['school_id'])){
			$school_id=$data['school_id'];
			$memberid=$data['memberid'];
			$school_satisfy=$data['school_satisfy'];
			$school_score=$data['school_score'];
			$gmt_create=time();
			
			$sql = "INSERT INTO `crm_school_vote`(`area_id`,`school_id`,`school_satisfy`,`school_score`,`memberid`,`gmt_create`)
			VALUES ('2','{$school_id}','{$school_satisfy}','{$school_score}','{$memberid}','{$gmt_create}')";
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
	 * 获取学校评论信息
	 */  
	public function selectSchoolComment($data) {
    	$result='';
		
		$where[]="WHERE c.school_comment_state=1";
		if(!empty($data)){
			if(!empty($data['school_id'])){
				$where[]="c.school_id=".$data['school_id'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT COUNT(c.id) AS comnum	
				FROM crm_school_comment c
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
	
	
	
	/**
	 * 获取学校各选项分
	 */  
	public function selectSchoolOption($data) {
    	$result='';
		
		$where[]="WHERE v.school_vote_state=1";
		if(!empty($data)){
			if(!empty($data['school_id'])){
				$where[]="s.school_id=".$data['school_id'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT c.satisfy_id,c.satisfy_name,s.school_name,v.school_satisfy,AVG(v.school_score)*10 AS score,COUNT(v.memberid) AS membernum 	
				FROM crm_school_vote v  
				LEFT JOIN crm_satisfy c ON v.school_satisfy=c.satisfy_id 
				LEFT JOIN crm_school s ON s.school_id=v.school_id 
				{$where} GROUP BY v.school_satisfy ORDER BY v.school_satisfy";
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
				$result['satisfy_id'][]=$row['satisfy_id'];
				$rs->MoveNext ();
			}
		}
		$result['totalCount']=$num;
			
        return $result;
    }
	
	/**
	 * 获取学校打分列表
	 */  
	public function selectSchool($data) {
    	$result='';
		
		$where[]="WHERE s.school_state=1";
		if(!empty($data)){
			if(!empty($data['school_option'])){
				$where[]="s.school_option=".$data['school_option'];
			}
			if(!empty($data['school_id'])){
				$where[]="s.school_id=".$data['school_id'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT   s.*,AVG(s.school_score)*10 AS score,COUNT(s.memberid) AS membernum	
				FROM crm_school_vote s  
				{$where} GROUP BY s.school_id ORDER BY s.school_score";
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
	
	/**
	 * 获取满意度选项
	 */  
	public function selectOption($data) {
    	$result='';
		
		$where[]="WHERE s.satisfy_state=1";
		if(!empty($data)){
			if(!empty($data['satisfy_cat'])){
				$where[]="s.satisfy_cat=".$data['satisfy_cat'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT   s.*	
				FROM crm_satisfy s  
				{$where} ORDER BY s.orderid";
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
	            $result['option'][]=$row;
				$rs->MoveNext ();
			}
		}
		$result['totalCount']=$num;
			
        return $result;
    }
	
	
}