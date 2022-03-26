<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model Post
use App\Models\Post;

//model User
use App\Models\User;

class BlogController extends Controller
{
    public function index(){

        //configurando a busca por titulo de postagens
        $search = request('search');

        if($search){
            $posts=Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $posts = Post::all();
        }

        //dados do usuário que fez a publicação



        return view('index',['posts'=>$posts, 'search'=>$search]);
    }

    public function showPost($id){

        $post= Post::findOrFail($id);

        //dados do usuário que fez a publicação
        $postOwner = User::where('id', $post->user_id)->first()->toArray();
        //$postOwner = "teste";

        return view('post',['post'=>$post, 'postOwner'=>$postOwner]);

    }

    public function login(){

        $login = 'Login';

        return view('login',['pagina'=>$login]);
    }

    public function contact(){

        $contato = 'contato';

        return view('contact',['pagina'=>$contato]);
    }

    ///administration


    public function storePost(Request $request){

        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->public = $request->public;

        //upload image
        if($request->hasfile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();//extensão da imagem

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now").".".$extension);

            //saving
            $requestImage->move(public_path('img/posts'), $imageName);

            $post->image = $imageName;
        }

        //capturando o id do usuário logado
        $user = auth()->user();
        //adicionando na tabela
        $post->user_id = $user->id;

        $post->save();

        return redirect('/')->with('msg','Post criado com sucesso!');//flash message ->with('msg','Post criado com sucesso!')
    }

    public function createPost(){

        return view('admin.create');
    }

    public function admin(){
/*
        $admin = 'Administação';

        return view('admin.admin', [ 'pagina'=>$admin]);
        */
                //verificando o usuário logado
        $user = auth()->user();

        $posts = $user->posts;

        return view('admin.dashboard', ['posts'=>$posts]);
    }
    /*
    public function dashboard(){

        //verificando o usuário logado
        $user = auth()->user();

        $post = $user->posts;

        return view('admin.dashboard', ['posts'=>$posts]);
    }
    */
    public function destroy($id){


        Post::findOrFail($id)->delete();

        return redirect('/administration')->with('msg','Postagem apagada com sucesso!');
    }

        /*
    public function destroy($id)
    {
        $posts = auth()->user()->posts;
        foreach ($posts as $post) {
            if ($post->id == $id) {
                Post::findOrFail($id)->delete();
                FacadesFile::delete(public_path('img\\posts\\') . $post->image);
                return redirect('/administration')->with('msg', 'Evento excluído com sucesso!');
            }
        }

        return redirect('/administration')->with('msg', 'Sem permissão para exclusão desse evento!');
    }
        */
}
