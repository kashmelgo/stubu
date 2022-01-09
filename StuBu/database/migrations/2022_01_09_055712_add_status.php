<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('comments', 'status'))
        {
            Schema::table('comments', function (Blueprint $table) {
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
        if (!Schema::hasColumn('comments', 'status'))
        {
            Schema::table('comments', function (Blueprint $table) {
                $table->string('status')->after('email');
            });
        }
    }
}
