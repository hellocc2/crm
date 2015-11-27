<?php
namespace Module\Test;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
        $tpl->display ('test.html');
        

	}
	
	public function insert($file,$line,$txt){
		
		 if(!$fileContent = @file($file)) exit('文件不存在');
		$lines       = count($fileContent);
		if($line >= $lines) $line = $lines;
		$fileContent[$line].='\r\n'.$txt;
		$newContent = '';
		foreach($fileContent as $v){
			$newContent.= $v;
		}
		if(!file_put_contents($file,$newContent)) exit('无法写入数据');
		echo '已经将' . $txt . '写入文档' . $file;
		
	}
	
	
}