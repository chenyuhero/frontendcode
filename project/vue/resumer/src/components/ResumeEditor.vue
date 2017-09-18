<template>
	<div id="resumeEditor">
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
					<h2>个人信息</h2>
					<el-form >
					  <el-form-item label="姓名">
					    <el-input v-model="profile.name" ></el-input>
					  </el-form-item>
					  <el-form-item label="城市">
					    <el-input v-model="profile.city" ></el-input>
					  </el-form-item>
					  <el-form-item label="年龄">
					    <el-input v-model="profile.age" ></el-input>
					  </el-form-item>
					</el-form>

				</li>
				<li v-bind:class="{active:currentTab === 1}">
					<h2>工作经历</h2>

					<div class="container" v-for="(work,index) in workHistory">
						<el-form >
						   <el-form-item label="公司">
						    <el-input v-model="work.company" ></el-input>
						  </el-form-item>
						  <el-form-item label="工作内容">
						    <el-input v-model="work.content" ></el-input>
						  </el-form-item>
						</el-form>
						<i class="el-icon-delete" v-on:click="removeWorkHistory(index)" ></i>
						<hr>
					</div>
					
					<el-button type="primary" v-on:click="addWorkHistory">添加</el-button>
				</li>
				<li v-bind:class="{active:currentTab === 2}">
					<h2>学历信息</h2>
				</li>
				<li v-bind:class="{active:currentTab === 3}">
					<h2>项目经历</h2>
				</li>
				<li v-bind:class="{active:currentTab === 4}">
					<h2>获奖情况</h2>
				</li>
				<li v-bind:class="{active:currentTab === 5}">
					<h2>联系方式</h2>
				</li>
				
				

				
			</ol>

	</div>


</template>

<script>

	export default {

		name: 'ResumeEditor',
		data(){
		return{
			currentTab: 0,
			icons: ['id','work','book','heart','cup','phone'],
			profile:{
				name:'',
				city:'',
				age:''
			},
			workHistory:[
			{ company:'', content:''	}

			]
						
		}
	},
			created(){
								
			},
			computed: {
				
			},
			methods:{
				addWorkHistory(){
					this.workHistory.push(
					{ company:'', content:''	}
					)
										
				},
				removeWorkHistory(index){
					if(index==0){
					return;
					}				
					this.workHistory.splice(index,1)									
				}
			}
			
		}
	

</script>


<style lang="scss" scoped>
#resumeEditor{
	
	background: #ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	display: flex;
	flex-direction: row;
	overflow:auto;
	> nav{
		width: 80px;
		background:black;
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
					color:black;
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