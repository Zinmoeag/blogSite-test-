
    <section class="comments col-md-10 mx-auto">

        <div class="title">
            <h4 class="bg-secondary py-2 ps-3">Comments</h4>
            <hr>
        </div>

        @foreach(range(1,3) as $comment)
            <x-comment />
        @endforeach
       
    </section>