<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require_once 'Filme.php';
require_once 'FilmeDAO.php';

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->addBodyParsingMiddleware(); // <<<---- here 
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/movies', function (Request $request, Response $response, array $args) {

    $movieDAO = new FilmeDAO(); //Instancia a classe que possui os métodos
    $movies = $movieDAO->read(); //Executa o método para buscar os filmes cadastrados

    $response->getBody()->write(json_encode($movies)); // Trás a informação para o usuário em modelo Json

    return $response->withHeader('Content-type', 'application/json');
});
$app->post('/movies', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody(); //Cria a variável e busca o que o usuário passou
    $movie = new Filme($data['nome'],$data['genero'],$data['duracao']); //Instancia a classe e passa os parâmetros pra cada atributo dentro da classe
    $movieDAO = new FilmeDAO(); //Instancia a classe para inserir nos bancos
    $movieDAO->create($movie); //Executa o método para cadastradas no BD os dados repassados pelo usuário

    return $response->withStatus(201);

});
$app->put('/movies/{id}', function (Request $request, Response $response, array $args) {

    $id = $args['id'];
    $data = $request->getParsedBody(); //Cria a variável e busca o que o usuário passou
    print_r($data); //Desespero
    $movie = new Filme($data['nome'],$data['genero'],$data['duracao']); //Instancia a classe e passa os parâmetros pra cada atributo dentro da classe
    $movie->setId($id);
    $movieDAO = new FilmeDAO(); //Instancia a classe para inserir nos bancos
    $movieDAO->update($movie); //Executa o método para cadastradas no BD os dados repassados pelo usuário

    return $response->withStatus(201);

});
$app->delete('/movies/{id}', function (Request $request, Response $response, array $args) {

    $id = $args['id'];
    $movieDAO = new FilmeDAO(); //Instancia a classe para inserir nos bancos
    $movieDAO->delete($id); //Executa o método para cadastradas no BD os dados repassados pelo usuário

    return $response->withStatus(200);

});
$app->run();