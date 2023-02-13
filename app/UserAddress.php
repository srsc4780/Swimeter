<?php

namespace App;

use CommerceGuys\Addressing\Address;
use CommerceGuys\Addressing\AddressFormat\AddressFormatRepository;
use CommerceGuys\Addressing\Country\CountryRepository;
use CommerceGuys\Addressing\Formatter\DefaultFormatter;
use CommerceGuys\Addressing\Subdivision\SubdivisionRepository;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'address_line_1', 'address_line_2', 'postal_code',
        'locality', 'administrative_area', 'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedAttribute()
    {
        $formatter = new DefaultFormatter(
            new AddressFormatRepository, new CountryRepository, new SubdivisionRepository
        );

        $address = new Address(
            $this->country, $this->administrative_area, $this->locality,
            '', $this->postal_code, '',
            $this->address_line_1, $this->address_line_2
        );

        return $formatter->format($address);
    }
}
