@foreach($data as $idx => $p)
    <div class="sec1_product">
        <div class="img-container">
            <figure class="sec1_p1">
                <img width="50" class="img-fluid " src="{{ asset('images/'.$p->path) }}"/>
            </figure>
        </div>
        <h2>{{ $p->name }}</h2>
        <p>{{ $p->description }}</p>
        <em>₱{{ $p->srp }}</em>
        <form class="frmAdd" data-id="{{ $p->id }}" method="post" action="pos/getById">
            @csrf
            <input type="hidden" name="id" value="{{ $p->id }}" />
            <input type="submit" class="btn btn-sm btn-dark" value="Add"/>
        </form>
    </div>
@endforeach
