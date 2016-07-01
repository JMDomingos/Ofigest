<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{
    private $_tabs = array(
        'Clientes' => array(
            'controller' => 'clientes',
            'action' => 'index',
            'any' => true
        ),
        'Veiculos' => array(
            'controller' => 'veiculos',
            'action' => 'index',
            'any' => true
        ),
        'Clientes/Viaturas' => array(
            'controller' => 'clientes_veiculos',
            'action' => 'index',
            'any' => true
        ),
        'Clientes/Moradas' => array(
            'controller' => 'clientes_moradas',
            'action' => 'index',
            'any' => true
        ),
        'Marcas' => array(
            'controller' => 'marcas',
            'action' => 'index',
            'any' => true
        ),
        'Modelos' => array(
            'controller' => 'modelos',
            'action' => 'index',
            'any' => true
        ),
        'Tipos de Intervenções' => array(
            'controller' => 'intervencoes_tipos',
            'action' => 'index',
            'any' => true
        )
    );

    /**
     * Returns menu tabs
     */
    public function getTabs() //$tabs=$this->_tabs não dá
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
        }
        echo '</ul>';
    }
}
