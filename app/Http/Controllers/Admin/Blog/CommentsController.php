<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogPostComment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function showComments()
    {
        $comments = BlogPostComment::orderBy('created_at', 'desc')
            ->with(['user', 'post'])
            ->paginate(10);

        return view('admin.blog.comments.index', compact('comments'));
    }

    public function showComment($id)
    {
        $comment = BlogPostComment::findOrFail($id);

        $comment->update(['is_read' => 1]);

        return view('admin.blog.comments.single', compact('comment'));
    }

    public function deleteComment($id)
    {
        if (BlogPostComment::destroy($id)) {
            return redirect()->route('admin.blog.comments.index')
                ->with('success', 'Комментарий удален');
        }
    }

    public function toggleCommentPublic($id)
    {
        $comment = BlogPostComment::findOrFail($id);
        $isPublished = $comment->is_published;

        $isPublished = !$isPublished;

        $comment->update(['is_published' => $isPublished]);

        return redirect()->route('admin.blog.comments.index');
    }

    public function makeCommentUnread($id)
    {
        BlogPostComment::findOrFail($id)
            ->update(['is_read' => 0]);

        return redirect()->route('admin.blog.comments.index');
    }
}
