
<template>
 
    <div>
        <div class="title">
          <h1>作品展示</h1>

        </div>
        <el-row :gutter="30">

        <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>

        <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>

      <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>
        
      </el-row>
      <el-row :gutter="30">

        <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>

        <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>

      <el-col :span="8"><div class="grid-content ">
        <a href="#" class="thumbnail">
        <img alt="" src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2494033972,1701145325&fm=27&gp=0.jpg" style="height: 300px; width: 400px; display: block;" >
      </a>
      <div class="dis">
       <h3>描述</h3>
       <span>项目描述</span> 
      </div>
      </div></el-col>
        
      </el-row>
    </div>
  
</template>
<style>
  
  .el-row {
    margin-bottom: 30px;
    &:last-child {
      margin-bottom: 0;
    }
  }
   
  .grid-content {
    
    background-color: #f9fafc;
    border-radius: 4px;
    min-height: 36px;
  }
  .grid-content:hover{
  background:#F2F5FA;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
  .title{
  margin:60px auto;
  }
  .dis{

  display:inline-block;
  margin:20px auto;
  }
</style>