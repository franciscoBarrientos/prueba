<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Licitaciones</title>

    <!-- Bootstrap Core CSS -->
    {!!Html::style('assets/css/bootstrap.min.css')!!}

    <!-- MetisMenu CSS
    {!!Html::style('bower_components/metisMenu/dist/metisMenu.min.css')!!}-->

    <!-- Custom CSS -->
    {!!Html::style('dist/css/sb-admin-2.css')!!}

    <!-- Custom Fonts
    {!!Html::style('bower_components/font-awesome/css/font-awesome.min.css')!!}-->

    <!-- Custom CSS -->
    {!!Html::style('css/container.css')!!}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script>
        function tenderInformation(externalCode, tenders) {
            //alert(externalCode);
            for(var i=0;i<tenders.length;i++){
                if (externalCode == tenders[i].externalCode){
                    var mensaje = 'Detalle de licitación ' + '\n' +
                        'Código externo: ' + tenders[i].externalCode + '\n' +
                        'Nombre: ' + tenders[i].name + '\n' +
                        'Codigo estado: ' + tenders[i].stateCode + '\n' +
                        'Fecha cierre: ' + tenders[i].closingDate;
                    alert(mensaje);

                }
            }
        }
    </script>
</head>
<body>
    <?php
        //Se decodifica la variable json
        $tenders = json_decode($tendersJson, true);
        //$day = $initialDate->format('d');
        $month = $today->format('m');
        $day = $today->format('d');
    ?>
    <script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del
        // array de php
        var arrayJS=<?php echo ($tendersJson);?>;

    </script>
    <div id="table" class="table-responsive">
        <table class="table table-bordered">
            <H1>Día: {{$day}} Mes: {{$month}}</H1>
            <thead>
            <th width="14,28%">Lunes</th>
            <th width="14,28%">Martes</th>
            <th width="14,28%">Miercoles</th>
            <th width="14,28%">Jueves</th>
            <th width="14,28%">Viernes</th>
            <th width="14,28%">Sábado</th>
            <th width="14,28%">Domingo</th>
            </thead>

            <tbody>
            @for( $i=0; $i<5; $i++ )
                <tr>
                    @for( $j=0; $j<7; $j++ )
                    <td>
                        {{$initialDate->format('d')}}
                        <?php
                            //echo $initialDate->format('d');
                            $dateStr = substr($initialDate->toDateString(),0,4).
                                substr($initialDate->toDateString(),5,2).
                                substr($initialDate->toDateString(),8,2);
                            echo ("<br>");
                            $count = 0;
                            foreach ($tenders as $tender) {
                                $closingDateStr = substr($tender['closingDate'], 0, 4).
                                    substr($tender['closingDate'], 5, 2).
                                    substr($tender['closingDate'], 8, 2);

                                if ($closingDateStr == $dateStr && $count < 5){
                                    //echo $tender['externalCode'];
                                    //echo ("<br>");
                                    echo('<input type="button" id="mybtn" onclick="tenderInformation(this.value, arrayJS)" value="'.$tender['externalCode'].'">');
                                    $count +=1;
                                }
                            }

                            $initialDate = $initialDate->addDays(1);
                        ?>
                    </td>
                    @endfor
                </tr>
            @endfor
            </tbody>
            <!--
            @foreach( $tenders as $tender )
            <tbody>
                <td>{{$tender['closingDate']}}</td>
            </tbody>
            @endforeach
            -->
        </table>
    </div>

</body>
</html>