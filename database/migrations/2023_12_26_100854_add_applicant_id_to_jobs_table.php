<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In the up() method
public function up()
{
    // Remove foreign key constraint
    Schema::table('jobs', function (Blueprint $table) {
        $table->dropForeign(['applicant_id']);
    });

    // Add the new column
    Schema::table('jobs', function (Blueprint $table) {
        $table->unsignedBigInteger('applicant_id');

        // You may also need to handle existing data here if needed
    });

    // Re-add the foreign key constraint
    Schema::table('jobs', function (Blueprint $table) {
        $table->foreign('applicant_id')
              ->references('id')
              ->on('applicants')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['applicant_id']);
            $table->dropColumn('applicant_id');
        });
    }
};
