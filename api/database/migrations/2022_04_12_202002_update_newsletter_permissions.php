<?php

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateNewsletterPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $per = "insert into permissions (id,name,title) values
        (148,'newsletter-list', 'Newsletter List'),
        (149,'newsletter-edit', 'Newsletter Edit'),
        (150,'newsletter-view', 'Newsletter View'),
        (151,'newsletter-delete', 'Newsletter Delete');";
        DB::insert($per);

        $permissions = Permission::where('title', 'like', 'Newsletter% %')->get();
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
