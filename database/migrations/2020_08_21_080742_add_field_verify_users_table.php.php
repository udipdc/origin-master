<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldVerifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('phone_verified', array('0','1'))->after('is_welcome_mail_send')->default('0')->nullable()->comment('0-Not Verified,1-Verified');
            $table->enum('email_verified', array('0','1'))->after('phone_verified')->default('0')->nullable()->comment('0-Not Verified,1-Verified');
            $table->string('phone_number')->after('email_verified')->nullable();
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
            $table->dropColumn('phone_verified');
            $table->dropColumn('email_verified');
            $table->dropColumn('phone_number');
        });
    }
}
