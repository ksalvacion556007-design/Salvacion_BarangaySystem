<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        // User ID map:
        // 1 = admin (Ricardo Santos)
        // 2 = secretary1 (Maria Isabel Villanueva)
        // 3–12 = clerk1–clerk10
        // Resident IDs 1–30

        $certificates = [

            // ── Barangay Clearance ──────────────────────────────────────
            [
                'resident_id' => 1,
                'issued_by'   => 3,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-01-06 08:00:00',
                'valid_until' => '2024-07-06',
            ],
            [
                'resident_id' => 4,
                'issued_by'   => 4,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Business Permit',
                'income'      => null,
                'issued_at'   => '2024-01-18 09:30:00',
                'valid_until' => '2024-07-18',
            ],
            [
                'resident_id' => 7,
                'issued_by'   => 5,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Loan Application',
                'income'      => null,
                'issued_at'   => '2024-02-05 10:00:00',
                'valid_until' => '2024-08-05',
            ],
            [
                'resident_id' => 10,
                'issued_by'   => 6,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-02-20 08:30:00',
                'valid_until' => '2024-08-20',
            ],
            [
                'resident_id' => 13,
                'issued_by'   => 7,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Travel Requirement',
                'income'      => null,
                'issued_at'   => '2024-03-08 11:00:00',
                'valid_until' => '2024-09-08',
            ],
            [
                'resident_id' => 16,
                'issued_by'   => 8,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Government Requirement',
                'income'      => null,
                'issued_at'   => '2024-03-22 14:00:00',
                'valid_until' => '2024-09-22',
            ],
            [
                'resident_id' => 19,
                'issued_by'   => 9,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-04-10 09:00:00',
                'valid_until' => '2024-10-10',
            ],
            [
                'resident_id' => 22,
                'issued_by'   => 10,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'School Requirement',
                'income'      => null,
                'issued_at'   => '2024-04-25 10:15:00',
                'valid_until' => '2024-10-25',
            ],
            [
                'resident_id' => 25,
                'issued_by'   => 11,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Loan Application',
                'income'      => null,
                'issued_at'   => '2024-05-14 13:00:00',
                'valid_until' => '2024-11-14',
            ],
            [
                'resident_id' => 28,
                'issued_by'   => 12,
                'type'        => 'Barangay Clearance',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-05-29 08:45:00',
                'valid_until' => '2024-11-29',
            ],

            // ── Certificate of Residency ────────────────────────────────
            [
                'resident_id' => 2,
                'issued_by'   => 2,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'School Enrollment',
                'income'      => null,
                'issued_at'   => '2024-01-10 09:00:00',
                'valid_until' => '2025-01-10',
            ],
            [
                'resident_id' => 5,
                'issued_by'   => 3,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Scholarship Application',
                'income'      => null,
                'issued_at'   => '2024-01-25 10:15:00',
                'valid_until' => '2025-01-25',
            ],
            [
                'resident_id' => 8,
                'issued_by'   => 4,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Bank Account Opening',
                'income'      => null,
                'issued_at'   => '2024-02-12 13:30:00',
                'valid_until' => '2025-02-12',
            ],
            [
                'resident_id' => 11,
                'issued_by'   => 5,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Government ID Application',
                'income'      => null,
                'issued_at'   => '2024-02-28 08:45:00',
                'valid_until' => '2025-02-28',
            ],
            [
                'resident_id' => 14,
                'issued_by'   => 6,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Postal ID',
                'income'      => null,
                'issued_at'   => '2024-03-15 11:20:00',
                'valid_until' => '2025-03-15',
            ],
            [
                'resident_id' => 17,
                'issued_by'   => 7,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-03-28 09:00:00',
                'valid_until' => '2025-03-28',
            ],
            [
                'resident_id' => 20,
                'issued_by'   => 8,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Loan Application',
                'income'      => null,
                'issued_at'   => '2024-04-15 14:30:00',
                'valid_until' => '2025-04-15',
            ],
            [
                'resident_id' => 23,
                'issued_by'   => 9,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Scholarship',
                'income'      => null,
                'issued_at'   => '2024-05-02 10:00:00',
                'valid_until' => '2025-05-02',
            ],
            [
                'resident_id' => 26,
                'issued_by'   => 10,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Travel Requirement',
                'income'      => null,
                'issued_at'   => '2024-05-20 09:30:00',
                'valid_until' => '2025-05-20',
            ],
            [
                'resident_id' => 29,
                'issued_by'   => 11,
                'type'        => 'Certificate of Residency',
                'purpose'     => 'Employment',
                'income'      => null,
                'issued_at'   => '2024-06-06 13:45:00',
                'valid_until' => '2025-06-06',
            ],

            // ── Certificate of Indigency ────────────────────────────────
            [
                'resident_id' => 3,
                'issued_by'   => 12,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Medical Assistance',
                'income'      => null,
                'issued_at'   => '2024-01-15 10:30:00',
                'valid_until' => '2024-07-15',
            ],
            [
                'resident_id' => 6,
                'issued_by'   => 2,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Hospital Admission',
                'income'      => null,
                'issued_at'   => '2024-02-01 11:00:00',
                'valid_until' => '2024-08-01',
            ],
            [
                'resident_id' => 9,
                'issued_by'   => 3,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'DSWD Assistance',
                'income'      => null,
                'issued_at'   => '2024-02-18 08:00:00',
                'valid_until' => '2024-08-18',
            ],
            [
                'resident_id' => 12,
                'issued_by'   => 4,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Scholarship Requirement',
                'income'      => null,
                'issued_at'   => '2024-03-05 10:00:00',
                'valid_until' => '2024-09-05',
            ],
            [
                'resident_id' => 15,
                'issued_by'   => 5,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Medical Assistance',
                'income'      => null,
                'issued_at'   => '2024-03-19 09:15:00',
                'valid_until' => '2024-09-19',
            ],
            [
                'resident_id' => 18,
                'issued_by'   => 6,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Government Subsidy',
                'income'      => null,
                'issued_at'   => '2024-04-02 14:00:00',
                'valid_until' => '2024-10-02',
            ],
            [
                'resident_id' => 21,
                'issued_by'   => 7,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Hospital Admission',
                'income'      => null,
                'issued_at'   => '2024-04-18 11:30:00',
                'valid_until' => '2024-10-18',
            ],
            [
                'resident_id' => 24,
                'issued_by'   => 8,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Medical Assistance',
                'income'      => null,
                'issued_at'   => '2024-05-06 08:30:00',
                'valid_until' => '2024-11-06',
            ],
            [
                'resident_id' => 27,
                'issued_by'   => 9,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'DSWD Assistance',
                'income'      => null,
                'issued_at'   => '2024-05-22 10:45:00',
                'valid_until' => '2024-11-22',
            ],
            [
                'resident_id' => 30,
                'issued_by'   => 10,
                'type'        => 'Certificate of Indigency',
                'purpose'     => 'Scholarship Requirement',
                'income'      => null,
                'issued_at'   => '2024-06-10 09:00:00',
                'valid_until' => '2024-12-10',
            ],
        ];

        foreach ($certificates as $cert) {
            DB::table('certificates')->insert(array_merge($cert, [
                'created_at' => $cert['issued_at'],
                'updated_at' => $cert['issued_at'],
            ]));
        }
    }
}