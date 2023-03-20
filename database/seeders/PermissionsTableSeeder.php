<?php
namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'content_management_access',
            ],
            [
                'id'    => '20',
                'title' => 'content_category_create',
            ],
            [
                'id'    => '21',
                'title' => 'content_category_edit',
            ],
            [
                'id'    => '22',
                'title' => 'content_category_show',
            ],
            [
                'id'    => '23',
                'title' => 'content_category_delete',
            ],
            [
                'id'    => '24',
                'title' => 'content_category_access',
            ],
            [
                'id'    => '25',
                'title' => 'content_tag_create',
            ],
            [
                'id'    => '26',
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => '27',
                'title' => 'content_tag_show',
            ],
            [
                'id'    => '28',
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => '29',
                'title' => 'content_tag_access',
            ],
            [
                'id'    => '30',
                'title' => 'content_page_create',
            ],
            [
                'id'    => '31',
                'title' => 'content_page_edit',
            ],
            [
                'id'    => '32',
                'title' => 'content_page_show',
            ],
            [
                'id'    => '33',
                'title' => 'content_page_delete',
            ],
            [
                'id'    => '34',
                'title' => 'content_page_access',
            ],
            [
                'id'    => '35',
                'title' => 'slider_create',
            ],
            [
                'id'    => '36',
                'title' => 'slider_edit',
            ],
            [
                'id'    => '37',
                'title' => 'slider_show',
            ],
            [
                'id'    => '38',
                'title' => 'slider_delete',
            ],
            [
                'id'    => '39',
                'title' => 'slider_access',
            ],
            [
                'id'    => '40',
                'title' => 'main_block_create',
            ],
            [
                'id'    => '41',
                'title' => 'main_block_edit',
            ],
            [
                'id'    => '42',
                'title' => 'main_block_show',
            ],
            [
                'id'    => '43',
                'title' => 'main_block_delete',
            ],
            [
                'id'    => '44',
                'title' => 'main_block_access',
            ],
            [
                'id'    => '45',
                'title' => 'client_create',
            ],
            [
                'id'    => '46',
                'title' => 'client_edit',
            ],
            [
                'id'    => '47',
                'title' => 'client_show',
            ],
            [
                'id'    => '48',
                'title' => 'client_delete',
            ],
            [
                'id'    => '49',
                'title' => 'client_access',
            ],
            [
                'id'    => '50',
                'title' => 'request_meeting_show',
            ],
            [
                'id'    => '51',
                'title' => 'request_meeting_delete',
            ],
            [
                'id'    => '52',
                'title' => 'request_meeting_access',
            ],
            [
                'id'    => '53',
                'title' => 'video_create',
            ],
            [
                'id'    => '54',
                'title' => 'video_edit',
            ],
            [
                'id'    => '55',
                'title' => 'video_show',
            ],
            [
                'id'    => '56',
                'title' => 'video_delete',
            ],
            [
                'id'    => '57',
                'title' => 'video_access',
            ],
            [
                'id'    => '58',
                'title' => 'event_create',
            ],
            [
                'id'    => '59',
                'title' => 'event_edit',
            ],
            [
                'id'    => '60',
                'title' => 'event_show',
            ],
            [
                'id'    => '61',
                'title' => 'event_delete',
            ],
            [
                'id'    => '62',
                'title' => 'event_access',
            ],
            [
                'id'    => '63',
                'title' => 'podcast_create',
            ],
            [
                'id'    => '64',
                'title' => 'podcast_edit',
            ],
            [
                'id'    => '65',
                'title' => 'podcast_show',
            ],
            [
                'id'    => '66',
                'title' => 'podcast_delete',
            ],
            [
                'id'    => '67',
                'title' => 'podcast_access',
            ],
            [
                'id'    => '68',
                'title' => 'package_access',
            ],
            [
                'id'    => '69',
                'title' => 'pack_create',
            ],
            [
                'id'    => '70',
                'title' => 'pack_edit',
            ],
            [
                'id'    => '71',
                'title' => 'pack_show',
            ],
            [
                'id'    => '72',
                'title' => 'pack_delete',
            ],
            [
                'id'    => '73',
                'title' => 'pack_access',
            ],
            [
                'id'    => '74',
                'title' => 'pack_service_create',
            ],
            [
                'id'    => '75',
                'title' => 'pack_service_edit',
            ],
            [
                'id'    => '76',
                'title' => 'pack_service_show',
            ],
            [
                'id'    => '77',
                'title' => 'pack_service_delete',
            ],
            [
                'id'    => '78',
                'title' => 'pack_service_access',
            ],
            [
                'id'    => '79',
                'title' => 'course_create',
            ],
            [
                'id'    => '80',
                'title' => 'course_edit',
            ],
            [
                'id'    => '81',
                'title' => 'course_show',
            ],
            [
                'id'    => '82',
                'title' => 'course_delete',
            ],
            [
                'id'    => '83',
                'title' => 'course_access',
            ],
            [
                'id'    => '84',
                'title' => 'pack_attachment_create',
            ],
            [
                'id'    => '85',
                'title' => 'pack_attachment_edit',
            ],
            [
                'id'    => '86',
                'title' => 'pack_attachment_show',
            ],
            [
                'id'    => '87',
                'title' => 'pack_attachment_delete',
            ],
            [
                'id'    => '88',
                'title' => 'pack_attachment_access',
            ],
            [
                'id'    => '89',
                'title' => 'pack_subscription_create',
            ],
            [
                'id'    => '90',
                'title' => 'pack_subscription_edit',
            ],
            [
                'id'    => '91',
                'title' => 'pack_subscription_show',
            ],
            [
                'id'    => '92',
                'title' => 'pack_subscription_delete',
            ],
            [
                'id'    => '93',
                'title' => 'pack_subscription_access',
            ],
            [
                'id'    => '94',
                'title' => 'package_category_create',
            ],
            [
                'id'    => '95',
                'title' => 'package_category_edit',
            ],
            [
                'id'    => '96',
                'title' => 'package_category_show',
            ],
            [
                'id'    => '97',
                'title' => 'package_category_delete',
            ],
            [
                'id'    => '98',
                'title' => 'package_category_access',
            ],
            [
                'id'    => '99',
                'title' => 'story_create',
            ],
            [
                'id'    => '100',
                'title' => 'story_edit',
            ],
            [
                'id'    => '101',
                'title' => 'story_show',
            ],
            [
                'id'    => '102',
                'title' => 'story_delete',
            ],
            [
                'id'    => '103',
                'title' => 'story_access',
            ],
            [
                'id'    => '104',
                'title' => 'consulting_create',
            ],
            [
                'id'    => '105',
                'title' => 'consulting_edit',
            ],
            [
                'id'    => '106',
                'title' => 'consulting_show',
            ],
            [
                'id'    => '107',
                'title' => 'consulting_delete',
            ],
            [
                'id'    => '108',
                'title' => 'consulting_access',
            ],
            [
                'id'    => '109',
                'title' => 'consulting_request_create',
            ],
            [
                'id'    => '110',
                'title' => 'consulting_request_edit',
            ],
            [
                'id'    => '111',
                'title' => 'consulting_request_show',
            ],
            [
                'id'    => '112',
                'title' => 'consulting_request_delete',
            ],
            [
                'id'    => '113',
                'title' => 'consulting_request_access',
            ],
        ];

        Permission::insert($permissions);

    }
}
