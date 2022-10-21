<?php

namespace BThanh\FirstPackage\Ldap;

use LdapRecord\Models\Model;
use LdapRecord\Models\ActiveDirectory\Entry;

class LdapUsers extends Model
{
    protected $connection = 'AD';
    /**
     * The object classes of the LDAP model.
     *
     * @var array
     */
    public static $objectClasses = [];
}
