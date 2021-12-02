<?php

namespace App\Imports;

use App\Models\Affiliation;
use App\Models\User;
use App\Models\UserAffiliation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class MemberImport implements OnEachRow, WithHeadingRow, SkipsOnError
{
/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $exists = User::where('email', $row['email'])->first();
        if ($exists) {
            return null;
        }


        
        $affiliation = Affiliation::find(request()->get('affiliation_id'));
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        if (is_string($row['birthday'])) {
            $birthday = date('Y-m-d', strtotime($row['birthday']));
        } else {
            $birthday = $this->transformDate($row['birthday']);
        }

        if($row['firstname']==null && $row['lastname']==null) {
            return null;
        }

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
            'region_code' => $affiliation->region_code,
            'province_code' => $affiliation->province_code,
            'city_code' => $affiliation->city_code,
            'state_id' => $affiliation->state_id?:'',
            'country_id' => $affiliation->country_id?:'',
            'barangay' => $row['barangaypollingcenter']?$row['barangaypollingcenter']:'',
            'voterid' => $row['votersid']?$row['votersid']:'',
            'birthday' => $birthday,
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

    public function onError(Throwable $e)
    {
        logger('Import error', [$e]);
        return null;
    }
}
