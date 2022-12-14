<!DOCTYPE html>
<html>
    <head>
        <title>Pueba Json</title>
        <style>
            #rgsPersonas
                {
                    width:100%;
                    border: solid 1px black;
                    
                }
                #rgsPersonas thead
                {
                    
                    background-color: black;
                    color:white;
                }
        </style>

    </head>
<body>
    <?php
    $personas=array();
    if (is_file('persona.json')) {
        # code...
        $json= file_get_contents('persona.json');
        $personas=json_decode($json, true);

        var_dump($personas);
    }
    if ($_POST) {
        # code...
        $datos=array();
        $datos[]=$_POST;

        $json= json_encode($datos);
        file_put_contents('persona.json', $json);
    }

    ?>
    <header>

    </header>
    <section>
        <h3>Agregar Personas</h3>
        <form action="index.php" method="post">
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="txtNombre"></td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td><input type="text" name="txtCedula"></td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td><input type="text" name="txtTelefono"></td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td><input type="text" name="txtCorreo"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit">Guardar</button>

                    </td>
                </tr>
                
            </table>
        </form>
        <fieldset>
            <legend> PERSONAS REGISTRADAS</legend>
            <table id="rgsPersonas">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($personas as $persona)
                        {
                            echo <<<FILA
                                <tr>
                                    <td>{$persona['txtNombre']}<td>
                                    <td>{$persona['txtCedula']}<td>
                                    <td>{$persona['txtTelefono']}<td>
                                    <td>{$persona['txtCorreo']}<td>
                                </tr>
FILA;
                        }
                    ?>
                </tbody>
                
            </table>
        </fieldset>

    </section>

</body>
</html>
