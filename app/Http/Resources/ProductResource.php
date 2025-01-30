<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'title' => $this->title,
            'product_description' => $this->product_description,
            'product_image' => $this->product_image,
            'product_active' => $this->product_active,
            'product_stock' => $this->product_stock,
            'product_price' => $this->product_price,
            'product_sale_price' => $this->product_sale_price,
            'product_color' => $this->product_color,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
