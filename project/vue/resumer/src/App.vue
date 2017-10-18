<template>

       
      <div id="page" v-bind:class="{show : hide}">
        <header>
           <Topbar class="topbar" v-bind:user="user" v-on:logout='logout'/>
           <Login v-bind:user="user" v-on:login="login" v-on:signUp="signUp"/>
        </header>
        <main v-if="user.currentUser">
            <ResumeEditor id="editor" v-bind:resume="resume"/>
            <ResumePreview id="preview" v-bind:resume="resume"/>
            <Action class="actionbar" v-on:preview="preview" v-on:save="save"/>
            <button class="exitpreview" @click="exitpreview">退出预览</button>
       </main>

    </div>



    
</template>

<script>
  import AV from 'leancloud-storage'
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
      user:{
        currentUser:'',
        formData:{
          username:'',
          password:''
        }
      },
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
    save: function(){
       let dataString = JSON.stringify(this.resume)
       var AVTodos = AV.Object.extend('AllTodos');
       var avTodos = new AVTodos();
       var acl = new AV.ACL()
       acl.setReadAccess(AV.User.current(),true) // 只有这个 user 能读
       acl.setWriteAccess(AV.User.current(),true) // 只有这个 user 能写
       avTodos.set('content', dataString);
       avTodos.setACL(acl)
       avTodos.save().then(function (todo) {
         alert('保存成功');
       }, function (error) {
         alert('保存失败');
       });
     },
    exitpreview(){
      this.hide = false
    },
    preview(){
      this.hide=true
     },
    signUp: function () {
          let user = new AV.User();
          user.setUsername(this.user.formData.username);
          user.setPassword(this.user.formData.password);
          user.signUp().then( (loginedUser)=> {
            this.user.currentUser = this.getCurrentUser();
            alert("注册成功")
          }, function (error) {
            alert("注册失败")
          });
        },
    login: function () {
          AV.User.logIn(this.user.formData.username, this.user.formData.password).then( (loginedUser) =>{
            this.user.currentUser = this.getCurrentUser();
          }, function (error) {
              alert("登陆失败")
          });
        },
    getCurrentUser: function () { 
           let current = AV.User.current()
       if (current) {
         let {id, createdAt, attributes: {username}} = current
         return {id, username, createdAt} 
       } else {
         return null
       }
        },
    logout: function () {
       AV.User.logOut()
       this.user.currentUser = null
       window.location.reload()
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
