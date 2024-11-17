<?php

namespace Database\Seeders;

use App\Models\ClaimStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaimStatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    try {
      ClaimStatus::insert([
        [
          "id" => ClaimStatus::PENDING_REVIEW,
          "name" => "Pending Review",
          "slug" => "pending_review",
          "code" => "PENDING_REVIEW",
        ],
        [
          "id" => ClaimStatus::REVIEWER_APPROVED,
          "name" => "Reviewer Approved",
          "slug" => "reviewer_approved",
          "code" => "REVIEWER_APPROVED",
        ],
        [
          "id" => ClaimStatus::CORRECTION_NEEDED,
          "name" => "Correction Needed",
          "slug" => "correction_needed",
          "code" => "CORRECTION_NEEDED",
        ],
        [
          "id" => ClaimStatus::BILLER_CORRECTION_NEEDED,
          "name" => "Biller Correction Needed",
          "slug" => "biller_correction_needed",
          "code" => "BILLER_CORRECTION_NEEDED",
        ],
        [
          "id" => ClaimStatus::BILLER_APPROVED,
          "name" => "Biller Approved",
          "slug" => "biller_approved",
          "code" => "BILLER_APPROVED",
        ],
      ]);
    } catch (\Exception $e) {
      $this->command->error($e->getMessage());
    }
  }
}
