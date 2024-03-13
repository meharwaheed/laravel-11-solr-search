<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $model = new \App\Models\User();

    /** @var \Scout\Solr\Engines\SolrEngine $engine */
    $engine = app(\Laravel\Scout\EngineManager::class)->engine();
    $select = $engine->setCore($model)->createSelect();

//    $select->addField('email');
//    $select->setQuery('(name:Raoul Cronin OR email:example)');
    $select->setQuery('*(name:storphy)*');

    // Set the limit for the number of rows (results)
    $select->setRows(100);


    $result = $engine->select($select, $engine->getEndpointFromConfig($model->searchableAs())); // getEndpointFromConfig() is only necessary when your model does not use the default solr instance.

    echo "<pre> ". var_dump($result->getDocuments()) ." </pre>";

//    return view('welcome');
});

Route::get('/users', function () {

        $users = \App\Models\User::search('(name:test OR email:test@example.com)')->get();
        echo "<pre> ". print_r($users->toArray()) ." </pre>";
    return view('welcome');
});
