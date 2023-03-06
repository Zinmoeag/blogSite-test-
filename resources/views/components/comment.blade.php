
@props(['comment'])
 <div class="comment  col-md-11 mx-auto my-3">
            <div class="card">
                <div class="card-body d-flex">

                    <div class="row">
                        <div class="d-flex align-items-center">
                            <div class="user-pic">
                                <img src="{{$comment->user['image']}}" class="comment-pic" alt="hey">
                            </div>

                            <div class="user-info ms-4">
                                <h4 class="fs-5 mb-1">{{$comment->user['name']}}</h4>
                                <p class ="mb-1" style="font-size: 13px">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                            <hr>
                        </div>

                        <div class="card-body">
                           {{$comment->comment}}
                        </div>

                    </div>
                    
                </div>
            </div>
</div>