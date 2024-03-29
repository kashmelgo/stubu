<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomefeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        if (!Schema::hasColumn('homefeed', 'user_id'))
        {
            Schema::create('homefeed', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->integer('thread_id');
                $table->timestamps();
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
    }
}
