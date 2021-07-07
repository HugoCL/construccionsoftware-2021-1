<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>nombre</th>
            <th>ID Proyecto</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($tareasBacklog as $tarea)
        <tr>
            <td>{{$tarea->id}}</td>
            <td>{{$tarea->nombre}} </td>
            <td>{{$tarea->id_proyecto}}</td>
            <td>
            <a href="{{ url('/backlog/'.$tarea->id.'/edit') }}">
                Editar
            </a>
            <form action="{{ url('/backlog/'.$tarea->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Eliminar tarea del backlog?')" value="Borrar">
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
