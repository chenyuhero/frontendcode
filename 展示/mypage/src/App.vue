<template>
  <div id="app">
      
    <Navibar class="navibar"/>
    <main>
      <Carousel/>

    </main>
    
  </div>
</template>

<script>
import Navibar from './components/Navibar'
import Carousel from './components/Carousel'

export default {
  name: 'app',
  components: {
  
    Navibar,
    Carousel
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
  background:rgb(26,117,252);
  height:70px;
}
</style>
