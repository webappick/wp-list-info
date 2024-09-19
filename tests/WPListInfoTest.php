<?php

use PHPUnit\Framework\TestCase;
use Spatie\SchemaOrg\LocalBusiness;
use WebAppick\WPListInfo\Factories\WPListInfo;

class WPListInfoTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetList(): void
    {
        $list = WPListInfo::GetList('post');
        $this->assertIsArray($list);
        $list_with_args = WPListInfo::GetList('post', ['format' => ['post_id', 'post_title']]);
        print_r($list_with_args);
        $this->assertIsArray($list_with_args);
        $key = array_key_first($list_with_args);
        if (is_array($list_with_args[$key])) {
            $this->assertArrayHasKey('post_id', $list_with_args[$key]);
        }

        if (is_object($list_with_args[$key])) {
            $this->assertObjectHasProperty('post_id', $list_with_args[$key]);
        }
    }

    public function testSchema()
    {
        $localBusiness = new LocalBusiness();
        $localBusiness->name('Spatie');
        $localBusiness->address('Koningin Maria Hendrikaplein 64');
	    $localBusiness->toArray();
	    
	    echo $localBusiness->toScript();
    }

//  public function testGetKeys() {
//      $keys= WPInfoFactory::getKeys('product');
//      $this->assertIsArray($keys);
//
//      /// Specify that the test expects a RuntimeException
//      $this->expectException(RuntimeException::class);
//      $invalidKeys = WPInfoFactory::getKeys('invalid');
//      $this->expectExceptionMessage('RuntimeException: Invalid source provided. Source InvalidInfoService does not exist.');
//  }
//
//  public function testGetInfo() {
//      $product = wc_get_product(34);
//
//      // Test for all keys
//      $info = WPInfoFactory::getInfo('product', $product);
//      $this->assertIsArray($info, 'The result should be an array. Check your store have product with ID 34');
//
//      // Test for a single key
//      $info = WPInfoFactory::getInfo('product', $product, 'product_id');
//      $this->assertIsInt($info, 'The result should be an integer. Check your store have product with ID 34');
//
//      /// Specify that the test expects a RuntimeException
//      $this->expectException(RuntimeException::class);
//      WPInfoFactory::getInfo('invalid', $product);
//      $this->expectExceptionMessage('RuntimeException: Invalid source provided. Source InvalidInfoService does not exist.');
//  }
}
