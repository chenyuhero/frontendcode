<template>
	
	<div>
		
		<div class="download">
			
			<button>下载我的简历</button>

		</div>
		<div class="anno">
			<div class="power">Copyright © My Website 2017</div>
			<div class="logo">
				<a>
				<svg class="icon" >
			    <use xlink:href="#icon-weibo"></use>
				</svg>
				</a>
				<a>
				<svg class="icon" >
			    	<use xlink:href="#icon-git"></use>
				</svg>
				</a>
				<a>
				<svg class="icon" >
			   		 <use xlink:href="#icon-twitter"></use>
				</svg>
				</a>
			</div>
			<div class="cha">
			<a >Privacy Policy</a>
			<a >Terms of Use</a>
			</div>
		</div>
	</div>

</template>
<style>

	.anno{
		margin:30px auto;
		width:1280px;
		display:flex;
	 	justify-content:space-between;
	 	align-items:center;
		
	}

	.power{
		font-size:20px;
		
	}
	.logo{
		position:relative;
		left:-10px;
	}
	.logo >a{
		padding: 0 18px;
	}
	.logo >a:hover {
		color:rgb(60,174,162);
	}
	.cha{
		cursor:pointer;
		color:rgb(60,174,162);
		font-size:20px;
	}
	.cha > a:hover{
		color: rgb(29,29,29);
	}
	.download> button{
		border-radius:5px;
		margin-bottom:25px;
		height:60px;
		width:250px;
		background:rgb(241,196,15);
		font-size:20px;
	}

	.download> button:hover{
	 color:white;
	}
</style>