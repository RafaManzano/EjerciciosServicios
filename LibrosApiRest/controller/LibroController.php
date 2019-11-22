<?php

require_once "Controller.php";


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        if ($listaLibros != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaLibros, $request->getAccept());
        $response->generate();

    }

    //Prueba para el post
    public function managePostVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;
        $body = null;

        $body = $request->getBodyParameters();
        //$json = $body->json_decode();
        $titulo = $body->titulo;
        $codigo = $body->codigo;
        $numpag = $body->numpag;
        //$libro = new LibroModel($body);
        $libro = new LibroModel($codigo, $titulo, $numpag);

        $funciona = LibroHandlerModel::insertLibro($libro);

        if ($funciona) {
            $code = '200';
        }
        else {
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }
        $response = new Response($code, null, $libro, $request->getAccept());
        $response->generate();
    }

}