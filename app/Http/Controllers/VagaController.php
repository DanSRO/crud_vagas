<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VagaController extends Controller
{
    public function index()
    {
        $vagas = Vaga::paginate(20);
        // $vagas = Vaga::all();
        // $totalVagas = Vaga::count();
        return view('vagas.index', compact('vagas')); //['vagas'=>$vagas, $totalVagas]);
    }

    public function create()
    {
        return view('vagas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => ['required', Rule::in(['CLT', 'Pessoa Jurídica', 'Freelancer'])],
            'pausada' => 'boolean',
        ]);
    
        // Instância de Vaga com base nos dados do formulário
        $novaVaga = new Vaga();
        $novaVaga->titulo = $request->titulo;
        $novaVaga->descricao = $request->descricao;
        $novaVaga->tipo = $request->tipo;
        $novaVaga->pausada = $request->has('pausada'); // Checkbox pausada está marcado
    
        // Salva nova vaga no banco de dados
        $novaVaga->save();
    
        // Redireciona para a página de listagem após a criação
        return redirect()->route('vagas.index')->with('success', 'Vaga criada com sucesso!');
    }

    public function show(Vaga $vaga){
        return view('vagas.show', compact('vaga'));
    }

    public function pausar(Vaga $vaga)
    {
        $vaga->update(['pausada' => true]);
        return redirect()->route('vagas.index')->with('success', 'Vaga pausada com sucesso!');
    }

    public function reativar(Vaga $vaga)
    {
        $vaga->update(['pausada' => false]);
        return redirect()->route('vagas.index')->with('success', 'Vaga reativada com sucesso!');
    }


    public function edit(Vaga $vaga)
    {
        return view('vagas.edit', compact('vaga'));
    }

    public function update(Request $request, Vaga $vaga)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => ['required', Rule::in(['CLT', 'Pessoa Jurídica', 'Freelancer'])],
            'pausada' => 'boolean',
        ]);

        $vaga->update($request->all());
        return redirect()->route('vagas.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    public function destroy(Vaga $vaga)
    {
        $vaga->delete();
        return redirect()->route('vagas.index')->with('success', 'Vaga excluída com sucesso!');
    }
}
