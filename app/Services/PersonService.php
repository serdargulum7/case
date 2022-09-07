<?php

namespace App\Services;

use App\Models\Person;
use  Illuminate\Database\Eloquent\Builder;
use DB;

class PersonService
{

    /**
     * @param array $validatedData
     * @return Person
     */
    public function create(array $validatedData): Person
    {
        return Person::create($validatedData);
    }

    /**
     * @param array $validatedData
     * @param int $personId
     * @return bool
     */
    public function update(array $validatedData, int $personId): bool
    {
        return Person::where('id', $personId)->update($validatedData);
    }

    /**
     * @param int $personId
     * @return bool
     */
    public function delete(int $personId): bool
    {
        try {
            DB::transaction(function () use ($personId) {
                $person = $this->getById($personId);
                $person?->address()->get()->each->delete();
                return $person->delete();
            });
            return true;
        } catch (\Exception $e) {
            DB::rollback();
        }

        return false;
    }

    public
    function all(): Builder
    {
        return Person::orderBy('name');
    }

    /**
     * @param int $id
     * @return Person|null
     */
    public
    function getById(int $id): ?Person
    {
        return Person::where('id', $id)->first();
    }
}
