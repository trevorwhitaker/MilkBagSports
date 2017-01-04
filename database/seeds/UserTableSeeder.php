<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $admin = new User();
        $admin->email = 'Feltie';
        $admin->password = Hash::make('Trev1234');
        $admin->first_name = 'Trevor';
        $admin->last_name = 'Whitaker';
        $admin->alias = 'Biggie Bigs';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $admin2 = new User();
        $admin2->email = 'KaulG';
        $admin2->password = Hash::make('gaga1234');
        $admin2->first_name = 'Gagan';
        $admin2->last_name = 'Kaul';
        $admin2->alias = 'Scoop';
        $admin2->save();
        $admin2->roles()->attach($role_admin);

        $admin3 = new User();
        $admin3->email = 'PatrickO';
        $admin3->password = Hash::make('patr1234');
        $admin3->first_name = 'Patrick';
        $admin3->last_name = 'Orr';
        $admin3->alias = 'The Vet';
        $admin3->save();
        $admin3->roles()->attach($role_admin);

        $author = new User();
        $author->email = 'EdwardsC';
        $author->password = Hash::make('coli1234');
        $author->first_name = 'Colin';
        $author->last_name = 'Edwards';
        $author->alias = 'C-eds';
        $author->save();
        $author->roles()->attach($role_author);

        $author2 = new User();
        $author2->email = 'BrownS';
        $author2->password = Hash::make('sam1234');
        $author2->first_name = 'Sam';
        $author2->last_name = 'Brown';
        $author2->alias = 'Big Brown';
        $author2->save();
        $author2->roles()->attach($role_author);

        $author3 = new User();
        $author3->email = 'LairdD';
        $author3->password = Hash::make('lair1234');
        $author3->first_name = 'Dylan';
        $author3->last_name = 'Laird';
        $author3->alias = 'Dylan';
        $author3->save();
        $author3->roles()->attach($role_author);

        $author4 = new User();
        $author4->email = 'WongC';
        $author4->password = Hash::make('chri1234');
        $author4->first_name = 'Chris';
        $author4->last_name = 'Wong';
        $author4->alias = 'Snax';
        $author4->save();
        $author4->roles()->attach($role_author);
    }
}
