<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupHasUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'group_has_user';

    /**
     * Run the migrations.
     * @table group_has_user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('group_ID');
            $table->unsignedInteger('user_ID');
            $table->timestamps();

            $table->index(["user_ID"], 'fk_group_has_user_user1_idx');

            $table->index(["group_ID"], 'fk_group_has_user_group1_idx');


            $table->foreign('group_ID', 'fk_group_has_user_group1_idx')
                ->references('ID')->on('group')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_ID', 'fk_group_has_user_user1_idx')
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
