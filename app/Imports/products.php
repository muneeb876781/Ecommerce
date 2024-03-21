<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;


class products implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
        protected $userId;
        protected $shopId;
        protected $categoryid;
        public function __construct($userId, $shopId, $categoryid)
        {
            $this->userId = $userId;
            $this->shopId = $shopId;
            $this->categoryid = $categoryid;
        }

    public function model(array $row)
    {
        return new Product([
            'user_id' => $this->userId,
            'shop_id' => $this->shopId,
            'category_id' => $this->categoryid,
            'name' => $row[0],
            'description' => $row[1], 
            'price' => $row[2], 
            'discountedPrice' => $row[3], 
            'remote_image_url' => $row[4],
            'quantity' => $row[5],
            'sku' => $row[6],
        ]);
    }
}
