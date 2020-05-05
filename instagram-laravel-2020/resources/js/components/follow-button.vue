<template>
    <div class="container">
       <button class="btn btn-primary ml-3" @click="fallowUser">Fallow</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {

             fallowUser() {
                return alert('oi');
            }
        }
     }
</script>
