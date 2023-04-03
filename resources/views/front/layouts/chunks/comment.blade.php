<div class="be-comment">
    <div class="be-img-comment">
      <a href="blog-detail-2.html"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment"> </a>
    </div>
    <div class="be-comment-content">
      <div class="be-comment-heading">
        <span class="be-comment-name"> <a href="blog-detail-2.html">{{ $comment->user->name }}</a> </span>
        <span class="be-comment-time"> <i class="fa fa-clock-o"></i>{{ $comment->created_at }}</span>
      </div>

      <p class="be-comment-text">{{ $comment->text }}</p>
   </div>
</div>
