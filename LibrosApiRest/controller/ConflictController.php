<?php

require_once "Controller.php";

class ConflictController extends Controller
{
    public function manage(Request $req)
    {
        $response = new Response('409', null, null, $req->getAccept());
        $response->generate();
    }

}