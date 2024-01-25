<script>
import axios from 'axios';

export default{
  name: 'TodoList',
  data(){
    return{
        todos: [],
    }
  },
  mounted(){
    const t = this;

    axios.get('http://localhost/php-todo-list-json/todoApi.php')
    .then(res => {
        console.log(res.data);
        t.todos = res.data;
    })
    .catch(err => console.log(err));
  }
}
</script>

<template>
    <h1>To do list</h1>
    <ul>
        <li v-for="(todo, index) in todos" :key="index">{{ todo.type }}</li>
    </ul>
</template>

<style>

</style>
