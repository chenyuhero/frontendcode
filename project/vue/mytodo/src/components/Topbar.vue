<template>
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
		                		
		                		<input type="text" placeholder="邮箱" v-model="formData.username" >
		                	</div>
		                    <div class="inputbox">
		                    	
								<input  type="password" placeholder="密码" v-model="formData.password">
		                    </div>
		                    <div class="inputbox">
		                    	
								<input  type="password" placeholder="确认密码" v-model="formData.password">
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
	                		   	<input type="text" v-model="formData.username" placeholder="邮箱" >
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


</template>

<script>
  import AV from 'leancloud-storage'	
  export default {
  	created:function(){
  		this.currentUser = this.getCurrentUser();
  		if(this.currentUser){
       	var query = new AV.Query('AllTodos');
       	query.find()
         .then( (todos)=> {
           let avAllTodos = todos[0]
           let id = avAllTodos.id
           this.todoList = JSON.parse(avAllTodos.attributes.content1)
           this.todoList.id = id
         }, function(error){
           console.error(error) 
         })
     }
  	},
    data() {
      return {
      	loginr : false ,
      	hidel : false ,
      	actionType:'signUp',
      	currentUser: null,
      	formData:{
      		username:'',
      		password:''
      	}
      }
    },
    methods: {
    signUp: function () {
      let user = new AV.User();
      user.setUsername(this.formData.username);
      user.setPassword(this.formData.password);
      user.signUp().then((loginedUser) => { // 👈，将 function 改成箭头函数，方便使用 this
        this.currentUser = this.getCurrentUser() // 👈
        console.log("我运行了")
      }, (error) => {
        alert('注册失败') // 👈
      });
    },
    login: function () {
      AV.User.logIn(this.formData.username, this.formData.password).then((loginedUser) => { // 👈
        this.currentUser = this.getCurrentUser() // 👈
      }, function (error) {
        alert('登录失败') // 👈
      });
    },
    getCurrentUser: function () { // 👈
     let current = AV.User.current()
       if (current) {
         let {id, createdAt, attributes: {username}} = current
         // 上面这句话看不懂就得看 MDN 文档了
         // 我的《ES 6 新特性列表》里面有链接：https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/Destructuring_assignment
         return {id, username, createdAt} // 看文档：https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/Object_initializer#ECMAScript_6%E6%96%B0%E6%A0%87%E8%AE%B0
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
<style scoped >
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