<template>
  <div id="app">
      
    <Navibar class="navibar"/>
    <main>
     <Home class="home"/>
     <About class="about"/>
     <Work class="work"/>
     <Contact class="contact"/>
     <Footer class="footer"/>

    </main>
    <div id="gotop">
      <svg class="icon" v-on:click="gotop">
             <use xlink:href="#icon-huojian"></use>
      </svg>
        
    </div>
    
  </div>
</template>

<script>
import Navibar from './components/Navibar'
import Home from './components/Home'
import Work from './components/Work'
import About from './components/About'
import Contact from './components/Contact'
import Footer from './components/Footer'

export default {
  name: 'app',
  components: {
  
    Navibar,
    Home,
    Work,
    About,
    Contact,
    Footer
  },
  methods:{
    gotop :function(){
      console.log(document.html.scrollTop)
     
      console.log('飞天')
    }

  }
}
</script>

<style>
.icon {
      
     width: 3.5em; height: 3.5em;
     vertical-align: -0.15em;
     fill: currentColor;
     overflow: hidden;
  }
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  
}
.navibar{
  background:rgb(60,174,162);
  height:70px;
}
.home{
  background:rgb(60,174,162);
  height:580px;
}
.about{
  width:1280px;
  margin:100px auto;
 }
.work{
  width:100%;
  background:rgb(247,247,247);
  }
  .contact{
     
     background:rgb(60,174,162);
  }
.footer{
  padding:30px 0;
  background:rgb(256,256,247);
}
#gotop svg{
    color: rgb(181,181,181);
    position: fixed;
    bottom:60px;
    right: 50px; 
    cursor: pointer;
  }
   #gotop i:hover{
    opacity: 0.8;
   }

</style>
