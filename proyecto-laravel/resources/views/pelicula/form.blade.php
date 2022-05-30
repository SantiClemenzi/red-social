<h1>Formulario en Laravel</h1>
<form action="{{url('/recibir')}}" method="POST">
    {{ csrf_field() }}
    <label for="">Nombre</label>
    <input type="nombre" name="name">
    <br/>
    <label for="">Email</label>
    <input type="email" name="email">
    <br/>
    <label for="">Contraseña</label>
    <input type="password" name="password">
    <br/>
    <input type="submit" value="enviar">
</form>