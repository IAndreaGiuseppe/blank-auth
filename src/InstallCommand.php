<?php

namespace Iag\BlankAuth;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command
     * 
     * @var string
     */
    protected $signature = 'blankauth:install
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description
     * 
     * @var string
     */
    protected $description = 'Install basic login and registration views';

    /**
     * The views that needs to be exported
     * 
     * @var array
     */
    protected $views = [
        'account/index.stub' => 'account/index.blade.php',
        'auth/passwords/confirm-form.stub' => 'auth/passwords/confirm-form.blade.php',
        'auth/passwords/confirm.stub' => 'auth/passwords/confirm.blade.php',
        'auth/passwords/email-form.stub' => 'auth/passwords/email-form.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset-form.stub' => 'auth/passwords/reset-form.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',
        'auth/login-form.stub' => 'auth/login-form.blade.php',
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/logout-form.stub' => 'auth/logout-form.blade.php',
        'auth/register-form.stub' => 'auth/register-form.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/verify-form.stub' => 'auth/verify-form.blade.php',
        'auth/verify.stub' => 'auth/verify.blade.php',
        'layouts/layout.stub' => 'layouts/layout.blade.php',
        'layouts/navbar.stub' => 'layouts/navbar.blade.php',
    ];

    /**
     * Execute the console command
     * 
     * @return void
     */
    public function handle(): void
    {
        $this->ensureDirectoriesExists();
        $this->exportViews();

        $this->info("Authentication views generated successfully");
    }

    /**
     * Create the directories for the files
     *
     * @return void
     */
    protected function ensureDirectoriesExists(): void
    {
        if (!is_dir($directory = $this->getViewPath('account'))) {
            mkdir($directory, 0755, true);
        }
        if (!is_dir($directory = $this->getViewPath('layouts'))) {
            mkdir($directory, 0755, true);
        }
        if (!is_dir($directory = $this->getViewPath('auth/passwords'))) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews(): void
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && !$this->option('force')) {
                if (!$this->confirm("The [{$value}] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                dirname(__DIR__, 1).'/resources/views/'.$key,
                $view
            );
        }
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getViewPath($path): string
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }}
