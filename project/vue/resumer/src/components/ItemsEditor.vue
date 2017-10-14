<template>
	<div>
		<h2>{{tittle}}</h2>
		<div class="container" v-for="(item, index) in items" v-bind:key="index">
			<el-form >
			   <el-form-item v-for="key in keys" v-bind:label="labels[key] || key" v-bind:key="key">
			    <el-input v-model="item[key]" ></el-input>
			  </el-form-item>
			</el-form>
						
		</div>
		<div>
			<button class="primary" v-on:click="addWorkHistory">添加</button>
			<button  v-on:click="removeWorkHistory(index)">删除</button>
		</div>
		
	</div>
</template>

<script>
	export default {
		props: ['items','labels','tittle'],
		computed: {
			keys(){
				return Object.keys(this.items[0])
			}
		},
		methods:{
			addWorkHistory(){
					const empty = {}
					this.keys.map((key) => {
						empty[key] = ''
					})
					this.items.push(empty)
										
				},
				removeWorkHistory(index){
					if (index==1) {
						return
					}
					this.items.splice(index,1)									
				}
			}
		
		
	}
</script>

<style scoped lang="scss">
	button{
	padding:5px auto;	
	width:72px;
	height:32px;
	border:none;
	cursor:pointer;
	font-size:18px;
	background:#ddd;
	color:#222;
	&:hover{
		box-shadow:1px 1px 1px hsla(0,0,0,0.50);
		background:red;
		color:white;
	}
	&.primary{
	background:#02af5f;
	color:white;
	}
	}
	
</style>
