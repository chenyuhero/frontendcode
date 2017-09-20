<template>
    <div id="page" v-bind:class="{show : hide}">
        <header>
           <Topbar class="topbar" v-on:preview="preview"/>
        </header>
        <main>
            <ResumeEditor id="editor" v-bind:resume="resume"/>
            <ResumePreview id="preview" v-bind:resume="resume"/>
            <button class="exitpreview" @click="exitpreview">退出预览</button>
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

      hide : false,
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
  methods:{
    exitpreview(){
      this.hide = false
    },
    preview(){
      this.hide=true
     }
  }

 
}
</script>

<style lang="scss">
  #page{
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
  .resumeEditor{
  width: 35%;
  background: #444;
  }

  #resumePreview{
   
  }
  svg.icon{
    height: 1em;
    width: 1em;
    fill: currentColor;
    vertical-align: -0.1em;
    font-size:16px;
  }
.show .topbar{
  display:none;
}
.show #editor{
  display:none;
}
.show #preview{
  margin:32px auto;
  max-width:800px;
}
.exitpreview{
  display:none;
  width:72px;
  height:32px;
  border:none;
  cursor:pointer;
  font-size:18px;
  background:#ddd;
  color:#222;

}
.show .exitpreview{
  display:inline-block;
  position:fixed;
  bottom:100px;
  right:100px;

}
</style>
