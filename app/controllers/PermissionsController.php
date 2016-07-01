<?php

use Phalcon\Mvc\Model;


/**
 * View and define permissions for the various profile levels.
 */
class PermissionsController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Permissões');
        parent::initialize();
    }
    /**
     * View the permissions for a profile level, and change them if we have a POST.
     */
    public function indexAction()
    {
        if ($this->request->isPost()) {

            // Validate the profile
            $profile = Profiles::findFirstById($this->request->getPost('profileId'));

            if ($profile) {

                if ($this->request->hasPost('permissions')) {

                    // Deletes the current permissions
                    $profile->getPermissions()->delete();

                    // Save the new permissions
                    foreach ($this->request->getPost('permissions') as $permission) {

                        $parts = explode('.', $permission);

                        $permission = new Permissions();
                        $permission->profilesId = $profile->id;
                        $permission->resource = $parts[0];
                        $permission->action = $parts[1];

                        $permission->save();
                    }

                    $this->flash->success('As Permissões foram atualizadas com sucesso');
                }

                // Rebuild the ACL with
                $this->acl->rebuild();

                // Pass the current permissions to the view
                $this->view->permissions = $this->acl->getPermissions($profile);
            }

            $this->view->profile = $profile;
        }

        // Pass all the active profiles
        $this->view->profiles = Profiles::find('active = "Y"');
    }
}
