<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bookings;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class ImportBookings extends Command
{
    protected $signature = 'import:bookings {file : The CSV file path}';
    protected $description = 'Import bookings from a CSV file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath) || !is_readable($filePath)) {
            $this->error('File does not exist or is not readable.');
            return;
        }

        $header = [
            'property_id', 'host_id', 'user_id', 'start_date', 'end_date',
            'status', 'total_night', 'per_night', 'base_price', 'total',
            'booking_type', 'currency_code', 'booking_added_by', 'time_period_id'
        ];

        $data = array_map('str_getcsv', file($filePath));
        if ($data) {
            DB::beginTransaction();
            try {
                foreach ($data as $index => $row) {
                    if ($index === 0) continue; // Skip header row

                    $rowData = array_combine($header, $row);

                    try {
                        // Convert date formats
                        $rowData['start_date'] = Carbon::createFromFormat('m/d/Y', $rowData['start_date'])->format('Y-m-d');
                        $rowData['end_date'] = Carbon::createFromFormat('m/d/Y', $rowData['end_date'])->format('Y-m-d');
                    } catch (Exception $e) {
                        $this->error("Date format error on row $index: " . $e->getMessage());
                        continue; // Skip this row if date conversion fails
                    }

                    // Insert data
                    Bookings::create($rowData);
                }
                DB::commit();
                $this->info('Bookings imported successfully.');
            } catch (Exception $e) {
                DB::rollBack();
                $this->error('Failed to import bookings: ' . $e->getMessage());
            }
        } else {
            $this->error('No data found in CSV file.');
        }
    }
}
