<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /** @var string SITEMAP_PATH */
    private const SITEMAP_PATH = 'sitemap.xml';

    /** @var string WEB_LINK */
    private const WEB_LINK = 'https://txtools.online';

    /**
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * @var string
     */
    protected $description = 'This command generates sitemap for this project';

    /**
     * @return int
     */
    public function handle(): int
    {
        $path = public_path(self::SITEMAP_PATH);

        SitemapGenerator::create(self::WEB_LINK)
            ->getSitemap()
            ->add(Url::create(self::WEB_LINK . '/counter')->setPriority(0.8))
            ->add(Url::create(self::WEB_LINK . '/case-converter')->setPriority(0.8))
            ->writeToFile($path);

        $this->info('Sitemap generated successfully');

        return 0;
    }
}
