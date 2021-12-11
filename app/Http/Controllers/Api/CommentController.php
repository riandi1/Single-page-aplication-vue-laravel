<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsStoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::orderBy('id','DESC')->paginate(10));
    }
    public function store(CommentsStoreRequest $request)
    {
        if ($request->hasFile('thumbnail')) {
            $filename = $request->thumbnail->getClientOriginalName();
            info($filename);
        }
        $comment = Comment::create($request->validated());
        return new CommentResource($comment);
    }
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }
    public function update(Comment $comment,CommentsStoreRequest $request)
    {
        $comment->update($request->validated());
        return new CommentResource($comment);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}
