<?php

class StarterKitPostInstall
{
    public function handle($console): void
    {
        $console->newLine();
        $console->info('Gustamic installed. A few next steps:');
        $console->line('  1. Build the front-end assets: npm install && npm run build');
        $console->line('  2. Manage content, menu items and forms in the Control Panel at /cp');
        $console->line('  3. Update your restaurant details, SEO and site settings under Globals in the Control Panel');
        $console->newLine();
        $console->comment('Gustamic ships with a single contact form and a single site, so it runs fully on the free Statamic Solo edition.');
        $console->newLine();
    }
}
