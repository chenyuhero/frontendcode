<template>
	<div>
		<div class="actiontab tabbar clearfix ">
			<ul class="clearfix">
				<li id="bartitle">操作</li>
				<li class="hideblock">占位</li>	
				<li @click="preview" >预览</li>
				<li class="hideblock">占位</li>
				<li >打印</li>
				<li class="hideblock">占位</li>	
				<li >下载</li>
				<li class="hideblock">占位</li>
				<li @click='saveOrUpdateTodos'>保存</li>
				<li class="hideblock">占位</li>	
				</ul>
		</div>
		<div class="themebar tabbar full clearfix ">
			<ul>
				<li id="bartitle">主题</li>

				<li v-for="i in [0,1,2,3,4,5,6,7,8]"  v-bind:class="{ color1 : 0 == i, color2 : 1 == i,color3 : 2 == i,color4 : i == 3,color5 : i == 4,color6 : i == 5,color7 : i == 6,color8 : i == 7,color9 : i == 8}" v-on:click="change(i)" ></li>
				</ul>
		</div>
		
	</div>	
</template>
<script>
	export default{
		props:['resume'],
		methods:{
			preview(){
				this.$emit('preview')
			},
			saveOrUpdateTodos(){
				this.$emit('saveOrUpdateTodos')
			},
			change(i){
				this.resume.currentColor = i
			}
			
		}
	}		


</script>
<style scoped>
	#bartitle{
		width:210px;
		color: #000;
		font-size: 20px;
		border-bottom:1px  dashed #ddd;  
		background: rgb(250,250,250);
	}
	.color1{
		background:rgb(255,185,1);
	}
	.color3{
		background: rgb(242,80,34);
	}
	.color2{
		background: rgb(1,164,239);
	}
	.color4{
		background: rgb(127,186,0);
	}
	.color5{
		background: #FF34B3;
	}
	.color6{
		background: #D1EEEE;
	}
	.color7{
		background: rgb(157,87,202);
	}
	.color8{
		background: #8B1C62;
	}
	.color9{
		background: #20B2AA;
	}
	.hideblock{
		visibility: hidden;
	}
	.clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden}
	.clearfix{*+height:1%;}
	.tabbar{
		margin: 40px 34px 0 0;
		background: rgb(250,250,250);
		border:1px  solid #ddd; 
	}
	.actiontab ul li {
		width: 70px;
		padding: 8px 8px;
		list-style: none;
		height: 50px;
		border-radius: 8px;
		float: left;
		cursor: pointer;
		background: #02af5f;
		color: white;
		line-height: 30px;
		display: inline-block;
		text-align:center;
	}
	.themebar{
		overflow: hidden;

	}
	.actiontab ul li:hover{
		opacity: 0.8;
	}
	.themebar ul li:hover{
		opacity: 0.8;
	}
	.themebar ul li {
		width: 70px;

		padding: 8px 8px;
		list-style: none;
		height: 50px;
		float: left;
		cursor: pointer;
		color: white;
		line-height: 30px;
		display: inline-block;
		text-align:center;
	}
	.full{

	}
	
	
</style>