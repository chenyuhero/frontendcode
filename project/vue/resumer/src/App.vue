<template>
    <div id="page" v-bind:class="{show : hide}">
        <header>
           <Topbar class="topbar" />
        </header>
        <main>
            <ResumeEditor id="editor" v-bind:resume="resume"/>
            <ResumePreview id="preview" v-bind:resume="resume"/>
            <Action class="actionbar" v-on:preview="preview"/>
            <button class="exitpreview" @click="exitpreview">退出预览</button>
        </main>

    </div>
</template>

<script>

  import './assets/reset.css'
  import 'normalize.css/normalize.css'

  import Action from './components/Action'
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
  components: {Topbar,ResumeEditor,ResumePreview,Action},
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
 
  >main{
    flex-grow: 1;
  }

  >main{
  display:flex;
  justify-content:space-between;
  align-self:center;
  width:100%;
  } 
  
  }
  .actionbar{
   width: 250px; 
   }
  #preview{
    max-width:900px;
  }
  .resumeEditor{
  width: 20%;
  background: #02af5f;
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
  max-width:900px;
}
.show .actionbar{
  display:none;
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
