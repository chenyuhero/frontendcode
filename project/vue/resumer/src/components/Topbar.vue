<template>
	 	<div id="topbar">

			<div class="wrapper">
				<span class="logo">Resumer</span>
				<div class="actions">
				</div>
				
			</div>
		</div>
			
			
	
</template>

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
	button{
	width:72px;
	height:32px;
	border:none;
	cursor:pointer;
	font-size:18px;
	background:#ddd;
	color:#222;
	&:hover{
		box-shadow:1px 1px 1px hsla(0,0,0,0.50);
	}
	&.primary{
	background:#02af5f;
	color:white;
	}
	}
	
	
	
	
	}
	
</style>