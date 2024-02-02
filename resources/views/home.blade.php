@include('layout.doctype')
@include('layout.nav')

<div class="container text-center">
    <div class="text-light p-4">
        <h4 class="text-2xl font-bold mb-4">Product</h4>
        <a href="{{ url('/create') }}" class="btn btn-primary">Add Product</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-5">
        @foreach($posts as $post)
            <div class="height d-flex justify-content-center align-items-center">
                <div class="card p-3" style="width: 22rem;">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="image">
                            @if($post->image)
                                <img src="{{ asset('uploads/post/' . $post->image) }}" style="width: 100%;" alt="Product Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        <b>Title : {{$post->title}}</b>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        <b>Price : {{$post->price}} MAD</b>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        <b>Bio : {{$post->description}}</b>
                    </div>

                    <div class="d-flex justify-content-around p-2 "> <!-- Adjusted line to align the buttons to the right -->
                        <a href="{{ url('create/'.$post->id.'/edit') }}" class="btn btn-success">Modifier</a>
                        <form action="{{ url('/create/'.$post->id.'/delete') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

@include('layout.footer')
</body>
</html>
