<template>
  <div id="app">
     
    <Topbar/>
    <main class="layout">
      <Todo class="todo"/>
      <Done class="done"/>
    </main>
    
  </div>
</template>

<script>

import Topbar from './components/Topbar'
import Todo from './components/Todo'
import Done from './components/Done'
export default {
  name: 'app',
  components: {
      Topbar,
      Todo,
      Done
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
.layout{
  margin: 16px auto;
  width: 1240px;
  display: inline-flex;
  }
.todo{
  
  border: 1px solid #CCCCCC;
  height: 800px;
  flex-grow: 1;
}
.done{
  
  border: 1px solid #CCCCCC;
  width: 500px;
}
</style>
