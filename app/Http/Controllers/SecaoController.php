<?php

namespace App\Http\Controllers;

use \App\Secao;
use \App\Noticia;
use \App\ArquivosNoticia;

use App\Http\Controllers\Controller;
use App\User;

use App\Classes\UploadHelper;
use Illuminate\Http\Request;

class SecaoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    //secoes
    public function secoes_listar()
    {
        $secoes = Secao::get();
        return view('secoes.listar')->with(['secoes' => $secoes]);
    }

    public function form_inserir_secao()
    {
        return view('secoes.adicionar');
    }

    public function salvarsecao(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:8', 'max:255'],
        ]);

        $Secao = new Secao();
        $Secao->nome = $request->nome;
        
        if ($Secao->save()) {
            return redirect()
                    ->route('secoes.listar')
                    ->with('success', 'Secao inserido com sucesso!');
        } else {
            return redirect()
            ->route('secoes.listar')
            ->with('error', 'Houve um erro ao inserir o Secao!');
        }
    }

    public function form_atualizar_secao($id)
    {
        $secao = Secao::find($id);
        return view('secoes.alterar')->with(['secao' => $secao]);
    }

    public function alterarSecao(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'nome' => ['required', 'min:8', 'max:255'],
        ]);

        $id = $request->id;
        $Secao = Secao::find($id);
        $Secao->nome = $request->nome;
        
        if ($Secao->save()) {
            return redirect()
                    ->route('secoes.listar')
                    ->with('success', 'Secao alterado com sucesso!');
        } else {
            return redirect()
            ->route('secoes.listar')
            ->with('error', 'Houve um erro ao alterar o Secao!');
        }
    }

    public function excluirSecao($id)
    {
        $Secao_busca = Secao::find($id);

        if ($Secao_busca->delete()) {
            return redirect()
                    ->route('secoes.listar')
                    ->with('success', 'Secao excluído com sucesso! ');
        }
    }

    //Atualização de Noticias
    public function noticia_listar()
    {
        $noticias = Noticia::all();
        return view('noticias.listar')->with(['noticias' => $noticias]);
    }

    public function visualizarnoticia($id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.mostrar')->with(['noticia' => $noticia]);
    }

    public function form_inserir_noticia()
    {
        $secoes = Secao::get();
        return view('noticias.adicionar')->with(['secoes' => $secoes]);
    }

    public function salvarnoticia(Request $request)
    {
        $request->validate([
            'secao_id' => ['required'],
            'titulo' => ['required', 'min:8', 'max:255'],
            'conteudo' => ['required', 'min:30'],
            'files.*' => 'mimes:jpeg,jpg,png,pdf,csv,mp4'
        ]);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->secao_id = $request->secao_id;
        $noticia->tags = $request->tags;
        $noticia->conteudo = $request->conteudo;
        $noticia->video_link = $request->video_link;
        $noticia->user_id = auth()->user()->id;
        
        // $noticia = new secao($Secao_noticia_fields);
        if ($noticia->save()) {
            if ($request->hasfile('files')) {
                $uploadhelper = new UploadHelper();
                $filenames = $uploadhelper->multipleFileUploadPost($noticia->id, "noticias", $request);

                if (!empty($filenames)) {
                    foreach ($filenames as $filename) {
                        $arquivo_secao_atualizacao = new ArquivosNoticia();
                        $arquivo_secao_atualizacao->image = $filename;
                        $arquivo_secao_atualizacao->noticia_id = $noticia->id;
                        $arquivo_secao_atualizacao->save();
                    }
                }
            }

            // return redirect()
            //         ->route('noticias.listar')
            //         ->with('success', 'Atualização de Status inserida com sucesso!');
        } else {
            return redirect()
            ->route('noticias.listar')
            ->with('error', 'Houve um erro ao inserir Atualização de Status!');
        }
    }

    public function form_atualizar_noticia($id)
    {
        $secoes = secao::all();
        $noticia = Noticia::findOrFail($id);
        return view('noticias.alterar', ['noticia' => $noticia, 'secoes' => $secoes]);
    }

    public function alterarnoticia(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'secao_id' => ['required'],
            'titulo' => ['required', 'min:8', 'max:255'],
            'conteudo' => ['required', 'min:30'],
            'files.*' => 'mimes:jpeg,jpg,png,pdf,csv,mp4'
        ]);

        $id = $request->id;
        $noticia_busca = Noticia::find($id);
        $noticia_busca->titulo = $request->titulo;
        $noticia_busca->secao_id = $request->secao_id;
        $noticia_busca->tags = $request->tags;
        $noticia_busca->conteudo = $request->conteudo;
        $noticia_busca->video_link = $request->video_link;
        $noticia_busca->user_id = auth()->user()->id;

        if ($noticia_busca->save()) {
            if ($request->hasfile('files')) {
                $uploadhelper = new UploadHelper();
                $filenames = $uploadhelper->multipleFileUploadPost($noticia_busca->id, "noticias", $request);

                if (!empty($filenames)) {
                    foreach ($filenames as $filename) {
                        $arquivo_secao_atualizacao = new ArquivosNoticia();
                        $arquivo_secao_atualizacao->image = $filename;
                        $arquivo_secao_atualizacao->noticia_id = $noticia_busca->id;
                        $arquivo_secao_atualizacao->save();
                    }
                }
            }

            return redirect()
                    ->route('noticias.listar')
                    ->with('success', 'Atualização de Status alterada com sucesso!');
        } else {
            return redirect()
            ->route('noticias.listar')
            ->with('error', 'Houve um erro ao alterar Atualização de Status!');
        }
    }

    public function excluirnoticia($id)
    {
        $noticia_busca = Noticia::find($id);
        $noticia_busca->arquivosnoticias()->delete();

        if ($noticia_busca->delete()) {
            return redirect()
                    ->route('noticias.listar')
                    ->with('success', 'Atualização de Status excluída com sucesso! ');
        }
    }

    public function logoutadm()
    {
        auth()->logout();
        return redirect('/login');
    }
}
