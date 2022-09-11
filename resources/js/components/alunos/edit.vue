<template>
    <div class="container">
        <h2 class="text-center">Editar Aluno</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'AlunosIndex' }" class="btn btn-primary btn-sm float-right mb-2">Voltar</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="aluno.nome">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" v-model="aluno.email">
                    </div>
                    <button type="button" class="btn btn-primary" @click="updateAluno()"> Atualizar </button>
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
        mounted() {
            this.editAluno(this.$route.params.alunoId);
        },
        methods: {
            editAluno(alunoId) {
                this.axios.get(`http://127.0.0.1:8000/api/alunos/${alunoId}`)
                   .then((response) => {
                       this.aluno = response.data;
                   });
            },
            updateAluno() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/alunos/${this.$route.params.alunoId}`, this.aluno)
                    .then((response) => {
                        this.$router.push({ name: 'AlunosIndex' });
                    });
            }
        }
    }
</script>
