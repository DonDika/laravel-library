<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat permission 
        Permission::create(['name'=>'manage books']);
        Permission::create(['name'=>'manage members']);
        Permission::create(['name'=>'borrow books']);

        //membuat role admin dan memberikan semua permission
        $admin = Role::create(['name'=>'admin']);
        $admin->givePermissionTo(Permission::all());

        //membuat role librarian dan memberikan akses khusus
        $librarian = Role::create(['name'=>'librarian']);
        $librarian->givePermissionTo(['manage members','manage books']);

        //membuat role member dan memberikan akses peminjaman buku
        $member = Role::create(['name'=>'member']);
        $member->givePermissionTo('borrow books');   
    }
}
