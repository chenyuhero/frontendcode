<template>
	<div id="resumePreview">
		<h1>{{resume.profile.name || '请填写姓名'}}</h1>
		<p>{{resume.profile.city || '请填写城市'}} | {{resume.profile.age || '请填写年龄'}}</p>
		
		<hr>
		<section v-if="filter(resume.ProjectHistory).length > 0">
			<h2>项目经历</h2>

			<ul>
				<li v-for ="ProjectHistory in filter(resume.ProjectHistory)">
						{{ProjectHistory.projectName}}
						{{ProjectHistory.projectContent}}
					
				</li>

			</ul> 
							
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

	#resumePreview{
	background:#ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	}


</style>