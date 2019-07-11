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
use Carbon\Carbon;
use Faker\Generator as Faker;

class TestingPostupdateTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if ($this->doPopulateWithTestData()) {

            DB::table('postupdates')->insert([
                'installed_domain_id' => 1,
                'personbydomain_id'   => 1,
                'post_id'             => 2,
                'title'               => 'Not This Year - Again!',
                'content'             => $faker->paragraph(3, true),
                'excerpt'             => $faker->words(12, true),
                'enabled'             => 1,
                'publish_on'          => Carbon::now(),
                'uuid'                => 'created_during_initial_seeding',
                'created_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_at'          => null,
                'updated_by'          => null,
                'locked_at'           => null,
                'locked_by'           => null,
            ]);

            DB::table('postupdates')->insert([
                'installed_domain_id' => 1,
                'personbydomain_id'   => 5,
                'post_id'             => 3,
                'title'               => 'An Important Update!',
                'content'             => $faker->paragraph(3, true),
                'excerpt'             => $faker->words(12, true),
                'enabled'             => 1,
                'publish_on'          => Carbon::now(),
                'uuid'                => 'created_during_initial_seeding',
                'created_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_at'          => null,
                'updated_by'          => null,
                'locked_at'           => null,
                'locked_by'           => null,
            ]);

            DB::table('postupdates')->insert([
                'installed_domain_id' => 1,
                'personbydomain_id'   => 4,
                'post_id'             => 2,
                'title'               => 'A Very Important Update!',
                'content'             => $faker->paragraph(3, true),
                'excerpt'             => $faker->words(12, true),
                'enabled'             => 1,
                'publish_on'          => Carbon::now(),
                'uuid'                => 'created_during_initial_seeding',
                'created_at'          => Carbon::now(),
                'created_by'          => 1,
                'updated_at'          => null,
                'updated_by'          => null,
                'locked_at'           => null,
                'locked_by'           => null,
            ]);

        }
    }
}
