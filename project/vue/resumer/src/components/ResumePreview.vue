<template>
	<div class ="resumePreview">
		<h1>{{resume.profile.name || '请填写姓名'}}</h1>
		<p> {{resume.profile.city || '请填写城市'}} | {{resume.profile.age || '请填写年龄'}} 
			{{resume.Cantant.QQ}}
			| {{resume.Cantant.mail}}
			| {{resume.Cantant.phone}}
		</p>
		
		<div class="line"></div>
		<section v-if="filter(resume.workHistory).length > 0" class="sectioncontent">
			<div class="titleleft">
				<h2>工作经历</h2>
				<svg class="icon icon1" >
			    	<use xlink:href="#icon-work"></use>
			    </svg>
			</div>
			
			<div class="contentright">
				<ul>
				<li v-for ="workHistory in filter(resume.workHistory)">
						<div class="itemtitle">
							{{workHistory.company}}
							
						</div>
						<div class="itemcontent">
							{{workHistory.content}}
						</div>
						
					
				</li>

			</ul> 
			</div>
			
							
		</section>
		<section v-if="filter(resume.workHistory).length > 0" class="sectioncontent"> 
			<div class="titleleft">
			<h2>学历信息</h2>
			<svg class="icon" >
			   	<use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright">
			<ul>
				<li v-for ="StudyHistory in filter(resume.StudyHistory)">
						<div class="itemtitle">
						{{StudyHistory.school}}
						</div>
						<div class="itemcontent">
							<div>
								时间：{{StudyHistory.duration}} 
							</div>	
							<div>
								学位：{{StudyHistory.degree}}
							</div>
						
						</div>
				</li>

			</ul> 
			</div>				
		</section>
		<section v-if="filter(resume.ProjectHistory).length > 0" class="sectioncontent">
			<div class="titleleft">
			<h2>项目经历</h2>
			<svg class="icon" >
			   	<use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright">
			<ul>
				<li v-for ="ProjectHistory in filter(resume.ProjectHistory)">
						<div class="itemtitle">
						{{ProjectHistory.projectName}}
						</div>
						<div class="itemcontent">
						{{ProjectHistory.projectContent}}
						</div>
				</li>

			</ul> 
			</div>				
		</section>
		
		<section v-if="filter(resume.Award).length > 0" class="sectioncontent">
			<div class="titleleft">
			<h2>获奖情况</h2>
			<svg class="icon" >
			    <use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright2">
			<ul>
				<li v-for ="Award in filter(resume.Award)">
						<div class="itemtitle">
						{{Award.awardName}}
						</div>
						<div class="itemcontent">
						{{Award.awardContent}}
						</div>
				</li>

			</ul> 
			</div>				
		</section>
		
		
	</div>	



</template>

<script>

	export default {
		props:['resume'],
		methods:{
			filter(array){//数组里面空的去掉
				return array.filter(item => !this.isEmpty(item))
			},
			isEmpty(object){//判断obj里面是否有内容
				let empty = true
				for(let key in object){
					if(object[key]){
						empty = false
						break
					}

				}
				return empty
			}
		}

	}

</script>


<style>
	ul li{
		list-style: none;
	}
	.resumePreview{
		padding: 40px 40px;	
		margin: 40px 16px;		
		background:#ffffff;
		box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
		flex-grow:1;
    	margin-left:16px;
    	overflow:scroll;
    
	}
	.resumePreview p{
		color: rgb(135,135,135);
		padding: 0 8px 16px 0;
	}
	.line{
		margin-bottom: 20px ;
		border: 1.5px solid rgb(157,87,202);
	}
	.sectioncontent{
		display: flex;
	}
	.titleleft{
		position: relative;
		min-width: 160px;
		width: 160px;
		min-height: 120px;
		color: rgb(157,87,202);
	}
	.contentright{
		flex-grow: 1;
		border:1px solid  rgb(157,87,202);
		border-bottom: none;
		border-right: none;
		justify-content: center;
		align-content: center;
		padding: 16px 16px; 
	}
	.contentright2{
		flex-grow: 1;
		border:1px solid  rgb(157,87,202);
		border-right: none;
		justify-content: center;
		align-content: center;
		padding: 16px 16px; 
	}
	.itemtitle{
		padding: 10px 0;
	}
	.itemcontent{
		color: rgb(135,135,135);
	}
	.itemcontent div{
		margin: 4px 0;
	}
	.icon1{
		position: absolute;
		top:-9px;
		right: -9px;
		z-index: 10;
	}
</style>