<template>
	<div class ="resumePreview">
		<h1>{{resume.profile.name || '请填写姓名'}}</h1>
		<p> {{resume.profile.city || '请填写城市'}} | {{resume.profile.age || '请填写年龄'}} 
			{{resume.Cantant.QQ}}
			| {{resume.Cantant.mail}}
			| {{resume.Cantant.phone}}
		</p>
		
		<div class="line" v-bind:class="{ bordercolor1 : 0 == resume.currentColor, bordercolor2 : 1 == resume.currentColor,bordercolor3 : 2 == resume.currentColor,bordercolor4 : resume.currentColor == 3,bordercolor5 : resume.currentColor == 4,bordercolor6 : resume.currentColor == 5,bordercolor7 : resume.currentColor == 6,bordercolor8 : resume.currentColor == 7,bordercolor9 : resume.currentColor == 8}"></div>
		<section v-if="filter(resume.workHistory).length > 0" class="sectioncontent">
			<div class="titleleft" v-bind:class="{ color1 : 0 == resume.currentColor, color2 : 1 == resume.currentColor,color3 : 2 == resume.currentColor,color4 : resume.currentColor == 3,color5 : resume.currentColor == 4,color6 : resume.currentColor == 5,color7 : resume.currentColor == 6,color8 : resume.currentColor == 7,color9 : resume.currentColor == 8}">
				<h2>工作经历</h2>

				<svg class="icon icon1" v-bind:class="{ backcolor1 : 0 == resume.currentColor, backcolor2 : 1 == resume.currentColor,backcolor3 : 2 == resume.currentColor,backcolor4 : resume.currentColor == 3,backcolor5 : resume.currentColor == 4,backcolor6 : resume.currentColor == 5,backcolor7 : resume.currentColor == 6,backcolor8 : resume.currentColor == 7,backcolor9 : resume.currentColor == 8}" >
			    	<use xlink:href="#icon-work"></use>
			    </svg>
			</div>
			
			<div class="contentright" v-bind:class="{ bordercolor11: 0 == resume.currentColor, bordercolor12 : 1 == resume.currentColor,bordercolor13 : 2 == resume.currentColor,bordercolor14 : resume.currentColor == 3,bordercolor15 : resume.currentColor == 4,bordercolor16 : resume.currentColor == 5,bordercolor17 : resume.currentColor == 6,bordercolor18 : resume.currentColor == 7,bordercolor19 : resume.currentColor == 8}">
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
			<div class="titleleft" v-bind:class="{ color1 : 0 == resume.currentColor, color2 : 1 == resume.currentColor,color3 : 2 == resume.currentColor,color4 : resume.currentColor == 3,color5 : resume.currentColor == 4,color6 : resume.currentColor == 5,color7 : resume.currentColor == 6,color8 : resume.currentColor == 7,color9 : resume.currentColor == 8}">
			<h2>学历信息</h2>
			<svg class="icon icon1" v-bind:class="{ backcolor1 : 0 == resume.currentColor, backcolor2 : 1 == resume.currentColor,backcolor3 : 2 == resume.currentColor,backcolor4 : resume.currentColor == 3,backcolor5 : resume.currentColor == 4,backcolor6 : resume.currentColor == 5,backcolor7 : resume.currentColor == 6,backcolor8 : resume.currentColor == 7,backcolor9 : resume.currentColor == 8}">
			   	<use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright" v-bind:class="{ bordercolor11: 0 == resume.currentColor, bordercolor12 : 1 == resume.currentColor,bordercolor13 : 2 == resume.currentColor,bordercolor14 : resume.currentColor == 3,bordercolor15 : resume.currentColor == 4,bordercolor16 : resume.currentColor == 5,bordercolor17 : resume.currentColor == 6,bordercolor18 : resume.currentColor == 7,bordercolor19 : resume.currentColor == 8}">
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
			<div class="titleleft" v-bind:class="{ color1 : 0 == resume.currentColor, color2 : 1 == resume.currentColor,color3 : 2 == resume.currentColor,color4 : resume.currentColor == 3,color5 : resume.currentColor == 4,color6 : resume.currentColor == 5,color7 : resume.currentColor == 6,color8 : resume.currentColor == 7,color9 : resume.currentColor == 8}">
			<h2>项目经历</h2>
			<svg class="icon icon1" v-bind:class="{ backcolor1 : 0 == resume.currentColor, backcolor2 : 1 == resume.currentColor,backcolor3 : 2 == resume.currentColor,backcolor4 : resume.currentColor == 3,backcolor5 : resume.currentColor == 4,backcolor6 : resume.currentColor == 5,backcolor7 : resume.currentColor == 6,backcolor8 : resume.currentColor == 7,backcolor9 : resume.currentColor == 8}">
			   	<use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright" v-bind:class="{ bordercolor11: 0 == resume.currentColor, bordercolor12 : 1 == resume.currentColor,bordercolor13 : 2 == resume.currentColor,bordercolor14 : resume.currentColor == 3,bordercolor15 : resume.currentColor == 4,bordercolor16 : resume.currentColor == 5,bordercolor17 : resume.currentColor == 6,bordercolor18 : resume.currentColor == 7,bordercolor19 : resume.currentColor == 8}">
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
			<div class="titleleft" v-bind:class="{ color1 : 0 == resume.currentColor, color2 : 1 == resume.currentColor,color3 : 2 == resume.currentColor,color4 : resume.currentColor == 3,color5 : resume.currentColor == 4,color6 : resume.currentColor == 5,color7 : resume.currentColor == 6,color8 : resume.currentColor == 7,color9 : resume.currentColor == 8}">
			<h2>获奖情况</h2>
			<svg class="icon icon1" v-bind:class="{ backcolor1 : 0 == resume.currentColor, backcolor2 : 1 == resume.currentColor,backcolor3 : 2 == resume.currentColor,backcolor4 : resume.currentColor == 3,backcolor5 : resume.currentColor == 4,backcolor6 : resume.currentColor == 5,backcolor7 : resume.currentColor == 6,backcolor8 : resume.currentColor == 7,backcolor9 : resume.currentColor == 8}">
			    <use xlink:href="#icon-work"></use>
			</svg>
			</div>
			<div class="contentright2" v-bind:class="{ bordercolor11: 0 == resume.currentColor, bordercolor12 : 1 == resume.currentColor,bordercolor13 : 2 == resume.currentColor,bordercolor14 : resume.currentColor == 3,bordercolor15 : resume.currentColor == 4,bordercolor16 : resume.currentColor == 5,bordercolor17 : resume.currentColor == 6,bordercolor18 : resume.currentColor == 7,bordercolor19 : resume.currentColor == 8}">
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


<style scoped>
	.color1{
		color: rgb(255,185,1);
	}
	.color3{
		color: rgb(242,80,34);
	}
	.color2{
		color: rgb(1,164,239);
	}
	.color4{
		color: rgb(127,186,0);
	}
	.color5{
		color: #FF34B3;
	}
	.color6{
		color: #D1EEEE;
	}
	.color7{
		color: rgb(157,87,202);
	}
	.color8{
		color: #8B1C62;
	}
	.color9{
		color: #20B2AA;
	}
	.backcolor1{
		background:rgb(255,185,1);
	}
	.backcolor3{
		background: rgb(242,80,34);
	}
	.backcolor2{
		background: rgb(1,164,239);
	}
	.backcolor4{
		background: rgb(127,186,0);
	}
	.backcolor5{
		background: #FF34B3;
	}
	.backcolor6{
		background: #D1EEEE;
	}
	.backcolor7{
		background: rgb(157,87,202);
	}
	.backcolor8{
		background: #8B1C62;
	}
	.backcolor9{
		background: #20B2AA;
	}
	.bordercolor1{
		border: 1.5px solid rgb(255,185,1);
	}
	.bordercolor3{
		border: 1.5px solid rgb(242,80,34);
	}
	.bordercolor2{
		border: 1.5px solid rgb(1,164,239);
	}
	.bordercolor4{
		border: 1.5px solid rgb(127,186,0);
	}
	.bordercolor5{
		border: 1.5px solid #FF34B3;
	}
	.bordercolor6{
		border: 1.5px solid #D1EEEE;
	}
	.bordercolor7{
		border: 1.5px solid rgb(157,87,202);
	}
	.bordercolor8{
		border: 1.5px solid #8B1C62;
	}
	.bordercolor9{
		border: 1.5px solid #20B2AA;
	}
	.bordercolor11{
		border: 1px solid rgb(255,185,1);
	}
	.bordercolor13{
		border: 1px solid rgb(242,80,34);
	}
	.bordercolor12{
		border: 1px solid rgb(1,164,239);
	}
	.bordercolor14{
		border: 1px solid rgb(127,186,0);
	}
	.bordercolor15{
		border: 1px solid #FF34B3;
	}
	.bordercolor16{
		border: 1px solid #D1EEEE;
	}
	.bordercolor17{
		border: 1px solid rgb(157,87,202);
	}
	.bordercolor18{
		border: 1px solid #8B1C62;
	}
	.bordercolor19{
		border: 1px solid #20B2AA;
	}
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
		margin: 35px 0px 60px 0px;
		padding: auto 0;
	}
	.sectioncontent{
		display: flex;
	}
	.titleleft{
		position: relative;
		min-width: 160px;
		width: 160px;
		min-height: 120px;
	}
	.contentright{
		flex-grow: 1;
		border-bottom: none;
		border-right: none;
		justify-content: center;
		align-content: center;
		padding: 16px 16px; 
	}
	.contentright2{
		flex-grow: 1;
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
		
	}
</style>