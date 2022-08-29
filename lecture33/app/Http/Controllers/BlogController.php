<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list()
    {
        // $author = 'Rafikul Islam';
        // $blog = 'blog';
        // $abc = 'habijabi';

        $data = array();

        $data['author'] = 'Rafikul Islam';
        $data['abc'] = 'habijabi';
        $data['blog'] = [
            ['id' => 1, 'title' => 'how to write a url in laravel'],
            ['id' => 2, 'title' => 'how to make a controller in laravel'],
        ];

        return view('blog.listData', $data);
    }
}
