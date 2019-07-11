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

// Laravel class
use Illuminate\Support\Str;

// Third party class
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Lasallesoftware\Blogbackend\Models\Category::class, function (Faker $faker) {
    return [
        'installed_domain_id' => 1,
        'title'               => ucwords($faker->unique(false)->words(3, true)),
        'content'             => $faker->realText(500),
        'description'         => $faker->realText(255),
        'featured_image'      => $faker->imageUrl(640, 480),
        'enabled'             => 1,
        'uuid'                => (string)Str::uuid(),
        'created_at'          => Carbon::now(null),
        'created_by'          => 1,
        'updated_at'          => null,
        'updated_by'          => null,
        'locked_at'           => null,
        'locked_by'           => null,
    ];
});

