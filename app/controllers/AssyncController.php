<?php

class AssyncController extends ControllerBase
{
    public function initialize()
    {
        //desativa o view
        $this->view->disable();
    }

    public function searchModeloAction()
    {
        $marca = $this->request->getPost("id_marca","int");

        $result_dis = $this->modelsManager->executeQuery("SELECT mo.* FROM Modelos as mo WHERE mo.marca="
            . $marca . " ORDER BY mo.modelo");
        $resData = array();
        foreach ($result_dis as $result)
            $resData[]= array("modeloId"=>$result->id, "modeloDesc"=>$result->modelo);

        //echo json_encode($resData); //outra opção

        $response = new \Phalcon\Http\Response();
        $response->setContent(json_encode($resData));
        return $response;
    }


}