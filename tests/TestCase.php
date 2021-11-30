<?php

declare(strict_types=1);

namespace Tests;

use Database\Seeders\MailingListSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--path' => 'vendor/themsaid/wink/src/Migrations',
        ]);

        $this->seed(MailingListSeeder::class);
    }

    /**
     * @param class-string $action
     */
    protected function expectToUseAction(string $action, string $method = 'handle')
    {
        return $this->spy($action)->shouldReceive($method)->atLeast()->once();
    }
}
