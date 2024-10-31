<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_only_the_logged_in_users_companies()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $company1 = Company::factory()->create(['user_id' => $user1->id]);
        $company2 = Company::factory()->create(['user_id' => $user2->id]);

        $this->actingAs($user1);

        $response = $this->get(route('companies.index'));

        $response->assertStatus(200);
        $response->assertSee($company1->name);
        $response->assertDontSee($company2->name);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_only_companies_with_status_true()
    {
        Company::factory()->count(3)->create(['status' => true]);
        Company::factory()->count(2)->create(['status' => false]);

        $response = $this->get(route('companies.allCompanies'));

        $response->assertStatus(200);
        $companies = $response->viewData('companies');

        $this->assertCount(3, $companies);
        $this->assertTrue($companies->every(fn($company) => $company->status));
    }
}
