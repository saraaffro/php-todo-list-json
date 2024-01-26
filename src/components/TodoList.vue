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
    addTask(){
        const t = this;

        const params = {
            text: this.userText,
        };
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            };

        axios.post('http://localhost/php-todo-list-json/addTask.php', params, config)
            .then(res => {
            t.todos = res.data;
            t.userText = "";
            
            }).catch(err => console.log(err));
    },
    removeTask(index) {

        const t = this;
        const params = {
            params: {
                index: index
            }
        };

        axios.get("http://localhost/php-todo-list-json/removeTask.php", params)
            .then(res => {
            t.todos = res.data;
            })
            .catch(err => console.log(err));
    },
  },
  mounted(){
    const t = this;

    axios.get('http://localhost/php-todo-list-json/getTodo.php')
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
    <form @submit.prevent="addTask">
        <input type="text" name="text" v-model="userText" @keyup.enter="addTask">
        <input type="submit" value="Invia" @click="addTask">
        <ul>
            <li v-for="(todo, index) in todos" :key="index">{{ todo.type }} <button @click="removeTask(index)">remove</button></li>
        </ul>
    </form>
    
</template>

<style>
    li{
        cursor: pointer;
    }
</style>
