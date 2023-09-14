@foreach($data as $idx => $p)
    <tr>
        <td><img src="{{ $p->path }}" width="30"/></td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->srp }}</td>
        <td>
            <input type="hidden" class="id" value="{{ $p->id }}"/>
            <input type="number" class="qty" min="1" width="20" value="1"/>
        </td>
        <td>
            <form class="frmAdd" action="pos/getById">
                @csrf
                <input type="hidden" name="id" value="{{ $p->id }}" />
                <input type="submit" value="Remove"/>
            </form>
        </td>
    </tr>
@endforeach