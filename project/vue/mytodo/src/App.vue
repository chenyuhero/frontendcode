<template>
  <div id="app">
     
    <Topbar/>
    <main class="layout">
      <Rate class="rate"/>
      <Todo class="todo"/>
      <Done class="done"/>
    </main>
    
  </div>
</template>

<script>

import Topbar from './components/Topbar'
import Rate from './components/Rate'
import Todo from './components/Todo'
import Done from './components/Done'
export default {
  name: 'app',
  components: {
      Topbar,
      Todo,
      Done,
      Rate
  }
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
.layout{
  margin: 16px auto;
  width: 1240px;
  display: inline-flex;
  }
  .rate{
    width: 200px;
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
