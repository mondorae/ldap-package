<?php

namespace BThanh\FirstPackage;

use BThanh\FirstPackage\Ldap\LdapUsers;
use LdapRecord\Container;

class LdapCustom
{

    public static function connectLdap($username, $password)
    {
        return Container::getConnection('AD')->connect($username, $password);
    }

    public static function getLdapUserInfo($username)
    {
        $user = LdapUsers::where("userprincipalname", $username)->get([
            "givenname",
            "sn",
            "displayname",
            "samaccountname",
            "mail",
            "userprincipalname",
        ]);
        return self::formatLdapInfo($user)[0];
    }

    public static function formatLdapInfo($userInfo)
    {
        $users_list = [];
        foreach ($userInfo as $user_key => $user_val) {
            if (!isset($user_val->givenname)
                || implode($user_val->samaccountname)
                == implode($user_val->displayname)
            ) {
                continue;
            }
            $users_list[] = [
                "first_name" => implode($user_val->givenname),
                "last_name"  => implode($user_val->sn),
                "full_name"  => implode($user_val->displayname),
                "login_code" => implode($user_val->userprincipalname),
                "mail"       => implode($user_val->mail),
            ];
        }
        return $users_list;
    }

    public static function formatLoginCode($username)
    {
        return $username.'@plott.local';
    }

    public static function removeLoginCode($username)
    {
        return explode('@', $username)[0];
    }

    public static function getLdapUsersList()
    {
        //Lấy danh sách user
        $users = LdapUsers::get([
            "givenname",
            "sn",
            "displayname",
            "samaccountname",
            "mail",
            "userprincipalname",
        ]);
        return self::formatLdapInfo($users);
    }

}
