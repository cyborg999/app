@foreach($data as $idx => $p)
    <tr>
        <td><img src="{{ asset('images/'.$p->path) }}" width="130"/></td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->description }}</td>
        <td>{{ $p->srp }}</td>
        <td>{{ $p->qty }}</td>
        <td>
            <form class="frmAdd" data-id="{{ $p->id }}" method="post" action="pos/getById">
                @csrf
                <input type="hidden" name="id" value="{{ $p->id }}" />
                <input type="submit" value="Add"/>
            </form>
        </td>
    </tr>
@endforeach