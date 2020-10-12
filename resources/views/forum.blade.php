@extends('layouts.common')
@section('content')
<!-- Main -->
    <div id="main">
        <div class="inner">
            @foreach($results as $result)
                <div class="comment-box">
                    <p class="comment">{{$result->comment}}</p>
                    <div class="like-box">
                        <p class="posted-id">ID: {{$result->session_id}}</p>
                        <p class="posted-id">{{$result->created_at}}</p>
                        <div class="like">    
                            <a href="{{url('like/'.$result->id)}}" ><img src="{{ asset('/images/iine.png') }}" class="btn" width="30px"></a>    
                        </div>
                        <div class="balloon">    
                            <span class="number">{{$result->like}}</span>    
                        </div>
                    </div>
                </div>
                    @if(!empty($result->refered_comments))
                        @foreach($result->refered_comments as $refered_comments)
                        <div class="refered_comment-box">
                            <p class="refered_comment" style="padding: 0.5em 0em  0.5em 2em;">{{$refered_comments->comment}}</p>
                            <div class="like-box">
                                <p class="posted-id">ID: {{$refered_comments->session_id}}</p>
                                <p class="posted-id">{{$refered_comments->created_at}}</p>
                                <div class="like">
                                    <a href="{{url('like/'.$refered_comments->id)}}" ><img src="{{ asset('/images/iine.png') }}" class="btn" width="30px"></a>    
                                </div>
                                <div class="balloon">    
                                    <span class="number">{{$refered_comments->like}}</span>    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class="comment-form-div">
                        <form action="{{url('comment/'.$result->id)}}" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="refered_to" value="{{$result->id}}">
                            <div class="comment-form-txt">
                                <input name="posted_comment" type="text">
                            </div>
                            <div class="comment-form-btns">
                                <input class="comment-form-btn" type="submit" value="返信">
                            </div>
                        </form>
                    </div>

            @endforeach
            <div class="new-comment-form-div">
                <form action="{{url('comment')}}" method="post">
                {{ csrf_field() }}
                    <div class="new-comment-form-txt">
                        <input name="posted_comment" type="text">
                    </div>
                    <div class="new-comment-form-btns">
                        <input class="new-comment-form-btn" type="submit" value="新規投稿">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection