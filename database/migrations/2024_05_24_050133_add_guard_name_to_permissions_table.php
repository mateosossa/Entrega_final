<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuardNameToPermissionsTable extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('guard_name')->nullable()->default('web');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('guard_name');
        });
    }
}
