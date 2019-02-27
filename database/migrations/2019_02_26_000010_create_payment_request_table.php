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
    public $tableName = 'payment_request';

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
            $table->increments('ID');
            $table->unsignedInteger('created_by_user_ID');
            $table->unsignedInteger('to_user_ID');
            $table->unsignedInteger('deposit_account_ID');
            $table->unsignedInteger('currency_ID');
            $table->double('requested_amount');
            $table->enum('status', ['pending', 'partial', 'completed', 'canceled'])->default('pending');
            $table->string('payment_url');
            $table->string('description');
            $table->enum('request_type', ['payment', 'donation'])->default('payment');
            $table->timestamps();

            $table->index(["created_by_user_ID"], 'fk_payment_request_user_idx');

            $table->index(["currency_ID"], 'fk_payment_request_currency1_idx');

            $table->index(["to_user_ID"], 'fk_payment_request_user1_idx');

            $table->index(["deposit_account_ID"], 'fk_payment_request_account2_idx');


            $table->foreign('created_by_user_ID', 'fk_payment_request_user_idx')
                ->references('ID')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('deposit_account_ID', 'fk_payment_request_account2_idx')
                ->references('ID')->on('account')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('to_user_ID', 'fk_payment_request_user1_idx')
                ->references('ID')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('currency_ID', 'fk_payment_request_currency1_idx')
                ->references('ID')->on('currency')
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
