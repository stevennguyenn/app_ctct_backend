<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'level' => $this->level,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token
        ];
    }
}
