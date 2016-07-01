<?php

use Phalcon\Mvc\User\Component;
use Phalcon\Acl\Adapter\Memory as AclMemory;
use Phalcon\Acl\Role as AclRole;
use Phalcon\Acl\Resource as AclResource;
//use Ofigest\Models\Profiles;
use Phalcon\Mvc\Model;

/**
 * Vokuro\Acl\Acl
 */
class Acl extends Component
{

    /**
     * The ACL Object
     *
     * @var \Phalcon\Acl\Adapter\Memory
     */
    private $acl;

    /**
     * The file path of the ACL cache file from APP_DIR
     *
     * @var string
     */
    private $filePath = '/cache/acl/data.txt';

    /**
     * Define the resources that are considered "private". These controller => actions require authentication.
     *
     * @var array
     */
    private $privateResources = array(
        'agenda' => array(
            'index'
        ),
        'agenda_cli' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'clientes' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'clientes_moradas_cli' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'clientes_moradas' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'clientes_veiculos' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'intervencoes' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'intervencoes_tipos' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'manutencoes' => array(
            'index',
            'search',
            'new',
            'newFromAgenda',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'manutencoes_agendadas' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'manutencoes_cli' => array(
            'index',
            'search'
        ),
        'marcas' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'mensagens' => array(
            'index',
            'ler'
        ),
        'modelos' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'permissions' => array(
            'index'

        ),
        'profiles' => array(
            'index',
            'search',
            'edit',
            'create',
            'delete'
        ),
        'veiculos' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'veiculos_cli' => array(
            'index',
            'search',
            'new',
            'edit',
            'create',
            'save',
            'delete'
        ),
        'users' => array(
            'index',
            'search',
            'edit',
            'create',
            'delete',
            'changePassword'
        )
    );

    /**
     * Human-readable descriptions of the actions used in {@see $privateResources}
     *
     * @var array
     */
    private $actionDescriptions = array(
        'index'         => 'Aceder á Pesquisa',
        'search'        => 'Pesquisar Registos',
        'new'           => 'Criar Novo Registo',    //Criei
        'newFromAgenda' => 'Criar Registo Agendado',//Criei
        'save'          => 'Salvar Alterações',     //Criei
        'create'        => 'Criar Registo',
        'edit'          => 'Editar Registo',
        'delete'        => 'Eliminar Registo',
        'changePassword'=> 'Alterar Password'
    );

    /**
     * Checks if a controller is private or not
     *
     * @param string $controllerName
     * @return boolean
     */
    public function isPrivate($controllerName)
    {
        $controllerName = strtolower($controllerName);
        return isset($this->privateResources[$controllerName]);
    }

    /**
     * Checks if the current profile is allowed to access a resource
     *
     * @param string $profile
     * @param string $controller
     * @param string $action
     * @return boolean
     */
    public function isAllowed($profile, $controller, $action)
    {
        return $this->getAcl()->isAllowed($profile, $controller, $action);
    }

    /**
     * Returns the ACL list
     *
     * @return \Phalcon\Acl\Adapter\Memory
     */
    public function getAcl()
    {
        // Check if the ACL is already created
        if (is_object($this->acl)) {
            return $this->acl;
        }

        // Check if the ACL is in APC
        if (function_exists('apc_fetch')) {
            $acl = apc_fetch('vokuro-acl');
            if (is_object($acl)) {
                $this->acl = $acl;
                return $acl; //Está a chegar aqui!!!
            }
        }

        // Check if the ACL is already generated
        if (!file_exists(APP_DIR . $this->filePath)) {
            $this->acl = $this->rebuild();
            return $this->acl;
        }

        // Get the ACL from the data file
        $data = file_get_contents(APP_DIR . $this->filePath);
        $this->acl = unserialize($data);

        // Store the ACL in APC
        if (function_exists('apc_store')) {
            apc_store('vokuro-acl', $this->acl);
        }

        return $this->acl;
    }

    /**
     * Returns the permissions assigned to a profile
     *
     * @param Profiles $profile
     * @return array
     */
    public function getPermissions(Profiles $profile)
    {
        $permissions = array();
        foreach ($profile->getPermissions() as $permission) {
            $permissions[$permission->resource . '.' . $permission->action] = true;
        }
        return $permissions;
    }

    /**
     * Returns all the resources and their actions available in the application
     *
     * @return array
     */
    public function getResources()
    {
        return $this->privateResources;
    }

    /**
     * Returns the action description according to its simplified name
     *
     * @param string $action
     * @return string
     */
    public function getActionDescription($action)
    {
        if (isset($this->actionDescriptions[$action])) {
            return $this->actionDescriptions[$action];
        } else {
            return $action;
        }
    }

    /**
     * Rebuilds the access list into a file
     *
     * @return \Phalcon\Acl\Adapter\Memory
     */
    public function rebuild()
    {
        $acl = new AclMemory();

        $acl->setDefaultAction(\Phalcon\Acl::DENY);

        // Register roles
        $profiles = Profiles::find('active = "Y"');

        foreach ($profiles as $profile) {
            $acl->addRole(new AclRole($profile->name));
        }

        foreach ($this->privateResources as $resource => $actions) {
            $acl->addResource(new AclResource($resource), $actions);
        }

        // Grant access to private area to role Users
        foreach ($profiles as $profile) {

            // Grant permissions in "permissions" model
            foreach ($profile->getPermissions() as $permission) {
                $acl->allow($profile->name, $permission->resource, $permission->action);
            }

            // Always grant these permissions
            $acl->allow($profile->name, 'users', 'changePassword');
        }

        if (touch(APP_DIR . $this->filePath) && is_writable(APP_DIR . $this->filePath)) {

            file_put_contents(APP_DIR . $this->filePath, serialize($acl));

            // Store the ACL in APC
            if (function_exists('apc_store')) {
                apc_store('vokuro-acl', $acl);
            }
        } else {
            $this->flash->error(
                'The user does not have write permissions to create the ACL list at ' . APP_DIR . $this->filePath
            );
        }

        return $acl;
    }
}
