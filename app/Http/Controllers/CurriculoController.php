<?php

namespace App\Http\Controllers;

use App\Mail\CurriculoMail;
use App\Models\Curriculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CurriculoController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function created()
    {
        return view('created');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'telefone' => [
                'required',
                'string',
                'regex:/^(\(?\d{2}\)?\s?)?(9\d{4,5}-?\d{4})$/'
            ],
            'cargo_desejado' => 'required|string|max:255',
            'escolaridade' => 'required|string',
            'observacoes' => 'nullable|string',
            'arquivo' => 'required|file|mimes:doc,docx,pdf|max:1024',
        ]);

        $curriculo = Curriculo::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'telefone' => $validatedData['telefone'],
            'cargo_desejado' => $validatedData['cargo_desejado'],
            'escolaridade' => $validatedData['escolaridade'],
            'observacoes' => $validatedData['observacoes'],
            'caminho_arquivo' => $request->file('arquivo')->store('curriculos', 'public'),
            'ip_visitante' => $request->ip(),
        ]);
        
        Mail::to('admin@admin')->queue(
            new CurriculoMail($curriculo, 'Curriculo Recebido: ')
        );

        Mail::to($curriculo->email)->queue(
            (new CurriculoMail($curriculo, 'Recebemos seu curriculo, '))->delay(15)
        );

        return redirect()->route('curriculo.form')->with('success', 'Currículo enviado com sucesso!');
    }
}