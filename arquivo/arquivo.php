<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <style>
        .body-div {
            width: 76%;
            margin-top: 5%;
        }

        .h2-legend {
            text-align: center;
            text-shadow: 4px 2px 4px black;
        }

        .form-inputone {
            color: #fff;
            background-color: green;
        }

        .form-inputtwo {
            color: #fff;
            background-color: red;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body id="body" align="center">
    <center>
        <div class="body-div">
            <form name="imc" method="post">
                <fieldset>
                    <legend class="h2-legend">
                        <h2> Registro </h2>
                    </legend>
                    <div>
                        <form method="post">
                            Nome: <input type="text" name="nome" size="35" maxlength="50"></br>
                            Telefone:<input type="text" name="telefone" size="33" maxlength="13"></br>
                            Email: <input type="text" name="email" size="35" maxlength="50"></br>

                            <p>
                            <div>
                                <input class="form-inputone" type="submit" value="Salvar" />
                                <input class="form-inputtwo" type="reset" value="Apagar" />
                            </div>
                            </p>
                        </form>
                        <hr>

                        <caption>
                            <h2>Agenda</h2>
                        </caption>

                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>

                            </tr>
                            <tr>

                                <td><?php echo $_POST["nome"]; ?></td>
                                <td><?php echo $_POST["telefone"]; ?></td>
                                <td><?php echo $_POST["email"]; ?></td>
                            </tr>
                            <!-- continuacao -->

                        </table>

                        <?php
                        $nome = $_POST["nome"];
                        $telefone = $_POST["telefone"];
                        $email = $_POST["email"];

                        $arquivo = fopen('agenda.txt', 'w'); //a/w apaga os campos tranto do formulario quanto arquivo.txt

                        function registrar($campoTexto)
                        {
                            global $arquivo;

                            fwrite($arquivo, "\r\n" . $campoTexto);
                        }
                        function mostrar()
                        {
                            $arquivo1 = fopen('agenda.txt', 'r');

                            $dados = explode('|', fread($arquivo1, filesize('agenda.txt')));

                            for ($i = 0; $i < sizeof($dados); $i++) {
                                echo $dados[$i] . "<p>";
                            }
                        }
                        function pesquisar($nome)
                        {
                            $arquivo1 = fopen('agenda.txt', 'r');

                            $dados = explode('|', fread($arquivo1, filesize('agenda.txt')));

                            for ($i = 0; $i < sizeof($dados); $i++) {
                                if ($nome == $dados[$i]) {
                                    echo "pertence a LISTA! <br>";
                                    echo "<hr>";
                                    break;
                                }
                            }
                        }
                        registrar("Nome:" . '|' . $nome . '|');
                        registrar("Telefone:" . '|' . $telefone . '|');
                        registrar("Email:" . '|' . $email  . '|' . "\r\n");
                        pesquisar("jhonatas");
                        mostrar();
                        ?>

                    </div>
                </fieldset>
            </form>
        </div>
    </center>
</body>