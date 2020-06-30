<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//permisos para modulo de usuarios
        Permission::Create([
        	'name' => 'Navegar usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::Create([
        	'name' => 'Ver detalle del usuario',
        	'slug' => 'users.show',
        	'description' => 'Ver en detalle cada usuario del sistema',
        ]);

        Permission::Create([
        	'name' => 'Editar usuario',
        	'slug' => 'users.edit',
        	'description' => 'Editar cualquier usuario del sistema',
        ]);

        Permission::Create([
        	'name' => 'Eliminar usuario',
        	'slug' => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);

        Permission::Create([
        	'name' => 'Crear usuario',
        	'slug' => 'users.create',
        	'description' => 'Crear un usuario nuevo en el sistema',
        ]);
        //permisos para modulo de usuarios

        //permisos para modulo de roles
        Permission::Create([
        	'name' => 'Navegar roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::Create([
        	'name' => 'Ver detalle del rol',
        	'slug' => 'roles.show',
        	'description' => 'Ver en detalle cada rol del sistema',
        ]);

        Permission::Create([
        	'name' => 'Editar rol',
        	'slug' => 'roles.edit',
        	'description' => 'Editar cualquier rol del sistema',
        ]);

        Permission::Create([
        	'name' => 'Eliminar rol',
        	'slug' => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        Permission::Create([
        	'name' => 'Crear rol',
        	'slug' => 'roles.create',
        	'description' => 'Crear un rol nuevo en el sistema',
        ]);
        //permisos para modulo de roles

        //permisos para modulo de permisos
        Permission::Create([
            'name' => 'Navegar permisos',
            'slug' => 'permissions.index',
            'description' => 'Lista y navega todos los permisos del sistema',
        ]);

        Permission::Create([
            'name' => 'Ver detalle del permiso',
            'slug' => 'permissions.show',
            'description' => 'Ver en detalle cada permiso del sistema',
        ]);

        Permission::Create([
            'name' => 'Editar permiso',
            'slug' => 'permissions.edit',
            'description' => 'Editar cualquier permiso del sistema',
        ]);

        Permission::Create([
            'name' => 'Eliminar permiso',
            'slug' => 'permissions.destroy',
            'description' => 'Eliminar cualquier permiso del sistema',
        ]);

        Permission::Create([
            'name' => 'Crear permiso',
            'slug' => 'permissions.create',
            'description' => 'Crear un permiso nuevo en el sistema',
        ]);
        //permisos para modulo de permisos
    }
}
