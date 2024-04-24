<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table='product_review';

    static public function getSingle($product_id)
        {
        return self::find($product_id);
        }


        static public function  getReview($product_id ,$order_id,$user_id)
        {
                return self::select('*')
                ->where('product_id','=',$product_id)
                ->where('order_id','=',$order_id)
                ->where('user_id','=',$user_id)
                ->first();

        }

        static function getReviewProduct($product_id)
        {
                return self::select('product_review.*','users.name')
                ->join('users','users.id','product_review.user_id')
                ->where('product_review.product_id','=',$product_id)
                ->orderby('product_review.id','desc')
                ->paginate(3);
        }

        static public function    getRatingAvg($product_id)
        {
                return self::select('product_review.rating')
                ->join('users','users.id','product_review.user_id')
                ->where('product_review.product_id','=',$product_id)
                ->avg('product_review.rating');

        }

        public function getPercent(){
                $rating=$this->rating;
                if($rating==1)
                {
                        return 20;
                }
                elseif($rating==2)
                {
                        return 40;
                }
                elseif($rating==3)
                {
                        return 60;
                }
                elseif($rating==4)
                {
                        return 80;
                }
                elseif($rating==5)
                {
                        return 100;
                }
                else
                {
                        return 0;
                }
        }

    
        
}
