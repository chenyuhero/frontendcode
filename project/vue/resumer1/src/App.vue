<template>
<div class="page">
  <header>
    <Topbar/>
  </header>

  <main> 
    <ResumerEditor/>
    <ResumerPreview/>
  </main>
  
</div>


</template>

<script>
 import './assets/reset.css'
 import 'normalize.css/normalize.css'
 import Topbar from './components/Topbar'
 import ResumerEditor from './components/ResumerEditor'
 import ResumerPreview from './components/ResumerPreview'
 import icons from './assets/icons'
 
export default {
  name: 'app',
  data: function () {
    return {
      text: '你好'
    }
  
},
  components:{Topbar,ResumerEditor,ResumerPreview},
  created(){
  document.body.insertAdjacentHTML('afterbegin', icons)
  }
}
</script>

<style lang="scss">
   .page{
     height: 100vh;
     display: flex;
     flex-direction: column;
     background: #EAEBEC;
  
   >main{
     flex-grow: 1;  
   }
 
   >main{
     min-width: 1024px;
     max-width: 1440px;
     margin-top:16px;
     margin-bottom:16px;
     display: flex;
     justify-content: space-between;
     padding:0 16px;
     align-self:center;
     width:100%;
   }
 }
   #resumeEditor{
     width: 35%;
     background: #444;
   }
   #resumePreview{
     flex-grow:1;
     margin-left:16px;
     background: #777;
   }
    svg.icon{
     height: 1em;
     width: 1em;
     fill: currentColor;
     vertical-align: -0.1em;
     font-size:16px;
   }

</style>
