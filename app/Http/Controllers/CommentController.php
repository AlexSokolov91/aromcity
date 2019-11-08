<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
  {

        $this->validate($request, [
                'name' => 'required|min:3|max:40',
                'text' => 'required|min:7|max:256'
                ]);

        Comment::create($request->except('_token'));
        return redirect()->back();
      }


}