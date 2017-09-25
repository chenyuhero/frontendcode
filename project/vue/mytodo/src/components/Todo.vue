<template>
	<div>
		
		<div class="newTask">
			<input  type="text" v-model="newTodo" @keypress.enter="addTodo" placeholder="输入任务，按Enter键完成">
        </div>
		
      <ul class="todos">
        <li v-for="todo in todoList">
        	<span>
        		{{ todo.title }}	         
          	<svg class="icon" @click="Todone">
	    		<use xlink:href="#icon-dui4"></use>
			</svg>
			<svg class="icon " @click="removeTodo"  >
	    		<use xlink:href="#icon-false-circle"></use>
			</svg>

        	</span>
       	   
           	
        </li>
      </ul>

      <ul>
      	<li v-for="done in doneList" >
      		{{done.title}}

      	</li>
      </ul>
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
        done:false

      })
      this.newTodo='',
      this.showi=false
    },
     removeTodo: function(todo){
      let index = this.todoList.indexOf(todo) // Array.prototype.indexOf 是 ES 5 新加的 API
      this.todoList.splice(index,1) // 不懂 splice？赶紧看 MDN 文档！
    },
    Todone: function(todo){
    	let index = this.todoList.indexOf(todo) 
    	this.doneList.push({
      	title:this.todoList[index+1].title,
      	createdAt:this.todoList[index+1].createdAt,
    	doneAt: new Date(),
       	})
       	this.removeTodo(todo)
       	console.log('运行了')
       	
       
    }
    
  }
}
</script>

<style scoped>

	#circle{
		fill: rgb(88,208,67);
	}
	ul li{

		margin: 8px auto;
		display: flex;
		align-content: center;
		height: 45px;

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