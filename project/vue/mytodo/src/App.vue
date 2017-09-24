<template>
  <div id="app">
     
    <Topbar/>
  </div>
</template>

<script>

import Topbar from './components/Topbar'
export default {
  name: 'app',
  components: {
    
    Topbar
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

.icon {
   width: 1em; height: 1em;
   vertical-align: -0.15em;
   fill: currentColor;
   overflow: hidden;
}

</style>
