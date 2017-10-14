<template>
	<div>
		<div id="topbar">

		<div class="wrapper">
			<span class="logo">Todo
				<svg class="icon" aria-hidden="true">
				<use xlink:href="#icon-dui"></use>
				</svg>
			</span>
			<div class="actions" v-if="!currentUser">
				<el-button @click="showlogin" v-model="actionType" value="signUp">登录</el-button>
				<el-button @click="regist" type="primary" v-model="actionType" value="login">注册</el-button>
				
			</div>
			<div class="actions" v-if="currentUser">
				<el-button type="text">{{currentUser.username}}</el-button>
				<el-button  v-model="actionType" @click="logout" value="logoff">注销</el-button>
				
				
			</div>
		</div>

		<div v-bind:class="{show : loginr}" >
			<div id="regist" >
			  	<div class="panel">
			  		<form @submit.prevent='signUp' >
			  			<header>
	                    <span class="close" @click="close">×</span>
	                    <h3>现在Todo
	                    	<svg class="icon">
	    					<use xlink:href="#icon-dui"></use>
							</svg>
						</h3>
		                </header>
		                <main>
		                	<div class="inputbox">
		                		
		                		<input type="text" placeholder="用户名" v-model="formData.username" >
		                	</div>
		                    <div class="inputbox">
		                    	
								<input  type="password" placeholder="密码" v-model="formData.password">
		                    </div>
		                    <div class="inputbox">
		                    	<input  type="password" placeholder="确认密码" v-model="formData.repassword">
		                    </div>
		                 </main>
		                <footer>
		                	<div>
		                		<input class="inputbutton" type="submit" @click="close" value="提交">

		                	</div>
							                	
						</footer>

			  		</form>
			  	  	
			 	</div>
		    </div>		
       </div>		

		<div v-bind:class="{hide : hidel}">
			<div id="login"  >
			  	<div class="panel" >
			  		<form  @submit.prevent="login">
			  			<header>
	                    <span class="close" @click="close">×</span>
	                    <h3>现在Todo
	                    	<svg class="icon">
	    					<use xlink:href="#icon-dui"></use>
							</svg>
						</h3>
	                </header>
	                <main>
	                	<div class="inputbox">
	                		   	<input type="text" v-model="formData.username" placeholder="用户名" >
	                	</div>
	                    <div class="inputbox">
	                    	
							<input  type="password" v-model="formData.password" placeholder="密码">
	                    </div>
	                   
	                </main>
	                <footer>
	                	<div>

	                		<input class="inputbutton" type="submit"  @click="close" value="登录">

	                	</div>
						   	<a href="">没有账号?</a>
		                	<a href="">忘记密码</a>
					</footer>
			  		</form>
			  	  	
			 	</div>
            </div>
		</div>
                
		</div>

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
	</div>
	

</template>

<script >
	 import AV from 'leancloud-storage'
	 export default {
	 	data(){
	 		return{
	 			currentTab: 0,
	 			newTodo: '',
    			todoList:[[],[],[],[]],
    			doneList:[[],[],[],[]],
    			tags:['重要并且紧急','重要但不紧急','不重要但紧急','不重要不紧急'],
    			loginr : false ,
      			hidel : false ,
      			actionType:'signUp',
      			currentUser: null,
      			formData:{
		      		username:'',
		      		password:'',
		      		repassword:''
		      	 }
			 }

	 	},
	 	created:function(){
  			this.currentUser = this.getCurrentUser();
  			this.fetchTodos()
  		},
	 	
	  	methods: {
	  		 fetchTodos: function(){
	  		 	if(this.currentUser){
		       	var query = new AV.Query('AllTodos');
		       	query.find()
		         .then( (todos)=> {
		           let avAllTodos = todos[0]
		           let id = avAllTodos.id
		           this.todoList = JSON.parse(avAllTodos.attributes.do)
		           this.doneList = JSON.parse(avAllTodos.attributes.done)
		           this.todoList.id = id
		         }, function(error){
		           console.error(error) 
		         })
		      }
	  		 },
	  		updateTodos: function(){
		       // 想要知道如何更新对象，先看文档 https://leancloud.cn/docs/leanstorage_guide-js.html#更新对象
		       let dataString1 = JSON.stringify(this.todoList) // JSON 在序列化这个有 id 的数组的时候，会得出怎样的结果？
		       let dataString2 = JSON.stringify(this.doneList) 
		       let avTodos = AV.Object.createWithoutData('AllTodos', this.todoList.id)
		       avTodos.set('do', dataString1)
		       avTodos.set('done', dataString2);
		       avTodos.save().then(()=>{
		         console.log('更新成功')
		       })
		     },
		  	saveTodos:function(){
	 		 let dataString1 = JSON.stringify(this.todoList) 
		     let dataString2 = JSON.stringify(this.doneList) 
		     var AVTodos = AV.Object.extend('AllTodos');
      		 var avTodos = new AVTodos();
      		 var acl = new AV.ACL()
       		 acl.setReadAccess(AV.User.current(),true) 
       		 acl.setWriteAccess(AV.User.current(),true) 
      		 avTodos.set('do', dataString1);
      		 avTodos.set('done', dataString2);
      		 avTodos.setACL(acl)
      		 avTodos.save().then( (todo)=> {
        		// 成功保存之后，执行其他逻辑.
        		console.log(this.todo)
        		this.todoList.id = todo.id
        		
        	}, function (error) {
        		// 异常处理
        		 
      		 });
		    
		    		     
	 		},
			saveOrUpdateTodos: function(){
		       if(this.todoList.id){
		         this.updateTodos()
		       }else{
		         this.saveTodos()
		       }
		     },
	  		addTodo: function(i){
	  		  console.log(this.todoList[i])		
		      this.todoList[i].push({
		        title: this.newTodo,
		        createdAt: new Date(),
		        done: false // 添加一个 done 属性
		      })
		      this.newTodo = ''
		      this.saveOrUpdateTodos()
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
		     	  this.saveOrUpdateTodos()
		  		},
		 		  
	     	removeTodo: function(todo,i){
	      		let index = this.todoList[i].indexOf(todo) 
	      		this.todoList[i].splice(index,1) 
	      		this.saveOrUpdateTodos()
	    	},
	    	signUp: function () {
		      let user = new AV.User();
		      user.setUsername(this.formData.username);
		      user.setPassword(this.formData.password);
		      user.signUp().then((loginedUser) => { 
		        this.currentUser = this.getCurrentUser() 
		        alert('注册成功')
		      }, (error) => {
		        alert('注册失败') 
		      });
		     
		      
		    },
		    login: function () {
		      AV.User.logIn(this.formData.username, this.formData.password).then((loginedUser) => { // 👈
		        this.currentUser = this.getCurrentUser() 
		        this.fetchTodos()
		      }, function (error) {
		        alert('登录失败') 
		      });
		    },
		    getCurrentUser: function () { 
		       let current = AV.User.current()
		       if (current) {
		         let {id, createdAt, attributes: {username}} = current
		         return {id, username, createdAt} 
		       } else {
		         return null
		       }
		    },
		    logout: function () {
		       alert(this.currentUser.username + "注销成功")
		       AV.User.logOut()
		       this.currentUser = null
		       window.location.reload()

		      },
		  showlogin(){
		  	this.hidel = true;
		     },
		  regist(){
		  	this.loginr = true;
		     },
		  close(){
		  	this.loginr = false;
		  	this.hidel = false;
		  	
		  },
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
  		margin: 8px 8px;
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

	.inputbutton{
		height: 35px;
		width: 250px;
		border-radius: 12px;
		border: none;
		background:rgb(32,160,255);
		color: white;
		cursor: pointer; 
	}
	.inputbutton:focus{
		outline: none;
	}
	.inputbutton:hover{
		opacity: 0.8;
	}
	
	.show #regist{
		display: block;
	}

	.hide #login{
		display: block;
	}
	#topbar{
	background: #ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	height:75px;
	}

	.wrapper{
	min-width:1024px;
	max-width:1240px;
	margin:0 auto;
	height:75px;
	}
	.wrapper{
	display:flex;
	justify-content: space-between;
	align-items:center;
	}

	.logo{
	font-size:24px;
	color:#000000;
	}
	
	#regist {
		position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);


	}
	 #login{
		position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
        
	}
	
	.panel{
		overflow: hidden;
		border-radius: 10px;
		position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        height: 300px;
        transform: translate(-50%, -50%);
        background-color: #fff;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	 .panel header{

	    background-color:rgb(32,160,255);
	    padding: 1px 16px;
	    color: #fff;
	}

 	 .panel .close {
	    float: right;
	    margin-top: 16px;
	    font-size: 20px;
	    cursor: pointer;
	}

	 #login .panel main {
	    padding: 16px;
	    height: 115px;
	    
	}
	#regist .panel main {
	    padding: 16px;
	    height: 149px;
	    
	}

	 .panel main .input{
		margin: 8px auto;
	}

	#regist{
		display: none;
	}
	#login{
		display: none;
	}
	
	main input{
		height: 35px;
		width: 250px;
		border-top:none; 
		border-left:none; 
		border-right:none; 
	}
	main input:focus{
		outline:  none;
	}
	.inputbox{
		margin:8px auto;
	}
	footer a{
		color: #DEDEDE;
		display: inline-block;
		margin: 8px 8px;
	}
</style>