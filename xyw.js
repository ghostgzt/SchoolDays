http://202.112.118.66/iframeplay.html?Contentnumber=12&playurl=687474703A2F2F6D392E6E65746B75752E636F6D2F652F64682F6269616E74616977616E677A69797562757869616F6D616F2F2A2A2E6D6B76
http://202.112.118.66/mov/687474703A2F2F6D392E6E65746B75752E636F6D2F652F64682F6269616E74616977616E677A69797562757869616F6D616F2F2A2A2E6D6B76/url.xml
http://202.112.118.66/bar/list/41_1_adddate.xml
http://202.112.118.66/mov/687474703A2F2F6D382E6E65746B75752E636F6D2F662F7A792F6B7561696C656E616E7368656E6732303133303731322F312E6D6B76/film.xml

http://m9.netkuu.com/e/dh/biantaiwangziyubuxiaomao/**.mkv
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 TransITional//EN'><head>
<style type="text/css">
<!--
body {border: 0px;background-repeat: repeat-x;background-color: #000000;overflow: hidden;}

.gun{
	width:100px;
	background-color:#161616;
	float:left;
	overflow-y:scroll;
	margin:0;                   /*控制滚动条左右侧实线颜色*/
	overflow-x:hidden;                /*隐藏底部的横向滚动条*/
	scrollbar-arrow-color: #6f7376;   /*三角箭头的颜色*/
	scrollbar-face-color: #333333;       /*立体滚动条的颜色*/
	scrollbar-3dlight-color: #282828;    /*立体滚动条亮边的颜色*/
	scrollbar-highlight-color: #222;  /*滚动条空白部分的颜色*/
	scrollbar-shadow-color: #080808;     /*立体滚动条阴影的颜色*/
	scrollbar-darkshadow-color: #111; /*滚动条强阴影颜色*/
	scrollbar-track-color: #111111;      /*立体滚动条背景颜色*/
	scrollbar-base-color: #222222;    /*滚动条的基本颜色*/
}
.kongzhi{
	clear:both;
	height:25px;
	overflow:hidden;
}
.zhengbo{
	color:#ffffff;
	text-decoration:none;
	display:block;
	line-height:25px;
	padding-left:20px;
	background-image:url(images/01/jibg.jpg);
	background-repeat:no-repeat;
	font-size: 12px;
	text-align:left;
}
.meibo{
	color:#bbbbbb;
	text-decoration:none;
	display:block;
	line-height:25px;
	padding-left:10px;
	font-size: 12px;
	text-align:left;
}
.meibo1{
	color:#bbbbbb;
	text-decoration:none;
	display:block;
	line-height:25px;
	padding-left:10px;
	font-size: 12px;
	text-align:left;
	height: 25px;
	overflow: hidden;
}
.meibo1:hover{
	color:#FFFFFF;
	text-decoration:none;
	display:block;
	line-height:18px;
	padding-left:10px;
	font-size: 12px;
	text-align:left;
	height: 25px;
	overflow: visible;
	background-color: #003366;
	padding-top: 4px;
	padding-bottom: 4px;
}

-->
</style>



<script type="text/javascript">
//-------------------------------计时代码段-----------------------------------------
var stime;
var etime;
var sc;
function onload()
{
	stime=new Date().getTime();
	
}
function onunload()   
{   
	sc=Number((new Date().getTime()-stime)/1000).toFixed(2);
	if(sc>7200)
	{
		sc=7200;
	}
	else if(sc<=0)
	{
		sc=1;
	}
	//alert(stime);
	//stime=new Date().getTime();
	//document.all("ifr").src="http://bar.netkuu.com/movie2/sanpagelist/sanpagelist/coun.asp?sc="+sc+"&film="+15751;
	//alert(document.all("ifr").src);
}
</script>

<script type="text/JavaScript">
var url=location.href;
var atype="";
var btype="";
var urlarr=url.substr(url.indexOf("?")+1);
	  if(urlarr.indexOf("&")!=-1){
		  typearr=urlarr.split("&");
		  atype=typearr[0].split("=")[1];
		  btype=typearr[1].split("=")[1];
	  }else{
		  atype=urlarr.substr((urlarr.indexOf("=")+1));
	  }
var urlDoc=new ActiveXObject("Microsoft.XMLDOM");
urlDoc.async="false";
urlDoc.load("mov/"+btype+"/url.xml");
var urlitem=urlDoc.getElementsByTagName("root");
var urltext=urlitem[0].childNodes[1].text;
var moviename=urlitem[0].childNodes[0].text;

var aaa=3;

var lx="";
var zongji=0;
var dangqian=0;
var panduan=0;
var its=0;
document.title=moviename;

var cokie=new Array(); 
cokie[0] = "netkuujl1";
cokie[1] = "netkuujl2";
cokie[2] = "netkuujl3";
cokie[3] = "netkuujl4";
cokie[4] = "netkuujl5";
netkuustr1=moviename+"|"+(parseInt(atype)+1)

setcookie("netkuujl5",getCookie("netkuujl4"));
setcookie("netkuujl4",getCookie("netkuujl3"));
setcookie("netkuujl3",getCookie("netkuujl2"));
setcookie("netkuujl2",getCookie("netkuujl1"));




setcookie("netkuujl1",netkuustr1);

//alert("1"+getCookie("netkuujl1"));
//alert("2"+getCookie("netkuujl2"));
//alert("3"+getCookie("netkuujl3"));
//alert("4"+getCookie("netkuujl4"));
//alert("5"+getCookie("netkuujl5"));

function getCookie(names){

 var str=document.cookie.split("; ");
 //alert(document.cookie);     
 for(var i=0;i<str.length;i++){
 var str2=str[i].split("=");
  if(str2[0]==names){
  return unescape(str2[1]);
  break;
  }
 }
}


function setcookie(name,value){
    var Days = 30;
    var date = new Date();   
    date.setTime(date.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + date.toGMTString();
}
</script>








<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script> 
document.documentElement?document.documentElement.style.overflow="hidden":document.body.style.overflow="hidden" 
</script> 

</head>

<body leftmargin="0" topmargin="0" scroll="no" style= "height:100%;width:120px;margin:0px;" oncontextmenu=self.event.returnValue=false>	
	
	<input name="benurl" id="benurl" type="hidden" value="" />
	<input name="xiaurl" id="xiaurl" type="hidden" value="" />
	<input name="mtype" id="mtype" type="hidden" value="" />
	<input name="names" id="names" type="hidden" value="" />
			  <div class="gun" id="gun">
					
			  </div>
			
</body>
<script type="text/javascript">

var gun=document.getElementById("gun");

var mydiv_resize=function(){	
	var scrollX=0,scrollY=0,width=0,height=0,contentWidth=0,contentHeight=0;

	if(typeof(window.innerWidth)=='number')
	{width=window.innerWidth;
	height=window.innerHeight;
	}
	else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight))
	{
	width=document.documentElement.clientWidth;
	height=document.documentElement.clientHeight;
	}
	else if(document.body&&(document.body.clientWidth||document.body.clientHeight))
	{width=document.body.clientWidth;
	height=document.body.clientHeight;
	}
	if(document.documentElement&&(document.documentElement.scrollHeight||document.documentElement.offsetHeight)){
	if(document.documentElement.scrollHeight>document.documentElement.offsetHeight){
	contentWidth=document.documentElement.scrollWidth;
	contentHeight=document.documentElement.scrollHeight;
	}
	else
	{contentWidth=document.documentElement.offsetWidth;
	contentHeight=document.documentElement.offsetHeight;
	
	}}
	else if(document.body&&(document.body.scrollHeight||document.body.offsetHeight))
	{if(document.body.scrollHeight>document.body.offsetHeight)
	{contentWidth=document.body.scrollWidth;
	contentHeight=document.body.scrollHeight;
	}else{
	contentWidth=document.body.offsetWidth;
	contentHeight=document.body.offsetHeight;
	}
	}else
	{contentWidth=width;
	 contentHeight=height;
	}
	if(height>contentHeight)
	height=contentHeight;
	if(width>contentWidth)
	width=contentWidth;
	var rect=new Object();
	
	rect.Width=width;
	rect.Height=height;
	rect.ContentWidth=contentWidth;
	rect.ContentHeight=contentHeight;

	gun.style.height=rect.Height;
}
mydiv_resize();
window.onresize=mydiv_resize;
</script>
</html>



<script language="javascript">
//setInterval("shijian()",1000);
var zongyistr="强心脏,天天向上,美国摔角wwesmackdown,康熙来了,美国摔角wwesuperstars,非诚勿扰,我们约会吧,快乐大本营,我爱记歌词,美国摔角tnaimpact,美国摔角wweraw,美国摔角wwenxt,国光帮帮忙,王牌大贱谍,本山快乐营,kbs音乐银行,爱的大作战,Power星期天,百万大歌星,SBS.人气歌谣,SBS人气歌谣,情书,新X Man,军情观察室";
var zyzimu = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X"
var zyshu=zongyistr.split(",");
var zyzm=zyzimu.split(",");

var xmlDoc1=new ActiveXObject("Microsoft.XMLDOM");
xmlDoc1.async="false";
var leixing="";
if(xmlDoc1.load("mov/"+btype+"/film.xml")!=false){
	var mitem1=xmlDoc1.getElementsByTagName("film");
	leixing=mitem1[0].childNodes[4].text;
	lx=mitem1[0].childNodes[4].text;
		//document.all("ifr1").src="http://bd.cafestv.net/tongji.asp?names="+mitem1[0].childNodes[0].text.UrlEncode()+"&lx="+mitem1[0].childNodes[4].text.UrlEncode()+"&adddate="+mitem1[0].childNodes[9].text;
}
//判断url是否包含##
var tempstr="";
for(i=0;i<btype.length-1;i++){
tempstr = tempstr+"%"+btype.substr(i,2);
i=i+1;
}
var strss=UrlDecode(tempstr);

playurl=urltext.split(',');

var x=parseInt(atype)+1;

var ben="687474703A2F2F"+playurl[atype].split("687474703A2F2F")[1];
var xia="";

var benurl="",xiaurl="";
var xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
 xmlDoc.async="false";
 xmlDoc.load("bar/barmovlist.xml");
 
var mib=xmlDoc.selectNodes("root/m[a='"+ben+"']");

if(mib.length>0){
benurl=mib[0].childNodes[1].text;
}

if(x>playurl.length){
}else{
xia="687474703A2F2F"+playurl[x].split("687474703A2F2F")[1];
	if(xia!=""){
		var mix=xmlDoc.selectNodes("root/m[a='"+xia+"']");
		
		if(mix.length>0){
			xiaurl=mix[0].childNodes[1].text;
		}
	}
}

var urlst="",urlb="",urlx="";

urlst=url.substring(0,url.indexOf("/i"));

urlb=urlst+"/kuu"+benurl.replace(":\\kuu","");

if(xiaurl!=""){

urlx=urlst+"/iframeplay.html?Contentnumber="+x+"&playurl="+btype;

}
//alert(urlx);
document.getElementById("names").value=moviename;
document.getElementById("benurl").value=urlb;
document.getElementById("xiaurl").value=urlx;

if(playurl.length>2){
	document.getElementById("mtype").value="1";
}else{
	document.getElementById("mtype").value="0";
}

zongji=playurl.length-1;
var guntext="";

function jishu(){

	for ( var i=0;i<playurl.length;i++)
	{ 
	  if (playurl[i].length>1)
	  { 
	    if (playurl[i].indexOf("7A706C61792E636166657374762E6E6574")>0)
		{
			if(playurl[i].indexOf(playurl[atype])>=0){
				dangqian=i;
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"zhengbo\">第"+(i+1)+"集</a>";
	
				
			}else{
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"meibo\">第"+(i+1)+"集</a>";
		
				
			}
		}
		else
		{
			if(playurl[i].indexOf(playurl[atype])>=0){
				dangqian=i;
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"zhengbo\">第"+(i+1)+"集</a>";

			}else{
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"meibo\">第"+(i+1)+"集</a>";
		
			}
		}
	  }
	}
	return guntext;	
}
if(strss.indexOf("##")>=0){
jishu1();
}else{
jishu();
}
document.getElementById("gun").innerHTML=guntext;

//document.location=location.href+"#"+document.getElementById("benurl").value+"|||"+document.getElementById("xiaurl").value+"|||"+document.getElementById("mtype").value+"|||"+moviename;
//document.location="#"+(its);
if(leixing=="综艺"){
var guntext1="";
zongji=zyshu.length;
	var zyDoc=new ActiveXObject("Microsoft.XMLDOM");
	zyDoc.async="false";
	zyDoc.load("bar/list/41_1_adddate.xml");
	for(i=0;i<zyshu.length;i++){
	
		if(moviename.indexOf(zyshu[i])>=0){
			var zyitem=zyDoc.getElementsByTagName(zyzm[i]);		
			if(zyitem.length>0){
				for(p=0;p<zyitem.length;p++){
					if(zyitem[p].childNodes[1].text.indexOf(playurl[atype])>=0){
						dangqian=p;
						guntext1=guntext1+"<a name=\""+(p+1)+"\" id=\""+(p+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber=0&playurl="+zyitem[p].childNodes[1].text+"\" id=\"bs"+p+"\" class=\"zhengbo\">"+zyitem[p].childNodes[0].text+"</a>";
						if(p+1>=zyitem.length){
							document.getElementById("xiaurl").value="";
							
						}else{
							document.getElementById("xiaurl").value=urlst+"/iframeplay.html?Contentnumber=0&playurl="+zyitem[p+1].childNodes[1].text;
						}
						document.getElementById("mtype").value="1";
						//alert(zyitem[p+1].childNodes[0].text);

					}else{
						guntext1+="<a name=\""+(p+1)+"' id='"+(p+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber=0&playurl="+zyitem[p].childNodes[1].text+"\" id=\"bs"+p+"\" class=\"meibo1\">"+zyitem[p].childNodes[0].text+"</a>";
					}
				}
			}
		}
	}
	if(guntext1.length>3){
	document.getElementById("gun").innerHTML=guntext1;
//document.location=location.href+"#"+document.getElementById("benurl").value+"|||"+document.getElementById("xiaurl").value+"|||"+document.getElementById("mtype").value+"|||"+moviename;
	//document.location="#"+(its);
	}
}	

window.location.hash=parseInt(atype)+1;
function jishu1(){
	var qi=parseInt(strss.substr(strss.indexOf("##")+2));
	for ( var i=0;i<playurl.length;i++)
	{ 
	  if (playurl[i].length>1)
	  { 
	    if (playurl[i].indexOf("7A706C61792E636166657374762E6E6574")>0)
		{
			if(playurl[i].indexOf(playurl[atype])>=0){
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"zhengbo\">第"+(qi+i)+"集</a>";

				
			}else{
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"meibo\">第"+(qi+i)+"集</a>";

				
			}
		}
		else
		{
			if(playurl[i].indexOf(playurl[atype])>=0){
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"zhengbo\">第"+(qi+i)+"集</a>";

			}else{
				guntext=guntext+"<a name=\""+(i+1)+"\" id=\""+(i+1)+"\"></a><a href=\""+urlst+"/iframeplay.html?Contentnumber="+i+"&playurl="+btype+"\" id=\"bs"+i+"\" class=\"meibo\">第"+(qi+i)+"集</a>";

			}
		}
	  }
	}
	return guntext;	
}


//     转换字符
function UrlDecode(str){
     var i,temp;
     var result="";
     for(i=0;i<str.length;i++){
           if(str.charAt(i)=="%"){
                 if(str.charAt(++i)=="u"){
                       temp=str.charAt(i++) + str.charAt(i++) + str.charAt(i++) + str.charAt(i++) + str.charAt(i);
                       result += unescape("%" + temp);
                 }else{
                       temp = str.charAt(i++) + str.charAt(i);
                       if(eval("0x"+temp)<=160){
                             result += unescape("%" + temp);
                       }else{
                             temp += str.charAt(++i) + str.charAt(++i) + str.charAt(++i);
                             result += Decode_unit("%" + temp);
                       }
                 }
           }else{
                 result += str.charAt(i);
           }
     }
     return result;
}

function Decode_unit(str){
     var p,q = "";
     if(str.GetCount("%")!=2)return str;
     p=eval("0x" + str.split("%")[1]);
     q=eval("0x" + str.split("%")[2]);
     if(p<160 || q<160)return unescape(str);
     str=str.replace(/%/g,"");
     execScript("temp=&H"+str, "vbscript");
     execScript("result=chr("+temp+")", "vbscript");
     return result;
}


//function shijian(){
//alert(document.getElementById("player").GetPlayState);//
//}
</script>
