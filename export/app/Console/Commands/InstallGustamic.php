<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\warning;

class InstallGustamic extends Command
{
    protected $signature = 'gustamic:install';

    protected $description = 'Configure Gustamic starter kit after installation';

    public function handle(): int
    {
        $this->newLine();
        info('Welcome to Gustamic - Restaurant Starter Kit for Statamic');
        $this->newLine();

        // Ask about Statamic Pro
        $this->configureStatamicPro();

        // Ask about sample content (this would be handled by the starter kit installer normally)
        $this->configureSampleContent();

        $this->newLine();
        info('✨ Gustamic configuration complete!');
        note('You can now visit your Control Panel at /cp to manage your restaurant website.');

        return Command::SUCCESS;
    }

    protected function configureStatamicPro(): void
    {
        note('Statamic Pro includes advanced features like:');
        info('• Create and manage forms through the Control Panel');
        info('• Multi-site management');
        info('• Git integration');
        info('• User management UI');
        info('• And more...');
        $this->newLine();

        $enablePro = confirm(
            label: 'Would you like to enable Statamic Pro?',
            default: true,
            yes: 'Yes, enable Pro features',
            no: 'No, use free version',
            hint: 'Required for creating forms through the Control Panel. You can enable this later.'
        );

        if ($enablePro) {
            $this->enableStatamicPro();
            info('✓ Statamic Pro has been enabled!');
            warning('Note: Statamic Pro requires a valid license for production use.');
            note('Visit https://statamic.com/pricing to purchase a license.');
        } else {
            note('You can enable Statamic Pro later by running: php artisan statamic:pro:enable');
        }
    }

    protected function enableStatamicPro(): void
    {
        $envPath = base_path('.env');

        if (!File::exists($envPath)) {
            File::copy(base_path('.env.example'), $envPath);
        }

        $envContent = File::get($envPath);

        // Check if STATAMIC_PRO_ENABLED already exists
        if (str_contains($envContent, 'STATAMIC_PRO_ENABLED')) {
            // Update existing value
            $envContent = preg_replace('/STATAMIC_PRO_ENABLED=.*/', 'STATAMIC_PRO_ENABLED=true', $envContent);
        } else {
            // Add new value
            $envContent .= "\n# Statamic Pro Configuration\nSTATAMIC_PRO_ENABLED=true\n";
        }

        File::put($envPath, $envContent);

        // Clear config cache
        $this->call('config:cache', [], $this->output);
    }

    protected function configureSampleContent(): void
    {
        $this->newLine();
        $installSample = confirm(
            label: 'Would you like to install sample content?',
            default: true,
            yes: 'Yes, install sample content',
            no: 'No, start with a blank site',
            hint: 'Includes example menu items, pages, and restaurant content to help you get started.'
        );

        if ($installSample) {
            note('Sample content will be installed by the Statamic starter kit installer.');
        } else {
            note('You can add content later through the Control Panel.');
        }
    }
}