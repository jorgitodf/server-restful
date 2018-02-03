<?php

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\Ticket;

$app->get('/api/v1/tickets', function (Request $request, Response $response, array $args) {
    $tickets = Ticket::get();
    return $response->withJson($tickets);
});