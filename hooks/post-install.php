#!/usr/bin/env php
<?php

use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Helper\QuestionHelper;

require_once __DIR__.'/../vendor/autoload.php';

$input = new ArgvInput();
$output = new ConsoleOutput();
$helper = new QuestionHelper();

// Check if statamic_pro module was selected
$installedModules = $input->getParameterOption('--modules');
if ($installedModules && str_contains($installedModules, 'statamic_pro')) {
    enableStatamicPro($output);
}

function enableStatamicPro($output) {
    $envPath = base_path('.env');

    if (!file_exists($envPath)) {
        $output->writeln('<error>No .env file found. Please create one first.</error>');
        return;
    }

    $envContent = file_get_contents($envPath);

    // Check if STATAMIC_PRO_ENABLED already exists
    if (strpos($envContent, 'STATAMIC_PRO_ENABLED') !== false) {
        // Update existing value
        $envContent = preg_replace('/STATAMIC_PRO_ENABLED=.*/', 'STATAMIC_PRO_ENABLED=true', $envContent);
    } else {
        // Add new value
        $envContent .= "\n# Statamic Pro Configuration\nSTATAMIC_PRO_ENABLED=true\n";
    }

    file_put_contents($envPath, $envContent);

    $output->writeln('<info>✓ Statamic Pro has been enabled!</info>');
    $output->writeln('<comment>Note: Statamic Pro requires a valid license for production use.</comment>');
    $output->writeln('<comment>Visit https://statamic.com/pricing to purchase a license.</comment>');

    // Clear config cache
    exec('php artisan config:cache');
}