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
            index: index
        };

        axios.get("http://localhost/php-todo-list-json/removeTask.php", params)
            .then(res => {
            t.todos = res.data;
            })
            .catch(err => console.log(err));
    },
    toggleTask(index){
        const params = {
            index: index
        };
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        };
        axios.post("http://localhost/php-todo-list-json/toggleTask.php", params, config)
        .then(res => {
            this.todos = res.data;
        })
        .catch(err => console.log(err));
    }
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
        <input type="text" name="text" v-model="userText">
        <input type="submit" value="aggiungi">
        <ul>
            <li v-for="(todo, index) in todos" :key="index" @click="toggleTask(index)">
                <del v-if="todo.done">
                    {{ todo.type }} <i class="fa-solid fa-x" @click="removeTask(index)"></i>
                </del>
                <span v-else>
                    {{ todo.type }} <i class="fa-solid fa-x" @click="removeTask(index)"></i>
                </span>
                
            </li>
        </ul>
    </form>
    
</template>

<style>
    li{
        cursor: pointer;
    }

    i{
        margin-left: 50px;
        font-size: 12px;
    }
</style>
