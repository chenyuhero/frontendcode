<template>
	<div>
		
		<div class="newTask">
			<input v-bind:class="{showi:showi}" type="text" v-model="newTodo" @keypress.enter="addTodo" placeholder="输入任务，按Enter键完成">
        </div>
		
      <ol class="todos">
        <li v-for="todo in todoList">
       	  <input type="checkbox" v-model="todo.done"> {{ todo.title }}	
         
          <span v-if="todo.done">已完成</span>
          <span v-else>未完成</span>
           <button @click="removeTodo(todo)">X</button>
        </li>
      </ol>

	</div>
	 


</template>

<script >
	 export default {
	 	data(){
	 		return{
	 			showi : false,
	 			newTodo: '',
    			todoList: []
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
    addnew(){
    	this.showi=true
    	console.log("先领了")
    }
  }
}
</script>

<style>
	
	.bar{
		display: flex;
		justify-content: flex-start;
		align-items: center;
		margin-top:8px; 
		margin-left:8px;
		margin-right:8px;  
		margin-bottom: 0;
		height: 45px;
		background: rgb(214,244,254);
		color:rgb(32,160,255);
	}
	.bar span{
		padding: 8px;
	}
	
	.newTask  input{
	  	margin: 8px 8px;
	 	padding: 8px;
	 	border: none;
	 	background: rgb(214,244,254);
		width: 704px;
		height: 37px;
	}
	

</style>