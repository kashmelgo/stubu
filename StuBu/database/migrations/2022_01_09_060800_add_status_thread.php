<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('threads', 'status'))
        {
            Schema::table('threads', function (Blueprint $table) {
                $table->string('status')->after('body')->default('Valid');
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
        //
        if (!Schema::hasColumn('threads', 'status'))
        {
            Schema::table('threads', function (Blueprint $table) {
                $table->string('status')->after('body')->default('Valid');
            });
        }
    }
}
