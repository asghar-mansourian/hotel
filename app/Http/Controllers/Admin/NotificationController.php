<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\NotificationRequest;
use App\Notification as Notif;
use App\NotificationMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Notification|edit Notification|create Notification|delete Notification']);

    }

    public function index()
    {
        $notifications = Notif::query()
            ->select(Notif::selectField)
            ->orderBy(Notif::sortField, Notif::sortType)
            ->paginate(Notif::paginateNumber);
        return View::make('admin.notifications.index', compact('notifications'), with([
            'sortField' => Notif::sortField,
            'sortType' => Notif::sortType
        ]));

    }

    public function load()
    {
        $notifications = Notif::query()
            ->select(Notif::selectField)
            ->orderBy(Notif::sortArrowFieldChecked, Notif::sortArrowTypeChecked)
            ->paginate(Notif::paginateNumber);

        return View::make('admin.notifications.load', compact('notifications'), with([
            'sortField' => Notif::sortField,
            'sortType' => Notif::sortType
        ]));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $notifications = Notif::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Notif::selectField)
            ->paginate(Notif::paginateNumber);

        $countNotification = Notif::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.notifications.table', compact('notifications'), with([
            'sortField' => Notif::sortField,
            'sortType' => Notif::sortType,
            'countNotification' => $countNotification,
        ]));
    }

    public function show($id)
    {
        $Notification = Notification::query()
            ->with('user')
            ->where('id', $id)
            ->first();

        return view('admin.notifications.show', compact('Notification'));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Notif::sortType;
        if ($sort_field == null)
            $sort_field = Notif::sortField;

        $Notification = Notif::query()
            ->select(Notif::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Notif::paginateNumber);

        return View::make('admin.notifications.table', compact('Notification'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $notification = Notif::query()
            ->where('id', $id)
            ->first();

        return view('admin.notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $items = $request->except('_token');

//        dd($items);
        foreach ($items as $key => $item) {
            $inputField = explode('_', $key)[0];
            $inputLocale = explode('_', $key)[1];

            switch ($inputField) {
                case 'content':
                    foreach (NotificationMessage::TYPE_ALL as $type) {
                        $content = '';

                        switch ($type) {
                            case NotificationMessage::SMS_TYPE:
                                $content = $item[0];
                                break;
                            case NotificationMessage::EMAIL_TYPE:
                                $content = $item[1];
                                break;
                            case NotificationMessage::FIREBASE_TYPE:
                                $content = $item[2];
                                break;
                        }

                        NotificationMessage::updateOrcreate(
                            [
                                'notification_id' => $id,
                                'lang' => $inputLocale,
                                'type' => $type,
                            ],
                            [
                                'content' => $content,
                            ]
                        );
                    }
                    break;
                case 'title':
                    foreach (NotificationMessage::TYPE_ALL as $type) {
                        $title = '';

                        switch ($type) {
                            case NotificationMessage::EMAIL_TYPE:
                                $title = $item[0];
                                break;
                            case NotificationMessage::FIREBASE_TYPE:
                                $title = $item[1];
                                break;
                        }

                        NotificationMessage::updateOrcreate(
                            [
                                'notification_id' => $id,
                                'lang' => $inputLocale,
                                'type' => $type,
                            ],
                            [
                                'title' => $title,
                            ]
                        );
                    }
                    break;
            }
        }

        session()->flash('message', __('custom.Notification.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

}
