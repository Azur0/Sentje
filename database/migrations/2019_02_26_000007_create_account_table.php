<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'accounts';

    /**
     * Run the migrations.
     * @table account
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('user_ID');
            $table->string('iban', 40);
            $table->timestamps();

            $table->index(["user_ID"], 'fk_account_user1_idx');


            $table->foreign('user_ID', 'fk_account_user1_idx')
                ->references('ID')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
