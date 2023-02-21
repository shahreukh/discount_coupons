<?php

namespace Database\Seeders;

use App\Models\DiscountCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountCodeSeeder extends Seeder
{
    public function run()
    {
        $discountCodes = [];

        // Open the CSV file and loop through each row
        if (($handle = fopen(storage_path('/app/TEST-DiscountCodes.csv'), 'r')) !== false) {
            $row = 0;

            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                $row++;

                // Skip the header row
                if ($row === 1) {
                    continue;
                }

                foreach ($data as $code) {
                    $discountCodes[] = [
                        'code' => $code,
                        'is_used' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            // Insert the discount codes in batches for better performance
            $chunks = array_chunk($discountCodes, 1000);

            foreach ($chunks as $chunk) {
                DB::table('discount_codes')->insert($chunk);
            }

            fclose($handle);
        }
    }
}
