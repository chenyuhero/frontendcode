<template>
	<div>
		<ul>
      		<li v-for="done in doneList">
      			{{done.title}}
      		</li>	
      	</ul>
	</div>

</template>

<style>
	


</style>
<script >
	 export default {
	 	props:['doneList']

	 }



</script>