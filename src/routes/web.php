<?php

use Illuminate\Support\Facades\Route;

Route::get('ldap', [\BThanh\FirstPackage\Http\Controllers\LdapController::class, 'index'])->name("ldap.index");

Route::get('ldap/ldap-list', [\BThanh\FirstPackage\Http\Controllers\LdapController::class, 'getList'])->name('ldap.user_list');
