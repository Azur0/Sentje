<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contact';

    /**
     * Run the migrations.
     * @table contact
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('user_ID');
            $table->unsignedInteger('user_ID1');
            $table->timestamps();

            $table->index(["user_ID1"], 'fk_group_user2_idx');

            $table->index(["user_ID"], 'fk_group_user1_idx');


            $table->foreign('user_ID', 'fk_group_user1_idx')
                ->references('ID')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_ID1', 'fk_group_user2_idx')
                ->references('ID')->on('user')
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
