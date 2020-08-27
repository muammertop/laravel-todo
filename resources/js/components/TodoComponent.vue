<template>
    <div>
        <div class="card">
            <div class="card-header">Todo Add</div>
            <div class="card-body">
                <div class="form-group d-flex">
                    <input type="text" class="form-control" :class="errors.todo ? 'is-invalid' : ''" v-model="todo" placeholder="Todo...">
                    <button class="btn btn-success ml-2" @click="createTodo">Add</button>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">Todo List</div>
            <div class="card-body">
                <div class="form-group d-flex">
                    <input type="text" class="form-control" v-model="searchField" @keydown="getAllTodos()" placeholder="Search...">
                </div>
                <ul class="list-group">
                    <li v-for="todo in todos.data" :key="todo.id" class="list-group-item d-flex">
                        {{ todo.todo }}
                        <a :href="'/editTodo/' + todo.id" role="button" class="btn btn-primary btn-sm ml-auto">Edit</a>
                        <button class="btn btn-danger btn-sm ml-2" @click="removeTodo( todo.id )">Remove</button>
                    </li>
                </ul>
                <pagination :data="todos" @pagination-change-page="getAllTodos" class="float-right mt-2"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todo: '',
            todos: [],
            searchField: '',
            errors: [],
        }
    },
    props: ['user_id'],
    mounted() {
        this.getAllTodos();
    },
    methods: {
        createTodo(){
            axios.post('/create-todo', {
                todo: this.todo,
            }).then(res => {
                this.getAllTodos();
                this.todo = '';
            }).catch((err)=>{
                this.errors = err.response.data.errors;
            });
        },

        getAllTodos(page = 1) {
            axios.get('/getTodosForUser?page=' + page + '&search=' + this.searchField).then(res => {
                    this.todos = res.data;
                });
        },

        removeTodo($id){
            axios.post('/removeTodo', {id: $id}).then(res => {
                this.getAllTodos();
                console.log(res.data);
            })
            console.log($id);
        }
    },
}
</script>

<style>

</style>
