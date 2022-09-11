<template>
    <div class="container">
        <h2 class="text-center">Criar novo Aluno</h2>
        <div class="row container-fluid">
            <div class="col-md-12">
                <router-link :to="{ name: 'AlunosIndex' }" class="btn btn-primary btn-sm float-right mb-2">Voltar</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="row container-fluid">
                        <div class="col-md-6">
                            <label>Nome</label>
                            <input type="text" class="form-control" v-model="aluno.nome">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input type="text" class="form-control" v-model="aluno.email">
                        </div>
                    </div>

                    <div class="container-fluid mt-3">
                        <button type="button" class="btn btn-success" @click="createAluno()">Salvar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                aluno: {}
            }
        },
        methods: {
            createAluno() {
                this.axios.post('http://127.0.0.1:8000/api/alunos', this.aluno)
                    .then(response => {
                        this.$router.push({ name: 'AlunosIndex' })
                    })
                    .catch(error=>{
                      console.log(error)
                    })
            }
        }
    }
</script>
