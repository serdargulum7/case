<?php

namespace App\Services;

use App\Models\Address;
use  Illuminate\Database\Eloquent\Builder;
use DB;

class AddressService
{

    /**
     * @param array $validatedData
     * @return Address
     */
    public function create(array $validatedData): Address
    {
        return Address::create($validatedData);
    }

    /**
     * @param array $validatedData
     * @param int $addressId
     * @return bool
     */
    public function update(array $validatedData, int $addressId): bool
    {
        return Address::where('id', $addressId)->update($validatedData);
    }

    /**
     * @param int $personId
     * @return Builder
     */
    public function all(int $personId): Builder
    {
        return Address::where('person_id', $personId);
    }

    /**
     * @param int $id
     * @return Address|null
     */
    public function getById(int $id): ?Address
    {
        return Address::where('id', $id)->first();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try {
            DB::transaction(function () use ($id) {
                $address = $this->getById($id);
                return $address->delete();
            });
            return true;
        } catch (\Exception $e) {
            DB::rollback();
        }

        return false;
    }
}
