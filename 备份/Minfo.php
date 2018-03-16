

<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%option explicit%>
<!--#include file="../Conn.php"-->
<!--#include file="../Include/GppCMS.MemberCls.php"-->
<!--#include file="../Include/GppCMS.Label.CommonCls.php"-->
<!--#include file="../Plus/md5.php"-->
<!--#include file="../API/cls_api.php"-->
<!--#include file="../api/uc_client/client.php"-->
<%
'******************************************************************
' Software name:GppCMS V1.2.0.170605
' Email: service@GppCMS.com . 
' Web: http://www.GppCMS.com 
' Copyright (C) GppCMS All Rights Reserved.
'******************************************************************
LeftMenuS="2"
LeftMenuxS="2"
EqxID="1,24,25,26,28,29,31,32,34,35,36"
Dim ID:ID=request("ID")
Dim CGID:CGID=request("CGID")
Dim KSCls,rs,Name,Sj,Sd,Px,Sm,S
Dim UserNameAdd  '新用户用户名取数
Dim GetEditSlG:GetEditSlG=GetEditSl("ZL_Config","And 2=2","UserJs","1")
	UserNameAdd=GetNameZ("ZL_Config","And 2=2","UserJs")
Dim GroupIDSz,GroupIDSzi
Set KSCls = New User_EditInfo
KSCls.GppCMS()
Set KSCls = Nothing

Class User_EditInfo
        Private KS,KSUser
		Private Sub Class_Initialize()
		  Set KS=New PublicCls
		  Set KSUser = New UserCls
		End Sub
        Private Sub Class_Terminate()
		 Session(KS.SiteSN&"UserInfo")=empty
		 Set KS=Nothing
		 Set KSUser=Nothing
		End Sub
		%>
		<!--#include file="../Include/UserFunction.php"-->
	  <%
       Public Sub loadMain()
		IF Cbool(KSUser.UserLoginChecked)=false Then
		  Response.Write "<script>top.location.href='/Member/Login.php';</script>"
		  Exit Sub
		End If
		'用户添加新用户的类型ID数组%><!--#include file="../zlinc/AddUserQx.php"-->
			<%
		'用户添加新用户的类型ID数组值
			GroupIDSz=Split(AddUserQx,",")
	Select Case KS.S("Action")
	  Case "EditSave"
	   Call CkSjQx()
	   Call EditSave()
	  Case "EditRZSave"
	   Call CkSjQx()
	   Call EditRZSave()
	  Case "Add"
	   Call CkSjQx()
	   Call Add()
	  Case "Del"
	   Call CkSjQx()
	   Call Del()
	  Case "Sdsf"
	   Call CkSjQx()
	   Call Sdsf()
	  Case Else
	   Call CkSjQx()
	   Call Main()
	End Select
End Sub

'删除
Sub Del()

End Sub

'添加
Sub Add()
	'数据猎取
		'基础数据
			P1=request("P1")
			P2=request("P2")
			P3=request("P3")
			P4=request("P4")
			P5=request("P5")
			P6=MD5(request("P6"),16)
			P7=request("P7")
			P8=request("P8")
			P9=request("P9")
			P10=request("P10")
			P11=request("P11")
			P12=request("P12")
			P13=request("P13")
			P14=request("P14")
			P15=request("P15")
			P16=request("P16")
			P17=request("P17")
			P18=request("P18")
			P19=request("P19")
			P20=request("P20")
			P21=request("P21")
			P22=request("P22")
			P23=request("P23")
			P24=request("P24")
			P25=request("P25")
			P26=request("P26")
			P27=request("P27")
			P28=request("P28")
			P29=request("P29")
			P30=request("P30")
			P31=request("P31")
			P32=request("P32")
			P33=request("P33")
			P34=request("P34")
			P35=request("P35")
			P36=request("P36")
			P37=request("P37")
			P38=request("P38")
			P39=request("P39")
			P40=request("P40")
			P41=request("P41")
			P42=request("P42")
			P43=request("P43")
			P44=request("P44")
			P45=request("P45")
			P46=request("P46")
			P58=request("Province")
			P59=request("City")
			P60=request("County")
		'管理员数据判断
			If U5>35 Or U5<23 Then
			P47=ZlTempK  '上级联系人姓名@
			P51=0  '上级ID@
			P52=ZlTempK  '上级用户名@
			P53=ZlTempK  '上级手机@
			P55=0  '上级用户组ID@
			Else
			P47=U3  '上级联系人姓名@
			P51=U1  '上级ID@
			P52=U2  '上级用户名@
			P53=U4  '上级手机@
			P55=U5  '上级用户组ID@
			End If
				
		'P48=U48  '中介数组#
		'P49=U49  '代理数组#
		'P50=request("P50")  '所属一级代理ID#
		'P54=U5  '上级企业名称#
		'P56=U19  '所属拓展员  只有直接发展的代理商等，拓展员体系才有#
		'P57=U20  '所属区域拓展员#
		ZlTemp=GetNameZ("ZL_User","And UserID="&U1&"","ZL_ZjSz,ZL_DlSz,ZL_ZsdlID,ZL_Gsm ,ZL_Expand,ZL_QyExpand")
		ZlTemp=Split(ZlTemp,"^%%^")
		'所属中介
			If U5=28 Or U5=29 Then
				P48=U1
			Else
				P48=ZlTemp(4)
			End If
		'中介数组
			If U5>22 And U5<36 Then
				If U5=28 Then
					P48=ZlTemp(0)&","&U1
				Else
					P48=ZlTemp(0)
				End If
			Else
				P48="0"
			End If
		'代理数组
			If U5=31 Or U5=32 Or U5=24 Or U5=25 Then
				P49=ZlTemp(1)&","&U1
			Else
				P49="0"
			End If
		'所属一级代理
			P50="0"
			If U5=31 Or U5=32 Then
				P50=U1
			End If
			If U5=24 Or U5=25 Then
				P50=ZlTemp(2)
			End If
		'上级企业名称
			P54=ZlTemp(3)
		'所属区域中介ID
			If U5=29 Then
				P49=U1
			Else
				P49=ZlTemp(5)
			End If
		'确定用户名
			If P1="22" Then
				UserNameAdd="K1"&UserNameAdd
			End If
			If P1="24" Then
				UserNameAdd="D1"&UserNameAdd
			End If
			If P1="25" Then
				UserNameAdd="D2"&UserNameAdd
			End If
			If P1="26" Then
				UserNameAdd="D3"&UserNameAdd
			End If
			If P1="28" Then
				UserNameAdd="T1"&UserNameAdd
			End If
			If P1="29" Then
				UserNameAdd="T2"&UserNameAdd
			End If
			If P1="30" Then
				UserNameAdd="F1"&UserNameAdd
			End If
			If P1="31" Then
				UserNameAdd="F2"&UserNameAdd
			End If
			If P1="34" Then
				UserNameAdd="Y1"&UserNameAdd
			End If
			If P1="35" Then
				UserNameAdd="Y2"&UserNameAdd
			End If
			If P51="" Then
				P51=20
			End If
			If P55="" Then
				P55=0
			End If
			If P56="" Then
				P56=0
			End If
			If P57="" Then
				P57=0
			End If
				
		
	'数据检查Response.End() 
		If P58="" Then
			response.Write("<script language=javascript>")
			response.Write("if(!confirm('请选择业务地区')){history.back();}")
			response.Write("</script>")
			response.Write("<script language=javascript>history.go(-1);</script>")
		End If
	'写入数据
	 	conn.execute("Insert into ZL_User(UserName,PassWord,RealName,Mobile,UC,ZL_Ywsl,AllianceUser,ZL_SjMobile,ZL_Sjqymc,ZL_SjYhz,ZL_Expand,ZL_QyExpand,province,city,County,GroupID,ZL_Sfgs,Locked,RegDate,ZL_SjMane,ZL_ZjSz,ZL_DlSz,ZL_ZsdlID,QQ,Address)values('"&UserNameAdd&"','"&P6&"','"&P3&"','"&P4&"','"&P5&"',"&P51&",'"&P52&"','"&P53&"','"&P54&"',"&P55&","&P56&","&P57&",'"&P58&"','"&P59&"','"&P60&"',"&P1&","&P2&",4,'"&Now&"','"&P47&"','"&P48&"','"&P49&"',"&P50&",'"&ZlTempK&"','"&ZlTempK&"')")
	 	'猎取新登记的用户ID
	 		ZlTemp=GetNameZ("ZL_User","And UserName='"&UserNameAdd&"'","UserID")



		 	'如果是一级代理要重新写一级代理ID字段，即新登记的用户ID号；如果是区域拓展商，必须要重新写区域拓展商ID号，即新登记的用户ID号。
		 		If P1=31 Or P1=32 THen
		 			conn.execute("update ZL_User set ZL_ZsdlID=" & ZlTemp & " where UserID="&ZlTemp&"")
		 		End If
		 		If P1=29 THen
		 			conn.execute("update ZL_User set ZL_QyExpand=" & ZlTemp & " where UserID="&ZlTemp&"")
		 		End If%>
					<script language="javascript">
					  alert("登记新用户成功!");
					  document.location.href="User.php?CGID=<%=P1%>";
					</script>
				<%
			'Response.Redirect "Minfo.php"
End Sub

'修改
Sub EditSave()
	'重新数据验证‘修改
		
	conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"' where UserID="&U1&"")
  Response.Redirect "minfo.php"

End Sub

'认证
Sub EditRZSave()


ZlTemp=GetNameZ("ZL_User","And UserID="&U1&"","GroupID,ZL_Sfgs,UserName,Mobile,UC,QQ,Email,IDCard,Sign,Province,City,County,Address,ZL_PassdG,ZL_Gsm,OfficeTel,Fax,ZL_Gsdz,ZL_Ywsl,AllianceUser,ZL_SjMane,ZL_SjMobile,ZL_Sjqymc,ZL_SjYhz,ZL_ZsdlID,ZL_Userzj,ZL_Expand,ZL_QyExpand,ZL_ZjSz,ZL_DlSz,ZL_KcywTime,Locked,RealName,ZL_provinceYwID,ZL_cityYwID,ZL_CountyYwID")
ZlTemp=Split(ZlTemp,"^%%^")

If ZlTemp(1)=0 Then 
	If trim(Request("P7"))<>"" And trim(Request("Province"))<>"" And trim(Request("City"))<>"" And trim(Request("County"))<>"" And trim(Request("P12"))<>""Then
				If trim(Request("P8"))<>""Then
							conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',IDCard='"&trim(Request("P7"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',Sign='"&trim(Request("P8"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"',ZL_provinceID="&trim(Request("Province"))&",ZL_cityID="&trim(Request("City"))&",ZL_CountyID="&trim(Request("County"))&",Province='"&GetNameZ("ZL_Province","And ID="&Trim(Request("Province"))&"","City")&"',City='"&GetNameZ("ZL_Province","And ID="&Trim(Request("City"))&"","City")&"',County='"&GetNameZ("ZL_Province","And ID="&Trim(Request("County"))&"","City")&"',Locked=409  where UserID="&U1&"")
							Response.Redirect "minfo.php"	
				End If
				If trim(Request("P8"))=""Then
							conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',IDCard='"&trim(Request("P7"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',Sign='"&trim(Request("P8"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"',ZL_provinceID="&trim(Request("Province"))&",ZL_cityID="&trim(Request("City"))&",ZL_CountyID="&trim(Request("County"))&",Province='"&GetNameZ("ZL_Province","And ID="&Trim(Request("Province"))&"","City")&"',City='"&GetNameZ("ZL_Province","And ID="&Trim(Request("City"))&"","City")&"',County='"&GetNameZ("ZL_Province","And ID="&Trim(Request("County"))&"","City")&"',Locked=408  where UserID="&U1&"")
							Response.Redirect "minfo.php"	
				End If
	End If
End If

If ZlTemp(1)<>0 Then 
	If trim(Request("P7"))<>"" And trim(Request("Province"))<>"" And trim(Request("City"))<>"" And trim(Request("County"))<>"" And trim(Request("P14"))<>"" And trim(Request("P17"))<>""Then
				If  trim(Request("P8"))<>""Then
							conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',IDCard='"&trim(Request("P7"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',Sign='"&trim(Request("P8"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"',ZL_provinceID="&trim(Request("Province"))&",ZL_cityID="&trim(Request("City"))&",ZL_CountyID="&trim(Request("County"))&",Province='"&GetNameZ("ZL_Province","And ID="&Trim(Request("Province"))&"","City")&"',City='"&GetNameZ("ZL_Province","And ID="&Trim(Request("City"))&"","City")&"',County='"&GetNameZ("ZL_Province","And ID="&Trim(Request("County"))&"","City")&"',Locked=409  where UserID="&U1&"")
							Response.Redirect "minfo.php"	
				End If
				If trim(Request("P8"))=""Then
							conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',IDCard='"&trim(Request("P7"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',Sign='"&trim(Request("P8"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"',ZL_provinceID="&trim(Request("Province"))&",ZL_cityID="&trim(Request("City"))&",ZL_CountyID="&trim(Request("County"))&",Province='"&GetNameZ("ZL_Province","And ID="&Trim(Request("Province"))&"","City")&"',City='"&GetNameZ("ZL_Province","And ID="&Trim(Request("City"))&"","City")&"',County='"&GetNameZ("ZL_Province","And ID="&Trim(Request("County"))&"","City")&"',Locked=408  where UserID="&U1&"")
							Response.Redirect "minfo.php"	
				End If
	End If

End If


'conn.execute("update ZL_User set QQ='"&trim(Request("P5"))&"',Email='"&trim(Request("P6"))&"',IDCard='"&trim(Request("P7"))&"',ZL_Gsm='"&trim(Request("P14"))&"',OfficeTel='"&trim(Request("P15"))&"',Fax='"&trim(Request("P16"))&"',Sign='"&trim(Request("P8"))&"',ZL_Gsdz='"&trim(Request("P17"))&"',Address='"&trim(Request("P12"))&"',ZL_provinceID="&trim(Request("Province"))&",ZL_cityID="&trim(Request("City"))&",ZL_CountyID="&trim(Request("County"))&",Province='"&GetNameZ("ZL_Province","And ID="&Trim(Request("Province"))&"","City")&"',City='"&GetNameZ("ZL_Province","And ID="&Trim(Request("City"))&"","City")&"',County='"&GetNameZ("ZL_Province","And ID="&Trim(Request("County"))&"","City")&"'  where UserID="&U1&"")
'Response.Redirect "minfo.php"


End Sub

'锁
Sub Sdsf()
End Sub

'基本信息
Sub Main()
	'ZlTemp=GetNameZ("ZL_User","And UserID="&U1&"","City")
	%>     
	<script language="JavaScript">
		function CheckForm()
		{
		 
		}
	</script>
		<div id="pageindex">
			  <%If request("Action")="" Then%>我的资料<%End If%>
			  <%If request("Action")="Edit" Then%>修改资料<%End If%>
			  <%If request("Action")="EditRZ" Then%>认证信息<%End If%>&nbsp; <font></font>
		</div>
		<div id="smallnav">
			<i></i><a href="index.php">Home</a> &gt; 帐户管理  &gt; 
			  <%If request("Action")="" Then%>我的资料<%End If%>
			  <%If request("Action")="Edit" Then%>修改资料<%End If%>
			  <%If request("Action")="EditRZ" Then%>认证信息<%End If%>
		</div>
		<ul id="pageoption">
			  <%If request("Action")="" Then%>
				<li class="onitem">我的资料</li>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<li class="onitem">修改资料</li>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<li class="onitem">认证信息</li>
			  <%End If%>
				<li><a href="Mpassword.php">修改登录密码</a></li>
			  <%If request("Action")="" Then%>
				<li><a href="?Action=Edit">修改资料</a></li>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<li><a href="?">浏览资料</a></li>
			  <%End If%>
		</ul>
	<div id="container">
	
	  <%If request("Action")="Edit" Then%>
		<form action="?Action=EditSave" method="post" name="myform" id="myform" onSubmit="return CheckForm();">
	  <%End If%>
	  <%If request("Action")="EditRZ" Then%>
		<form action="?Action=EditRZSave" method="post" name="myform" id="myform" onSubmit="return CheckForm();">
	  <%End If%>
		
	 <%
		ZlTemp=GetNameZ("ZL_User","And UserID="&U1&"","GroupID,ZL_Sfgs,UserName,Mobile,UC,QQ,Email,IDCard,Sign,Province,City,County,Address,ZL_PassdG,ZL_Gsm,OfficeTel,Fax,ZL_Gsdz,ZL_Ywsl,AllianceUser,ZL_SjMane,ZL_SjMobile,ZL_Sjqymc,ZL_SjYhz,ZL_ZsdlID,ZL_Userzj,ZL_Expand,ZL_QyExpand,ZL_ZjSz,ZL_DlSz,ZL_KcywTime,Locked,RealName,ZL_provinceYwID,ZL_cityYwID,ZL_CountyYwID")
		ZlTemp=Split(ZlTemp,"^%%^")
		 If ZlTemp(31)=4 And  request("Action")<>"EditRZ" Then
		 Response.Redirect "?Action=EditRZ"  
		 End If
		 
		 %>
		<div class="warng">
			<strong>&nbsp;&nbsp;基础信息</strong>
		</div>
		<div class="inputlump">
			<label class="inputtitle">编号：</label>
			<div class="inputcontent"><%=ZlTemp(2)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">用户身份：</label>
			<div class="inputcontent"><%=GetNameZ("ZL_UserGroup","And ID="&ZlTemp(0)&"","GroupName")%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">用户类型：</label>
			<div class="inputcontent"><%If ZlTemp(1)=0 Then%>个人<%Else%>企业<%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务地区：</label>
			<div class="inputcontent"><%If ZlTemp(33)=0 Then%>无区域限制<%Else%><%If ZlTemp(33)>0 Then%><%=GetNameZ("ZL_Province","And ID="&ZlTemp(33)&"","City")%>&nbsp;<%End If%><%If ZlTemp(34)>0 Then%><%=GetNameZ("ZL_Province","And ID="&ZlTemp(34)&"","City")%>&nbsp;<%End If%><%If ZlTemp(35)>0 Then%><%=GetNameZ("ZL_Province","And ID="&ZlTemp(35)&"","City")%><%End If%><%End If%>&nbsp;
			</div>
		</div>
		  <%If request("Action")="EditRZ" Then%>
		  <%End If%>
		<div class="inputlump">
			<label class="inputtitle">状态：</label>
			<div class="inputcontent">
				<%If ZlTemp(31)=0 Then%>正常<%End If%>
				<%If ZlTemp(31)=1 Then%><font color="#ff0000">锁定</font><%End If%>
				<%If ZlTemp(31)=2 Then%><font color="#ff0000">待审核</font><%End If%>
				<%If ZlTemp(31)=3 Then%><font color="#ff0000">待激活</font><%End If%>
				<%If ZlTemp(31)=4 Then%><font color="#ff0000">待上传与完善资料</font><%End If%>
				<%If ZlTemp(31)=5 Then%><font color="#ff0000">待签约</font><%End If%>
				<%If ZlTemp(31)=6 Then%><font color="#ff0000">待付款</font><%End If%>
				&nbsp;
			</div>
		</div>
		<%If ZlTemp(1)<>0 Then%>
		<div class="warng">
			<strong>&nbsp;&nbsp;联系人信息</strong>
		</div>
		<%End If%>
		<div class="inputlump">
			<label class="inputtitle">姓名：</label>
			<div class="inputcontent"><%=ZlTemp(32)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">手机号：</label>
			<div class="inputcontent"><%=ZlTemp(3)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">微信：</label>
			<div class="inputcontent"><%=ZlTemp(4)%>&nbsp;
			</div>
		</div>
		  <%If request("Action")="EditRZ" Then%>
		  <%End If%>
		<div class="inputlump">
			<label class="inputtitle">QQ：</label>
			<div class="inputcontent">
		  <%If request("Action")="" Then%><%=ZlTemp(5)%>
		  <%End If%>
		  <%If request("Action")="Edit" Then%>
			<input name="P5" type="text" value="<%=ZlTemp(5)%>"  id="P5" class="inputstyls20"  />
		  <%End If%>
		  <%If request("Action")="EditRZ" Then%>
			<input name="P5" type="text" value=""  id="P5" class="inputstyls200"  />
		  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">邮箱：</label>
			<div class="inputcontent">
			  <%If request("Action")="" Then%><%=ZlTemp(6)%>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<input name="P6" type="text" value="<%=ZlTemp(6)%>"  id="P6" class="inputstyls200" />
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P6" type="text" value=""  id="P6" class="inputstyls200" />
			  <%End If%>&nbsp;
			</div>
		</div>
		<%If ZlTemp(1)=0 Then%>
		<div class="inputlump">
			<label class="inputtitle">身份证地区：<%If request("Action")="EditRZ" Then%><font color="red">*</font><%End If%></label>
			<div class="inputcontent">
		  <%If request("Action")<>"EditRZ" Then%><%=ZlTemp(9)%>&nbsp;<%=ZlTemp(10)%>&nbsp;<%=ZlTemp(11)%>&nbsp;
		  <%End If%>
		  <%If request("Action")="EditRZ" Then%><script language="javascript" src="/plus/City.php?flag=0"></script>
		  <%End If%>&nbsp;
			</div>
		</div>
		<%End If%>
		
		<%If ZlTemp(1)=0 Then%>
		<div class="inputlump">
			<label class="inputtitle">身份证号码：<%If request("Action")="EditRZ" Then%><font color="red">*</font><%End If%></label>
			<div class="inputcontent">
			  <%If request("Action")<>"EditRZ" Then%><%=ZlTemp(7)%>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P7" type="text" value=""  id="P7" class="inputstyls200" />
			  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">地址：<%If request("Action")="EditRZ" Then%><font color="red">*</font><%End If%></label>
			<div class="inputcontent">
			  <%If request("Action")<>"EditRZ" Then%><%=ZlTemp(12)%>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<textarea name="P12" type="text" value=""  id="P12" class="inputstyl2"></textarea>
			  <%End If%>&nbsp;
			</div>
		</div>
		<%End If%>
		<%If ZlTemp(1)<>0 Then%>
		<div class="warng">
			<strong>&nbsp;&nbsp;企业信息：</strong>
		</div>
		<div class="inputlump">
			<label class="inputtitle">公司名称：<font color="red">*</font></label>
			<div class="inputcontent">
			<%If request("Action")="" Then%>
					<%=ZlTemp(14)%>
			<%End If%>
		  <%If request("Action")="Edit" Then%>
				<input name="P14" type="text" value="<%=ZlTemp(14)%>"  id="P14" class="inputstyl2"/>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P14" type="text" value=""  id="P14" class="inputstyl2"/>
			  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">公司注册地点：<font color="red">*</font></label>
			<div class="inputcontent">
		  <%If request("Action")<>"EditRZ" Then%><%=ZlTemp(9)%>&nbsp;<%=ZlTemp(10)%>&nbsp;<%=ZlTemp(11)%>&nbsp;
		  <%End If%>
		  <%If request("Action")="EditRZ" Then%><script language="javascript" src="/plus/City.php?flag=0"></script>
		  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">详细地址：<%If request("Action")<>"" Then%><font color="red">*</font><%End If%></label>
			<div class="inputcontent">
			  <%If request("Action")="" Then%><%=ZlTemp(17)%>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<textarea name="P17" type="text" value="<%=ZlTemp(17)%>"  id="P17" class="inputstyl2"></textarea>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<textarea name="P17" type="text" value=""  id="P17" class="inputstyl2"></textarea>
			  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">公司电话：</label>
			<div class="inputcontent">
			  <%If request("Action")="" Then%><%=ZlTemp(15)%>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<input name="P15" type="text" value="<%=ZlTemp(15)%>"  id="P15" class="inputstyls200" />
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P15" type="text" value=""  id="P15" class="inputstyls200" />
			  <%End If%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">公司传真：</label>
			<div class="inputcontent">
			  <%If request("Action")="" Then%><%=ZlTemp(16)%>
			  <%End If%>
			  <%If request("Action")="Edit" Then%>
				<input name="P16" type="text" value="<%=ZlTemp(16)%>"  id="P16" class="inputstyls200" />
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P16" type="text" value=""  id="P16" class="inputstyls200" />
			  <%End If%>&nbsp;
			</div>
			</div>
		</div>
			  <%If request("Action")<>"EditRZ" Then%>
		<div class="inputlump">
			<label class="inputtitle">预付款结余：</label>
			<div class="inputcontent"><%=ZlTemp(25)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">有效业务期：</label>
			<div class="inputcontent"><%=ZlTemp(30)%>&nbsp;
			</div>
		</div>
			  <%End If%>
		<div class="inputlump">
			<label class="inputtitle">营业执照编号：<font color="red">*</font></label>
			<div class="inputcontent">
			  <%If request("Action")<>"EditRZ" Then%><%=ZlTemp(7)%>
			  <%End If%>
			  <%If request("Action")="EditRZ" Then%>
				<input name="P7" type="text" value=""  id="P7" class="inputstyls200" />
			  <%End If%>&nbsp;
			</div>
		</div>
		
		<%End If%>


		<%If request("Action")="" Then%>
		 
		<div class="warng">
			<strong>&nbsp;&nbsp;关系信息</strong>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级ID</label>
			<div class="inputcontent"><%=ZlTemp(18)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级用户名</label>
			<div class="inputcontent"><%=ZlTemp(19)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级联系人姓名</label>
			<div class="inputcontent"><%=ZlTemp(20)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级联系手机</label>
			<div class="inputcontent"><%=ZlTemp(21)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级公司名称</label>
			<div class="inputcontent"><%=ZlTemp(22)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">业务上级用户组</label>
			<div class="inputcontent"><%=GetNameZ("ZL_UserGroup","And ID="&ZlTemp(23)&"","GroupName")%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">一级代理ID</label>
			<div class="inputcontent"><%=ZlTemp(24)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">一级拓展员ID</label>
			<div class="inputcontent"><%=ZlTemp(26)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">区域拓展员ID</label>
			<div class="inputcontent"><%=ZlTemp(27)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">中介数组</label>
			<div class="inputcontent"><%=ZlTemp(28)%>&nbsp;
			</div>
		</div>
		<div class="inputlump">
			<label class="inputtitle">代理数组</label>
			<div class="inputcontent"><%=ZlTemp(29)%>&nbsp;
			</div>
		</div>

		<%End If%>


	  <%If request("Action")<>"" Then%>
		<div class="buttoncontent"><input name="UserSj" type="hidden" id="UserSj" value="0">
		<input type="submit" value="确认提交(Submint)" class="submintstyle" /></div>
		</form>
	  <%End If%>

		<%If request("Action")="" And ZlTemp(31)=408 Then%>
		<div class="buttoncontent">		
				<a href="?Action=EditRZ"><input type="submit" value="继续完善" class="submintstyle" /></a>	
		</div>				
		<%End If%>

		<%If request("Action")="" And ZlTemp(31)=409 Then%>
		<div class="buttoncontent">		
				<a href="?Action=EditRZ"><input type="submit" value="继续完善" class="submintstyle" /></a>	
		</div>
		<div class="buttoncontent">		
				<a href="?Action=EditRZ"><input type="submit" value="提交认证" class="submintstyle" /></a>	
		</div>							
		<%End If%>
		



</div> 
<%
End Sub
  
	
End Class
%> 
