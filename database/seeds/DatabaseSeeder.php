<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // name', 'email', 'password'


        Model::unguard();
        $user=new User;
        $user->name='administrador';
        $user->email='administrador@ucr.ac.cr';
        $user->password=Hash::make('admin');
        $user->save();
        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
