<template>
	<div id="topbar">

		<div class="wrapper">
			<span class="logo">Todo
				<svg class="icon" aria-hidden="true">
				<use xlink:href="#icon-dui"></use>
				</svg>
			</span>
			<div class="actions">
				<el-button @click="login"  >登录</el-button>
				<el-button @click="regist" type="primary">注册</el-button>
				
			</div>
		</div>

		<div v-bind:class="{show : loginr}" >
			<div id="regist" >
			  	<div class="panel">
			  	
			  		<header>
                    	<span class="close" @click="close">×</span>
                   		<h3>现在Todo
                    		<svg class="icon" aria-hidden="true">
    							<use xlink:href="#icon-dui"></use>
							</svg>
						</h3>
            	    </header>
                	<main>
	                    <el-input class="input"  placeholder="邮箱"></el-input>
	                    <el-input class="input"  placeholder="密码"></el-input>
	                    <el-input class="input"  placeholder="确认密码"></el-input>
                	</main>
	                <footer>
	                	<div>
	                		<el-button type="primary">提交注册</el-button>
	                	</div>
							
	                </footer>
        		</div>
		    </div>		
       </div>		

		<div v-bind:class="{hide : hidel}">
			<div id="login"  >
			  	<div class="panel">
			  	  	<header>
	                    <span class="close" @click="close">×</span>
	                    <h3>现在Todo
	                    	<svg class="icon" aria-hidden="true">
	    					<use xlink:href="#icon-dui"></use>
							</svg>
						</h3>
	                </header>
	                <main>
	                    <el-input class="input"  placeholder="邮箱"></el-input>
	                    <el-input class="input"  placeholder="密码"></el-input>

	                </main>
	                <footer>
	                	<div>
	                		<el-button type="primary">登录</el-button>
	                	</div>
						<div>
							<el-button type="text">忘记密码</el-button>
							<el-button type="text">没有账号</el-button>
						</div>
					</footer>
			 	</div>
            </div>
		</div>
             
		

        
	</div>


</template>

<script>
  export default {
    data() {
      return {
      	loginr : false ,
      	hidel : false ,
       }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      login(){
      	this.hidel = true;
      	console.log("显示了登录")
      },
      regist(){
      	this.loginr = true;
      	console.log("显示了注册")
      },
      close(){
      	this.loginr = false;
      	this.hidel = false;
      	console.log("关闭")
      }
    }
  }
</script>
<style scoped >
	
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
		border-radius: 5px;
		border-radius: 5px;
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
	    background-color: #009688;
	    padding: 1px 16px;
	    color: #fff;
	}

 	 .panel .close {
	    float: right;
	    margin-top: 16px;
	    font-size: 20px;
	    cursor: pointer;
	}

	 .panel main {
	    padding: 16px;
	    
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
	
</style>