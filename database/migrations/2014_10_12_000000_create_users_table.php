<?php

use App\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('status', [Status::PUBLISHED->value,
                Status::INACTIVATED->value,
                Status::DRAFTED->value,
                Status::ARCHIVED->value,
                Status::LOCKED->value
            ])->default(Status::PUBLISHED->value)
                ->index()
                ->comment('1->PUBLISHED, 2->INACTIVATED, 3->DRAFTED, 4->ARCHIVED, 5->LOCKED');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
