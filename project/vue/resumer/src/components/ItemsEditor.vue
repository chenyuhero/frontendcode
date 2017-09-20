<template>
	<div>
		<h2>{{tittle}}</h2>
		<div class="container" v-for="(item, index) in items" v-bind:key="index">
			<el-form >
			   <el-form-item v-for="key in keys" v-bind:label="labels[key] || key" v-bind:key="key">
			    <el-input v-model="item[key]" ></el-input>
			  </el-form-item>
			</el-form>
			
			<hr>
		</div>
		
		<el-button type="primary" v-on:click="addWorkHistory">添加</el-button>
		<el-button :plain="true" type="info" v-on:click="removeWorkHistory(index)">删除</el-button>
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


