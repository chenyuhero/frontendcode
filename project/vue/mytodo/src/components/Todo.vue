<template>
	<div class="layout">
		

		<div class="rate">
			
			<div class="bar bar1 " v-bind:class="{active:currentTab === 0}"  v-on:click="currentTab=0" >重要并且紧急</div>
			<div class="bar bar2 " v-bind:class="{active:currentTab === 1}"  v-on:click="currentTab=1" >重要但不紧急</div>
			<div class="bar bar3 " v-bind:class="{active:currentTab === 2}"  v-on:click="currentTab=2" >不重要但紧急</div>
			<div class="bar bar4 " v-bind:class="{active:currentTab === 3}"  v-on:click="currentTab=3" >不重要不紧急</div>
			
		
		</div>


		<div class="todo">
			
			<div class="newTask  " v-bind:class="{active:currentTab === 0}"  >
				<input class="bar1"  type="text" v-model="newTodo" @keypress.enter="addTodo1" placeholder="输入任务，按Enter键完成">
	        </div>
	        <div class="newTask " v-bind:class="{active:currentTab === 1}"  >
				<input class="bar2" type="text" v-model="newTodo" @keypress.enter="addTodo2" placeholder="输入任务，按Enter键完成">
	        </div>
	        <div class="newTask " v-bind:class="{active:currentTab === 2}"  >
				<input class="bar3" type="text" v-model="newTodo" @keypress.enter="addTodo3" placeholder="输入任务，按Enter键完成">
	        </div>
	        <div class="newTask " v-bind:class="{active:currentTab === 3}"  >
				<input class="bar4" type="text" v-model="newTodo" @keypress.enter="addTodo4" placeholder="输入任务，按Enter键完成">
	        </div>
			
	      <ul class="todos">
	        <li v-for="todo in todoList1">
	        	<div class="circle bar1"></div>
	        	<span >
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone1(todo)"  >
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
	        <li v-for="todo in todoList2">
	        	<div class="circle bar2"></div>
	        	<span >
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone2(todo)"  >
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
	        <li v-for="todo in todoList3">
	        	<div class="circle bar3"></div>
	        	<span>
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone3(todo)"  >
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
	        <li v-for="todo in todoList4">
	        	<div class="circle bar4"></div>
	        	<span >
	        		{{ todo.title }}	

	        		<a >
	        			<svg class="icon" @click ="Todone4(todo)"  >
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
	      		<li class="bar1" v-for="done in doneList1">
	      			{{done.title}} 
	      		</li>	
	      	</ul>
	      	<ul>
	      		<li class="bar2" v-for="done in doneList2">
	      			{{done.title}} 
	      		</li>	
	      	</ul>
	      	<ul>
	      		<li class="bar3" v-for="done in doneList3">
	      			{{done.title}} 
	      		</li>	
	      	</ul>
	      	<ul>
	      		<li class="bar4" v-for="done in doneList4">
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
    			todoList1: [],
    			todoList2: [],
    			todoList3: [],
    			todoList4: [],
    			doneList1: [],
    			doneList2: [],
    			doneList3: [],
    			doneList4: []
	 		}
	 	},
	  methods: {
		    addTodo1: function(){
		      this.todoList1.push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
		    addTodo2: function(){
		      this.todoList2.push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
		    addTodo3: function(){
		      this.todoList3.push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
		    addTodo4: function(){
		      this.todoList4.push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		    },
		    Todone1: function(todo){
		  		let index = this.todoList1.indexOf(todo) 
		  		
		     	this.doneList1.push({
		     		title: this.todoList1.slice(index,index+1)[0].title,
		     		createdAt:this.todoList1.slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList1.splice(index,1)
		  		},
		  	Todone2: function(todo){
		  		let index = this.todoList2.indexOf(todo) 
		  		
		     	this.doneList2.push({
		     		title: this.todoList2.slice(index,index+1)[0].title,
		     		createdAt:this.todoList2.slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList2.splice(index,1)
		  		},
		  	Todone3: function(todo){
		  		let index = this.todoList3.indexOf(todo) 
		  		
		     	this.doneList3.push({
		     		title: this.todoList3.slice(index,index+1)[0].title,
		     		createdAt:this.todoList3.slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList3.splice(index,1)
		  		},
		  	Todone4: function(todo){
		  		let index = this.todoList4.indexOf(todo) 
		  		
		     	this.doneList4.push({
		     		title: this.todoList4.slice(index,index+1)[0].title,
		     		createdAt:this.todoList4.slice(index,index+1)[0].createdAt,
		     		done:true,
		     		doneAt: new Date()
		     	})
		     	 this.todoList4.splice(index,1)
		  		},
		    removeTodo: function(todo){
		      		let index = this.todoList.indexOf(todo) 
		      		this.todoList.splice(index,1) // 不懂 splice？赶紧看 MDN 文档！
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
	 	width: 704px;
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