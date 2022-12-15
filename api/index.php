<?php
// richiamo la direcory
include_once __DIR__ . '/../db/index.php';

$genereFiltrato = [];
//chiede all'url se c'è un parametro definito e se c'è un parametro tipo con del valore all'interno
if (!empty($_GET) && !empty($_GET['genre'])) {

    foreach ($database as $elem) {
        // var_dump( $_GET['tipo'] );
        if ($elem['genre'] == $_GET['genre']) {
            //se il tipo del prodotto corrisponde al tipo scritto nel parametro url "tipo" pusho l'elemento dell'array filtrato
            $genereFiltrato[] = $elem;
        }
    }

    //Se non c'è nessun parametro nell'url e se ci sono sono vuoti
} else {
    //associazione dell'array filtrato con l'intero array di elementi
    $genereFiltrato = $database;
}



header('Content-type: application/json');

echo json_encode($genereFiltrato); //lo trasformo in file jason funzione fa si che javascript possa interpetrarlo e fa si che L'array multidimesionale diventa un oggetto
