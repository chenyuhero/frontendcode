<template>
	<div>
	<div id="home">
		<div class="pic" >
			<div class="type">
			<h1>Stay foolish,stay hungry.</h1>
			
			
			</div>
		</div>
		
	</div>
		
	</div>
</template>

<script>
	export default{
		
		
	}
</script>
<style>
	
	@keyframes type{
    from { width: 0;}
	}
	#home{
	width:1280px;
	color:white;
	display:inline-flex;
    justify-content: space-around;
    align-items: center;
	}
	.pic{
	height:580px;
	width:1280px;
	background:url(https://cdn.dribbble.com/users/31752/screenshots/1613357/computer_desk.png) no-repeat ;
	}
	
	.type{
	text-align:left;
	height:330px;
	width:500px;
	float:right;
	margin-top:150px;
	
	}
	.type >h1{
		 width:100%;
		animation: type 2s steps(50, end) forwards;
	}
</style>