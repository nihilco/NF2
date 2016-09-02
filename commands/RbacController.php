<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        echo "Setting up application roles, memberships, and permissions...\n";

        $auth = \Yii::$app->authManager;

        //
        echo "Creating AC...\n";
        
        // AC
        //
        // add "ac" permission
        $ac = $auth->createPermission('ac');
        $ac->description = 'AC Module';
        $auth->add($ac);

        //
        echo "Creating AC Default...\n";
        
        // AC Default
        // add "ac.default" permission
        $acDefault = $auth->createPermission('ac.default');
        $acDefault->description = 'AC Module Default Controller';
        $auth->add($acDefault);

        // add "ac.default.index" permission
        $acDefaultIndex = $auth->createPermission('ac.default.index');
        $acDefaultIndex->description = 'AC Module Default Controller Index Action';
        $auth->add($acDefaultIndex);

        //
        echo "Creating AC Users: ";
        
        // AC Users
        // add "ac.users" permission
        $acUsers = $auth->createPermission('ac.users');
        $acUsers->description = 'AC Module Users Controller';
        $auth->add($acUsers);
        echo "Controller";

        // add "ac.users.create" permission
        $acUsersCreate = $auth->createPermission('ac.users.create');
        $acUsersCreate->description = 'AC Module Users Controller Create Action';
        $auth->add($acUsersCreate);
        echo "and Create/";
        
        // add "ac.users.view" permission
        $acUsersView = $auth->createPermission('ac.users.view');
        $acUsersView->description = 'AC Module Users Controller View Action';
        $auth->add($acUsersView);
        echo "View/";
        
        // add "ac.users.details" permission
        $acUsersDetails = $auth->createPermission('ac.users.details');
        $acUsersDetails->description = 'AC Module Users Controller Details Action';
        $auth->add($acUsersDetails);
        echo "Details/";
        
        // add "ac.users.index" permission
        $acUsersIndex = $auth->createPermission('ac.users.index');
        $acUsersIndex->description = 'AC Module Users Controller Index Action';
        $auth->add($acUsersIndex);
        echo "Index/";
        
        // add "ac.users.update" permission
        $acUsersUpdate = $auth->createPermission('ac.users.update');
        $acUsersUpdate->description = 'AC Module Users Controller Update Action';
        $auth->add($acUsersUpdate);
        echo "Update/";
        
        // add "ac.users.delete" permission
        $acUsersDelete = $auth->createPermission('ac.users.delete');
        $acUsersDelete->description = 'AC Module Users Controller Delete Action';
        $auth->add($acUsersDelete);
        echo "Delete/";
        
        // add "ac.users.list" permission
        $acUsersList = $auth->createPermission('ac.users.list');
        $acUsersList->description = 'AC Module Users Controller List Action';
        $auth->add($acUsersList);
        echo "List/";
        
        // add "ac.users.login" permission
        $acUsersLogin = $auth->createPermission('ac.users.login');
        $acUsersLogin->description = 'AC Module Users Controller Login Action';
        $auth->add($acUsersLogin);
        echo "Login/";
        
        // add "ac.users.logout" permission
        $acUsersLogout = $auth->createPermission('ac.users.logout');
        $acUsersLogout->description = 'AC Module Users Controller Logout Action';
        $auth->add($acUsersLogout);
        echo "Logout/";
        
        // add "ac.users.signup" permission
        $acUsersSignup = $auth->createPermission('ac.users.signup');
        $acUsersSignup->description = 'AC Module Users Controller Signup Action';
        $auth->add($acUsersSignup);
        echo "Signup/";
        
        // add "ac.users.forgot-password" permission
        $acUsersForgotPassword = $auth->createPermission('ac.users.forgot-password');
        $acUsersForgotPassword->description = 'AC Module Users Controller Forgot Password Action';
        $auth->add($acUsersForgotPassword);
        echo "ForgotPassword/";
        
        // add "ac.users.reset-password" permission
        $acUsersResetPassword = $auth->createPermission('ac.users.reset-password');
        $acUsersResetPassword->description = 'AC Module Users Controller Reset Password Action';
        $auth->add($acUsersResetPassword);
        echo "ResetPassword Actions\n";
        
        //
        echo "Creating AC Sessions: ";

        // AC SESSIONS
        // add "ac.sessions" permission
        $acSessions = $auth->createPermission('ac.sessions');
        $acSessions->description = 'AC Module Sessions Controller';
        $auth->add($acSessions);
        echo "Controller ";
        
        // add "ac.sessions.create" permission
        $acSessionsCreate = $auth->createPermission('ac.sessions.create');
        $acSessionsCreate->description = 'AC Module Sessions Controller Create Action';
        $auth->add($acSessionsCreate);
        echo "and Create/";
        
        // add "ac.sessions.view" permission
        $acSessionsView = $auth->createPermission('ac.sessions.view');
        $acSessionsView->description = 'AC Module Sessions Controller View Action';
        $auth->add($acSessionsView);
        echo "View/";
        
        // add "ac.sessions.details" permission
        $acSessionsDetails = $auth->createPermission('ac.sessions.details');
        $acSessionsDetails->description = 'AC Module Sessions Controller Details Action';
        $auth->add($acSessionsDetails);
        echo "Details/";
        
        // add "ac.sessions.index" permission
        $acSessionsIndex = $auth->createPermission('ac.sessions.index');
        $acSessionsIndex->description = 'AC Module Sessions Controller Index Action';
        $auth->add($acSessionsIndex);
        echo "Index/";
        
        // add "ac.sessions.update" permission
        $acSessionsUpdate = $auth->createPermission('ac.sessions.update');
        $acSessionsUpdate->description = 'AC Module Sessions Controller Update Action';
        $auth->add($acSessionsUpdate);
        echo "Update";
        
        // add "ac.sessions.delete" permission
        $acSessionsDelete = $auth->createPermission('ac.sessions.delete');
        $acSessionsDelete->description = 'AC Module Sessions Controller Delete Action';
        $auth->add($acSessionsDelete);
        echo "Delete/";
        
        // add "ac.sessions.list" permission
        $acSessionsList = $auth->createPermission('ac.sessions.list');
        $acSessionsList->description = 'AC Module Sessions Controller List Action';
        $auth->add($acSessionsList);
        echo "List Actions\n";
        
        //
        $auth->addChild($ac, $acDefault);
        $auth->addChild($ac, $acUsers);
        $auth->addChild($ac, $acSessions);

        $auth->addChild($acDefault, $acDefaultIndex);

        $auth->addChild($acUsers, $acUsersIndex);
        $auth->addChild($acUsers, $acUsersCreate);
        $auth->addChild($acUsers, $acUsersView);
        $auth->addChild($acUsers, $acUsersDetails);
        $auth->addChild($acUsers, $acUsersUpdate);
        $auth->addChild($acUsers, $acUsersDelete);
        $auth->addChild($acUsers, $acUsersList);
        $auth->addChild($acUsers, $acUsersLogin);
        $auth->addChild($acUsers, $acUsersLogout);
        $auth->addChild($acUsers, $acUsersSignup);
        $auth->addChild($acUsers, $acUsersForgotPassword);
        $auth->addChild($acUsers, $acUsersResetPassword);

        $auth->addChild($acSessions, $acSessionsIndex);
        $auth->addChild($acSessions, $acSessionsCreate);
        $auth->addChild($acSessions, $acSessionsView);
        $auth->addChild($acSessions, $acSessionsDetails);
        $auth->addChild($acSessions, $acSessionsUpdate);
        $auth->addChild($acSessions, $acSessionsDelete);
        $auth->addChild($acSessions, $acSessionsList);

        
        // CORE
        //
        // add "core" permission
        $core = $auth->createPermission('core');
        $core->description = 'Core Module';
        $auth->add($core);

        // Core Default
        // add "core.default" permission
        $coreDefault = $auth->createPermission('core.default');
        $coreDefault->description = 'Core Module Default Controller';
        $auth->add($coreDefault);

        // add "ac.default.index" permission
        $coreDefaultIndex = $auth->createPermission('core.default.index');
        $coreDefaultIndex->description = 'Core Module Default Controller Index Action';
        $auth->add($coreDefaultIndex);

        // Core Errors
        // add "core.errors" permission
        $coreErrors = $auth->createPermission('core.errors');
        $coreErrors->description = 'Core Module Errors Controller';
        $auth->add($coreErrors);

        // add "core.errors.error" permission
        $coreErrorsError = $auth->createPermission('core.errors.error');
        $coreErrorsError->description = 'Core Module Errors Controller Error Action';
        $auth->add($coreErrorsError);

        //
        $auth->addChild($core, $coreDefault);
        $auth->addChild($core, $coreErrors);
        $auth->addChild($coreDefault, $coreDefaultIndex);
        $auth->addChild($coreErrors, $coreErrorsError);

        
        // SUPPORT
        //
        // add "support" permission
        $support = $auth->createPermission('support');
        $support->description = 'Support Module';
        $auth->add($support);

        // Support Default
        // add "support.default" permission
        $supportDefault = $auth->createPermission('support.default');
        $supportDefault->description = 'Support Module Default Controller';
        $auth->add($supportDefault);

        // add "support.default.index" permission
        $supportDefaultIndex = $auth->createPermission('support.default.index');
        $supportDefaultIndex->description = 'Support Module Default Controller Index Action';
        $auth->add($supportDefaultIndex);

        //
        $auth->addChild($support, $supportDefault);
        $auth->addChild($supportDefault, $supportDefaultIndex);

        
        // CMS
        //
        // add "cms" permission
        $cms = $auth->createPermission('cms');
        $cms->description = 'CMS Module';
        $auth->add($cms);

        // CMS Default
        // add "cms.default" permission
        $cmsDefault = $auth->createPermission('cms.default');
        $cmsDefault->description = 'CMS Module Default Controller';
        $auth->add($cmsDefault);

        // add "cms.default.index" permission
        $cmsDefaultIndex = $auth->createPermission('cms.default.index');
        $cmsDefaultIndex->description = 'CMS Module Default Controller Index Action';
        $auth->add($cmsDefaultIndex);

        //
        $auth->addChild($cms, $cmsDefault);
        $auth->addChild($cmsDefault, $cmsDefaultIndex);
        
        // ECOM
        //
        // add "ecom" permission
        $ecom = $auth->createPermission('ecom');
        $ecom->description = 'Ecom Module';
        $auth->add($ecom);

        // Ecom Default
        // add "ecom.default" permission
        $ecomDefault = $auth->createPermission('ecom.default');
        $ecomDefault->description = 'Ecom Module Default Controller';
        $auth->add($ecomDefault);

        // add "ecom.default.index" permission
        $ecomDefaultIndex = $auth->createPermission('ecom.default.index');
        $ecomDefaultIndex->description = 'Ecom Module Default Controller Index Action';
        $auth->add($ecomDefaultIndex);

        //
        $auth->addChild($ecom, $ecomDefault);
        $auth->addChild($ecomDefault, $ecomDefaultIndex);
        
        // PA
        //
        // add "pa" permission
        $pa = $auth->createPermission('pa');
        $pa->description = 'PA Module';
        $auth->add($pa);

        // PA Default
        // add "pa.default" permission
        $paDefault = $auth->createPermission('pa.default');
        $paDefault->description = 'PA Module Default Controller';
        $auth->add($paDefault);

        // add "pa.default.index" permission
        $paDefaultIndex = $auth->createPermission('pa.default.index');
        $paDefaultIndex->description = 'PA Module Default Controller Index Action';
        $auth->add($paDefaultIndex);

        //
        $auth->addChild($pa, $paDefault);
        $auth->addChild($paDefault, $paDefaultIndex);


        /////////////////////////
        //
        //
        // add "Guest" role and give this role permissions
        $guest = $auth->createRole('Guest');
        $guest->description("Guest Role");
        $auth->add($guest);
        $auth->addChild($guest, $acUsersLogin);
        $auth->addChild($guest, $acUsersSignup);
        $auth->addChild($guest, $acUsersForgotPassword);
        $auth->addChild($guest, $acUsersResetPassword);
        $auth->addChild($guest, $coreDefaultIndex);
        $auth->addChild($guest, $coreErrorsError);

        // add "User" role and give this role permissions
        $user = $auth->createRole('User');
        $user->description("User Role");
        $auth->add($user);
        $auth->addChild($user, $guest);
        $auth->addChild($user, $acUsersLogout);

        // add "admin" role and give this role permissions
        $admin = $auth->createRole('Administrator');
        $admin->description("Administrator Role");
        $auth->add($admin);
        $auth->addChild($admin, $user);
        $auth->addChild($admin, $ac);
        $auth->addChild($admin, $core);
        $auth->addChild($admin, $ecom);
        $auth->addChild($admin, $pa);
        $auth->addChild($admin, $cms);
        $auth->addChild($admin, $support);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 4);
        $auth->assign($user, 3);
        $auth->assign($user, 2);
        $auth->assign($user, 1);
        $auth->assign($admin, 2);
        $auth->assign($admin, 1);
    }
}