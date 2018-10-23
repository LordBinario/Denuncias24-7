<?php include('Paginas/CodigoServidor/IDDenuncia.php'); ?>

<form method="post" action="Paginas/CodigoServidor/CrearDenuncia.php" accpet-charset="utf8" enctype="multipart/form-data" class="row">
    <div class="col-12 text-center">
        <h3>Información para la denuncia</h3>
        <input type="hidden" name="txtID" id="txtID" value=<?php echo (intval($Lector[0]) + 1); ?>>
    </div>
    <div class="col-6">
        <label>Fecha de la denuncia: <?php $Fecha = getdate(); echo $Fecha['mday'] . '-' . $Fecha['mon'] . '-' . $Fecha['year'] ?></label>
        <input type="hidden" name="lblFecha" value=<?php $Fecha = getdate(); echo $Fecha['mday'] . '-' . $Fecha['mon'] . '-' . $Fecha['year'] . ' ' . $Fecha['hours'] . ':' . $Fecha['minutes'] . ':' . $Fecha['seconds'] ?>>
        <br>
        <label for="txtTitulo">Título de la denuncia:</label>
        <br>
        <input required type="text" name="txtTitulo" id="txtTitulo" class="form-control" placeholder="Título de denuncia">
        <br>
        <label for="txtDescripcion">Motivo de la denuncia:</label>
        <textarea required name="txtDescripcion" id="txtDescripcion" rows="8" placeholder="Motivo/Descripción de denuncia" class="form-control"></textarea>
        <br>
        <label for="FileAdjuntes">Adjuntar pruebas:</label>
        <input type="file" multiple name="FileAdjuntes[]" id="FileAdjuntes" class="form-control">
    </div>
    <div class="col-6">
        <ul id="lstPruebas"><h5>Pruebas adjuntadas</h5>
        </ul>
    </div>
    <div class="col-12 text-center mt-2 mb-0">
        <input type="submit" value="Hacer denuncia" class="btn" style="background-color: #00A94F;">
    </div>
</form>

<script type="text/javascript" charset="utf8">
    function AsignarEventos()
    {
        document.getElementById('FileAdjuntes').addEventListener("change", function(event){ 
            var Adjuntes = event.target.files;
            for (let i = 0; i < Adjuntes.length; i++)
            {
                var Elemento = document.createElement('li');
                /*var Hidden = document.createElement('input');

                Hidden.setAttribute('type', 'hidden');
                Hidden.setAttribute('name', 'AdjuntesBlob[]');
                Hidden.setAttribute('value', Adjuntes[i].slice());*/
                
                //Elemento.append(Hidden);
                Elemento.innerHTML = Adjuntes[i].name;

                document.getElementById('lstPruebas').append(Elemento);
            };
        });

        document.getElementById('FileAdjuntes').addEventListener('click', function(){
            document.getElementById('txtID').value = '../../Adjuntes/' + document.getElementById('txtID').value + '/';
        });
    }

    window.onload = AsignarEventos;
</script>