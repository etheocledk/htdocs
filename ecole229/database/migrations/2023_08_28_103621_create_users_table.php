<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("lastname")->nullable(false);
            $table->string("firsname")->nullable(false);
            $table->string("email")->unique();
            $table->boolean("email_verified")->nullable();
            $table->datetime("verify_at")->nullable();
            $table->date("birthday")->nullable();
            $table->text("password");
            $table->string("avatar")->nullable();
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
        Schema::dropIfExists('users');
    }
}
