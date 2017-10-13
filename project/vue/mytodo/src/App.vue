<template>
  <div id="app">
    
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
