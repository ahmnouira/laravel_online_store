<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key(id)
     * $this->attributes['total'] - string - contains the order name
     * $this->attributes['user_id'] - int - contains the reference user id
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated items
     */

    public static function validate($request)
    {
        $request->validate([
            "total" => "required|numeric",
            "user_id" => "required|exists:users,id"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        $this->attributes['total'];
    }
    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }
    public function getUserId()
    {
        $this->attributes['user_id'];
    }
    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getCreatedAt()
    {
        $this->attributes['created_at'];
    }
    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt()
    {
        $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function items()
    {
        $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items();
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
