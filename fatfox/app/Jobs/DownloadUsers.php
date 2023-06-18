<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DownloadUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $count;
    /**
     * Create a new job instance.
     */
    public function __construct($count)
    {
        $this->count = $count;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $dataset = json_decode(file_get_contents("https://randomuser.me/api/?nat=gb&results=" . $this->count));
        foreach ($dataset->results as $item) {
            \DB::table("random_users")->insert([
                'gender' => json_encode($item->gender),
                'name_title' => json_encode($item->name->title),
                'name_first' => json_encode($item->name->first),
                'name_last' => json_encode($item->name->last),
                'l_street_number' => json_encode($item->location->street->number),
                'l_street_name' => json_encode($item->location->street->name),
                'l_city' => json_encode($item->location->city),
                'l_state' => json_encode($item->location->state),
                'l_country' => json_encode($item->location->country),
                'l_postcode' => json_encode($item->location->postcode),
                'l_coord_lat' => json_encode($item->location->coordinates->latitude),
                'l_coord_long' => json_encode($item->location->coordinates->longitude),
                'l_tzone_offset' => json_encode($item->location->timezone->offset),
                'l_tzone_desc' => json_encode($item->location->timezone->description),
                'email' => json_encode($item->email),
                'login_uuid' => json_encode($item->login->uuid),
                'login_username' => json_encode($item->login->username),
                'login_password' => json_encode($item->login->password),
                'login_salt' => json_encode($item->login->salt),
                'login_md5' => json_encode($item->login->md5),
                'login_sha1' => json_encode($item->login->sha1),
                'login_sha256' => json_encode($item->login->sha256),
                'dob_date' => json_encode($item->dob->date),
                'dob_age' => json_encode($item->dob->age),
                'reg_date' => json_encode($item->registered->date),
                'reg_age' => json_encode($item->registered->age),
                'phone' => json_encode($item->phone),
                'cell' => json_encode($item->cell),
                'id_name' => json_encode($item->id->name),
                'id_value' => json_encode($item->id->value),
                'pic_large' => json_encode($item->picture->large),
                'pic_medium' => json_encode($item->picture->medium),
                'pic_thumbnail' => json_encode($item->picture->thumbnail),
                'nat' => json_encode($item->nat),
            ]);
        }
    }
}
