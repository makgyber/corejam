<?php
namespace App\Traits;

trait HasMemberOptions
{
    public $positionOptions = ['Bishop', 'Pastor', 'Elder', 'Board Member/Director', 'Member', 'Other'];
    public $skillOptions = [
        'Preaching', 'Teaching', 'Evangelism', 'Discipleship', 'Leadership', 'Administration', 'Finance'
    ];
    public $coordinatorLevels = ['ofw', 'luzon', 'visayas', 'mindanao', 'regional', 'provincial', 'city', 'municipal', 'barangay'];
    public $needsOptions = ['Pabahay', 'Trabaho', 'Sustainable livelihood', 'Libreng edukasyon'];
}