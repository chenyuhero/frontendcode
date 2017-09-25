<template>
	<div class="layout">
		

		<div class="rate">
			
			<div class="bar bar1" tabindex="0">重要并且紧急</div>
			<div class="bar bar2" tabindex="0">重要但不紧急</div>
			<div class="bar bar3" tabindex="0">紧急但不重要</div>
			<div class="bar bar4" tabindex="0">不重要不紧急</div>
		</div>



		<div class="todo">
			
			<div class="newTask">
				<input  type="text" v-model="newTodo" @keypress.enter="addTodo" placeholder="输入任务，按Enter键完成">
	        </div>
			
	      <ul class="todos">
	        <li v-for="todo in todoList">
	        	<span>
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone(todo)"  >
		    			<use xlink:href="#icon-dui4"></use>
						</svg>
	        		</a>
	        		<a @click="removeTodo(todo)">
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

	     	 <ul>
	      		<li v-for="done in doneList">
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
	 			newTodo: '',
    			todoList: [],
    			doneList: []
	 		}
	 	},
	  methods: {
		    addTodo: function(){
		      this.todoList.push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
		    Todone: function(todo){
		  		let index = this.todoList.indexOf(todo) 
		  		
		     	this.doneList.push({
		     		title: this.todoList.slice(index,index+1)[0].title,
		     		createdAt:this.todoList.slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList.splice(index,1)
		  		},
		     removeTodo: function(todo){
		      		let index = this.todoList.indexOf(todo) 
		      		this.todoList.splice(index,1) // 不懂 splice？赶紧看 MDN 文档！
		    	}
		  	}
		  	
		  	
		}

</script>

<style scoped>

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
    	width: 200px;
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
	
	.bar2{
		background:rgb(255,239,203);
		color: rgb(255,174,137);
	}
	.bar3{
		background: rgb(214,244,254);
		color:rgb(32,160,255);
	}
	.bar4{
		background:rgb(238,255,221);
		color: rgb(137,197,87);
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
		background: rgb(255,237,231);
	}	
	.newTask  input{
	  	margin: 8px 8px;
	 	padding: 8px;
	 	border: none;
	 	background: rgb(255,237,231);
	 	
		width: 704px;
		height: 37px;
	}
	

</style>