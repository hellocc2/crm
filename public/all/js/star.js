//已经存在的评分
var GradList2 = document.getElementById("star2").getElementsByTagName("input");
   for(var di=0;di<parseInt(document.getElementById("starValue2").getElementsByTagName("font")[0].innerHTML);di++){GradList2[di].style.backgroundPosition = 'left center';}
   
//我的评分   
var GradList = document.getElementById("star").getElementsByTagName("input");
  var temp = 0;
   for(var i=0;i < GradList.length;i++){
		GradList[i].onmouseover = function(){
			for(var Qi=0;Qi<this.name;Qi++){
				//clear();
				GradList[Qi].style.backgroundPosition = 'left center';
			}
		}
		  
		GradList[i].onmouseout = function(){
			for(var Qi=0;Qi<this.name;Qi++){
				GradList[Qi].style.backgroundPosition = 'right center';
			}
			current(temp);
		}
	 
		GradList[i].onclick = function(){
			temp = this.name;
			document.getElementById("starValue").innerHTML = '<b><font size="5" color="#fd7d28">'+this.name+'</font></b>分';
			current(temp);
		}
	}	
	
	  //清除所有
    function clear(){
        for(var Qi=0;Qi<GradList.length;Qi++){
		  GradList[Qi].style.backgroundPosition = 'right center';
		}
    }
	
    //显示当前第几颗星
    function current(temp){
       for(var Qii=0;Qii<temp;Qii++){
		 GradList[Qii].style.backgroundPosition = 'left center';
       }
    }