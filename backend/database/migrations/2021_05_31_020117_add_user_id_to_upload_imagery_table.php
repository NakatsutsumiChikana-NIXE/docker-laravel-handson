<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToUploadImageryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speaks', function (Blueprint $table) {
            //
            $table->string("file_name")->comment('ファイル名');
            $table->string("file_path")->comment('ファイルの保存先');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('speaks');           
         //

        
    }
}
