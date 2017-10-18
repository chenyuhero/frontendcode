<template>
	 	<div id="topbar">

			<div class="wrapper">
				<span class="logo">Resumer</span>
				<div class="actions">
					<el-button type="text" @click="logout" >{{currentUser.username}} </el-button>
				</div>
				
			</div>
		</div>
			
			
	
</template>
<script type="text/javascript">
	export default {
		props:['currentUser'],
		methods:{
			logout(){
				this.$emit('logout')
			}
		}
	}

</script>
<style scoped lang="scss">

	#topbar{
	display:fixed;	
	background: #ffffff;
	box-shadow:0 1px 3px 0 rgba(0,0,0,0.25);
	height:64px;
	
	 >.wrapper{
	min-width:1024px;
	max-width:1440px;
	margin:0 auto;
	height:64px;
	}
	  >.wrapper{

	display:flex;
	justify-content: space-between;
	align-items:center;
	}

	 .logo{
	font-size:24px;
	color:#02af5f;
	}
	}
	
</style>