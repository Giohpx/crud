<?php

namespace App\Http\Controllers\Admin;

use app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Curso;
class CursoController extends Controller
{
   public function index()
    {
       $linhas = Curso::All();
         return view('admin.crud.index', compact('linhas'));
    }
      public function adicionar()
      {
         return view('admin.crud.create');
      }
      public function editar($id)
      {
         $linha = Curso::find($id);
         return view('admin.crud.edit', compact('linha'));
      }
       public function excluir($id)
      {
        Curso::find($id)->delete();
         return redirect()->route('admin.crud');
      }
      public function salvar(Request $req)
      {
         $dados = $req->all();

         if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
         }
         else{
         $dados['publicado'] = 'nao';
         }
         if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
         
      }
         Curso::create($dados);
         return redirect()->route('admin.crud');
    
      }
      public function atualizar(Request $req)
      {     
         $dados = $req->all();
         if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
         }else{
            $dados['publicado'] = 'nao';
         }
         if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
         }
         Curso::create($dados);
         return redirect()->route('admin.crud');
      }
}
