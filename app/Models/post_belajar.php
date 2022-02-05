<?php

namespace App\Models;


class post 
{
   private static  $blogpost = [
    [
        "title" => "Judul post satu",
        "slug" => "judul-post-utama",
        "author" => "andri",
        "body" => "
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Eligendi magni veniam cum ab fugit molestias unde cumque voluptate sapiente velit,
         laboriosam nihil alias libero obcaecati modi molestiae. Atque eligendi iste, 
        quaerat deleniti itaque optio voluptas consectetur facilis accusantium quam 
        molestiae enim amet debitis! Molestiae dolor cumque laudantium adipisci error optio voluptas, omnis accusamus! Nihil, explicabo itaque. Dolores, soluta tempora cupiditate voluptates exercitationem velit quas, eum itaque aliquid libero, veritatis ipsum dicta rem. Qui atque autem sapiente? Distinctio expedita nobis blanditiis.",
    ],

    [
        "title" => "Judul post dua",
        "slug" => "judul-post-dua",
        "author" => "adit",
        "body" => "
        Lorem  menem ipsum dolor sit amet consectetur adipisicing elit. 
        Eligendi magni veniam cum ab fugit molestias unde cumque voluptate sapiente velit,
         laboriosam nihil alias libero obcaecati modi molestiae. Atque eligendi iste, 
        quaerat deleniti itaque optio voluptas consectetur facilis accusantium quam 
        molestiae enim amet debitis! Molestiae dolor cumque laudantium adipisci error optio voluptas, omnis accusamus! Nihil, explicabo itaque. Dolores, soluta tempora cupiditate voluptates exercitationem velit quas, eum itaque aliquid libero, veritatis ipsum dicta rem. Qui atque autem sapiente? Distinctio expedita nobis blanditiis.",
    ],

    ];

    public static function all() {
        return collect(self::$blogpost);
    }

    public static function find($slug) {
        $post = static::all();
       
        return $post->firstWhere('slug', $slug);
    }
}


