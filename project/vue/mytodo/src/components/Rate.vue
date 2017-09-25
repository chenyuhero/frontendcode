<template>
	<div>
		
		<div>
			<div class="bar bar1">重要并且紧急</div>
			<div class="bar bar2">重要但不紧急</div>
			<div class="bar bar3">紧急但不重要</div>
			<div class="bar bar4">不重要不紧急</div>
		</div>
		

	</div>

</template>

<style>
	.bar{
		cursor: pointer;
		display: flex;
		align-items: center;
		height: 45px;
		padding:0px 8px;
		margin-bottom: 8px;

	}
	.bar1{
		background:rgb(255,237,231);
		color: rgb(247,121,51);
	}
	
	.bar2{
		background:rgb(255,239,203);
		color: rgb(255,174,137);
	}
	.bar3{
		background: rgb(214,244,254);
		color:rgb(32,160,255);
	}
	.bar4{
		background:rgb(238,255,221);
		color: rgb(137,197,87);
	}
	

</style>