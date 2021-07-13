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
    @foreach($integrantes_equipo as $integrante)
        <tr>
            <td>{{$integrante->id_equipo}}</td>
            <td>{{$integrante->id_user}} </td>
            <td>{{$integrante->id_proyecto}}</td>
            <td>{{$integrante->rol}}</td>
            <td>
        </tr>
    @endforeach
    </tbody>

</table>
