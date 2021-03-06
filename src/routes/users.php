<?php

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\TbUser;

$app->get('/api/v1/users', function (Request $request, Response $response, array $args) {
    $users = TbUser::get();
    return $response->withJson($users);
});

$app->post('/api/v1/users', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $user = TbUser::create($data);
    return $response->withJson($user, 201);
});

$app->get('/api/v1/users/{id}', function (Request $request, Response $response, array $args) {
    $user = TbUser::findOrFail($args['id']);
    return $response->withJson($user);
});

$app->put('/api/v1/users/{id}', function (Request $request, Response $response, array $args) {
    $user = TbUser::findOrFail($args['id']);
    $user->update($request->getParsedBody());
    return $response->withJson($user);
});

$app->delete('/api/v1/users/{id}', function (Request $request, Response $response, array $args) {
    $user = TbUser::findOrFail($args['id']);
    $user->delete();
    return $response->withJson($user);
});