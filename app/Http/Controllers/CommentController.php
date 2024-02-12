<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);
        Comment::insert($formFields);

        return back()->with('message', 'Bier Opgeslagen');
    }

    public function update(Request $request, Comment $comment)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        $comment->update($formFields);
        return back();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('message', 'Kozijn Attribuut succesvol verwijderd');
    }
}
