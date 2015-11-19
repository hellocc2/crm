<?php
namespace Module\Test;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		self::insert('E:\www\test.txt',115,'我是一些新内容,我将被写入文档里面.');
		exit;
		
		$tpl = \Lib\common\Template::getSmarty ();
        $lang=array('en-uk','de-ge','es-sp','fr-fr','it-it','ja-jp','pt-pt','ru-ru'); 
		$filepath = 'E:\www\ued_item\lang\en-uk\Lang.php';
		$filepath_wap='E:\www\ued_item\wap\lang\en-uk\Lang.php';
		$fileupload='E:\www\lang\en-uk\Lang.php';
		
		//主语言包
		$filenew=array();
		$file=fopen($filepath,'r') or die("Unable to open file!");
		while(!feof($file)) {			
			$filecont=fgets($file);
		//echo '<pre/>'; var_dump(strstr($filecont,'=>'));
			if(strstr($filecont,'=>')){
			 	$filecont=explode('=>',$filecont);
				$filenew[$filecont[0]]=$filecont[1];
				
			}
		}
		fclose($file);

		//要调整的语言包
		$filewap=array();
		$file_wap=fopen($filepath_wap,'r') or die("Unable to open file!");
		while(!feof($file_wap)) {			
			$filecont=fgets($file_wap);
		//echo '<pre/>'; var_dump(strstr($filecont,'=>'));
			if(strstr($filecont,'=>')){
			 	$filecont=explode('=>',$filecont);
				$filewap[$filecont[0]]=$filecont[1];
				
			}
		}
		fclose($file_wap);
		
		//取差集
		$result=array_diff_key($filenew, $filewap);
		echo '<pre/>';print_r($result);exit;
		$result=implode('\n',$result);
		$fileo = fopen($fileupload,"w+");
		//var_dump($fileo);
		fwrite($fileo,$result);	
		fclose($fileo);
		
		//写入要调整的语言包
		// if(!empty($result)){
			// $fileo = fopen($filepath_wap,"a+");
			// fseek($fileo,-8,SEEK_END);
			// foreach($result as $key=>$val){
				// fwrite($fileo,$key.'=>'.$val);	
			// }
			// fclose($fileo);
		// }
		//echo '<pre/>';print_r($result);
		echo 'success';
		exit;
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