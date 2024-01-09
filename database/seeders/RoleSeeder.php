<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Creador']);
        $role3 = Role::create(['name' => 'Editor']);
        $role4 = Role::create(['name' => 'Lector']);

        Permission::create(['name' => 'dashboard'])->syncRoles($role1, $role2, $role3, $role4);

        //Profile
        Permission::create(['name' => 'profile.edit'])->syncRoles($role1);
        Permission::create(['name' => 'profile.update'])->syncRoles($role1);
        Permission::create(['name' => 'profile.destroy'])->syncRoles($role1);

        //Permissions for Station
        Permission::create(['name' => 'stations.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'stations.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'stations.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'stations.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'stations.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'stations.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'stations.destroy'])->syncRoles($role1);

        //Permissions for Program
        Permission::create(['name' => 'programs.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'programs.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'programs.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'programs.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'programs.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'programs.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'programs.destroy'])->syncRoles($role1);

        //Permissions for Audio-Libraries
        Permission::create(['name' => 'audio-libraries.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'audio-libraries.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'audio-libraries.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'audio-libraries.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'audio-libraries.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'audio-libraries.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'audio-libraries.destroy'])->syncRoles($role1);

        //Permissions for Podcast
        Permission::create(['name' => 'podcasts.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'podcasts.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'podcasts.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'podcasts.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'podcasts.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'podcasts.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'podcasts.destroy'])->syncRoles($role1);

        //Permissions for Music
        Permission::create(['name' => 'music.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'music.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'music.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'music.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'music.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'music.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'music.destroy'])->syncRoles($role1);

        //Permissions for Announcement
        Permission::create(['name' => 'announcements.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'announcements.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'announcements.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'announcements.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'announcements.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'announcements.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'announcements.destroy'])->syncRoles($role1);

        //Permissions for Broadcast
        Permission::create(['name' => 'broadcasts.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'broadcasts.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'broadcasts.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'broadcasts.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'broadcasts.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'broadcasts.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'broadcasts.destroy'])->syncRoles($role1);

        //Permissions for Interpreter
        Permission::create(['name' => 'roles.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'roles.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'roles.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'roles.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'roles.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'roles.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'roles.destroy'])->syncRoles($role1);

        //Permissions for Category
        Permission::create(['name' => 'categories.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'categories.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categories.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categories.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'categories.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'categories.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'categories.destroy'])->syncRoles($role1);

        //Permissions for Interpreter
        Permission::create(['name' => 'interpreters.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'interpreters.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'interpreters.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'interpreters.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'interpreters.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'interpreters.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'interpreters.destroy'])->syncRoles($role1);
        

        //Permissions for Musical Genre
        Permission::create(['name' => 'musical-genres.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'musical-genres.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'musical-genres.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'musical-genres.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'musical-genres.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'musical-genres.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'musical-genres.destroy'])->syncRoles($role1);

        //Permissions for Broadcast Mode
        Permission::create(['name' => 'broadcast-modes.index'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'broadcast-modes.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'broadcast-modes.store'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'broadcast-modes.show'])->syncRoles($role1, $role2, $role3, $role4);
        Permission::create(['name' => 'broadcast-modes.edit'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'broadcast-modes.update'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'broadcast-modes.destroy'])->syncRoles($role1);


    }
}
