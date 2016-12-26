<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsIdeamartFacebookUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ideamart_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('room_id')->nullable();
            $table->string('identification_code')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ideamart_id');
            $table->dropColumn('facebook_id');
            $table->dropColumn('room_id');
            $table->dropColumn('identification_code');
            //
        });
    }
}
