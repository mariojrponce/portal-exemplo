<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //O código abaixo é para permitir a criação/modificação e exlusão de card a usuários logados
        //$this->middleware('auth');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $links = Link::where('nome','like', "%$search%")->paginate(5);

        return view('home', ['links' => $links]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'url' => 'required|max:800',
            'imagem' => 'required',
        ]);

        $link = new Link();
        $link->fill($request->input());
        $link->save();

        // Verifica se informou o arquivo e se é válido
        if ($request->file('imagem') && $request->file('imagem')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            // Recupera a extensão do arquivo
            $extension = $request->file('imagem')->extension();
            // Define o nome
            $nameFile = "{$name}.{$extension}";
            // Faz o upload:
            $upload = $request->file('imagem')->storeAs('imagem', $nameFile);
            //Armazena o caminho onde a imagem está
            $link->imagem = $upload;
            $link->save();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::find($id);

        return view('link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'url' => 'required|max:800',
        ]);

        $link = Link::find($id);
        $link->fill($request->input());
        $link->save();

        // Verifica se informou o arquivo e se é válido
        if ($request->file('imagem') && $request->file('imagem')->isValid()) {
            Storage::delete($link->imagem);
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            // Recupera a extensão do arquivo
            $extension = $request->file('imagem')->extension();
            // Define o nome
            $nameFile = "{$name}.{$extension}";
            // Faz o upload:
            $upload = $request->file('imagem')->storeAs('imagem', $nameFile);
            //Armazena o caminho onde a imagem está
            $link->imagem = $upload;
            $link->save();
        }

        return redirect()->route('home');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function delete(Link $link)
    {
        //return $link;
        Storage::delete($link->imagem);
        $link->delete();

        return redirect()->route('home');
    }
}
