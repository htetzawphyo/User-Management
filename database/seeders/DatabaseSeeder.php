<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Features;
use App\Models\Permissions;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $features = ['user','role'];
    private $permissions = ['create', 'read', 'update', 'delete'];

    public function run()
    {
        User::factory()->create();
        $roleData = Role::create(['name' => 'admin']);
        
        // for features table
        foreach($this->features as $feature){
            $featureData = Features::create([
                'name' => $feature,
            ]);
            
            // for permissions table
            foreach($this->permissions as $permission){
                $permissionData = Permissions::create([
                    'name' => $permission,
                    'feature_id' => $featureData->id,
                ]);

                // for roles_permissions pivot table
                $permissionData->roles()->sync($roleData->id);
            }
        }

    }
}
