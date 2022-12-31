<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClaimsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('claims', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('product_id');
			$table->bigInteger('user_id')->unsigned()->index('claims_user_id_foreign');
			$table->string('status', 100);
			$table->dateTime('claim_date');
			$table->text('answer', 65535)->nullable();
			$table->integer('post_by');
			$table->bigInteger('approved_by')->unsigned()->nullable()->index('claims_approved_by_foreign');
			$table->dateTime('approved_at')->nullable();
			$table->bigInteger('cancelled_by')->unsigned()->nullable()->index('claims_cancelled_by_foreign');
			$table->dateTime('cancelled_at')->nullable();
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
		Schema::drop('claims');
	}

}
