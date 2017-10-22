<template>

       
      <div id="page" v-bind:class="{show : hide}">
        <header>
           <Topbar class="topbar" v-bind:currentUser="currentUser" v-on:logout='logout'/>
           <Login v-bind:user="user"  v-on:login="login" v-on:signUp="signUp" v-bind:log="log"/>
        </header>
        <main v-if='log'>
            <ResumeEditor id="editor" v-bind:resume="resume" />
            <ResumePreview id="preview" v-bind:resume="resume" />
            <Action class="actionbar" v-on:preview="preview" v-on:saveOrUpdateTodos="saveOrUpdateTodos"  v-bind:resume="resume"/>
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
       this.currentUser = this.getCurrentUser();
       this.fetchTodos()
       document.body.insertAdjacentHTML('afterbegin',icons)
     },
  name: 'app',
  store,
  components: {Topbar,ResumeEditor,ResumePreview,Action,Login},
  data(){
    return {
      hide : false,
      log : false,
      user:{
          formData:{
            username:'',
            password:''
        }
      },
      resume:{
        currentColor:6,
        profile:{
        name:'李雷',
        city:'北京',
        age:'10'
      },
      workHistory:[
        { company:'新世纪英语', content:'说英语'}

      ],
      StudyHistory:[
        {school:'北京市二小',duration:'2000-2017',degree:'小学'}

      ],
      ProjectHistory:[
        {projectName:'' ,projectContent:''  }
      ],
      Award:[

        {awardName:'新世纪英语',awardContent:'日常对话'}
      ],
      Cantant:
        {QQ:'123456',phone:'13888888888',mail:'123456@139.com'}
      
      }
    }
  },
  methods:{
    fetchTodos: function(){
       if(this.currentUser){
         var query = new AV.Query('AllTodos');
         query.find()
            .then((todos) => {
             let avAllTodos = todos[0] 
             let id = avAllTodos.id
             this.resume = JSON.parse(avAllTodos.attributes.content) 
             this.resume.id = id 
           }, function(error){
             console.error(error) 
           })
       }
     },
    saveOrUpdateTodos: function(){
       if(this.resume.id){
         this.update()
       }else{
         this.save()
       }
     },
    update: function(){
       let dataString = JSON.stringify(this.resume) 
       let avTodos = AV.Object.createWithoutData('AllTodos', this.resume.id)
       avTodos.set('content', dataString)
       avTodos.save().then(()=>{
         console.log('更新成功')
       })
     },
    save: function(){
       let dataString = JSON.stringify(this.resume)
       var AVTodos = AV.Object.extend('AllTodos');
       var avTodos = new AVTodos();
       var acl = new AV.ACL()
       acl.setReadAccess(AV.User.current(),true) 
       acl.setWriteAccess(AV.User.current(),true) 
       avTodos.set('content', dataString);
       avTodos.setACL(acl)
       avTodos.save().then( (resume)=> {
         this.resume.id = resume.id
         console.log(todo.id)
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
            this.currentUser = this.getCurrentUser();
            alert("注册成功")
          }, function (error) {
            alert("注册失败")
          });
        },
    login: function () {
          AV.User.logIn(this.user.formData.username, this.user.formData.password).then( (loginedUser) =>{
            this.currentUser = this.getCurrentUser();
            this.log = true;
            window.location.reload()
          }, function (error) {
              alert("登陆失败")
          });
        },
   getCurrentUser: function () { 
          let current = AV.User.current()
          if (current) {
             this.log = true;
             let {id, createdAt, attributes: {username}} = current
             return {id, username, createdAt} 
          } else {
             return null
          }
      },
    logout: function () {
       AV.User.logOut()
       this.currentUser = null
       window.location.reload()
      },

     
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
