<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRequestTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'payment_requests';

    /**
     * Run the migrations.
     * @table payment_request
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('created_by_user_id');
            $table->unsignedInteger('to_user_id')->nullable();
            $table->unsignedInteger('deposit_account_id');
            $table->unsignedInteger('currencies_id');
            $table->double('requested_amount');
            $table->enum('status', ['pending', 'partial', 'completed', 'canceled'])->default('pending');
            $table->string('payment_url');
            $table->string('description');
            $table->enum('request_type', ['payment', 'donation'])->default('payment');
            $table->timestamps();

            $table->index(["created_by_user_id"], 'fk_payment_request_user_idx');

            $table->index(["currencies_id"], 'fk_payment_request_currencies1_idx');

            $table->index(["to_user_id"], 'fk_payment_request_user1_idx');

            $table->index(["deposit_account_id"], 'fk_payment_request_account2_idx');


            $table->foreign('created_by_user_id', 'fk_payment_request_user_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('deposit_account_id', 'fk_payment_request_account2_idx')
                ->references('id')->on('accounts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('to_user_id', 'fk_payment_request_user1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('currencies_id', 'fk_payment_request_currencies1_idx')
                ->references('id')->on('currencies')
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
