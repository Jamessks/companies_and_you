<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function a_user_can_have_companies()
    {
        $user = User::factory()->create();

        $company1 = Company::factory()->create(['user_id' => $user->id]);

        $this->assertCount(1, $user->companies);
        $this->assertTrue($user->companies->contains($company1));
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_only_the_logged_in_users_companies()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $userCompanies = Company::factory()->count(3)->create(['user_id' => $user->id, 'status' => true]);

        Company::factory()->count(2)->create(['user_id' => $otherUser->id, 'status' => true]);

        $this->actingAs($user);
        $response = $this->get(route('companies.index'));

        $response->assertStatus(200);

        $companies = $response->viewData('companies');

        $this->assertCount(3, $companies);

        $this->assertTrue($companies->every(fn($company) => $company->user_id === $user->id));
    }
}
