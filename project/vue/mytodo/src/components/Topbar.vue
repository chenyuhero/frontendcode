<template>
	<div id="topbar">

		<div class="wrapper">
			<span class="logo">Todo</span>
			<div class="actions">
				<el-button>登录</el-button>
				<el-button type="primary">注册</el-button>
				
			</div>
		
		</div>
			<div class="regist">

			  
                <header>
                    <span class="close">×</span>
                    <h3>请登录</h3>
                </header>
                <main>
                    <el-input v-model="input" placeholder="邮箱"></el-input>
                    <el-input v-model="input" placeholder="密码"></el-input>

                </main>
                <footer>
                	<el-button>登录</el-button>
                </footer>
             
        </div>		


	</div>


</template>

<script>
  export default {
    data() {
      return {
        form: {
          mail: '',
          password: '',
          }
      }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      }
    }
  }
</script>
<style scoped >

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
	
	.regist{
		border: 1px solid red;
		height: 300px;
		width: 600px;
	}
	
	.panel main {
            padding: 16px;
    }

</style>