<template>
	
	
	<div>
			<div class="show">
			  <h2 class="title">作品展示</h2>
			  	<div>
			  		<div class="workitem">
						<div class="name">
							<h3>在线音乐FM</h3>
						</div>
						
						<img class="img" src="../assets/myfm.png"> </img>
						
						<div id="discribe">
							<h3>项目介绍:</h3>
							<p>
							使用原生 JS，借助 Canvas API 和动态 REM 方案（flexible.js）以及svg iconfont制作的手机画板。 
							包含橡皮擦、一键擦除、保存图片的功能，期间主要难点在于如何确定上一个触点的位置以及消除画笔锯齿， 所有功能基本上由canvas原生API实现。
							</p>
							

							<h3>涉及技术:</h3>	
							
							<p>A+b+c</p>
						</div>
						<div class="link">
							<div class="button">
								<a href="">在线预览</a>
								<a href="">Git</a>
							</div>
							
						</div>	
					
					</div>
					<div class="workitem">
						<div class="name">
							<h3>瀑布流新闻</h3>
						</div>
						
						<img class="img" src="../assets/News.png"> </img>
						
						<div id="discribe">
							<h3>项目介绍:</h3>
							<p>
							使用原生 JS，借助 Canvas API 和动态 REM 方案（flexible.js）以及svg iconfont制作的手机画板。 
							包含橡皮擦、一键擦除、保存图片的功能，期间主要难点在于如何确定上一个触点的位置以及消除画笔锯齿， 所有功能基本上由canvas原生API实现。
							</p>
							

							<h3>涉及技术:</h3>	
							
							<p>A+b+c</p>
						</div>
						<div class="link">
							<a href="">在线预览</a>
							<a href="">Git</a>
						</div>	
					
					</div>
					<div class="workitem">
						<div class="name">
							<h3>Todolist</h3>
						</div>
						
						<img class="img" src="../assets/todo.png"> </img>
						
						<div id="discribe">
							<h3>项目介绍:</h3>
							<p>
							使用原生 JS，借助 Canvas API 和动态 REM 方案（flexible.js）以及svg iconfont制作的手机画板。 
							包含橡皮擦、一键擦除、保存图片的功能，期间主要难点在于如何确定上一个触点的位置以及消除画笔锯齿， 所有功能基本上由canvas原生API实现。
							</p>
							

							<h3>涉及技术:</h3>	
							
							<p>A+b+c</p>
						</div>
						<div class="link">
							<a href="">在线预览</a>
							<a href="">Git</a>
						</div>	
					
					</div>
					<div class="workitem">
						<div class="name">
							<h3>Todolist</h3>
						</div>
						
						<img class="img" src="../assets/todo.png"> </img>
						
						<div id="discribe">
							<h3>项目介绍:</h3>
							<p>
							使用原生 JS，借助 Canvas API 和动态 REM 方案（flexible.js）以及svg iconfont制作的手机画板。 
							包含橡皮擦、一键擦除、保存图片的功能，期间主要难点在于如何确定上一个触点的位置以及消除画笔锯齿， 所有功能基本上由canvas原生API实现。
							</p>
							

							<h3>涉及技术:</h3>	
							
							<p>A+b+c</p>
						</div>
						<div class="link">
							<a href="">在线预览</a>
							<a href="">Git</a>
						</div>	
					
					</div>



			  	</div>
				
			</div>
	</div>	
			
	
	
</template>
<script>
	
	export default{
		
	}
	
</script>
<style scoped>
	.title{
		margin-top:30px;
	}
	.show{
		margin:100px auto;
		width:1280px;
		display:inline-block;
	}
	.workitem{
		background: rgb(255,255,255);
		border: 1px solid rgb(228,228,228);
		margin: 32px auto;
		box-shadow: 5px 5px 5px #8888A4;
	}
	#discribe {
		text-align: left;
		display:inline-block; 
		padding: 16px 16px;
		font-size: 18px;
	}
	.link{
		border: 1px solid rgb(228,228,228);
		height: 50px;

	}
	.link a{
		text-decoration: none;
		border: 1px solid rgb(238,238,238);
		border-radius:5px;  
		height: 30px;
		width: 75px;
		padding: 5px 5px;
		display: inline-block;
		float: right;
		margin: 10px 20px;

	}
	.name{
		height: 50px;
	}
	.name >h3{
		display: block;
		padding: 15px 0;
	}
	.img{
		width: 800px;

	}
</style>