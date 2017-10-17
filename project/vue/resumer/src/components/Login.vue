<template>
	<div class="loginbox">
		<div class="panel">
	  		
	  			<header>
	  			<div class="switch">
	  				<div id="choosebotton" v-bind:class="{active:cur===0}" v-on:click="cur=0">登录</div><div id="choosebotton" v-bind:class="{active:cur===1}" v-on:click="cur=1" >注册</div>
	  			</div>
	  			         
                </header>
                <form v-bind:class="{formshow:cur === 1}">
	                <main>
	                	<div class="inputbox">
	                		<input type="text" placeholder="用户名"  >
	                	</div>
	                    <div class="inputbox">
	                    	<input  type="password" placeholder="密码" >
	                    </div>
	                    </main>
	                <footer>
	                	<div>
	                		<input class="inputbutton login" type="submit" value="登录">
	                	</div>
						                	
					</footer>
	  			</form>
	  			<form v-bind:class="{formshow:cur === 0}">
	                <main>
	                	<div class="inputbox">
	                		<input type="text" placeholder="用户名"  >
	                	</div>
	                    <div class="inputbox">
	                    	<input  type="password" placeholder="密码" >
	                    </div>
	                    </main>
	                <footer>
	                	<div>
	                		<input class="inputbutton regis" type="submit" value="注册">
	                	</div>
						                	
					</footer>
	  			</form>
	  	  	
		</div>
		
	</div>
</template>
<script type="text/javascript">
	export default {
		data(){
			return{
				cur:0
		}
	  }
	}
</script>

<style type="text/css">
	.formshow{
		display: none;
	}
	.loginbox{
		height: 100%;
	}
	.switch{
		padding: 5px 5px 5px 11px;
		display: flex;
		justify-content: space-between;
		align-content: center;
	}
	#choosebotton{
		cursor: pointer;
		height: 50px;
	    width: 100px;
	    padding: 15px 10px 10px 10px;
	    margin-right: 100px;
	    color: rgb(126,126,126);
	    font-weight: bold;
	}
	.active{
		border-bottom: 2px solid rgb(70,70,70);
		color: rgb(70,70,70);
	}
	.login{
		margin: 10px 20px 20px 118px;	
	}
	.regis{
		margin: 10px 20px 20px 27px;	
	}
	.inputbutton{
		height: 35px;
		width: 250px;
		border-radius: 12px;
		border: none;
		background:#02af5f;
		color: white;
		cursor: pointer; 
	}
	.inputbutton:focus{
		outline: none;
	}
	.inputbutton:hover{
		opacity: 0.8;
	}

	.panel{
		overflow: hidden;
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
	    padding: 1px 16px;
	    height: 57px;
	    border:1px solid #ddd;
	}

 	 .panel main .inputbox{
		margin: 22px 8px 23px 28px;
	}

	
	main input{
		height: 50px;
		width: 340px;
	}
	main input:focus{
		outline:  none;
	}
	
	
</style>