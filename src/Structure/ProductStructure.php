<?php

namespace WebAppick\WPListInfo\Structure;

/**
 * Class ProductStructure
 *
 * @package    CTXFeed
 * @subpackage WebAppick\WPListInfo\Structure
 * @author     Ohidul Islam <wahid0003@gmail.com>
 * @link       https://webappick.com
 * @license    https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category   MyCategory
 */
class ProductStructure
{
    /**
     * @return array[]
     */
    public function getStructure(): array
    {
        return [
            'Product' => [
                'name' => [
                    'label' => 'Product Name',
                    'mapping' => 'product_name',
                ],
                'description' => [
                    'label' => 'Product Description',
                    'mapping' => 'product_description',
                ],
                'sku' => [
                    'label' => 'Product SKU',
                    'mapping' => 'product_sku',
                ],
                'gtin' => [
                    'gtin12' => [
                        'label' => 'GTIN-12',
                        'mapping' => 'gtin12_code',
                    ],
                    'gtin13' => [
                        'label' => 'GTIN-13',
                        'mapping' => 'gtin13_code',
                    ],
                    'gtin14' => [
                        'label' => 'GTIN-14',
                        'mapping' => 'gtin14_code',
                    ],
                    'gtin8' => [
                        'label' => 'GTIN-8',
                        'mapping' => 'gtin8_code',
                    ],
                ],
                'brand' => [
                    'label' => 'Brand',
                    'name' => [
                        'label' => 'Brand Name',
                        'mapping' => 'brand_name',
                    ],
                    'aggregateRating' => [
                        'label' => 'Brand Aggregate Rating',
                        'ratingValue' => [
                            'label' => 'Brand Rating Value',
                            'mapping' => 'brand_rating_value',
                        ],
                        'reviewCount' => [
                            'label' => 'Brand Review Count',
                            'mapping' => 'brand_review_count',
                        ],
                    ],
                ],
                'aggregateRating' => [
                    'label' => 'Product Aggregate Rating',
                    'ratingValue' => [
                        'label' => 'Product Rating Value',
                        'mapping' => 'product_rating_value',
                    ],
                    'reviewCount' => [
                        'label' => 'Product Review Count',
                        'mapping' => 'product_review_count',
                    ],
                ],
                'offers' => [
                    'label' => 'Offers',
                    'price' => [
                        'label' => 'Offer Price',
                        'mapping' => 'product_price',
                    ],
                    'priceCurrency' => [
                        'label' => 'Offer Price Currency',
                        'mapping' => 'product_currency',
                    ],
                    'availability' => [
                        'label' => 'Offer Availability',
                        'mapping' => 'product_stock_status',
                    ],
                    'eligibleQuantity' => [
                        'label' => 'Eligible Quantity',
                        'value' => [
                            'label' => 'Quantity Value',
                            'mapping' => 'quantity_value',
                        ],
                        'unitCode' => [
                            'label' => 'Quantity Unit Code',
                            'mapping' => 'quantity_unit_code',
                        ],
                    ],
                    'priceSpecification' => [
                        'label' => 'Price Specification',
                        'price' => [
                            'label' => 'Price',
                            'mapping' => 'product_price',
                        ],
                        'priceCurrency' => [
                            'label' => 'Price Currency',
                            'mapping' => 'product_currency',
                        ],
                        'valueAddedTaxIncluded' => [
                            'label' => 'VAT Included',
                            'mapping' => 'vat_included',
                        ],
                    ],
                ],
                'review' => [
                    'label' => 'Review',
                    'author' => [
                        'label' => 'Review Author',
                        'name' => [
                            'label' => 'Author Name',
                            'mapping' => 'review_author_name',
                        ],
                    ],
                    'datePublished' => [
                        'label' => 'Review Date Published',
                        'mapping' => 'review_date',
                    ],
                    'description' => [
                        'label' => 'Review Description',
                        'mapping' => 'review_description',
                    ],
                    'reviewRating' => [
                        'label' => 'Review Rating',
                        'ratingValue' => [
                            'label' => 'Review Rating Value',
                            'mapping' => 'review_rating_value',
                        ],
                        'bestRating' => [
                            'label' => 'Best Rating',
                            'mapping' => 'review_best_rating',
                        ],
                    ],
                ],
                'weight' => [
                    'label' => 'Product Weight',
                    'mapping' => 'product_weight',
                ],
                'width' => [
                    'label' => 'Product Width',
                    'mapping' => 'product_width',
                ],
                'height' => [
                    'label' => 'Product Height',
                    'mapping' => 'product_height',
                ],
                'depth' => [
                    'label' => 'Product Depth',
                    'mapping' => 'product_depth',
                ],
                'material' => [
                    'label' => 'Product Material',
                    'mapping' => 'product_material',
                ],
                'color' => [
                    'label' => 'Product Color',
                    'mapping' => 'product_color',
                ],
                'itemCondition' => [
                    'label' => 'Product Condition',
                    'mapping' => 'product_condition',
                ],
                'releaseDate' => [
                    'label' => 'Product Release Date',
                    'mapping' => 'product_release_date',
                ],
                'manufacturer' => [
                    'label' => 'Product Manufacturer',
                    'mapping' => 'product_manufacturer',
                ],
                'productionDate' => [
                    'label' => 'Product Production Date',
                    'mapping' => 'product_production_date',
                ],
                'logo' => [
                    'label' => 'Product Logo',
                    'mapping' => 'product_logo',
                ],
                'category' => [
                    'label' => 'Product Category',
                    'mapping' => 'product_category',
                ],
                'identifier' => [
                    'label' => 'Product Identifier',
                    'mapping' => 'product_identifier',
                ],
                'image' => [
                    'label' => 'Product Image',
                    'mapping' => 'product_image',
                ],
                'isRelatedTo' => [
                    'label' => 'Related Product',
                    'mapping' => 'related_product',
                ],
                'isSimilarTo' => [
                    'label' => 'Similar Product',
                    'mapping' => 'similar_product',
                ],
                'itemOffered' => [
                    'label' => 'Offered Product',
                    'mapping' => 'offered_product',
                ],
                'purchaseDate' => [
                    'label' => 'Product Purchase Date',
                    'mapping' => 'product_purchase_date',
                ],
                'warranty' => [
                    'label' => 'Warranty',
                    'durationOfWarranty' => [
                        'label' => 'Warranty Duration',
                        'mapping' => 'warranty_duration',
                    ],
                    'warrantyScope' => [
                        'label' => 'Warranty Scope',
                        'mapping' => 'warranty_scope',
                    ],
                ],
            ],
        ];
    }
}
