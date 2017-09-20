<template>
    <div class=page>
        <header>
            <Topbar/>
        </header>
        <main>
            <ResumeEditor v-bind:resume="resume"/>
            <ResumePreview v-bind:resume="resume"/>
        </main>
    </div>
</template>

<script>

  import './assets/reset.css'
  import 'normalize.css/normalize.css'

  import Topbar from './components/Topbar'
  import ResumeEditor from './components/ResumeEditor'
  import ResumePreview from './components/ResumePreview'
  import icons from './assets/icons'
  import store from './store/index'




export default {
  created(){
    document.body.insertAdjacentHTML('afterbegin',icons)
  },
  name: 'app',
  store,
  components: {Topbar,ResumeEditor,ResumePreview},
  data(){
    return {
      resume:{
        profile:{
        name:'',
        city:'',
        age:''
      },
      workHistory:[
        { company:'', content:''}

      ],
      StudyHistory:[
        {school:'',duration:'',degree:''}

      ],
      ProjectHistory:[
        {projectName:'' ,projectContent:''  }
      ],
      Award:[

        {awardName:'',awardContent:''}
      ],
      Cantant:
        {QQ:'',phone:'',mail:''}
      
      }
    }
  },


 
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
  min-width:1024px;
  max-width:1440px;
  margin-top:16px;
  margin-bottom:16px;
  display:flex;
  justify-content:space-between;
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
    background:　#777;
  }
  svg.icon{
    height: 1em;
    width: 1em;
    fill: currentColor;
    vertical-align: -0.1em;
    font-size:16px;
  }
</style>
