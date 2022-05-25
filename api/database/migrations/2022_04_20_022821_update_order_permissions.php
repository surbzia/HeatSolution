<?php

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateOrderPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $per = "insert into permissions (id,name,title) values
        (143,'order-list', 'Order List'),
        (144,'order-edit', 'Order Edit'),
        (145,'order-view', 'Order View'),
        (146,'order-delete', 'Order Delete'),
        (147,'order-create', 'Order Create');";
        DB::insert($per);

        $permissions = Permission::where('title', 'like', 'Order% %')->get();
        foreach ($permissions as $permission) {
            RolePermission::create(['role_id' => 1, 'permission_id' => $permission->id]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
