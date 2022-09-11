import AlunosIndex from './components/alunos/index.vue';
import AlunosCreate from './components/alunos/create.vue';
import AlunosEdit from './components/alunos/edit.vue';

export const routes = [
    {
        path: '/alunos',
        component: AlunosIndex,
        name: "AlunosIndex"
    },
    {
        path: '/alunos/create',
        component: AlunosCreate,
        name: "AlunosCreate"
    },
    {
        path: '/alunos/edit/:alunoId',
        component: AlunosEdit,
        name: "AlunosEdit"
    }
];
