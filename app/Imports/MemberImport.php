<?php

namespace App\Imports;

use App\Models\Affiliation;
use App\Models\User;
use App\Models\UserAffiliation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements OnEachRow, WithHeadingRow
{
/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        
        $affiliation = Affiliation::find(request()->get('affiliation_id'));
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
            'contact_number' => $row['contactnumber'],
            'skillsets' => $row['skillsandcapabilities'],
            'is_registered_voter' => $row['isregisteredvoter'] == 'Y' ? 1 : 0,
            'region_code' => $affiliation->region_code,
            'province_code' => $affiliation->province_code,
            'city_code' => $affiliation->city_code,
            'barangay' => $row['barangay'],
            'street' => $row['street'],
            'birthday' => $this->transformDate($row['birthday']),
            'business_type' => $row['businesstype'],
            'business_location' => $row['businesslocation'],
            'capitalization' => $row['capitalization'],
            'created_by' => auth()->user()->id,
        ]);
    
       
        UserAffiliation::create([
            'user_id' => $user->id,
            'affiliation_id' => $affiliation->id,
            'position' => $row['positioninorganisation'],
            'is_primary' => 0,
        ]);

    }

    public function headingRow(): int
    {
        return 1;
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
