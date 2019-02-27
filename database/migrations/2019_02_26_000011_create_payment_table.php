<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'payments';

    /**
     * Run the migrations.
     * @table payment
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->unsignedInteger('user_ID')->nullable();
            $table->unsignedInteger('payment_request_ID');
            $table->string('description');
            $table->double('amount');
            $table->unsignedInteger('currency_ID');
            $table->string('iban', 40);
            $table->binary('media')->nullable();
            $table->timestamps();

            $table->index(["user_ID"], 'fk_payment_user1_idx');

            $table->index(["payment_request_ID"], 'fk_payment_payment_request1_idx');

            $table->index(["currency_ID"], 'fk_payment_currency1_idx');


            $table->foreign('user_ID', 'fk_payment_user1_idx')
                ->references('ID')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('payment_request_ID', 'fk_payment_payment_request1_idx')
                ->references('ID')->on('payment_requests')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('currency_ID', 'fk_payment_currency1_idx')
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
