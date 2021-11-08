<?php

namespace App\Imports;

use App\Models\Affiliation;
use App\Models\User;
use App\Models\UserAffiliation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class UsersImport implements OnEachRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        $birthday = date('Y-m-d', $row['birthday']);

        $user = User::firstOrCreate([
            'name' => $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'],
            'first_name' => $row['firstname'],
            'last_name' => $row['lastname'],
            'middle_name' => $row['middlename'],
            'email' => $row['email'],
            'password' => 'sikreto',
            'menuroles' => 'user',
            'gender' => $row['gender'],
            'address' => $row['address'],
            'contact_number' => $row['contactnumber'],
            'skillsets' => $row['skillsandcapabilities'],
            'is_registered_voter' => $row['isregisteredvoter'] == 'Y' ? 1 : 0,
            'region_code' => '',
            'province_code' => '',
            'city_code' => '',
            'barangay' => $row['barangaypollingcenter'],
            'voterid' => $row['votersid'],
            'birthday' => $this->transformDate($row['birthday']),
            'business_type' => $row['businesstype'],
            'business_location' => $row['businesslocation'],
            'capitalization' => $row['capitalization'],
            'created_by' => auth()->user()->id,
        ]);

    }

    public function headingRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'birthday' => 'required|string',
        ];
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
