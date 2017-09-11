<template>
  <div id="app">
      
    <Navibar class="navibar"/>
    <main>
     <Home class="home"/>
     <Works class="work"/>
    </main>
    
  </div>
</template>

<script>
import Navibar from './components/Navibar'
import Home from './components/Home'
import Works from './components/Works'

export default {
  name: 'app',
  components: {
  
    Navibar,
    Home,
    Works
  }
}
</script>

<style>
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
.work{
  width:1280px;
  display:inline-block;
  margin:50px auto;
}
</style>
