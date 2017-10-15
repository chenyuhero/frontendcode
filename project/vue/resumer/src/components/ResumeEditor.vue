<template>
	<div class ="resumeEditor">
		<nav>
			<ol >


				<li v-for="i in [0,1,2,3,4,5]" v-bind:class="{active:currentTab === i}" v-on:click="currentTab=i">
					<svg class="icon" >
			    	<use v-bind:xlink:href="`#icon-${icons[i]}`"></use>
			    	</svg>
				</li>
								
			</ol>
		</nav>
			<ol class="panels">


				<li v-bind:class="{active:currentTab === 0}">
					<ProfileEditor   v-bind:profile='resume.profile'/>
				</li>
				<li v-bind:class="{active:currentTab === 1}">
					
					<ItemsEditor v-bind:items='resume.workHistory' v-bind:labels="{company:'公司',content:'工作内容'}" tittle="工作经历"/>
				</li>
				<li v-bind:class="{active:currentTab === 2}">
					<ItemsEditor v-bind:items='resume.StudyHistory' v-bind:labels="{school:'学校',duration:'时间',degree:'学历'}" tittle="学历信息" />
				</li>
				<li v-bind:class="{active:currentTab === 3}">
					<ItemsEditor v-bind:items='resume.ProjectHistory' v-bind:labels="{projectName:'项目名称',projectContent:'项目内容'}" tittle="项目经历"/>
				</li>
				<li v-bind:class="{active:currentTab === 4}">
					<ItemsEditor v-bind:items='resume.Award' v-bind:labels="{awardName:'奖项名称',awardContent:'奖项内容'}" tittle="获奖情况"/>
				</li>
				<li v-bind:class="{active:currentTab === 5}">
						<h2>联系方式</h2>
						<el-form >
						  <el-form-item label="QQ">
						    <el-input v-model="resume.Cantant.QQ" ></el-input>
						  </el-form-item>
						  <el-form-item label="	邮箱">
						    <el-input v-model="resume.Cantant.mail" ></el-input>
						  </el-form-item>
						  <el-form-item label="电话">
						    <el-input v-model="resume.Cantant.phone" ></el-input>
						  </el-form-item>
						</el-form>
				</li>
				
				

				
			</ol>

	</div>


</template>

<script>

	
	import ProfileEditor from './ProfileEditor'
	import ItemsEditor from './ItemsEditor'
	
	export default {
		props:['resume'],
		components:{ 
			
			ProfileEditor,
			ItemsEditor

		},
		
		data(){
		 return{
			currentTab: 0,
			icons: ['id','work','book','heart','cup','phone'],
						
						
		}
	},
						
			
		}
	

</script>


<style lang="scss" scoped>
.resumeEditor{
	
	background: #ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	display: flex;
	flex-direction: row;
	overflow:auto;
	> nav{
		width: 80px;
		background:#02af5f;
		color:white;
		>  ol{
			> li{
				height:48px;
				display:flex;
				justify-content:center;
				align-items:center;
				margin-top:16px;
				margin-bottom:16px;
				&.active{
					background:white;
					color:#02af5f;
				}
		 	}
		}
	}
	> .panels{
		.container{
			position:relative;
			
			.el-icon-delete{
				position:absolute;
				right:0;
				top:10px;
			}
		}

		flex-grow: 1;

		> li{
		display:none;
		padding:24px;
		overflow:auto;
		height:100%;

		&.active{
			display:block;
		}

		}
		
	}

}
svg.icon{
	width: 24px;
	height:24px;
}
 ol{
 	list-style:none;
 }
.resumeField{
	> label{
	display: block;
	}
	input[type=text]{
	margin:16px 0 ;
	border: 1px solid #ddd;
	box-shadow:inset 0 1px 3px 0 rgba(0,0,0,0.25);
	width: 100%;
	height:40px;
	padding: 0 8px;
	}
}
hr{
	border: none;
	border-top: 1px solid #ddd;
	margin: 24px 0;
}
</style>