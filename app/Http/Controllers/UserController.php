<?php

namespace App\Http\Controllers;
use App\User;
use App\seguidores;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadProfile(Request $data){
        request()->validate([
            'image_profile' => ['required', 'image']          
        ]); 

        $user = User::findOrFail(auth()->id());
        $user->avatar_path = request()->file('image_profile')->store('userProfile', 'public');
        $user->save();
        
        return redirect()->route('user_profile');
    }

    public function showProfile(Request $data){
        if(isset($data['idUser'])){
             $posts       = Post::where('user_id',$data['idUser'])->get();
             $user_data   = User::where('id',$data['idUser'])->get();

             foreach($user_data as $u){
                $verificar_seguidor = seguidores::where('idSeguido',$u->id)->where('idSeguidor',auth()->id())->get();
                if(!$verificar_seguidor->isEmpty()){
                    $u->seguindo = True;
                }else{
                    $u->seguindo = False;
                }
             }
             
         }else{
             $posts       = Post::where('user_id',auth()->id())->get();
             $user_data   = User::where('id',auth()->id())->get();
 
             $seguidores_arr = [];
             $seguidores = seguidores::where('idSeguido',auth()->id())->get();
 
             foreach($seguidores as $seguidor){
                 $s = User::where('id',$seguidor->idSeguidor)->get();
                 $seguidores_arr[] = $s;
             }
 
         }
 
        return view('users.listProfile', compact('posts','user_data','seguidores_arr'));
    }

    public function listUsers(){
        $users = User::where('id','!=',auth()->id())->get();

        foreach($users as $u){
            $verificar_seguidor = seguidores::where('idSeguido',$u->id)->where('idSeguidor',auth()->id())->get();
            if(!$verificar_seguidor->isEmpty()){
                $u->seguindo = True;
            }else{
                $u->seguindo = False;
            }
        }

        return view('users.listUsers',compact('users'));
    }

    public function seguir(Request $data){
        echo $data['idUser'];

        $verificar_seguidor = seguidores::where('idSeguido',$data['idUser'])->where('idSeguidor',auth()->id())->get();

        if($verificar_seguidor->isEmpty()){
            $seguidor = seguidores::create([
                'idSeguidor' => auth()->id(),
                'idSeguido' => $data['idUser']
            ])->save();

            return redirect()->back()->with('success', 'Você seguiu este usuário');
        }else{
            return redirect()->back()->with('error', 'Você já está seguindo este usuário');
        }
    }
}
