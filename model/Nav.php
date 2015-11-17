<?php
namespace Model;
/**
 * 导航菜单
 */
class Nav extends \Model\Base{
	private $db;
	const PAGENUM =20;

	public function __construct(){
		$this->db =\Lib\common\Db::get_db ();	
	}
	
	/**
	 * 获取导航
	 */  
	public function selectNav($data) {
    	$result='';
		
		$where[]="WHERE n.nav_status=1";
		if(!empty($data)){
			if(!empty($data['nav_status'])){
				$where[]="n.nav_status=".$data['nav_status'];
			}
		}
		
		$where=implode(' AND ', $where);
		
		$sql = "SELECT   n.nav_name,n.nav_cateid	
				FROM crm_nav n  
				{$where} ORDER BY n.orderid";
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
	            $result['nav'][]=$row;
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