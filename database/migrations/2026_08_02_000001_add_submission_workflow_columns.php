<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            if (!Schema::hasColumn('assignments', 'attachment')) {
                $table->string('attachment')->nullable()->after('description');
            }
        });

        Schema::table('submissions', function (Blueprint $table) {
            if (!Schema::hasColumn('submissions', 'status')) {
                $table->string('status')->default('submitted')->after('submitted_at');
            }

            if (!Schema::hasColumn('submissions', 'student_id')) {
                $table->foreignId('student_id')->nullable()->after('assignment_id')->constrained('users')->nullOnDelete();
            }
        });

        if (Schema::hasColumn('submissions', 'student_id') && Schema::hasColumn('submissions', 'user_id')) {
            DB::table('submissions')
                ->whereNull('student_id')
                ->whereNotNull('user_id')
                ->update(['student_id' => DB::raw('user_id')]);
        }

        Schema::table('grades', function (Blueprint $table) {
            if (!Schema::hasColumn('grades', 'teacher_id')) {
                $table->foreignId('teacher_id')->nullable()->after('submission_id')->constrained('users')->nullOnDelete();
            }

            if (!Schema::hasColumn('grades', 'graded_at')) {
                $table->timestamp('graded_at')->nullable()->after('feedback');
            }
        });
    }

    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            if (Schema::hasColumn('grades', 'teacher_id')) {
                $table->dropConstrainedForeignId('teacher_id');
            }

            if (Schema::hasColumn('grades', 'graded_at')) {
                $table->dropColumn('graded_at');
            }
        });

        Schema::table('submissions', function (Blueprint $table) {
            if (Schema::hasColumn('submissions', 'student_id')) {
                $table->dropConstrainedForeignId('student_id');
            }

            if (Schema::hasColumn('submissions', 'status')) {
                $table->dropColumn('status');
            }
        });

        Schema::table('assignments', function (Blueprint $table) {
            if (Schema::hasColumn('assignments', 'attachment')) {
                $table->dropColumn('attachment');
            }
        });
    }
};
