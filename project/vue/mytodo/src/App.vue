<template>
  <div id="app">
     
    <Topbar/>
    
     
    <Todo />
     
    
    
  </div>
</template>

<script>

import Topbar from './components/Topbar'
import Todo from './components/Todo'

export default {
  name: 'app',
  components: {
      Topbar,
      Todo,
   },


}
</script>

<style>
ul li{
  list-style: none;
}
a {
  text-decoration: none;
}
#app {
    background:url(https://thumbs.dreamstime.com/z/%E8%80%81%E4%B9%A6%E5%BC%80%E5%BC%A0-4184358.jpg);
    background-size:80px 60px;
    background-repeat:no-repeat;
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  
}
.icon {
   width: 1em; height: 1em;
   vertical-align: -0.15em;
   fill: currentColor;
   overflow: hidden;
}

</style>
