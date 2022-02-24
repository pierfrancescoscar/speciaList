<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {

            $table->unsignedBigInteger('doctor_id')->nullable()->after('id');

            $table->foreign('doctor_id')
                    ->references('id')
                    ->on('doctors')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {

            $table->dropForeign('messages_doctors_id_foreign');
            $table->dropColumn('doctor_id');
        });
    }
}
