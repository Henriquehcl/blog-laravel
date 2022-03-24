<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model Post
use App\Models\Post;

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

        return view('index',['posts'=>$posts, 'search'=>$search]);
    }

    public function showPost($id){

        $post= Post::findOrFail($id);

        return view('post',['post'=>$post]);

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

        $post->save();

        return redirect('/')->with('msg','Post criado com sucesso!');//flash message ->with('msg','Post criado com sucesso!')
    }

    public function createPost(){

        return view('admin.create');
    }

    public function admin(){
        $admin = 'Administação';

        return view('admin.admin', [ 'pagina'=>$admin]);
    }
}
