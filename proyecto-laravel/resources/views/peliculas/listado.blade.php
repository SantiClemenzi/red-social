<h1>{{$titulo}}</h1>

<?php $contador = 1; ?>
@while($contador < 50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{$contador}} <br />
    @endif
<?php $contador++ ?>
@endwhile