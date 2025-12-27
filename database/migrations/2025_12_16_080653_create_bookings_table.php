    <?php

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
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();

                $table->unsignedInteger('pax');
                $table->string('customer_name')->nullable();
                $table->foreignId('hotel_id')->nullable()->constrained()->cascadeOnDelete();
                $table->foreignId('customer_id')->nullable()->constrained()->cascadeOnDelete();
                $table->foreignId('package_id')->nullable()->constrained()->cascadeOnDelete();

                $table->date('booked_date');
                $table->date('check_in_date');
                $table->date('check_out_date');

                $table->text('notes')->nullable();

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('bookings');
        }
    };
