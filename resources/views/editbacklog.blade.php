<form action="{{ url('/backlog/'.$tarea->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    <label for="Nombre"> Nombre </label>
    <input type="text" name="Nombre" value="{{$tarea->nombre}}" id="Nombre">
    <br>
    <label for="ID" > ID </label>
    <input type="number" name="id" value="{{$tarea->id}}" id="ID">
    <br>
    <label for="IDproy" > ID </label>
    <input type="number" name="id" value="{{$tarea->id_proyecto}}" id="IDproy">
    <br>
    <input type="submit" value="Guardar">
    <br>
</form>
