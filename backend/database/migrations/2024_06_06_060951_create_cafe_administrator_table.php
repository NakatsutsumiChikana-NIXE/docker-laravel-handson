<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafeAdministratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafe_administrator', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 9)->comment('社員ID');
            $table->string('name')->comment('アカウント名');
            $table->date('birthday')->comment('誕生日');
            $table->integer('sex')->comment('性別');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafe_administrator');
    }
}
