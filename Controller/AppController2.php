<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
   
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
	
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authenticate' => [
            'Form' => [
            'fields' => [
            'username' => 'username',
            'password' => 'password'
            ]               
            ]
        ],
        'loginAction' => [
        'controller' => 'Users',
        'action' => 'login'
        ],

        'unauthorizedRedirect' => $this->referer()
        ]);
        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index','changeLanguage']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user)
    {
    // By default deny access.
    return true;
    }

    public function changeLanguage($lang){
    if(!empty($lang)){
        if($lang == 'es_PE'){
            $this->getSession()->write('Config.language', 'es_PE');
        }

        else if($lang == 'pt_BR'){
            $this->getSession()->write('Config.language', 'pt_BR');
        }

        //in order to redirect the user to the page from which it was called
        $this->redirect($this->referer());
    }
}

protected function _checkBrowserLanguage(){
    if(!$this->Session->check('Config.language')){

        //checking the 1st favorite language of the user's browser
        $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        //available languages
        switch ($browserLanguage){
            case "es_PE":
                $this->Session->write('Config.language', 'es_PE');
                break;
            case "pt_BR":
                $this->Session->write('Config.language', 'pt_BR');
                break;
            
        }
    }
}
public function beforeFilter() {
    //checking the browsers language when there's no language session
    $this->_checkBrowserLanguage();
}

}
/* public function beforeFilter(Event $event)
    {
        if($this->request->getSession()->check('Config.language'))
        {
            I18n::setlocale($this->request->session()->read('Config.language'));
        }
        else
        {
            $this->request->getSession()->write('Config.language',I18n::locale($
       }
    }
public function beforeFilter(Event $event)
    {
if  ( $ this -> Session -> check ( 'Config.language' ))  { 
            Configure :: write ( 'Config.language' ,  $ this -> Session -> read$
        }
}*/

/*    public function changeLanguage($language=null){
        if($language!=null && in_array($language,['en_US','es_PE','pt_BR']))
        {
            $this->request->getSession()->write('Config.language',$language);

            return $this->redirect($this->referer());

        }else{
            $this->request->getSession()->write('Config.language',I18n::locale($
            return $this->redirect($this->referer());
        }

    }*/
       