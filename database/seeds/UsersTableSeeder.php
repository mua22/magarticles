<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $writer = new Role();
        $writer->name         = 'writer';
        $writer->display_name = 'Writer'; // optional
        $writer->description  = 'User is allowed to write articles'; // optional
        $writer->save();

        $adminUser = new User();
        $adminUser->name = 'Admin User';
        $adminUser->email = 'admin@admin.com'; // optional
        $adminUser->password  = bcrypt('admin'); // optional
        //$adminUser->roles()->attach($admin->id);
        $adminUser->save();
        $adminUser->roles()->attach($admin->id);
        $adminUser->roles()->attach($owner->id);
        /*DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/
    }
}
