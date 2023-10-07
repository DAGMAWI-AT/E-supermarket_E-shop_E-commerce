<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook', 200)->after('email')->nullable();
            $table->string('instagram', 200)->after('facebook')->nullable();
            $table->string('youtube', 200)->after('instagram')->nullable();
            $table->string('twitter', 200)->after('youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'facebook',
                'instagram',
                'youtube',
                'twitter',
            ]);
        });
    }
}
