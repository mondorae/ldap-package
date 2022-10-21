<?php

namespace BThanh\FirstPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use BThanh\FirstPackage\LdapCustom;
use LdapRecord\Container;

class LdapController extends Controller
{
    protected $username = "b-thanh@plott.local";
    protected $password = "1zrksrf2UP5VCs4";

    //
    public function index(){
        $connection = Container::getConnection('AD')->connect($this->username, $this->password);
        dd($connection);
    }

    public function getList(){
        $ldap = LdapCustom::connectLdap($this->username, $this->password);
//        dd($ldap);
        if($ldap){
            $list_user = LdapCustom::getLdapUsersList();
        }
        dd($list_user);
    }
}
