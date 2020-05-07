<template>
    <div class="container">
       <button class="btn btn-primary ml-3" @click="followUser" v-text="buttonText" >Follow</button>
    </div>
</template>

<script>
    export default {
        //Propriedades vindo da view do blade  (mesmo nome)
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        //Propriedade do botão (texto)
        data: function () {
            return {
                status: this.follows
            }
        },
        methods: {
            //Ao clicar em um botão...
             followUser() {
                 axios.post('/follow/'+ this.userId).then(response =>  {
                     this.status = !this.status;
                     console.log(response.data);
                 })
                 //Captura o erro e redireciona o usuario, pois o mesmo não pode seguir alguém sem estar logado
                 .catch( error => {
                    if(error.response.status == 401){
                        window.location = '/login';
                    }

                 });
            }
        },
        computed: {
            //Função para alterar o texto do botão
            buttonText(){
                return (this.status) ? 'Unfollow' :  'Follow';
            }
        }
     }
</script>
