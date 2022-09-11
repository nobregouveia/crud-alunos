<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Aluno;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{
    //Método responsável por listar os alunos
    public function index(): JsonResponse
    {
        $alunos = Aluno::orderBy('id', 'desc')->get();

        return response()->json($alunos);
    }

    //Método responsável por criar um novo aluno
    public function store(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $aluno = Aluno::create($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'aluno'   => $aluno
            ]);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => null,
                'erro' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //Método responsável por exibir os dados do aluno
    public function show(int $id): JsonResponse
    {
        $aluno = Aluno::find($id);

        return response()->json($aluno);
    }

    //Método responsável atualizar os dados do aluno
    public function update(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $aluno = Aluno::find($id);
            $aluno->update($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'aluno'   => $aluno
            ]);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => null,
                'erro' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //Método repsonsável por excluir o aluno
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $aluno = Aluno::find($id);
            $aluno->delete();

            DB::commit();

            return response()->json('Aluno excluido com sucesso!');
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => null,
                'erro' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
