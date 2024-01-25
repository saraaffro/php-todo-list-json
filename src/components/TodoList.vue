<script>
import axios from 'axios';

export default{
  name: 'TodoList',
  data(){
    return{
        todos: [],
        userText: '',
    }
  },
  methods:{
    addTodo(){
        if(this.userText.length > 0){
            this.todos.push({type: this.userText, done: false});

            this.userText = '';
        }
    },
    doneTask(todo){
        todo.done = !todo.done;
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
    <input type="text" v-model="userText" @keyup.enter="addTodo">
    <input type="submit" value="Invia" @click="addTodo">
    <ul>
        <li v-for="(todo, index) in todos" :key="index" :class="todo.done ? 'done' : ''" @click="doneTask(todo)">{{ todo.type }}</li>
    </ul>
</template>

<style>
    .done{
        text-decoration: line-through;
    }
</style>
