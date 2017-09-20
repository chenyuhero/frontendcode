<template>
	<div class ="resumePreview">
		<h1>{{resume.profile.name || '请填写姓名'}}</h1>
		<p>{{resume.profile.city || '请填写城市'}} | {{resume.profile.age || '请填写年龄'}}</p>
		
		<hr>
		<section v-if="filter(resume.workHistory).length > 0">
			<h2>工作经历</h2>

			<ul>
				<li v-for ="workHistory in filter(resume.workHistory)">
						{{workHistory.company}}
						{{workHistory.content}}
					
				</li>

			</ul> 
							
		</section>
		<section v-if="filter(resume.workHistory).length > 0">
			<h2>学历信息</h2>

			<ul>
				<li v-for ="StudyHistory in filter(resume.StudyHistory)">
						{{StudyHistory.school}}
						{{StudyHistory.duration}}
						{{StudyHistory.degree}}
					
				</li>

			</ul> 
							
		</section>
		<section v-if="filter(resume.ProjectHistory).length > 0">
			<h2>项目经历</h2>

			<ul>
				<li v-for ="ProjectHistory in filter(resume.ProjectHistory)">
						{{ProjectHistory.projectName}}
						{{ProjectHistory.projectContent}}
					
				</li>

			</ul> 
							
		</section>
		
		<section v-if="filter(resume.Award).length > 0">
			<h2>获奖情况</h2>

			<ul>
				<li v-for ="Award in filter(resume.Award)">
						{{Award.awardName}}
						{{Award.awardContent}}
					
				</li>

			</ul> 
							
		</section>
		<hr>
		<p>
			{{resume.Cantant.qq}}
			{{resume.Cantant.mail}}
			{{resume.Cantant.phone}}
		</p>
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

	.resumePreview{
	background:#ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	flex-grow:1;
    margin-left:16px;
    
	}


</style>