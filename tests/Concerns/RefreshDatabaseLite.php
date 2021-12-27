<?php

declare(strict_types=1);

namespace Tests\Concerns;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use App\Console\Kernel;

/**
 * migrate:freshの代わりにmigrateを使用する軽量版
 */
trait RefreshDatabaseLite
{
    use RefreshDatabase;

    /**
     * トランザクションロールバック対象のDBコネクション
     * @see RefreshDatabase@connectionsToTransact
     */
    protected $connectionsToTransact = [

        'ats_testing',
        'fukuriku_testing',
    ];
    // protected function migrateFreshUsing()
    // {
    //     return [
    //         '--database' => 'ats_testing',
    //         '--path' => 'hoge',
    //         '--drop-views' => $this->shouldDropViews(),
    //         '--drop-types' => $this->shouldDropTypes(),
    //     ];
    // }
    /**
     * Refresh a conventional test database.
     *
     * @return void
     */
    // protected function refreshTestDatabase()
    // {
    //     if (! RefreshDatabaseState::$migrated) {
    //         foreach ($this->connectionsToTransact() as $database) {
    //             $this->artisan('db:wipe', array_filter([
    //                 '--database' => $database,
    //                 '--drop-views' => $this->shouldDropViews(),
    //                 '--drop-types' => $this->shouldDropTypes(),
    //                 '--force' => true,
    //             ]));
    //         }

    //         $this->artisan('migrate', [
    //             '--force' => true,
    //         ]);

    //         $this->app[Kernel::class]->setArtisan(null);

    //         RefreshDatabaseState::$migrated = true;
    //     }

    //     $this->beginDatabaseTransaction();
    // }

    protected function refreshTestDatabase()
    {
        if (! RefreshDatabaseState::$migrated) {
            $this->artisan('migrate:rollback');
            $this->artisan('migrate');
            $this->app[Kernel::class]->setArtisan(null);

            RefreshDatabaseState::$migrated = true;
        }

        $this->beginDatabaseTransaction();
    }
    // protected function refreshTestDatabase()
    // {
    //     if (!RefreshDatabaseState::$migrated) {
    //         // ここを変えた
    //         $this->artisan('migrate:fresh', $this->migrateFreshUsing());
    //         $this->artisan('migrate');
    //         $this->artisan('migrate');
    //         $this->app[Kernel::class]->setArtisan(null);

    //         RefreshDatabaseState::$migrated = true;
    //     }

    //     $this->beginDatabaseTransaction();
    // }
}
