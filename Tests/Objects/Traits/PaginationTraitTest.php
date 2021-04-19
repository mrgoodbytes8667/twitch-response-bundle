<?php

namespace Bytes\TwitchResponseBundle\Tests\Objects\Traits;

use Bytes\TwitchResponseBundle\Objects\Pagination;
use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class PaginationTraitTest
 * @package Bytes\TwitchResponseBundle\Tests\Objects\Traits
 */
class PaginationTraitTest extends TestCase
{
    /**
     * @dataProvider providePaginationWithCursor
     * @param $pagination
     * @param $cursor
     */
    public function testGetSetPaginationWithCursor($pagination, $cursor)
    {
        $mock = $this->getMockForTrait(PaginationTrait::class);

        $this->assertNull($mock->getPagination());
        $result = $mock->setPagination($pagination);

        $this->assertEquals($cursor, $mock->getPagination()->getCursor());
    }

    /**
     * @dataProvider providePaginationWithoutCursor
     * @param $pagination
     * @param $cursor
     */
    public function testGetSetPaginationWithoutCursor($pagination, $cursor)
    {
        $mock = $this->getMockForTrait(PaginationTrait::class);

        $this->assertNull($mock->getPagination());
        $result = $mock->setPagination($pagination);

        $this->assertNull($mock->getPagination());
    }

    /**
     * @return Generator
     */
    public function providePaginationWithCursor()
    {
        $faker = Factory::create();
        $cursor = $faker->uuid();

        // Constructor
        $pagination = new Pagination($cursor);
        yield ['pagination' => $pagination, 'cursor' => $cursor];

        // Make
        $pagination = Pagination::make($cursor);
        yield ['pagination' => $pagination, 'cursor' => $cursor];

        // Array
        $pagination = ['cursor' => $cursor];
        yield ['pagination' => $pagination, 'cursor' => $cursor];
    }

    /**
     * @return Generator
     */
    public function providePaginationWithoutCursor()
    {
        // Constructor
        $pagination = new Pagination();
        yield ['pagination' => $pagination, 'cursor' => null];

        // Make
        $pagination = Pagination::make();
        yield ['pagination' => $pagination, 'cursor' => null];

        // Array
        $pagination = [];
        yield ['pagination' => $pagination, 'cursor' => null];
    }
}
