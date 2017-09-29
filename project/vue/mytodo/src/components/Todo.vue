<template>
	<div class="layout" >
		

		<div class="rate">
			<div v-for="i in [0,1,2,3]"  class="bar"  v-bind:class="{active:currentTab === i , bar1 : 0 == i, bar2 : 1 == i,bar3 : 2 == i,bar4 : i == 3}" v-on:click="currentTab=i">
					{{tags[i]}}
			</div>
		</div>

 		<div class="todo">
			<div  v-for="i in [0,1,2,3]"  class="newTask " v-bind:class="{active:currentTab === i}"  >
				<input v-bind:class="{ bar1 : 0 == i, bar2 : 1 == i,bar3 : 2 == i,bar4 : i == 3}"  type="text" v-model="newTodo" @keypress.enter="addTodo(i)" placeholder="输入任务，按Enter键完成">
	        </div>


	        <ul class="todos" v-for="i in [0,1,2,3]">
	        	
	        	<li v-for="todo in todoList[i]">
	        	<div class="circle " v-bind:class="{ bar1 : 0 == i, bar2 : 1 == i,bar3 : 2 == i,bar4 : i == 3}"  ></div>
	        	<span >
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone(todo,i)"  >
		    			<use xlink:href="#icon-dui4"></use>
						</svg>
	        		</a>
	        		<a @click="removeTodo(todo,i)">
	           	 		<svg class="icon "   >
		    			<use xlink:href="#icon-false-circle"></use>
						</svg>
					</a>         
	         	</span>
	       	 
	        </li>	

	        </ul>	
	      </div>  
    
	      <div class="done">
	      	<h3>今日已完成</h3>	

	      	<ul v-for="i in [0,1,2,3]">
	      		<li v-bind:class="{ bar1 : 0 == i, bar2 : 1 == i,bar3 : 2 == i,bar4 : i == 3}" v-for="done in doneList[i]">
	      			{{done.title}} 
	      		</li>	

	      	</ul>	
	      	</div> 	
	</div>


 


</template>

<script >
	 export default {
	 	data(){
	 		return{
	 			currentTab: 0,
	 			newTodo: '',
    			todoList:[[],[],[],[]],
    			doneList:[[],[],[],[]],
    			tags:['重要并且紧急','重要但不紧急','不重要但紧急','不重要不紧急']
	 		}
	 	},
	  methods: {
	  		addTodo: function(i){
	  		console.log(i)
	  		 console.log(this.todoList[i])		
		      this.todoList[i].push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
	   
		    Todone: function(todo,i){
		  		let index = this.todoList[i].indexOf(todo) 
		  		
		     	this.doneList[i].push({
		     		title: this.todoList[i].slice(index,index+1)[0].title,
		     		createdAt:this.todoList[i].slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList[i].splice(index,1)
		  		},
		 		  
		      removeTodo: function(todo,i){
		      		let index = this.todoList[i].indexOf(todo) 
		      		this.todoList[i].splice(index,1) // 不懂 splice？赶紧看 MDN 文档！
		    	}
		  	}
		  	
		  	
		}

</script>

<style scoped>
 	.circle{
 		border: 1px solid;
 	}
	.rate .active{
		border: 3px solid #C6E2FF;
	}
	.layout{
	
  	  margin: 16px auto;
	  width: 1240px;
	  display: inline-flex;
	  }
  
	.todo{
	  
	  border: 1px solid #CCCCCC;
	  height: 800px;
	  flex-grow: 1; 
	}
	.done{
	  
	  border: 1px solid #CCCCCC;
	  width: 500px;
	}

	.rate{
    	width: 120px;
  	}
	.bar{
		cursor: pointer;
		display: flex;
		align-items: center;
		height: 45px;
		padding:0px 8px;
		margin-bottom: 8px;

	}
	.bar:hover{
		opacity: 0.75;
	}
	.bar1{
		background:rgb(255,237,231);
		color: rgb(247,121,51);
	}
	.bar1 input{
		background:rgb(255,237,231);
	}
	.bar2{
		background:rgb(255,239,203);
		color: rgb(255,174,137);
	}
	.bar2 input{
		background:rgb(255,239,203);
	}
	.bar3{
		background: rgb(214,244,254);
		color:rgb(32,160,255);
	}
	.bar3 input{
		background: rgb(214,244,254);
	}
	.bar4{
		background:rgb(238,255,221);
		color: rgb(137,197,87);
	}
	.bar4 input{
		background:rgb(238,255,221);
	}
	
  .todo	ul li{
		list-style: none;
		margin: 8px auto;
		display: flex;
		align-content: center;
		height: 45px;

	}
  .done ul li {
  		margin: 8px auto;
		display: flex;
		align-content: center;
		height: 35px;
  }
	ul li span{
		padding: 8px 8px;
		display: inline-block;
		text-align: center;
		line-height: 32px;
		
	}	
	.newTask  input{
	  	margin: 8px 8px;
	 	padding: 8px;
	 	border: none;
	 	width: 450px;
		height: 37px;
	}
	.newTask{
		margin: 8px 8px;
		display: none;
	}
	.todo .active{
		display: block;
	}
</style>