<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogPostComment;

class CommentsController extends Controller
{
    public function showComments()
    {
        $comments = BlogPostComment::latest()
            ->with(['user', 'post'])
            ->paginate(10);

        return view('admin.blog.comments.index', compact('comments'));
    }

    public function showComment(BlogPostComment $blogPostComment)
    {
        $blogPostComment->update(['is_read' => 1]);
        $blogPostComment->load('user');

        return view('admin.blog.comments.single', ['comment' => $blogPostComment]);
    }

    public function deleteComment(BlogPostComment $blogPostComment)
    {
        if ($blogPostComment->delete()) {
            return redirect()->route('admin.blog.comments.index')
                ->with('success', 'Комментарий удален');
        }
    }

    public function toggleCommentPublic(BlogPostComment $blogPostComment)
    {
        $isPublished = $blogPostComment->is_published;

        $isPublished = !$isPublished;

        $blogPostComment->update(['is_published' => $isPublished]);

        return redirect()->route('admin.blog.comments.index');
    }

    public function makeCommentUnread(BlogPostComment $blogPostComment)
    {
        $blogPostComment->update(['is_read' => 0]);

        return redirect()->route('admin.blog.comments.index');
    }
}
