<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'NumberOne']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Manager']);
        $role4 = Role::create(['name' => 'Blogger']);
        $role5 = Role::create(['name' => 'Planner']);
        $role6 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.zonas.index', 'description'=>'listar zonas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.create', 'description'=>'crear zona'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.edit', 'description'=>'editar zona'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.zonas.destroy', 'description'=>'eliminar zona'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.groups.index', 'description'=>'listar grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.create', 'description'=>'crear grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.edit', 'description'=>'editar grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.groups.destroy', 'description'=>'eliminar grupos'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 'description'=>'listar usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.edit', 'description'=>'editar usuarios'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.permissions.index', 'description'=>'listar permisos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.create', 'description'=>'crear permisos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.edit', 'description'=>'editar permisos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.permissions.destroy', 'description'=>'eliminar permisos'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.roles.index', 'description'=>'listar roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create', 'description'=>'crear roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.edit', 'description'=>'editar roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.destroy', 'description'=>'eliminar roles'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.index', 'description'=>'listar categorias'])->syncRoles([$role1, $role2,$role3, $role4]);
        Permission::create(['name' => 'admin.categories.create', 'description'=>'crear categorias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categories.edit', 'description'=>'editar categorias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categories.destroy', 'description'=>'eliminar categorias'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.tags.index', 'description'=>'listar etiquetas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.tags.create', 'description'=>'crear etiquetas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tags.edit', 'description'=>'editar etiquetas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tags.destroy', 'description'=>'eliminar etiquetas'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.posts.index', 'description'=>'listar apuntes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.create', 'description'=>'crear apuntes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.edit', 'description'=>'editar apuntes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.posts.destroy', 'description'=>'eliminar apuntes'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.comments.index', 'description'=>'listar comentarios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.ofertas.index', 'description'=>'listar ofertas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.create', 'description'=>'crear ofertas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.edit', 'description'=>'editar ofertas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.ofertas.destroy', 'description'=>'eliminar ofertas'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.servicios.index', 'description'=>'listar servicios'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.create', 'description'=>'crear servicios'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.edit', 'description'=>'editar servicios'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.servicios.destroy', 'description'=>'eliminar servicios'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_equipos.index', 'description'=>'listar grupos de equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.create', 'description'=>'crear grupos de equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.edit', 'description'=>'editar grupos de equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_equipos.destroy', 'description'=>'eliminar grupos de equipos'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_materials.index', 'description'=>'listar grupos de materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.create', 'description'=>'crear grupos de materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.edit', 'description'=>'editar grupos de materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_materials.destroy', 'description'=>'eliminar grupos de materiales'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.grupo_obreros.index', 'description'=>'listar grupos de obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.create', 'description'=>'crear grupos de obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.edit', 'description'=>'editar grupos de obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.grupo_obreros.destroy', 'description'=>'eliminar grupos de obreros'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.equipos.index', 'description'=>'listar equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.create', 'description'=>'crear equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.edit', 'description'=>'editar equipos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.equipos.destroy', 'description'=>'eliminar equipos'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.materials.index', 'description'=>'listar materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.create', 'description'=>'crear materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.edit', 'description'=>'editar materiales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.materials.destroy', 'description'=>'eliminar materiales'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.obreros.index', 'description'=>'listar obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.create', 'description'=>'crear obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.edit', 'description'=>'editar obreros'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.obreros.destroy', 'description'=>'eliminar obreros'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.transportes.index', 'description'=>'listar transportes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.create', 'description'=>'crear transportes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.edit', 'description'=>'editar transportes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.transportes.destroy', 'description'=>'eliminar transportes'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.generals.index', 'description'=>'listar generales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.create', 'description'=>'crear generales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.edit', 'description'=>'editar generales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.generals.destroy', 'description'=>'eliminar generales'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.indirectos.index', 'description'=>'listar indirectos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.create', 'description'=>'crear indirectos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.edit', 'description'=>'editar indirectos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indirectos.destroy', 'description'=>'eliminar indirectos'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.indices.index', 'description'=>'listar indices'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.create', 'description'=>'crear indices'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.edit', 'description'=>'editar indices'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.indices.destroy', 'description'=>'eliminar indices'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.precios.index', 'description'=>'listar precios unitarios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.create', 'description'=>'crear precios unitarios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.edit', 'description'=>'editar precios unitarios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.precios.destroy', 'description'=>'eliminar precios unitarios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.projects.index', 'description'=>'listar presupuestos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.projects.create', 'description'=>'crear presupuestos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.projects.edit', 'description'=>'editar presupuestos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.projects.destroy', 'description'=>'eliminar presupuestos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'admin.home', 'description'=>'acceso administrar'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        // create permissions
        //Permission::create(['name' => 'Administer roles & permissions']);
        //Permission::create(['name' => 'Create Post']);
        //Permission::create(['name' => 'Edit Post']);
        //Permission::create(['name' => 'Delete Post']);
        //Permission::create(['name' => 'Publish Post']);
        //Permission::create(['name' => 'Unpublish Post']);
        //Permission::create(['name' => 'Comment Post']);

        // create roles and assign existing permissions
        //$role = Role::create(['name' => 'admin']);
        //$role->givePermissionTo(['Administer roles & permissions', 'Create Post', 'Edit Post', 'Delete Post',  'Publish //Post', 'Unpublish Post', 'Comment Post']);

        //$role = Role::create(['name' => 'user']);
        //$role->givePermissionTo('Comment Post');

        //$role = Role::create(['name' => 'writer']);
        //$role->givePermissionTo('Create Post');
    }
}
