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

// Third party classes
use Illuminate\Support\Carbon;

class TestingInstalledDomainsTableSeeder extends BaseSeeder
{
    protected $now;


    public function __construct()
    {
        $this->now  = Carbon::now();
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->doPopulateWithTestData()) {

            $this->setUpSimulatedFrontendDomain1();
            $this->setUpSimulatedFrontendDomain2();
        }
    }

    /**
     * Create a pretend front-end domain for testing
     *
     * @return void
     */
    private function setUpSimulatedFrontendDomain1()
    {
        DB::table('installed_domains')->insert([
            'title'       => 'pretendfrontend.com',
            'description' => 'PretendFrontEnd.com for testing',
            'enabled'     => '1',
            'created_at'  => $this->now,
            'created_by'  => 1,
            'updated_at'  => null,
            'updated_by'  => null,
            'locked_at'   => null,
            'locked_by'   => null,
        ]);

        $installedDomain = $this->getLastInstalledDomain();

        DB::table('installeddomain_domaintype')->insert([
            'installed_domain_id'   => $installedDomain->id,
            'lookup_domain_type_id' => '2',
        ]);
    }

    /**
     * Create a pretend front-end domain for testing
     *
     * @return void
     */
    private function setUpSimulatedFrontendDomain2()
    {
        DB::table('installed_domains')->insert([
            'title'       => 'anotherpretendfrontend.com',
            'description' => 'AnotherPretendFrontEnd.com for testing',
            'enabled'     => '1',
            'created_at'  => $this->now,
            'created_by'  => 1,
            'updated_at'  => null,
            'updated_by'  => null,
            'locked_at'   => null,
            'locked_by'   => null,
        ]);

        $installedDomain = $this->getLastInstalledDomain();

        DB::table('installeddomain_domaintype')->insert([
            'installed_domain_id'   => $installedDomain->id,
            'lookup_domain_type_id' => '2',
        ]);
    }


    private function getLastInstalledDomain()
    {
        return \Lasallesoftware\Library\Profiles\Models\Installed_domain::orderBy('id', 'desc')->first();
    }
}
