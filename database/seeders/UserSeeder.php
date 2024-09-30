<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Permission;
use App\Models\StatusUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $roles = ['admin', 'member', 'guest'];

            foreach ($roles as $data) {
                $role = Role::updateOrCreate([
                    'name'  => $data
                ]);
            }

            $permissions = ['member-account', 'approved', 'guest'];

            foreach ($permissions as $data) {
                Permission::updateOrCreate([
                    'name'  => $data
                ]);
            }
    
            $status = ['unverified', 'verified'];
    
            foreach ($status as $data) {
                StatusUser::updateOrCreate([
                    'name'  => $data
                ]);
            }

            $status = StatusUser::where('name', 'verified')->first();
    
            $admin = User::create([
                'username' => 'superduperadmin',
                'email' => 'admin@desamerdeka.go.id',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status->id,
            ])->assignRole('admin');
    
            Admin::create([
                'user_id'   => $admin->id,
                'name'      => 'Super Admin',
                'image'     => 'virtual/assets/img/faces/6.png',
                'is_main'   => 1,
            ]);
            
            $type = ['Desa', 'UMKM', 'Industri', 'Komunitas/Asosiasi'];
            foreach ($type as $data) {
                MemberType::updateOrCreate([
                    'name'  => $data
                ]);
            }


            // ===========================================================================================
            
            $users = [
                [
                    'username' => 'jatibarang',
                    'email' => 'jatibarang@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'status_user_id' => $status->id,
                ],
                [
                    'username' => 'sZero',
                    'email' => 'sZero@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'status_user_id' => $status->id 
                ],
                [
                    'username' => 'basrengSultan',
                    'email' => 'basrengSultan@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'status_user_id' => $status->id,
                ],
                [
                    'username' => 'esjaUtama',
                    'email' => 'esjaUtama@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'status_user_id' => $status->id,
                ],
            ];
    
            foreach ($users as $data) {
                $user[] = User::updateOrCreate($data)->assignRole('member');
            }
    
            $memberType = MemberType::get();
    
            $members = [
                [
                    'user_id'                   => $user[0]->id,
                    'member_type_id'            => $memberType->where('name', 'Desa')->first()->id,
                    'name'                      => 'Desa Jatibarang',
                    'image'                     => 'assets/images/img-sponsor/rice.png',
                    'registered_at'             => date('Y-m-d')
                ],
                [
                    'user_id'                   => $user[1]->id,
                    'member_type_id'            => $memberType->where('name', 'Komunitas/Asosiasi')->first()->id,
                    'name'                      => 'Street Zero',
                    'image'                     => 'assets/images/img-sponsor/agi.png',
                    'registered_at'             => date('Y-m-d')
                ],
                [
                    'user_id'                   => $user[2]->id,
                    'member_type_id'            => $memberType->where('name', 'UMKM')->first()->id,
                    'name'                      => 'Basreng Sultan',
                    'image'                     => 'assets/images/img-sponsor/aspiluki.png',
                    'registered_at'             => date('Y-m-d')
                ],
                [
                    'user_id'                   => $user[3]->id,
                    'member_type_id'            => $memberType->where('name', 'Industri')->first()->id,
                    'name'                      => 'Pabrik Es Kristal Esja Utama',
                    'image'                     => 'assets/images/img-sponsor/aspiluki.png',
                    'registered_at'             => date('Y-m-d')
                ],
            ];
    
            foreach ($members as $data) {
                $member = Member::updateOrCreate($data);
                
                if($member->member_type->name == 'Desa'){
                    User::find($data['user_id'])->givePermissionTo('member-account', 'approved');
                }
            } 
            
            // Member::create([
            //     'user_id'                   => $user[3]->id,
            //     'member_type_id'            => $memberType->where('name', 'Startup')->first()->id,
            //     'name'                      => 'AINAKI',
            //     'image'                     => 'assets/images/img-sponsor/ainaki.png',
            //     'registered_by_member_id'   => Member::where('name', 'Rice Bandung')->first()->id,
            //     'registered_at'             => date('Y-m-d')
            // ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            echo $e->getMessage();
        }
        
    }
}