<template>
    <div class="container">
        <h2 class="text-center">Lista de Alunos</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'AlunosCreate' }" class="btn btn-primary btn-sm float-right mb-2">Adicionar Aluno</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(aluno, key) of alunos">
                            <td>{{ aluno.id }}</td>
                            <td>{{ aluno.nome }}</td>
                            <td>{{ aluno.email }}</td>
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'AlunosEdit', params: { alunoId: aluno.id }}">Edit</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteAluno(aluno.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                alunos: {}
            }
        },
        created() {
            this.getAlunos();
        },
        methods: {
            getAlunos() {
              this.axios.get('http://127.0.0.1:8000/api/alunos').then(response => {
                this.alunos = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
            deleteAluno(alunoId) {
                console.log(alunoId)
                this.axios
                    .delete(`http://127.0.0.1:8000/api/alunos/${alunoId}`)
                    .then(response => {
                        let i = this.alunos.map(data => data.id).indexOf(alunoId);
                        this.alunos.splice(i, 1)
                    });
            }
        }
    }
</script>
