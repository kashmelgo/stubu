<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReputationColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'reputation'))
        {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('reputation')->default(0)->after('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        

        if (!Schema::hasColumn('users', 'reputation'))
        {
            Schema::table('users', function (Blueprint $table) {
                //
                $table->integer('reputation');
            });
        }
    }
}
