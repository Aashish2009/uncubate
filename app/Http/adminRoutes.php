<?php

Route::get('/admin/messages', array(
	'as' => 'admin_messages',
	'uses' => 'MessagesController@index'
));

Route::post('/admin/messages/data', array(
	'as' => 'admin_messages_data',
	'uses' => 'MessagesController@data'
));

Route::post('/admin/messages/update', array(
	'as' => 'admin_messages_update',
	'uses' => 'MessagesController@update'
));

Route::get('/admin/messages/delete/{slug?}', array(
	'as' => 'admin_messages_delete',
	'uses' => 'MessagesController@delete'
));

Route::get('/admin/messages/view/{slug?}', array(
	'as' => 'admin_messages_view',
	'uses' => 'MessagesController@view'
));

Route::get('/admin/messages/edit/{slug?}', array(
	'as' => 'admin_messages_edit',
	'uses' => 'MessagesController@edit'
));

Route::get('/admin/projects', array(
	'as' => 'admin_projects',
	'uses' => 'ProjectsController@index'
));

Route::post('/admin/projects/data', array(
	'as' => 'admin_projects_data',
	'uses' => 'ProjectsController@data'
));


Route::get('/admin/projects/add', array(
	'as' => 'admin_projects_add',
	'uses' => 'ProjectsController@add'
));

Route::post('/admin/projects/submit', array(
	'as' => 'admin_projects_submit',
	'uses' => 'ProjectsController@submit'
));

Route::get('/admin/projects/edit/{slug?}', array(
	'as' => 'admin_projects_edit',
	'uses' => 'ProjectsController@edit'
));

Route::get('/admin/projects/delete/{slug?}', array(
	'as' => 'admin_projects_delete',
	'uses' => 'ProjectsController@delete'
));

Route::get('/admin/projects/updates/{project_id?}', array(
	'as' => 'admin_project_updates',
	'uses' => 'ProjectsController@updates'
));

Route::post('/admin/projects/updates/data/{project_id?}', array(
	'as' => 'admin_project_updates_data',
	'uses' => 'ProjectsController@updatesData'
));

Route::get('/admin/projects/updates/add/{project_id?}', array(
	'as' => 'admin_project_updates_add',
	'uses' => 'ProjectsController@updatesAdd'
));

Route::post('/admin/projects/updates/submit/{project_id?}', array(
	'as' => 'admin_project_updates_submit',
	'uses' => 'ProjectsController@updatesSubmit'
));

Route::get('/admin/projects/updates/edit/{slug?}', array(
	'as' => 'admin_project_updates_edit',
	'uses' => 'ProjectsController@updatesEdit'
));

Route::get('/admin/projects/updates/delete/{slug?}', array(
	'as' => 'admin_project_updates_delete',
	'uses' => 'ProjectsController@UpdatesDelete'
));

Route::get('/admin/projects/images/{project_id?}', array(
	'as' => 'admin_project_images',
	'uses' => 'ProjectsController@images'
));

Route::post('/admin/projects/images/data/{project_id?}', array(
	'as' => 'admin_project_images_data',
	'uses' => 'ProjectsController@imagesData'
));

Route::get('/admin/projects/images/add/{project_id?}', array(
	'as' => 'admin_project_images_add',
	'uses' => 'ProjectsController@imagesAdd'
));

Route::post('/admin/projects/images/submit/{project_id?}', array(
	'as' => 'admin_project_images_submit',
	'uses' => 'ProjectsController@imagesSubmit'
));

Route::get('/admin/projects/images/edit/{slug?}', array(
	'as' => 'admin_project_images_edit',
	'uses' => 'ProjectsController@imagesEdit'
));

Route::get('/admin/projects/images/delete/{slug?}', array(
	'as' => 'admin_project_images_delete',
	'uses' => 'ProjectsController@imagesDelete'
));

Route::get('/admin/gallery', array(
	'as' => 'admin_gallery',
	'uses' => 'GalleryController@index'
));

Route::post('/admin/gallery/data', array(
	'as' => 'admin_gallery_data',
	'uses' => 'GalleryController@data'
));

Route::get('/admin/gallery/add', array(
	'as' => 'admin_gallery_add',
	'uses' => 'GalleryController@add'
));

Route::post('/admin/gallery/submit', array(
	'as' => 'admin_gallery_submit',
	'uses' => 'GalleryController@submit'
));

Route::get('/admin/gallery/edit/{slug?}', array(
	'as' => 'admin_gallery_edit',
	'uses' => 'GalleryController@edit'
));

Route::get('/admin/gallery/delete/{slug?}', array(
	'as' => 'admin_gallery_delete',
	'uses' => 'GalleryController@delete'
));

Route::get('/admin/gallery/images/{gallery_slug?}', array(
	'as' => 'admin_gallery_images',
	'uses' => 'GalleryController@images'
));

Route::post('/admin//gallery/images/data/{gallery_slug?}', array(
	'as' => 'admin_gallery_images_data',
	'uses' => 'GalleryController@imagesData'
));

Route::get('/admin//gallery/images/add/{gallery_slug?}', array(
	'as' => 'admin_gallery_images_add',
	'uses' => 'GalleryController@imagesAdd'
));

Route::post('/admin//gallery/images/submit/{gallery_slug?}', array(
	'as' => 'admin_gallery_images_submit',
	'uses' => 'GalleryController@imagesSubmit'
));

Route::get('/admin//gallery/images/edit/{slug?}', array(
	'as' => 'admin_gallery_images_edit',
	'uses' => 'GalleryController@imagesEdit'
));

Route::get('/admin//gallery/images/delete/{slug?}', array(
	'as' => 'admin_gallery_images_delete',
	'uses' => 'GalleryController@imagesDelete'
));

Route::post('/admin//gallery/images/upload/{gallery_id?}', array(
	'as' => 'admin_gallery_images_upload',
	'uses' => 'GalleryController@imagesUpload'
));

Route::get('/admin/gallery/videos/{gallery_slug?}', array(
	'as' => 'admin_gallery_videos',
	'uses' => 'GalleryController@videos'
));

Route::post('/admin//gallery/videos/data/{gallery_slug?}', array(
	'as' => 'admin_gallery_videos_data',
	'uses' => 'GalleryController@videosData'
));

Route::get('/admin//gallery/videos/add/{gallery_slug?}', array(
	'as' => 'admin_gallery_videos_add',
	'uses' => 'GalleryController@videosAdd'
));

Route::post('/admin//gallery/videos/submit/{gallery_slug?}', array(
	'as' => 'admin_gallery_videos_submit',
	'uses' => 'GalleryController@videosSubmit'
));

Route::get('/admin//gallery/videos/edit/{slug?}', array(
	'as' => 'admin_gallery_videos_edit',
	'uses' => 'GalleryController@videosEdit'
));

Route::get('/admin//gallery/videos/delete/{slug?}', array(
	'as' => 'admin_gallery_videos_delete',
	'uses' => 'GalleryController@videosDelete'
));

Route::get('/admin/leaders', array(
	'as' => 'admin_leaders',
	'uses' => 'LeadersController@index'
));

Route::post('/admin/leaders/data', array(
	'as' => 'admin_leaders_data',
	'uses' => 'LeadersController@data'
));

Route::get('/admin/leaders/add', array(
	'as' => 'admin_leaders_add',
	'uses' => 'LeadersController@add'
));

Route::post('/admin/leaders/submit', array(
	'as' => 'admin_leaders_submit',
	'uses' => 'LeadersController@submit'
));

Route::get('/admin/leaders/edit/{slug?}', array(
	'as' => 'admin_leaders_edit',
	'uses' => 'LeadersController@edit'
));

Route::get('/admin/leaders/delete/{slug?}', array(
	'as' => 'admin_leaders_delete',
	'uses' => 'LeadersController@delete'
));

Route::get('/admin/status', array(
	'as' => 'admin_status',
	'uses' => 'StatusController@index'
));

Route::post('/admin/status/data', array(
	'as' => 'admin_status_data',
	'uses' => 'StatusController@data'
));

Route::get('/admin/status/add', array(
	'as' => 'admin_status_add',
	'uses' => 'StatusController@add'
));

Route::post('/admin/status/submit', array(
	'as' => 'admin_status_submit',
	'uses' => 'StatusController@submit'
));

Route::get('/admin/status/edit/{slug?}', array(
	'as' => 'admin_status_edit',
	'uses' => 'StatusController@edit'
));

Route::get('/admin/status/delete/{slug?}', array(
	'as' => 'admin_status_delete',
	'uses' => 'StatusController@delete'
));

Route::get('/admin/blog', array(
	'as' => 'admin_blog',
	'uses' => 'BlogController@index'
));

Route::post('/admin/blog/data', array(
	'as' => 'admin_blog_data',
	'uses' => 'BlogController@data'
));

Route::get('/admin/blog/add', array(
	'as' => 'admin_blog_add',
	'uses' => 'BlogController@add'
));

Route::post('/admin/blog/submit', array(
	'as' => 'admin_blog_submit',
	'uses' => 'BlogController@submit'
));

Route::get('/admin/blog/edit/{slug?}', array(
	'as' => 'admin_blog_edit',
	'uses' => 'BlogController@edit'
));

Route::get('/admin/blog/delete/{slug?}', array(
	'as' => 'admin_blog_delete',
	'uses' => 'BlogController@delete'
));

Route::get('/admin/team-member', array(
		'as' => 'admin_team_member',
		'uses' => 'TeamMemberController@index'
));

Route::post('/admin/team-member/data', array(
		'as' => 'admin_team_member_data',
		'uses' => 'TeamMemberController@data'
));

Route::get('/admin/team-member/add', array(
		'as' => 'admin_team_member_add',
		'uses' => 'TeamMemberController@add'
));

Route::post('/admin/team-member/submit', array(
		'as' => 'admin_team_member_submit',
		'uses' => 'TeamMemberController@submit'
));

Route::get('/admin/team-member/edit/{slug?}', array(
		'as' => 'admin_team_member_edit',
		'uses' => 'TeamMemberController@edit'
));

Route::get('/admin/team-member/delete/{slug?}', array(
		'as' => 'admin_team_member_delete',
		'uses' => 'TeamMemberController@delete'
));

Route::get('/admin/news-letter-subscription', array(
		'as' => 'news_letter_subscription',
		'uses' => 'NewsLetterController@index'
));

Route::post('/admin/news-letter-subscription/data', array(
		'as' => 'news_letter_subscription_data',
		'uses' => 'NewsLetterController@data'
));

Route::get('/admin/news-letter-subscription/delete/{slug?}', array(
		'as' => 'news_letter_subscription_delete',
		'uses' => 'NewsLetterController@delete'
));

Route::get('/admin/bookings', array(
		'as' => 'admin_bookings',
		'uses' => 'BookingsController@index'
));

Route::post('/admin/bookings/data', array(
		'as' => 'admin_bookings_data',
		'uses' => 'BookingsController@data'
));

Route::get('/admin/bookings/add', array(
		'as' => 'admin_bookings_add',
		'uses' => 'BookingsController@add'
));

Route::post('/admin/bookings/submit', array(
		'as' => 'admin_bookings_submit',
		'uses' => 'BookingsController@submit'
));

Route::get('/admin/bookings/edit/{slug?}', array(
		'as' => 'admin_bookings_edit',
		'uses' => 'BookingsController@edit'
));

Route::get('/admin/bookings/delete/{slug?}', array(
		'as' => 'admin_bookings_delete',
		'uses' => 'BookingsController@delete'
));

Route::get('/admin/video-text', array(
		'as' => 'admin_video_text',
		'uses' => 'VideoTextController@index'
));

Route::post('/admin/video-text/submit', array(
		'as' => 'admin_video_text_submit',
		'uses' => 'VideoTextController@submit'
));

Route::get('/admin/video-text/edit', array(
		'as' => 'admin_video_text_edit',
		'uses' => 'VideoTextController@edit'
));

Route::get('/admin/location', array(
		'as' => 'admin_location',
		'uses' => 'LocationController@index'
));

Route::post('/admin/location/data', array(
		'as' => 'admin_location_data',
		'uses' => 'LocationController@data'
));

Route::get('/admin/location/add', array(
		'as' => 'admin_location_add',
		'uses' => 'LocationController@add'
));

Route::post('/admin/location/submit', array(
		'as' => 'admin_location_submit',
		'uses' => 'LocationController@submit'
));

Route::get('/admin/location/edit/{slug?}', array(
		'as' => 'admin_location_edit',
		'uses' => 'LocationController@edit'
));

Route::get('/admin/location/delete/{slug?}', array(
		'as' => 'admin_location_delete',
		'uses' => 'LocationController@delete'
));