    @props(["comments","blog"])
    <section class="comments col-md-10 mx-auto">

        <div class="title">
            <h4 class="bg-secondary py-2 ps-3">Comments ({{$comments->count()}})</h4>
            <hr>
        </div>

        @if($comments->count())

            @foreach($comments as $comment)
                <x-comment :comment="$comment" />
            @endforeach 

        @else

            <div class="text-secondary col-md-11 mx-auto my-3">There is no Comments yet.</div>

        @endif

    

       

        <!-- comment pagination -->
        {{$comments->links()}}

        @if(auth()->check())
            <x-comment-form :blog="$blog" />  

        @else
            <div class="col-md-11 alert alert-danger mx-auto rounded-0 d-flex justify-content-center">
                Login first to participant. 
            </div>
            
        @endif



          
       
    </section>