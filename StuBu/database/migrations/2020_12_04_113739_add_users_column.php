<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        if (!Schema::hasColumn('users', 'image'))
        {
            Schema::table('users', function (Blueprint $table) {
                //
                $table->string('image')->default('defaultPic.jpg')->after('email');
                $table->string('about_me')->default('None');
                $table->string('mobile_number')->default('None');
              
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
        

        if (!Schema::hasColumn('users', 'image'))
        {
            Schema::table('users', function (Blueprint $table) {
                //
                $table->string('image');
                $table->string('about_me');
                $table->string('mobile_number');
               
            });

            
        }
    }
}
