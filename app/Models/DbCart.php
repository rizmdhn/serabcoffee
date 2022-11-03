<?php
use Darryldecode\Cart\Cart;
namespace App\Models;

use App\Http\Controllers\CartController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbCart extends Model
{
    protected $table = 'cart_storage';

    /**
     * The attributes that are mass assignable.
     *
     *
     * @var array
     */
    protected $fillable = [
        'id', 'table_number','cart_data', 'isfinished',
    ];

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }

    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
    use HasFactory;
}

class DBStorage {

    public function has($key)
    {
        return DbCart::find($key);
    }

    public function get($key)
    {
        if($this->has($key))
        {
            return new CartController(DbCart::find($key)->cart_data);
        }
        else
        {
            return [];
        }
    }

    public function put($key, $value)
    {
        if($row = DbCart::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            DbCart::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }
}
