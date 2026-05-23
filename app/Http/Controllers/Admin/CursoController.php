<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
class CursoController extends Controller
{
   public function index()
    {
       $linhas = Curso::All();
         return view('admin.cursos.index', compact('linhas'));
    }

    /*Após*/
    
      public function adicionar()
      {
         return view('admin.cursos.create');
      }
      public function editar(int $id)
      {
         $linha = Curso::find($id);
         return view('admin.cursos.edit', compact('linha'));
      }
       public function excluir(int $id)
      {
        Curso::find($id)->delete();
         return redirect()->route('admin.cursos');
      }
      public function salvar(Request $req, int $id)
      {
         $dados = $req->all();

         if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
         }
         else{
         $dados['publicado'] = 'não';
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
         return redirect()->route('admin.cursos');
    
      }
      public function atualizar(Request $req, int $id)
      {     
         $dados = $req->all();
         if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
         }else{
            $dados['publicado'] = 'não';
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
         Curso::find($id)->update($dados);
         return redirect()->route('admin.cursos');
      }
}
