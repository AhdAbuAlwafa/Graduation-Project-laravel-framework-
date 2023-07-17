
<div class="comment">
<div class="bg-light p-2" style="width: 540px; margin-top: 15px; ">
                                        <div class="d-flex flex-row user-info">
                                            <img src="assets/img/user-comment.jpg" alt="" width="80" height="80" class="rounded-circle" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5);
                             border: 4px solid #fff;">
                                            <div class="d-flex flex-column justify-content-start ml-2" style="font-size: 21px; padding-left: 20px;">

                                                <span class="d-block font-weight-bold name">{{ $comment->fname }} {{ $comment->name }}</span>
                                                <span class="date text-black-50">{{ $comment->created_at }}</span>
                                            </div>
                                        </div>
                                        <div class="mt-3" style="font-size: 20px; padding-right: 100px; ">
                                            <p class="coment-text">
                                                {{ $comment->com_text }}
                                            </p>
                                        </div>
                                        <div id="vertical-line"></div>
                                    </div>
</div>
