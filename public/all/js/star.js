	$(".inputstar").mouseover(function(){
		//我的评分
		var inputstar=$(this).parents('li').attr('id');
		var starval=$(this).nextAll('span').attr('id');
		var GradList = document.getElementById(inputstar).getElementsByTagName("input");	
		
		//移入展示
		clear(GradList);
		for(var Qi=0;Qi<this.name;Qi++){
			GradList[Qi].style.backgroundPosition = 'left center';
			
		}		
		
		star(GradList);
	})

	
	function star(GradList){
		for(var i=0;i < GradList.length;i++){
			 temp = 0;
			GradList[i].onclick = function(){
				temp = this.name;
				var starval=$(this).nextAll('span').attr('id');
				//评分
				$.ajax({ 
					cache:"false",
					url: root_url+"index.php?module=ajax&action=star",
					type: "get", 
					data:"memberid=234441&school_id=1&school_satisfy=2&school_score=3",
					success: function(data) {
						data = $.parseJSON( data );
						if(data.flag==1){
							document.getElementById(starval).innerHTML = '<b><font size="5" color="#fd7d28">'+temp+'</font></b>分(评分成功)';
							current(temp);
						}else{
							document.getElementById(starval).innerHTML = '<b><font size="5" color="#fd7d28">评分失败</font></b>';
						}
					}
				}); 
				//评分END
			}
			
			//移出star
			GradList[i].onmouseout = function(){
				for(var Qi=0;Qi<this.name;Qi++){
					GradList[Qi].style.backgroundPosition = 'right center';
				}
				var starval=$(this).nextAll('span').attr('id');
				var temp=document.getElementById(starval).getElementsByTagName("font")[0].innerHTML;
				current(temp);
			}
		}

		//显示当前第几颗星
		function current(temp){
			clear(GradList);
		   for(var Qii=0;Qii<temp;Qii++){
			 GradList[Qii].style.backgroundPosition = 'left center';
		   }
		}	
		
	}
	
	//清除所有
	function clear(GradList){
		for(var Qi=0;Qi<GradList.length;Qi++){
		  GradList[Qi].style.backgroundPosition = 'right center';
		}
	}

	 
	

   
	
	
	 