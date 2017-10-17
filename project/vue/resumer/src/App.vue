<template>

       
      <div id="page" v-bind:class="{show : hide}">
        <header>
           <Topbar class="topbar"/>
           <Login/>
        </header>
        <main class="beforelogin">
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
  import Login from './components/Login'
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
  components: {Topbar,ResumeEditor,ResumePreview,Action,Login},
  data(){
    return {

      hide : false,
      resume:{
        profile:{
        name:'梁朝伟',
        city:'香港',
        age:'55'
      },
      workHistory:[
        { company:'三合会', content:'小弟'}

      ],
      StudyHistory:[
        {school:'黄日成警官学院',duration:'1',degree:'学士'}

      ],
      ProjectHistory:[
        {projectName:'训练' ,projectContent:'坚持训练'  }
      ],
      Award:[

        {awardName:'影帝',awardContent:'最佳内鬼'}
      ],
      Cantant:
        {QQ:'12345678',phone:'13888888888',mail:'liangchawei@163.com'}
      
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
  >.afterlogin{
    display:none;
  }

  >main{
  display:flex;
  justify-content:space-between;
  align-self:center;
  width:100%;
  } 
  .beforelogin{
    display:none;
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
  overflow:inherit;
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
