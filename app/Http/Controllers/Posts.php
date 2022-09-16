<?php

namespace App\Http\Controllers;

use App\Models\Post ;
use Illuminate\Http\Request;

class Posts extends Controller
{
    //->where('title','=','ali')->where('content','=','sul') 
    // return all post 
    public function  index ()
    {       
          return Post::all();
    }

     public function  indexOrd($order)
    {       
        if ($order)
          return Post::all()->sortBy('title');
        else return Post::all()->sortByDesc('title');

    }




    //###########################################//
    
    //create post 
    public function  create ()
    {
         request()->validate([

            'title'=>'required' ,
            'content'=>'required'

        ]) ;

        return Post::create([

            'title'=>request('title') ,
            'content'=> request ('content')
        ]);
    }


    //###########################################//


    // update item by id  
    public  function update (Post $post){
         request()->validate([

            'title'=>'required' ,
            'content'=>'required'

        ]) ;
        $success=  $post->update([

            'title'=>request('title') ,
            'content'=> request ('content')
        ]) ;
        if($success)return 1 ;
        else return 0 ;

    }

      //update all post with title $name ;
     public function updateByName($name)
    {
        request()->validate([
            'content'=>'required'
        ]) ;
       $post = Post::all()->where('title','=',$name); 
       $success=1 ;
       foreach ( $post as $h ){
            $success |= $h->update([
                'content'=> request ('content')
            ]) ;
        }
        if($success)return 1 ;
        else return 0 ;
    }



    //###########################################//


    // delete  item 
    public  function delete(Post $post){
    return $post->delete() ;
   }
   public  function deleteName ($name){
         $post = Post:: all()->where('title','=',$name) ;
         $success=1 ;
         foreach($post as $p)
         $success &= $p->delete() ;
         return $success ;
   }





  




    //search  byName
    public function search ($name)
    {
     
        if (Post::all()->where('title','=',$name))return Post::all()->where('title','=',$name)  ;
        else return NULL;
    }
}
