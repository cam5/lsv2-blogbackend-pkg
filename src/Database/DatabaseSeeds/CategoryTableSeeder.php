<?php

/**
 * This file is part of the Lasalle Software blog back-end package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  (c) 2019 The South LaSalle Trading Corporation
 * @license    http://opensource.org/licenses/MIT
 * @author     Bob Bloom
 * @email      bob.bloom@lasallesoftware.ca
 * @link       https://lasallesoftware.ca
 * @link       https://packagist.org/packages/lasallesoftware/lsv2-blogbackend-pkg
 * @link       https://github.com/LaSalleSoftware/lsv2-blogbackend-pkg
 *
 */

namespace Lasallesoftware\Blogbackend\Database\DatabaseSeeds;

// LaSalle Software
use Lasallesoftware\Library\Database\DatabaseSeeds\BaseSeeder;

// Laravel Framework
use Illuminate\Support\Facades\DB;

// Third party class
use Illuminate\Support\Carbon;;

class CategoryTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domain_title        = app('config')->get('lasallesoftware-library.lasalle_app_domain_name');
        $installed_domain_id = DB::table('installed_domains')->where('title', $domain_title)->value('id');

        factory(\Lasallesoftware\Blogbackend\Models\Category::class)->create([
            //'installed_domain_id' => $installed_domain_id,
            'installed_domain_id' => 1,
            'title'               => 'Main',
            'content'             => 'The main blog category',
            'description'         => 'The main blog category',
            'featured_image'      => null,
            'uuid'                => 'created_during_initial_seeding',
        ]);


        // SEE NOTE AT Lasallesoftware\Blogbackend\Database\DatabaseSeeds\TestingCategoryTableSeeder::updateInstalledDomainId !!

        $lastId = \Lasallesoftware\Blogbackend\Models\Category::orderBy('id', 'desc')->first();

        DB::table('categories')
            ->where('id', $lastId->id)
            ->update(['installed_domain_id' => $installed_domain_id,])
        ;
    }
}
